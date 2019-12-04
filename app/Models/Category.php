<?php 

namespace oShop\Models;

use oShop\Utils\Database;

class Category extends Model
{

    private $name;
    private $subtitle;
    private $picture;
    private $home_order;

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
     * Get the value of subtitle
     */ 
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * Set the value of subtitle
     *
     * @return  self
     */ 
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;

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
     * Get the value of home_order
     */ 
    public function getHome_order()
    {
        return $this->home_order;
    }

    /**
     * Set the value of home_order
     *
     * @return  self
     */ 
    public function setHome_order($home_order)
    {
        $this->home_order = $home_order;

        return $this;
    }

    /**
     * Retourne un objet catégorie
     */
    public function find($id)
    {
        $sql = "SELECT * FROM category 
                WHERE id = $id";
        
        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);

        $category = $pdoStatement->fetchObject('oShop\Models\Category');

        return $category;
    }

}