<?php
namespace Controllers;
use Models\Carta;
use Models\BarajaESP;
use Lib\Pages;

class CartaController{
    private Pages $pages;

    public function __construct(){
        $this->pages = new Pages();
    }

    public function mostrarCarta($carta){
        $numero = $carta->getNumero();
        $palo = strtolower($carta->getPalo());
        $imagen = "img/{$palo}_{$numero}.jpg"; 
        $this->pages->render('Carta/MostrarCarta', ['imagen' => $imagen, 'numero' => $numero, 'palo' => $palo]);
    }

    public function pedirUltimaCarta(){
        $barajaController = new BarajaController(); // Instanciamos el controlador de la baraja para usar su método.
        $cartaExtraida = $barajaController->sacarUltimaCarta();
        $this->mostrarCarta($cartaExtraida);
    }

    public function pedirCartaAleatoria(){
        $barajaController = new BarajaController(); // Instanciamos el controlador de la baraja para usar su método.
        $cartaExtraida = $barajaController->sacarCartaAleatoria();
        $this->mostrarCarta($cartaExtraida);
        $barajaController->sacarCartaAleatoria();

    }

    public function pedirTresCartasRepartidas(){
        $barajaController = new BarajaController(); // Instanciamos el controlador de la baraja para usar su método.
        // $numeroCartas = 3;
        // $barajaController->repartirCartasAUnJugador($numeroCartas);
        $barajaController->repartirTresCartasAUnJugador();
    }

    public function pedirDiezCartasRepartidas(){
        $barajaController = new BarajaController(); // Instanciamos el controlador de la baraja para usar su método.
        $barajaController->repartirDiezCartasAUnJugador();
    }

}



?>