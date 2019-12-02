<?php 

class CatalogController 
{
    /**
     * Pour la page de tous les produits d'une catégorie
     */
    public function productsByCategory($urlParams)
    {
        //@todo: aller chercher en bdd la categorie à afficher
        //ainsi que ses produits

        //récupère l'id de la catégorie présent dans l'URL
        $categoryId = $urlParams['id'];
        //dd($categoryId);

        $this->show('category_product_list');
    }

    /**
     * Affiche la vue ! 
     */
    private function show(string $filename)
    {
        require('../app/views/header.tpl.php');
        //interpolation de variable avec les ""
        require("../app/views/$filename.tpl.php");
        require('../app/views/footer.tpl.php');
    }
}