<?php 

class MainController 
{
    /**
     * Pour la page d'accueil
     */
    public function home()
    {
        $this->show('home');
    }

    /**
     * Mentions légales
     */
    public function legalMentions()
    {
        $this->show('legal_mentions');
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