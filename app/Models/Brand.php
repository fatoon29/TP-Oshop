<?php 


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