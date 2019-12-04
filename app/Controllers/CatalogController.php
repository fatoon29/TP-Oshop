<?php 

class CatalogController extends Controller
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
        //l'id du produit à afficher !
        $productId = $urlParams['id'];

        //crée une instance pour pouvoir appeler la méthode
        $productModel = new Product();
        //récupère un produit en fonction de sa clé primaire
        $product = $productModel->find($productId);

        //dump($product);

        // Sans jointure
        // Pour la marque
        $brandModel = new Brand();
        // On va chercher la marque depuis la marque du produit
        $brand = $brandModel->find($product->getBrand_id());

        $this->show('product_details', [
            "product" => $product,
            "brand" => $brand,
        ]);
    }

}