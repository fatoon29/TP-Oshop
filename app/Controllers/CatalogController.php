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

    public function productsByType($urlParams)
    {
        $typeId = $urlParams['id'];

        $this->show('type_product_list');
    }

    public function productsByBrand($urlParams)
    {
        $brandId = $urlParams['id'];

        //aller chercher tous les produits dans la bdd
        //crée d'abord une instance de notre modèle just pour pouvoir...
        $product = new Product();
        //appeler la méthode findall qui s'y trouve
        //retourne un tableau contenant une instance de Product pour 
        //chaque ligne de la table
        $allProducts = $product->findAll();

        //on passe notre variable en 2e argument afin de la rendre disponible
        //dans nos templates
        $this->show('brand_product_list', [
            "allProducts" => $allProducts
        ]);
    }

    public function productDetails($urlParams)
    {
        $productId = $urlParams['id'];

        $this->show('product_details');
    }

    /**
     * Affiche la vue ! 
     * Le 2e argument est normalement un tableau
     * Ce tableau permet de passer des variables, des données, en nombre illimité
     * il est optionnel (= null)
     * mais forcément un tableau (typage avec array)
     */
    private function show(string $filename, array $viewParams = null)
    {
        require('../app/views/header.tpl.php');
        //interpolation de variable avec les ""
        require("../app/views/$filename.tpl.php");
        require('../app/views/footer.tpl.php');
    }
}