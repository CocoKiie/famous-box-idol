<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv="refresh" content="20"> -->
    <title>Files scan</title>
</head>

<body>
    <h2>Lecture du dossier image</h2>
    <?php

    $chemin_dossier = 'C:/xampp/htdocs/photomaton/data/IDOL/Originals';
    setlocale(LC_TIME, "fr_FR", "french"); //Heure française

    function lecture_img($chemin_dossier)
    {
        $id = scandir("$chemin_dossier"); //ouverture du fichier
        $id = str_replace('"\"', "/", $id); //changer les antislashes pour windows

        $dates = array();
        $timestamp = array();
        $picture_name = array();

        foreach ($id as $key => $value) {
            if ($value != "." && $value != "..") { //retirer les fichiers système
                $date = date("Y-m-d H:i:s", filemtime($chemin_dossier . "/" . $value));

                array_push($dates, $date); //Tableau qui stocke les dates
                array_push($picture_name, $value); //Tableau qui stocke le nom des images

                //Conversion des dates en timestamp unix
                $sql_date = strtotime("2022-05-31 15:10:25");
                $debut = strtotime("$date");

                if ($debut < $sql_date) { //Filtre
                    array_push($timestamp, $debut); //tableau qui stocke toutes les dates inferieurs à celle du user
                }

                echo "$value a été modifié pour la dernière fois le : " . $date . "<br>";
            }
        }

        echo "<h3>Date à selectionner</h3>";

        print_r($timestamp);
        echo "<br>";

        $max = max($timestamp); //Trouver la plus grande valeur du tableau
        $date_max = $max; //Prendre la plus grande valeur du tableau

        $position = array_search($date_max, $timestamp); //Déterminer la position de la date max dans le tableau
        unset($timestamp[$position]); //retirer la plus grande valeur du tableau (pour voir si c'est la bonne selection)

        print_r($timestamp);
        echo "<br>";
        echo "<br>";


        //Afficher la plus grande valeur du tableau
        $date_finale = max($timestamp);
        echo date("d/m/Y H:i:s", $date_finale);

        echo "<h3>Image à selectionner</h3>";

        //Selection de l'image correspondant à la date
        print_r($picture_name);
        echo "<br>";
        echo "<br>";

        $picture_name_select = print($picture_name[$position]); //Nom de l'image par la position dans son tableau

        echo "<h4>Image apparition</h4>";

        $id_picture = 'C:/xampp/htdocs/photomaton/data/IDOL/Originals/*.{jpg}';
        $id_picture = str_replace('"\"', "/", $id_picture); //changer les antislashes pour windows

        $glob_picture = glob($id_picture, GLOB_BRACE); //Tableau qui contient le chemin des images
        print($glob_picture[$position]); //Selection du chemin de la bonne image
        echo "<br>";
        echo "<br>";

        echo '<img src="..' . substr($glob_picture[$position], 15) . '" alt="ta photo" id="photo1" width="500">';
        print(substr($glob_picture[$position], 15));
    }

    lecture_img($chemin_dossier);

    echo "<h2>Lecture du fichier CSV</h2>";

    function openCsv()
    {
        $chemin_dossier = "C:/xampp/htdocs/photomaton/data/dslrBooth_Surveys.csv";
        $open = fopen($chemin_dossier, "r");

        $dataPushed = [];
        $test = true;

        // Connexion avec la BDD
        //$mysqli = new mysqli("localhost", "root", "", "dslrbooth");
        $mysqli = new mysqli("sql304.infinityfree.com", "if0_35997356", "5bzRjTgmQm", "if0_35997356_dslrbooth");

        // Vérifier la connexion
        if (mysqli_connect_errno()) {
            echo "Impossible de se connecter à MySQL: " . mysqli_connect_error();
            exit();
        }

        while (($data = fgetcsv($open)) !== FALSE) {
            if ($test) {
                $test = false;
                continue;
            }

            $virgule = explode(",", $data[0]);
            $num = count($data);
            echo $datetime = date_create_from_format("d/m/Y H:i:s", "$data[0]")->format("Y-m-d H:i:s"), '<br>';
            echo $nomfichier = $data[1], '<br>';
            echo $question = $data[2], '<br>';
            echo $reponse = $data[3], '<br>';

            // Requete SQL pour ajouter chaque données dans la bdd
            $sql_bdd = "INSERT INTO `photomaton` (`id`, `date`, `filename`, `question`, `answer`) 
                  VALUES (NULL, '$datetime', '$nomfichier', '$question', '$reponse');";

            // Execution de la requête
            $sql_result = mysqli_query($mysqli, $sql_bdd);
        }
    }

    openCsv();
    ?>
</body>

</html>