<?php 
    //inclue toutes nos dépendances installées par composer
    require("../vendor/autoload.php");

    //nos définitions de classes
    //notre contrôleur de base, la papa controleur
    require("../app/Controllers/Controller.php");

    //les enfants contrôleurs
    require("../app/Controllers/MainController.php");
    require("../app/Controllers/CatalogController.php");

    //on inclue d'abord la classe parente ! 
    require("../app/Models/Model.php");

    //nos modèles enfants
    require("../app/Models/Brand.php");
    require("../app/Models/Product.php");
    require("../app/Models/Type.php");
    require("../app/Models/Category.php");

    require("../app/Utils/Database.php");

    //crée une instance de notre router open source
    $router = new AltoRouter();

    //permet de voir toutes les méthodes contenues dans une classe
    //dd(get_class_methods($router));

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

    //page informations légales
    $router->map(
        "GET", //le ou les verbes http pour cette page
        "/legal-mentions/",  //l'url pour arriver sur cette page
        //ce qui sera appelé :
        [
            "method" => "legalMentions",
            "controller" => "MainController",
        ],
        "legal-mentions" //nom unique pour cette route
    );

    $router->map(
        "GET",
        //paramètre dynamique de notre url !! partie variable... on aura l'id de la catégorie ici 
        //le i indique que ça doit être un entier
        //le id => nom du paramètre
        "/catalog/category/[i:id]/",         
        [
            "method" => "productsByCategory",
            "controller" => "CatalogController"
        ],
        "catalog-category"
    );


    $router->map(
        "GET",
        "/catalog/type/[i:id]/",
        [
            "method" => "productsByType",
            "controller" => "CatalogController"
        ],
        "catalog-type"
    );

    $router->map(
        "GET",
        "/catalog/brand/[i:id]/",
        [
            "method" => "productsByBrand",
            "controller" => "CatalogController"
        ],
        "catalog-brand"
    );

    $router->map(
        "GET",
        "/catalog/product/[i:id]/",
        [
            "method" => "productDetails",
            "controller" => "CatalogController"
        ],
        "catalog-product-details"
    );


    //tente de trouver la correspondance entre l'URL et nos routes
    //retourne un tableau s'il y a correspondance
    //false sinon
    $match = $router->match();
    //dump($match);

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

    //si altorouter n'a pas trouvé de correspondance entre l'URL actuelle
    //et nos routes, $match est alors égal à false donc...
    if ($match === false){
        //@todo: gérer la page 404 correctement
        header('HTTP/1.0 404 Not Found');
        die("404");
    }
    else {
        //quel contrôleur on doit instancier ?
        $controllerToUse = $match['target']['controller'];
        //quelle méthode on doit appeler dans ce contrôleur ? 
        $methodToUse = $match['target']['method'];

        //crée l'instance du contrôleur
        $controller = new $controllerToUse();

        //appelle la méthode associée à cette route
        //on passe les éventuels paramètres d'URL à notre méthode de contrôleur
        $controller->$methodToUse($match['params']);
        //ou
        //call_user_func([$controller, $methodToUse]);
    }