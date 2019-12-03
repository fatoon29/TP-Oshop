<?php 

class Controller 
{

    /**
     * Affiche la vue ! 
     * Le 2e argument est normalement un tableau
     * Ce tableau permet de passer des variables, des données, en nombre illimité
     * il est optionnel (= null)
     * mais forcément un tableau (typage avec array)
     * 
     * protected pour que les enfants puissent l'appeler ! 
     */
    protected function show(string $filename, array $viewParams = null)
    {
        //importe la variable globale $router ici ! 
        //pas super beau de faire ça
        global $router;

        //requête pour aller choper les brands à afficher dans le footer
        $brandModel = new Brand();
        $brands = $brandModel->findFooterBrands();

        require('../app/views/header.tpl.php');
        //interpolation de variable avec les ""
        require("../app/views/$filename.tpl.php");
        require('../app/views/footer.tpl.php');
    }
}