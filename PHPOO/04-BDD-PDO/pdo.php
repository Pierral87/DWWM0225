<?php

// ------------------------------------------------------------------------------
// ------------------------------------------------------------------------------
// ---------- PDO : PHP DATA OBJECT ---------------------------------------------
// ------------------------------------------------------------------------------
// ------------------------------------------------------------------------------

// PDO est une classe prédéfinie de PHP, elle représente une connexion à un serveur de BDD
// On va la manipuler avec MySQL mais on peut la manipuler avec d'autres SGBD 

// En quelques sortes, on peut considérer que PDO est une "porte" vers notre BDD 

echo "<h2>01 - Connexion à la BDD</h2>";

// Pour créer une connexion à la BDD nous avons besoin des informations suivantes : 
// - Host et nom de BDD
// - Login de connexion à la BDD (par défaut root)
// - Password de connexion pour ce login (sur mamp par défaut root)
// - Eventuellement des options (sous forme d'array)

$host = "mysql:host=localhost;dbname=entreprise";
$login = "root";
$password = ""; // ici "root" pour mamp
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
);

$pdo = new PDO($host, $login, $password, $options);

var_dump($pdo);
    // object(PDO)[1] // Si je vois l'objet PDO, alors ça y est, je suis bien connecté à ma BDD
