<?php
namespace Controllers;
use Models\BarajaESP;
use Models\Carta;
use Lib\Pages;

class BarajaController{
    private Pages $pages;
    // private int $numeroCartas;
    function __construct(){
        $this->pages = new Pages();
    }


    public function mostrarBarajaAleatoria(){
        $baraja = new BarajaESP();
        $baraja->barajarMazo();
        $mazo = $baraja->getArrayBaraja();
        $this->pages->render('MostrarBaraja', ['mazo' => $mazo]);
    }

    public function mostrarBaraja(){
        $baraja = new BarajaESP();
        $mazo = $baraja->getArrayBaraja();
        // require_once "Views/MostrarBaraja.php";
        // $lib = new Pages();
        // $lib->render('MostrarBaraja', ['mazo'=> $mazo]);
        $this->pages->render('MostrarBaraja', ['mazo' => $mazo]); // A partir de ahora utilizaremos la clase pages para mostrar las vistas, en vez del require.
    }

    public function sacarUltimaCarta(){
        $baraja = new BarajaESP();
        $carta = new CartaController();
        $cartaExtraida = $baraja->extraerCarta();
        $mazo = $baraja->getArrayBaraja();
        $carta->mostrarCarta($cartaExtraida);
        $this->pages->render('Carta/MostrarCartaYBaraja', ['mazo' => $mazo, 'carta' => $cartaExtraida]);
        return $cartaExtraida;
    }

    public function sacarCartaAleatoria(){
        $baraja = new BarajaESP();
        $carta = new CartaController();
        $cartaExtraida = $baraja->extraerCartaAleatoria();
        $mazo = $baraja->getArrayBaraja();
        $carta->mostrarCarta($cartaExtraida);
        $this->pages->render('Carta/MostrarCartaYBaraja', ['mazo' => $mazo, 'carta' => $cartaExtraida]);
        return $cartaExtraida;
    }

    public function repartirTresCartasAUnJugador(/*$numeroCartas*/){
        $baraja = new BarajaESP();
        $baraja->barajarMazo();
        $cartasJugador = [];
        for($i=0; $i<3; $i++){
            $carta = $baraja->extraerCarta();
            array_push($cartasJugador, $carta);
        }
        $mazoRestante = $baraja->getArrayBaraja();
        $this->pages->render('Carta/RepartirCartas', ['cartasJugador' => $cartasJugador, 'mazoRestante' => $mazoRestante]);

    }
    
    public function repartirDiezCartasAUnJugador(){
        $baraja = new BarajaESP();
        $baraja->barajarMazo();
        $cartasJugador = [];
        for($i=0; $i<10; $i++){
            $carta = $baraja->extraerCarta();
            array_push($cartasJugador, $carta);
        }
        $mazoRestante = $baraja->getArrayBaraja();
        $this->pages->render('Carta/RepartirCartas', ['cartasJugador' => $cartasJugador, 'mazoRestante' => $mazoRestante]);
    }
}

?>