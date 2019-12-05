<?php 

namespace oShop\Models;

use oShop\Utils\Database;

/**
 * Cette classe représente les données pour les marques de chaussures
 * Elle est copiée complètement de la table brand dans la bdd
 */

class Brand extends Model
{
    /**
     * Les propriétés ici sont exactement les mêmes que les colonnes dans la bdd
     */
    private $name;
    private $footer_order;

    /**
     * Récupère les 5 marques pour affichage dans le pied-de-page du site
     */
    public function findFooterBrands()
    {
        $pdo = Database::getPDO();

        $sql = "SELECT * 
                FROM brand
                WHERE footer_order > 0 
                ORDER BY footer_order ASC";
        
        $pdoStatement = $pdo->query($sql);
        //on récupère un array de 5 instances de Brand
        $brands = $pdoStatement->fetchAll(\PDO::FETCH_CLASS, 'oShop\Models\Brand');

        return $brands;
    }

    /**
     * Retourne un objet Brand
     */
    public function find($id)
    {
        $sql = "SELECT * FROM brand 
                WHERE id = $id";
        
        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);

        $brand = $pdoStatement->fetchObject('oShop\Models\Brand');

        return $brand;
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
     * Get the value of footer_order
     */ 
    public function getFooter_order()
    {
        return $this->footer_order;
    }

    /**
     * Set the value of footer_order
     *
     * @return  self
     */ 
    public function setFooter_order($footer_order)
    {
        $this->footer_order = $footer_order;

        return $this;
    }
}