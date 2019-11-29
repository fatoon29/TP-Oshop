<?php 
    require("../vendor/autoload.php");

    //nos définitions de classes
    require("../app/Controllers/MainController.php");
    require("../app/Controllers/CatalogController.php");

    //crée une instance de notre router open source
    $router = new AltoRouter();

    //la partie de l'URL à ne pas prendre compte lorsqu'AltoRouter
    //essaye de trouver une route correspondant à l'URL
    // la valeur de $_SERVER['BASE_URI'] est donnée par le .htaccess. Elle correspond à la racine du site
    $router->setBasePath($_SERVER["BASE_URI"]);

    //prévient altorouter de l'existence de cette route
    //route de la page d'accueil
    $router->map(
        "GET", //le ou les verbes http pour cette page
        "/",  //l'url pour arriver sur cette page
        //ce qui sera appelé :
        [
            "method" => "home",
            "controller" => "MainController",
        ],
        "home" //nom unique pour cette route
    );

    $router->map(
        "GET",
        //paramètre dynamique de notre url !! partie variable... on aura l'id de la catégorie ici 
        //le i indique que ça doit être un entier
        //le id => nom du paramètre
        "/categorie/[i:id]/",         [
            "method" => "productList",
            "controller" => "CatalogController"
        ],
        "catalog-category"
    );

    //tente de trouver la correspondance entre l'URL et nos routes
    $match = $router->match();
    dd($match);

    //fonction fournie par le var-dumper de symfony
    //dd($routes) pour faire un die() après le dump()
    //dump($routes);

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