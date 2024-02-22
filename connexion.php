<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="img/famousbox.ico">
    <title>Connexion | Famous Box</title>
</head>

<body>
    <section>
        <header>
            <h1><i></i>Famous Box</h1>
            <h2>Partie 2</h2>
        </header>
        <article>
            <div>
                <img src="img/ticket.jpg" alt="Image du ticket">
            </div>
            <div>
                <form action="video.php" method="POST">
                    <input type="number" placeholder="Quel est votre numéro ?" pattern="[0-9]{4}" name="number" required>
                    <p>N'oubliez pas de compter les zéros 😉</p>
                    <input type="submit" value="Commencer" name="commencer">
                </form>
                <p>Si vous avez perdu votre ticket, contactez le staff.</p>
            </div>
        </article>
    </section>
    <footer>
        <a href="index.html" title="Retour"><i></i>Retour à l'accueil</a>
    </footer>
</body>

</html>