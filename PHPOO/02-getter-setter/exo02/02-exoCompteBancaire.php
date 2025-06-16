<?php

/* 

EXERCICE : 
            Création d'une classe CompteBancaire selon la modélisation suivante 

    ----------------------
    |   CompteBancaire   |
    ----------------------
    | -titulaire:string  |
    | -solde:float       |
    ----------------------
    | +__construct()     |
    | +getTitulaire()    |
    | +setTitulaire()    |
    | +getSolde()        |
    | +setSolde()        |
    | +afficherSolde()   |
    | +retirer()         |
    | +deposer()         |
    ----------------------

*/

class CompteBancaire
{
    // Propriétés
    private $titulaire;
    private $solde;

    // Constructeur pour initialiser les valeurs
    public function __construct($titulaire, $soldeInitial)
    {
        $this->setTitulaire($titulaire);
        $this->setSolde($soldeInitial);
    }

    // Getter pour obtenir le titulaire
    public function getTitulaire()
    {
        return $this->titulaire;
    }

    // Setter pour modifier le titulaire
    public function setTitulaire(string $newTitulaire)
    {
        if (iconv_strlen($newTitulaire) > 0) {
            $this->titulaire = $newTitulaire;
        } else {
            trigger_error("Attention le titulaire ne peut pas être vide", E_USER_NOTICE);
        }
    }

    // Getter pour obtenir le solde
    public function getSolde()
    {
        return $this->solde;
    }

    // Setter pour modifier le solde
    public function setSolde(float $newSolde)
    {
        if (is_numeric($newSolde)) {
            $this->solde = $newSolde;
        }
    }

    // Méthode pour déposer de l'argent
    public function deposer($montant)
    {
        if ($montant > 0) {
            $this->setSolde($this->getSolde() + $montant);
            return "Vous avez déposé $montant" . "€ votre solde est maintenant à : " . $this->getSolde() . "€<br>";
        } else {
            trigger_error("Attention il faut que ce soit un montant numérique");
        }
    }

    // Méthode pour retirer de l'argent
    public function retirer($montant)
    {
        if ($montant > 0) {
            $this->setSolde($this->getSolde() - $montant);
            $extra = ($this->getSolde() < 0) ? "Attention vous êtes maintenant à découvert !<br>" : "";
            return "Vous avez retiré $montant" . "€ votre solde est maintenant à : " . $this->getSolde() . "€<br>$extra";
        } else {
            trigger_error("Attention il faut que ce soit un montant numérique");
        }
    }

    public function afficherSolde()
    {
        if ($this->getSolde() > 0) {
            return "Le solde est : " . $this->getSolde() . "€<br>";
        } else return "Attention, vous êtes à découvert ! <br> Le solde est : " . $this->getSolde() . "€<br>";
    }
}

$account = new CompteBancaire("Pierra", 500);
var_dump($account);
echo $account->afficherSolde();
echo $account->deposer(100);
echo $account->retirer(400);
echo $account->retirer(400);
echo $account->afficherSolde();
