<?php

/*

   On récupère l'exo Inscription du chapitre POST PHP Procédural, pour y ajouter la BDD

   On a créé une table user dans la base dialogue  avec les champs id_user, pseudo, email, password

*/

session_start();
// session_destroy();



// ON RAJOUTE LA CREATION DE L'OBJET PDO pour avoir accès à la BDD
$host = "mysql:host=localhost;dbname=dialogue";
$login = "root";
$password = ""; // ici "root" pour mamp
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
);

// Création de l'objet PDO
try {
    $pdo = new PDO($host, $login, $password, $options);
    // var_dump($pdo);
} catch (Exception $e) {
    echo "Erreur de BDD";
    exit;
}


var_dump($_POST);

$errors = [];
$success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["pseudo"], $_POST["email"], $_POST["password"], $_POST['password_confirm'])) {
    $pseudo = trim($_POST['pseudo']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $passwordConfirm = trim($_POST['password_confirm']);

    // Contrôles de validation
    if (empty($pseudo)) {
        $errors["pseudo"] = "Le pseudo est requis.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "L'email n'est pas valide.";
    }

    if (iconv_strlen($password) < 6) {
        $errors["password"] = "Le mot de passe doit faire au moins 6 caractères.";
    }

    if ($password !== $passwordConfirm) {
        $errors["passwordConfirm"] = "Les mots de passe ne correspondent pas.";
    }


    // On rajoute ici le contrôle du doublon du pseudo
    // On vérifie si on a un utilisateur qui possède déjà ce pseudo
    $stmt = $pdo->prepare("SELECT * FROM user WHERE pseudo = :pseudo");
    $stmt->bindParam(":pseudo", $pseudo, PDO::PARAM_STR);
    $stmt->execute();

    // Si le rowCount ne me sort pas 0 résultat, alors c'est à dire que le pseudo est déjà pris ! 
    if ($stmt->rowCount() != 0) {
        $errors["pseudo"] = "Le pseudo est déjà pris.";
    }

    // Si pas d'erreurs, on enregistre l'utilisateur
    if (empty($errors)) {
        // On hash le password
        $hashedPassword = password_hash($password, PASSWORD_ARGON2ID);

        // On prépare la requête d'insert
        $stmt = $pdo->prepare("INSERT INTO user (pseudo, email, password) VALUES (:pseudo, :email, '$hashedPassword')");
        $stmt->bindParam(":pseudo", $pseudo, PDO::PARAM_STR);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        // J'execute
        $stmt->execute();

        $success = "Inscription réussie ! Vous pouvez maintenant vous connecter.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <h1>Inscription</h1>

                <!-- <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li><?= $error ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?> -->

                <?php if ($success): ?>
                    <div class="alert alert-success">
                        <?= $success ?>
                    </div>
                <?php endif; ?>

                <form action="" method="post">
                    <div class="mb-3">
                        <label for="pseudo" class="form-label">Pseudo</label>
                        <?php
                        if (isset($errors["pseudo"])) {
                            echo "<div class='alert alert-danger'>" . $errors["pseudo"] . "</div>";
                        }
                        ?>
                        <input type="text" class="form-control" id="pseudo" name="pseudo">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <?php
                        if (isset($errors["email"])) {
                            echo "<div class='alert alert-danger'>" . $errors["email"] . "</div>";
                        }
                        ?>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <?php
                        if (isset($errors["password"])) {
                            echo "<div class='alert alert-danger'>" . $errors["password"] . "</div>";
                        }
                        ?>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="password_confirm" class="form-label">Confirmer le mot de passe</label>
                        <?php
                        if (isset($errors["passwordConfirm"])) {
                            echo "<div class='alert alert-danger'>" . $errors["passwordConfirm"] . "</div>";
                        }
                        ?>
                        <input type="password" class="form-control" id="password_confirm" name="password_confirm">
                    </div>
                    <button type="submit" class="btn btn-primary">S'inscrire</button>
                </form>
            </div>
        </div>
       
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>