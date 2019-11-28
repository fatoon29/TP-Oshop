<?php 

class MainController 
{
    /**
     * Pour la page d'accueilx
     */
    public function home()
    {
        $this->show('home');
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