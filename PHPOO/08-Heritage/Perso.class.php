<?php

class Perso
{
    protected function deplacement()
    {
        return "je me déplace vite";
    }

    protected function sauter()
    {
        return "et je saute haut !";
    }
}

// extends est un mot clé qui me permet de déclencher un héritage
// Dans ce cas précis, Mario hérite de Perso
// Ce qui veut dire, Mario prends pour modèle la classe Perso et récupère l'intégralité de ses propriétés et méthodes si elles sont de visibilité public ou protected
// ATTENTION on ne récupère pas les éléments private 
class Mario extends Perso 
{

    public function quiSuisJe() 
    {
        return "Coucou c'est moi mario et " . $this->deplacement() . " " . $this->sauter();
    }
}

// Ici j'instancie comme d'habitude un objet d'une classe, ici Mario (il possède les éléments de Perso)
$mario1 = new Mario;

// echo $mario1->deplacement();
// echo $mario1->sauter();

echo $mario1->quiSuisJe();