<?php 

class CategoryController 
{
    /**
     * Pour la page de tous les produits d'une catégorie
     */
    public function productList()
    {
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