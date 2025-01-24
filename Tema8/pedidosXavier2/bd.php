<?php

// Conectamos con la base de datos
$dsn = "mysql:host=localhost;dbname=pedidos;charset=utf8mb4";
$username = "root";
$password = "";

function leer_config($nombre, $esquema)
{
    if (!file_exists($nombre)) {
        throw new Exception("Fichero de configuración no encontrado: $nombre");
    }

    $config = simplexml_load_file($nombre);
    if ($config === false) {
        throw new Exception("Error al cargar el fichero de configuración: $nombre");
    }

    if (!file_exists($esquema)) {
        throw new Exception("Fichero de esquema no encontrado: $esquema");
    }

    $dom = new DOMDocument();
    $dom->loadXML($config->asXML());
    $esquemaValido = $dom->schemaValidate($esquema);

    if (!$esquemaValido) {
        throw new Exception("El fichero de configuración no es válido según el esquema: $esquema");
    }

    return [
        (string)$config->conexion,
        (string)$config->usuario,
        (string)$config->clave
    ];
}

function cargar_categorias()
{
    $res = leer_config(
        dirname(__FILE__) . "/configuracion.xml",
        dirname(__FILE__) . "/configuracion.xsd"
    );
    $bd = new PDO($res[0], $res[1], $res[2]);

    $ins = "select codCat, nombre from categorias";
    $resul = $bd->query($ins);
    if (! $resul) {
        return FALSE;
    }
    if ($resul->rowCount() === 0) {
        return FALSE;
    }
    //si hay 1 o más
    return $resul;
}

function cargar_categoria($codCat)
{
    $res = leer_config(
        dirname(__FILE__) . "/configuracion.xml",
        dirname(__FILE__) . "/configuracion.xsd"
    );
    $bd = new PDO($res[0], $res[1], $res[2]);

    $ins = "select nombre, descripcion from categorias where codCat = ?";
    $stmt = $bd->prepare($ins);
    $stmt->execute([$codCat]);

    if ($stmt->rowCount() === 0) {
        return FALSE;
    }

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function comprobar_usuario($nombre, $clave)
{
    try {
        global $dsn, $username, $password;
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Error al conectar a la base de datos: " . $e->getMessage());
    }

    // Comprobamos si el email y la clave están en la tabla restaurantes de la bbdd
    $sql = "SELECT codRes, correo FROM restaurantes WHERE correo = ? AND clave = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nombre, $clave]);

    if ($stmt->rowCount() === 0) {
        return FALSE;
    }

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function cargar_productos_categoria($codCat)
{ {
        $res = leer_config(
            dirname(__FILE__) . "/configuracion.xml",
            dirname(__FILE__) . "/configuracion.xsd"
        );
        $bd = new PDO($res[0], $res[1], $res[2]);

        $ins = "select * from productos where codCat = ?";
        $stmt = $bd->prepare($ins);
        $stmt->execute([$codCat]);

        if ($stmt->rowCount() === 0) {
            return FALSE;
        }

        return $stmt;
    }
}

function cargar_productos($codigosProductos)
{
    $res = leer_config(
        dirname(__FILE__) . "/configuracion.xml",
        dirname(__FILE__) . "/configuracion.xsd"
    );
    $bd = new PDO($res[0], $res[1], $res[2]);
    $texto_in = implode(",", $codigosProductos);
    $ins = "select * from productos where codProd in($texto_in)";
    $resul = $bd->query($ins);
    if (! $resul) {
        return FALSE;
    }

    return $resul;
}

function insertar_pedidos($carrito, $codRes)
{
    $res = leer_config(dirname(__FILE__) . "/configuracion.xml", dirname(__FILE__) . "/configuracion.xsd");
    $bd = new PDO($res[0], $res[1], $res[2]);
    $bd->beginTransaction();
    $hora = date("Y-m-d H:i:s", time());

    // insertar el pedido
    $sql = "insert into pedidos(fecha, enviado, restaurante)
        values( '$hora' ,O, $codRes)";
    $resul = $bd->query($sql);
    if (! $resul) {
        return FALSE;
    }

    // coger el id del nuevo pedido para las filas detalle
    $pedido = $bd->lastinsertid();

    // insertar las filas en pedidoproductos
    foreach ($carrito as $codProd => $unidades) {
        $sql = "insert into pedidosproductos(Pedido, Producto,Unidades)values($pedido, $codProd, $unidades)";
        echo $sql;
        $resul = $bd->query($sql);
        if (!$resul) {

            $bd->rollback();
            return FALSE;
        }
        $sql = "update productos set stock = stock - $unidades where codProd = $codProd";
        $resul = $bd->query($sql);
        if (! $resul) {
            $bd->rollback();
            return FALSE;
        }
    }
    $bd->commit();
    return $pedido;
}
