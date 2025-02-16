    <?php
        require_once "autoloader.php";
        require_once "./config/config.php";

        // Cargamos el FrontController
        require_once "Controllers/FrontController.php";
        use Controllers\FrontController;

        FrontController::main();
        
    ?>