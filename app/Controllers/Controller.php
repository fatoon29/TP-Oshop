<?php 

namespace oShop\Controllers;

// On fait soit un new du FQCN directement
// ou on passe par `use`
// dans un fichier de classe, on privilégiera `use`
use oShop\Models\Brand;
use oShop\Models\Type;

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

        //requête pour aller choper les types de produits à afficher dans le footer
        $typeModel = new Type();
        $types = $typeModel->findFooterTypes();
 
        require('../app/views/header.tpl.php');
        //interpolation de variable avec les ""
        require("../app/views/$filename.tpl.php");
        require('../app/views/footer.tpl.php');
    }
}