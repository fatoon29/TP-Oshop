<?php 

class Product 
{
    
    private $id;
    private $name;
    private $description;
    private $picture;
    private $price;
    private $rate;
    private $status;
    private $created_at;
    private $updated_at;
    private $brand_id;
    private $category_id;
    private $type_id;


    /** irait faire un INSERT dans la bdd */
    public function save()
    {

    }

    /** retourner une instance Product depuis la bdd, en fonction de l'id */
    public function find($id)
    {
        $sql = "SELECT * FROM product 
                WHERE id = $id";
        
        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);

        //retourne UNE instance de notre classe Product, avec les données de la bdd
        $product = $pdoStatement->fetchObject('Product');

        return $product;
    }

    /** retourne tous les products ! */
    public function findAll()
    {
        //notre requête qui va tout chercher dans la table product
        $sql = "SELECT * 
                FROM product 
                ORDER BY created_at DESC";
        
        //récupère l'instance de PDO
        //PDO == notre connexion à la bdd
        //voir la classe Utils/Database.php si vous avez le courage
        $pdo = Database::getPDO();
        
        //exécute notre requête sql
        $pdoStatement = $pdo->query($sql);
        //renvoie les résultats directement sous forme d'objet Product !!!
        $products = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Product');

        //on sort les produits d'ici
        return $products;
    }

    /** @todo à coder un de ces jours */
    //retourne tous les produits en fonction d'un identifiant de catégorie
    public function findAllByCategory($categoryId)
    {

    }

    /** @todo à coder un de ces jours */
    public function findAllByBrand($brandId)
    {
        
    }

    /** @todo à coder un de ces jours */
    public function findAllByType($typeId)
    {
        
    }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }


    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of picture
     */ 
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set the value of picture
     *
     * @return  self
     */ 
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of rate
     */ 
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set the value of rate
     *
     * @return  self
     */ 
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of created_at
     */ 
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of updated_at
     */ 
    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @return  self
     */ 
    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * Get the value of brand_id
     */ 
    public function getBrand_id()
    {
        return $this->brand_id;
    }

    /**
     * Set the value of brand_id
     *
     * @return  self
     */ 
    public function setBrand_id($brand_id)
    {
        $this->brand_id = $brand_id;

        return $this;
    }

    /**
     * Get the value of category_id
     */ 
    public function getCategory_id()
    {
        return $this->category_id;
    }

    /**
     * Set the value of category_id
     *
     * @return  self
     */ 
    public function setCategory_id($category_id)
    {
        $this->category_id = $category_id;

        return $this;
    }

    /**
     * Get the value of type_id
     */ 
    public function getType_id()
    {
        return $this->type_id;
    }

    /**
     * Set the value of type_id
     *
     * @return  self
     */ 
    public function setType_id($type_id)
    {
        $this->type_id = $type_id;

        return $this;
    }
}