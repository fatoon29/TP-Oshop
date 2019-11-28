<?php 

    //nos définitions de classes
    require("../app/Controllers/MainController.php");

    //nos routes (correspondances entre URLs et méthode de contrôleur)
    $routes = [
        //route pour l'accueil
        "/" => [
            "method" => "home",
            "controller" => "MainController",
        ],
        
    ];

    //récupère l'URL demandée ( / par défaut)
    //_url provient du htaccess ! Ce paramètre contient l'URL réécrite
    if (isset($_GET['_url'])){
        $page = $_GET['_url'];
    }
    else {
        $page = "/";
    }

    if (!isset($routes[$page])){
        //@todo: gérer la page 404 correctement
        die("404");
    }
    else {
        //quel contrôleur on doit instancier ?
        $controllerToUse = $routes[$page]['controller'];
        //quelle méthode on doit appeler dans ce contrôleur ? 
        $methodToUse = $routes[$page]['method'];

        //crée l'instance du contrôleur
        $controller = new $controllerToUse();

        //appelle la méthode associée à cette route
        $controller->$methodToUse();
        //ou
        //call_user_func([$controller, $methodToUse]);
    }