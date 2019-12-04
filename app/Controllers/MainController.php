<?php 

namespace oShop\Controllers;

class MainController extends Controller
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
}