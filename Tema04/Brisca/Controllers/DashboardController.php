<?php
namespace Controllers;
use Lib\Pages;

class DashboardController{
    private Pages $pages;

    public function __construct(){
        $this->pages = new Pages();
    }

    public function mostrarDashboard(){
        $this->pages->render('Layout/Header');
        $this->pages->render('Dashboard');
        $this->pages->render('Layout/Footer');

        
    }
}





?>