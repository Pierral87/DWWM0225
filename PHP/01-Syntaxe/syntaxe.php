<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrainement - Syntaxe PHP</title>
    <style>
        h2 {
            background-color: steelblue;
            color: white;
            padding: 20px;
        }

        .container {
            width: 1000px;
            border: 1px solid;
            margin: 0 auto;
            padding: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Syntaxe PHP</h2>

        <!-- 
            Il est possible d'écrire de l'html dans un fichier.php
            En revanche, l'inverse n'est pas possible ! (un fichier .html ne transitera pas par l'interpréteur PHP)        
        -->

        <?php
        // Ouverture de la balise PHP 

        // Commentaire sur une ligne
        # Commentaire sur une ligne
        /* 
        Commentaire
        Entre les deux
        indicateurs
    */

        // La documentation officielle : 
        //  https://www.php.net/

        // Les bonnes pratiques de développement 
        //  https://phptherightway.com/


        echo "<h2>01 - Instructions d'affichage</h2>";
        // echo est une instruction du langage permettant de générer un affichage

        // ATTENTION, chaque instruction en PHP doit se terminer par un ";"

        echo "Bonjour";
        echo " à tous";
        echo "<br>";

        print "Nous sommes lundi<br>"; // Autre instruction permettant de générer un affichage
        // Dans le cadre du cours nous utiliserons toujours echo 

        echo "<h2>02 - Variables : déclaration / affectation / type</h2>";

        // Une variable est un espace nommé permettant de conserver une valeur 
        // Une variable se déclare en php avec le signe $ 
        // Caractères autorisés : a-z A-Z 0-9 _ 
        // ATTENTION PHP est sensible à la casse, c'est à dire une majuscule est différente d'une minuscule  $var  $Var sont des variables différentes 
        // Une variable ne peut pas commencer par un chiffre

        // On utilise généralement la convention camelCase pour nommer les variables 
        $uneVariableTropBien;

        // Il existe d'autres conventions de nommage 
        // le snake_case : un tiret-bas/underscore entre chaque mot
        // le PascalCase : Majuscule à chaque mot
        // le kebab-case : tiret entre chaque mot

        // gettype() est une fonction de prédéfinie (déjà inscrite au langage) permettant de nous renvoyer une chaine de caractère représentant le type d'une variable

        $a = 123; // Déclaration de la variable nommée 'a' et affectation de la valeur numérique 123
        echo $a;
        echo gettype($a); // Integer = un entier
        echo "<br>";

        $a = 1.5; // On change la valeur contenue dans la variable $a, la précédente valeur est écrasée 
        echo $a;
        echo gettype($a); // un double ou float = chiffre décimal 
        echo "<br>";

        $a = "Une chaine";
        echo $a;
        echo gettype($a); // string = une chaine de caractères 
        echo "<br>";

        $a = true;
        echo $a; // Nous renvoie 1 car true = 1 = existe, les booléens ne sont pas sensibles à la casse
        echo gettype($a); // boolean // vrai ou faux // 1 ou 0 
        echo "<br>";

        // Il reste deux autres types que l'on verra sur des chapitres spécifiques : les tableaux array et les objets 

        echo "<h2>03 - Concaténation</h3>";
        // La concaténation consiste à assembler des chaines de caractères les unes avec les autres 
        // Caractère de concaténation : le point . 
        // Il est aussi possible de concaténer avec la virgule ,  

        // Le caractère de concaténation peut toujours se traduire par "suivi de"

        $x = "Bonjour";
        $y = "tout le monde";

        // Sans concaténation 
        echo $x;
        echo " ";
        echo $y;
        echo "<br>";

        // Avec concaténation
        echo $x . " " . $y . "<br>";

        // Concaténation avec la virgule (ne fonctionne pas avec print)
        echo $x, " ", $y, "<br>";

        // Concaténation en même temps qu'une affectation (pour rajouter une valeur à une variable déjà existante)
        $prenom = "Pierre";
        $prenom = "Alexandre"; // Ici on écrase la valeur Pierre par Alexandre... 
        echo $prenom . "<br>";

        // Pour rajouter sans écraser 
        $prenom = "Pierre";
        $prenom = $prenom . "-Alexandre";
        echo $prenom . "<br>";

        // Raccourci d'écriture 
        $prenom = "Pierre";
        $prenom .= "-Alexandre"; // avec le .= on rajoute sans écraser 
        echo $prenom . "<br>";

        echo "<h2>04 - Guillemets de apostrophes</h2>";

        $x = "Bonjour";
        $y = "tout le monde";

        // Dans des guillemets, une variable est reconnue et donc, est interprétée !
        // Dans les apostrophes, une variable ne sera pas reconnue et traitée comme du simple texte

        echo "$x $y <br>";
        echo '$x $y <br>';

        echo "<h2>05 - Constantes</h2>";
        // Une constante comme une variable permet de conserver une valeur
        // Cependant, comme son nom l'indique, cette valeur restera... constante ! 
        // Par convention d'écriture, une constant s'écrit tout en majuscule 

        // déclaration d'une variable globale 
        define("URL", "http://localhost/DWWM0225/PHP/");
        echo URL . "<br>";

        // define("URL", "autre chose"); // ERREUR, la constante URL existe déjà 
        // Impossible de redéfinir une constante 

        // Constantes magiques 
        // Déjà inscrites au langage 

        echo __FILE__ . '<br>'; // le chemin absolu depuis le serveur vers ce fichier 
        echo __LINE__ . '<br>'; // le numéro de ligne
        echo __DIR__ . '<br>'; // le chemin vers le dossier contenant ce fichier 

        echo "<h2>Exercice variables</h2>";

        // Créer 3 variables et leur assigner respectivement les valeurs suivantes : bleu, blanc et rouge 
        // Une variable par couleur 
        // Ensuite il faut générer un affichage avec un seul echo pour obtenir : 
        // bleu - blanc - rouge 
        // Plusieurs façons sont possibles, le but étant de trouver la plus courte :) 

        $bleu = "bleu";
        $blanc = "blanc";
        $rouge = "rouge";

        // $drapeau = "";
        // $drapeau .= $bleu . " - ";

        echo $bleu . " - " . $blanc . " - " . $rouge . "<br>";
        echo "$bleu - $blanc - $rouge <br>";
        echo "le type de la variable \$bleu est : " . gettype($bleu);

        echo "<h2>Opérateurs arithmétiques</h2>";

        $a = 10;
        $b = 5;

        // Addition :
        echo $a + $b . "<br>"; // Affiche 15
        // Soustraction : 
        echo $a - $b . "<br>"; // Affiche 5
        // Multiplication : 
        echo $a * $b . "<br>"; // Affiche 50
        // Division : 
        echo $a / $b . "<br>"; // Affiche 2
        // Puissance : 
        echo $a ** $b . "<br>"; // Affiche 100 000
        // Modulo : 
        echo $a % $b . "<br>"; // Affiche 0
        // Modulo : 
        echo $a % 6 . "<br>"; // Affiche 4

        // Opération / affection
        $a += $b; // équivaut à écrire $a = $a + $b;
        $a -= $b; // équivaut à écrire $a = $a - $b;
        $a *= $b; // équivaut à écrire $a = $a * $b;
        $a /= $b; // équivaut à écrire $a = $a / $b;
        $a **= $b; // équivaut à écrire $a = $a ** $b;
        $a %= $b; // équivaut à écrire $a = $a % $b;

        echo "<h2>06 - Conditions & opérateurs de comparaison </h2>";

        // if / elseif / else 
        $x = 10;
        $y = 5;
        $z = 2;

        if ($x > $y) { // si la valeur de x est strictement supérieure à la valeur de y
            echo "Vrai, la valeur de x est bien strictement supérieure à la valeur de y<br>";
        } else {
            echo "Faux<br>";
        }

        // Plusieurs conditions obligatoires : AND => && 
        if ($x > $y && $y < $z) {
            echo "OK pour les deux conditions<br>";
        } else {
            echo "L'une ou l'autre des conditions ou les deux sont fausses<br>";
        }

        // L'une ou l'autre d'un ensemble de conditions : OR => ||
        if ($x > $y || $y < $z) {
            echo "OK pour au moins une des deux conditions<br>";
        } else {
            echo "Toutes les conditions sont fausses<br>";
        }

        // Seulement l'une ou l'autre des conditions (ou exclusif), si les deux sont bonnes la condition n'est pas remplis, si les deux sont fausses, non plus ! Il en faut une seule de bonne
        if ($x > $y xor $y > $z) {
            echo "Ok pour une seule et unique condition<br>";
        } else {
            echo "Toutes les conditions sont fausses ou sont vraies<br>";
        }

        // if / elseif / else 
        $x = 10;
        $y = 5;
        $z = 2;

        if ($x == 8) { // si x est égal à 8
            echo "Réponse A<br>";
        } elseif ($x != 10) { // si x est différent de 10
            echo "Réponse B<br>";
        } elseif ($y == $z) { // si y est égal à z
            echo "Réponse C<br>";
        } else { // sinon
            echo "Réponse D<br>";
        }
        // C'est la réponse D, aucune des conditions n'est rencontrée

        // Testons avec $x = 8
        $x = 8;
        $y = 5;
        $z = 2;

        if ($x == 8) { // si x est égal à 8
            echo "Réponse A<br>";
        } elseif ($x != 10) { // si x est différent de 10
            echo "Réponse B<br>";
        } elseif ($y == $z) { // si y est égal à z
            echo "Réponse C<br>";
        } else { // sinon
            echo "Réponse D<br>";
        }

        // C'est la réponse A, ici on peut considérer le if et ses elseif et le else comme étant un seul et même bloc
        // Dès la première condition rencontrée et valide, on sort du bloc entier ! 
        // Même si la condition de la réponse B est bonne, on sort dès la réponse A ! 

        // Comparaison stricte 
        $a1 = 1;
        echo gettype($a1);
        echo "<br>";
        $a2 = '1';
        echo gettype($a2);
        echo "<br>";


        // Comparaison des valeurs uniquement
        if ($a1 == $a2) {
            echo "OK, les deux var ont la même valeur<br>";
        } else {
            echo "Non, ces deux variables ont des valeurs différentes<br>";
        }

        // Comparaison des valeurs et des types
        if ($a1 === $a2) {
            echo "OK, les deux var ont la même valeur et le même type<br>";
        } else {
            echo "Non, ces deux variables ont des valeurs et/ou des types différents<br>";
        }

        /*
            Opérateurs de comparaison
            ------------------------------
            =       affectation (ce n'est pas un opérateur de comparaison, c'est une affectation)
            ==      est égal à
            !=      est différent de
            ===     est strictement égal à (valeur et type)
            !==     est strictement différent de (valeur et/ou type différent)
            >       strictement supérieur à
            >=      supérieur ou égal à
            <       strictement inférieur à
            <=      inférieur ou égal
        */

        // Autres possibilités de syntaxe pour les if 
        if ($a1 === $a2) {
            echo "OK, les deux var ont la même valeur et le même type<br>";
        } // Si je n'ai pas besoin de gérer de else, je peux l'omettre

        // Je peux ne pas mettre les accolades ! Par contre je suis limité à une seule instruction dans le if et une seule dans le else
        if ($a1 === $a2) echo "OK<br>";
        else echo "Non<br>";

        // Syntaxe ci dessous n'utilise pas d'accolades mais utilise ":" et le "endif"
        // On s'en sert lorsque l'on a besoin d'écrire de gros blocs HTML à l'intérieur de nos conditions PHP
        // Cela nous évite d'écrire tout dans un echo, on peut ainsi garder la colorisation de notre éditeur de code
        if ($a1 === $a2) : ?>
            OK, les deux var ont la même valeur et le même type<br>
            <h3>je suis dans le if</h3>
            <ul>
                <li>Un</li>
                <li>Deux</li>
                <li>Trois</li>
            </ul>
        <?php else : ?>
            Non, ces deux variables ont des valeurs et/ou des types différents<br>
            <h3>je suis dans le else</h3>
            <ul>
                <li>Quatre</li>
                <li>Cinq</li>
                <li>Six</li>
            </ul>
        <?php endif;

        // Ecriture ternaire
        echo ($a1 === $a2) ? "OK, les deux var ont la même valeur et le même type<br>" : "Non, ces deux variables ont des valeurs et/ou des types différents<br>";

        echo ($a1 === $a2) ? "OK <br>" : "Non <br>";
        // Le but d'un if ternaire est de réalisé un if très très court, lorsque l'action du if et du else sont les mêmes (ici un echo dans les deux cas)
        // On commence par l'action (echo pour nous), suivi de la condition entre parenthèses, puis du "?" qui indique que nous débutons un if, puis suivi du code si la condition est rencontrée, et après les ":" si on tombe dans le else 

        // Couplés aux if, on utilise deux fonctions très importantes en PHP
        // isset() et empty()


        // isset() me permet de vérifier si un élément existe (souvent une variable, basée sur un retour utilisateur, un formulaire par exemple)
        // empty() me permet de vérifier si un élément est vide ou pas (vérifier si une saisie a bien été réalisée)

        // Valeurs supposées reçues d'un formulaire, un pseudo et un password
        $pseudo = "Bob";
        $password = "soleil";

        // Je rentre dans ce if, uniquement si ces deux valeurs existent bel et bien !
        // isset me renvoie "true" si la variable existe
        if (isset($pseudo) && isset($password)) {
            echo "J'ai bien reçu un pseudo et un password du formulaire<br>";

            if (empty($pseudo) || empty($password)) {
                echo "Attention vous devez bien saisir le pseudo et le password<br>";
            }
        }

        // supposons la var suivante récupérée d'un formulaire
        // $pseudoForm = "Pierra";
        $pseudo = $pseudoForm ?? "Pas de pseudo";
        // La ligne ci dessus correspond au code ci dessous, mais raccourci !
        // C'est un raccourci d'un isset
        if (isset($pseudoForm)) {
            $pseudo = $pseudoForm;
        } else {
            $pseudo = "Pas de pseudo";
        }

        echo "<h2>Conditions switch</h2>";
        // switch est un autre outil permettant de mettre en place des conditions
        // On l'utilise dans un seul et unique scénario, celui de tester des valeurs différentes d'un seul élément

        // On teste un ensemble de cas 

        $couleur = "bleu";

        switch ($couleur) {
            case "bleu":
                echo "Vous aimez le bleu<br>";
                break;
            case "rouge":
                echo "Vous aimez le rouge<br>";
                break;
            case "vert":
                echo "Vous aimez le vert<br>";
            default: // équivalent au else 
                echo "Vous n'aimez ni le bleu, ni le rouge, ni le vert<br>";
                break;
        }

        // EXERCICE : Refaire cette condition switch, mais en if / elseif / else 



        echo '<h2>08 - Fonctions prédéfinies</h2>';



        echo '<h2>09 - Fonctions utilisateur</h2>';

        // déclarées et exécutées par nous ! Le développeur

        // Déclaration de la fonction
        function separateur()
        {
            echo "<hr><hr><hr>";
        }

        // Execution : 
        separateur();

        // Fonction avec un paramètres (params/arg/argument)
        // Fonction me permettant de dire bonjour à l'utilisateur
        function direBonjour($qui)
        {
            return "Bonjour $qui, bienvenue sur notre site<hr>";
        }

        echo direBonjour("Pierra");
        echo direBonjour("Wassim");

        // Fonction permettant de calculer un prix HT en TTC
        function appliqueTVA($prix) 
        {
            return "Le montant TTC pour le prix HT : $prix €, est de : " . ($prix * 1.2) . "€<hr>";
        }

        echo appliqueTVA(100);
        echo appliqueTVA(500);

        // fonction pour afficher la météo 
        function meteo($saison, $temperature)
        {
            $debut = "Nous sommes en " . $saison;
            $suite = " et il fait " . $temperature . " degré(s)<hr>";

            return $debut . $suite;
        }

        separateur();


        echo meteo ("printemps", 20);
        echo meteo ("été", 35);
        echo meteo ("automne", 10);
        echo meteo ("hiver", 1);


        // EXERCICES : 

            // Refaire une fonction de calcul de TVA, MAIS en permettant à l'utilisateur de saisir le taux de taxe à appliquer
            // par exemple un appel comme ceci : echo appliqueTVA(100, 30); si je souhaite appliquer une tva de 30% sur le prix 100
            // Une fois, cette fonction réalisée, l'améliorer en rendant la saisie du taux facultatif ! C'est à dire, si l'utilisateur ne saisi pas de second paramètre, alors ce sera un taux à 20% qui s'applique par défaut

            // Amélioration de la fonction météo 
                // On veut corriger le "en" printemps, en "au" printemps
                // Et on veut aussi gérer les degrés au pluriel lorsque c'est nécessaire, sinon, au singulier 









        // Fermeture de la balise PHP 
        ?>

    </div>

</body>

</html>