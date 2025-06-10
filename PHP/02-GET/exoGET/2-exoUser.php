<?php

session_start();

// Si la session est vide je redirige
if (empty($_SESSION['users'])) {
    header("location:2-exoGestionUsers.php");
    exit;
}

// Récupération de l'utilisateur en fonction de l'ID
// Si on avait ici une base de données en place, nous n'aurions pas besoin de cette boucle sur $_SESSION
// On ferait simplement un SELECT * FROM user WHERE id_user = $id;
// A partir de là on aurait un $user qui correspond à celui demandé

// $user va me servir à stocker l'user sélectionné (celui qui a été cliqué à la page précédente)
$user = "";
if (isset($_GET['id'])) {
    $id = $_GET["id"];
    foreach ($_SESSION['users'] as $utilisateur) {
        if ($utilisateur['id'] == $id) {
            // ici $utilisateur c'est la valeur récupérée dans le tour de boucle
            // si l'id de $utilisateur correspond à $id récupéré du $_GET, c'est à dire que l'utilisateur existe dans le array !
            // Auquel cas, je rempli $user (qui nous sert à stocker l'user cliqué) avec les informations de $utilisateur (celui trouvé dans le array)
            $user = $utilisateur;
            break;
        }
    }
}

// Récupération de l'action (voir, modifier, supprimer)
$action = $_GET['action'] ?? 'voir';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Utilisateurs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">

        <?php if ($user) : ?>
            <?php if ($action === 'voir') : ?>
                <!-- Action "Voir" les informations de l'utilisateur -->
                <h2>Informations de l'utilisateur</h2>
                <ul class="list-group mb-3">
                    <li class="list-group-item"><strong>ID : </strong> <?php echo $user['id']; ?></li>
                    <li class="list-group-item"><strong>Nom : </strong> <?php echo $user['nom']; ?></li>
                    <li class="list-group-item"><strong>Email : </strong> <?php echo $user['email']; ?></li>
                </ul>
                <a href="2-exoUser.php?action=modifier&id=<?php echo $user['id']; ?>" class="btn btn-warning">Modifier</a>
                <a href="2-exoUser.php?action=supprimer&id=<?php echo $user['id']; ?>" class="btn btn-danger">Supprimer</a>

            <?php elseif ($action === 'modifier') : ?>
                <!-- Action "Modifier" l'utilisateur (formulaire prérempli) -->
                <h2>Modifier l'utilisateur</h2>
                <form action="2-exoUser.php?action=modifier&id=<?php echo $user['id']; ?>" method="POST">
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $user['nom']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                </form>

            <?php elseif ($action === 'supprimer') : ?>
                <!-- Action "Supprimer" l'utilisateur (confirmation) -->
                <h2>Supprimer l'utilisateur</h2>
                <p>Êtes-vous sûr de vouloir supprimer l'utilisateur <strong><?php echo $user['nom']; ?></strong> (ID : <?php echo $user['id']; ?>) ?</p>
                <a href="2-exoUser.php?action=confirm_suppression&id=<?php echo $user['id']; ?>" class="btn btn-danger">Confirmer la suppression</a>
                <a href="exoUser.php" class="btn btn-secondary">Annuler</a>

            <?php else : ?>
                <div class="alert alert-warning">Action non reconnue.</div>
            <?php endif; ?>

        <?php else : ?>
            <div class="alert alert-danger">Utilisateur introuvable.</div>
        <?php endif; ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>