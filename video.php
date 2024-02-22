<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Famous Box</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style_video.css">
    <link rel="icon" type="image/x-icon" href="img/famousbox.ico">
</head>

<body>
    <?php
    //Récupération des $_POST


    // J'enregistre chaque donnée de mon formulaire dans des variables !
    $number = $_POST['number'];
    $valider = $_POST['commencer'];

    //Connexion à la bdd
    $mysqli = new mysqli("sql304.infinityfree.com", "if0_35997356", "5bzRjTgmQm", "if0_35997356_dslrbooth");

    // Vérifier la connexion
    if (mysqli_connect_errno()) {
        echo "Impossible de se connecter à MySQL: " . mysqli_connect_error();
        exit();
    }

    //Requête SQL pour verifier si le nombre est correct
    $sql_select_number = "SELECT DISTINCT filename, date FROM photomaton WHERE answer = '" . $number . "';";
    $resultat = mysqli_query($mysqli, $sql_select_number);

    //Test de la requête
    $num_rows = mysqli_num_rows($resultat); //Nombre de ligne (normalement 1)

    //Redirection
    if (isset($_POST['commencer'])) {
        if ($num_rows !== 1) {
            header("Location: connexion.php");
        }
    }

    ?>
    <section>
        <article class="video-container">

            <!--Ne pas oublier de régler le paramètre du navigateur (autorisation)-->
            <!-- <video autoplay="true" preload="auto">

                <source src="video/idol_video.mp4" type=video/mp4>
                <p>Nous sommes désolé mais nous ne pouvons pas lire la vidéo. Veillez contacter le staff.</p>

            </video> -->

            <iframe id="yt" type="text/html" src="https://www.youtube-nocookie.com/embed/UaxzcbqbLA8?autoplay=1&showinfo=0&controls=0&modestbranding&rel=0&enablejsapi=1&playsinline=1" allowfullscreen frameborder="0"></iframe>

        </article>
    </section>
    <section>
    <script type="text/javascript">
        /*_____________________________PHOTOS_____________________________*/
        //Apparition des photos au bout de 5 secondes
        setTimeout('visible();', 76850); //76850

        function visible() {
            document.getElementById('photos').style.visibility = 'visible';
        }

        //Déplacement de la photo1
        setTimeout('movement();', 83000);

        function movement() {
            document.getElementById('photo1').style.animation = 'animate-photo1 linear 1s forwards, scale-photo1 1s forwards';
        }

        //Disparition de fin
        setTimeout('disparition();', 114000);

        function disparition() {
            document.getElementsByClassName('pop').style.visibility = "hidden";
        }
    </script>
    <?php
    // function openCsv()
    // {
    //     $chemin_dossier = "C:/xampp/htdocs/photomaton/data/IDOL/dslrBooth_Surveys.csv";
    //     $open = fopen($chemin_dossier, "r");

    //     $dataPushed = [];
    //     $test = true;

    //     // Connexion avec la BDD
    //     $mysqli = new mysqli("localhost", "root", "", "dslrbooth");

    //     // Vérifier la connexion
    //     if (mysqli_connect_errno()) {
    //         echo "Impossible de se connecter à MySQL: " . mysqli_connect_error();
    //         exit();
    //     }

    //     while (($data = fgetcsv($open)) !== FALSE) {
    //         if ($test) {
    //             $test = false;
    //             continue;
    //         }

    //         $virgule = explode(",", $data[0]);
    //         $num = count($data);
    //         $datetime = date_create_from_format("d/m/Y H:i:s", "$data[0]")->format("Y-m-d H:i:s"); //Date csv
    //         $nomfichier = $data[1];
    //         $question = $data[2];
    //         $reponse = $data[3];

    //         // Requete SQL pour ajouter chaque données dans la bdd
    //         $sql_bdd = "INSERT INTO `photomaton` (`id`, `date`, `filename`, `question`, `answer`) 
    //               VALUES (NULL, '$datetime', '$nomfichier', '$question', '$reponse');";

    //         // Execution de la requête
    //         $sql_result = mysqli_query($mysqli, $sql_bdd);
    //     }
    // }

    // if (isset($_POST['commencer'])) {
    //     openCsv();
    //}
    ?>
    <?php

    $valider = $_POST['commencer'];
    $number = $_POST["number"];

    if (isset($_POST['commencer'])) {

        //Connexion à la bdd
        //$mysqli = new mysqli("localhost", "root", "", "dslrbooth");
        $mysqli = new mysqli("sql304.infinityfree.com", "if0_35997356", "5bzRjTgmQm", "if0_35997356_dslrbooth");

        // Vérifier la connexion
        $chemin_dossier = 'C:/xampp/htdocs/photomaton/data/print';
        setlocale(LC_TIME, "fr_FR", "french"); //Heure française

        function lecture_img($chemin_dossier)
        {
            // @$number = $_POST["number"];
            // $id = scandir("$chemin_dossier"); //ouverture du fichier
            // $id = str_replace('"\"', "/", $id); //changer les antislashes pour windows

            // $dates = array();
            // $timestamp = array();
            // $picture_name = array();

            // // Connexion avec la BDD
            // $mysqli = new mysqli("localhost", "root", "", "dslrbooth");

            // // Vérifier la connexion
            // if (mysqli_connect_errno()) {
            //     echo "Impossible de se connecter à MySQL: " . mysqli_connect_error();
            //     exit();
            // }
            // $sql_date_query = "SELECT DISTINCT date FROM `photomaton` WHERE answer = '" . $number . "';";
            // $sql_date_result = mysqli_query($mysqli, $sql_date_query); //Requête SQL executée

            // $row = mysqli_fetch_array($sql_date_result, MYSQLI_NUM);
            // $sql_date_final = $row[0];
            // //Conversion timestamp
            // $date_bdd = strtotime("$sql_date_final"); //Date dans la bdd

            // foreach ($id as $key => $value) {
            //     if ($value != "." && $value != "..") { //retirer les fichiers système

            //         $date = date("Y-m-d H:i:s", filemtime($chemin_dossier . "/" . $value)); //Date du fichier image
            //         //Conversion des dates en timestamp unix
            //         $debut = strtotime("$date"); //Date du fichier image
            //         array_push($dates, $date); //Tableau qui stocke les dates


            //         array_push($picture_name, $value); //Tableau qui stocke le nom des images

            //         if ($debut < $date_bdd) { //Filtre
            //             array_push($timestamp, $debut); //tableau qui stocke toutes les dates inferieurs à celle du user
            //         }
            //     }
            // }

            // //Date à selectionner
            // // $max = max($timestamp); //Trouver la plus grande valeur du tableau
            // // $date_max = $max; //Prendre la plus grande valeur du tableau

            // // $position = array_search($date_max, $timestamp); //Déterminer la position de la date max dans le tableau
            // // // unset($timestamp[$position]); //retirer la plus grande valeur du tableau (pour voir si c'est la bonne selection)

            // // //Afficher la plus grande valeur du tableau
            // // $date_finale = max($timestamp);
            // // $date_finale = date("d/m/Y H:i:s", $date_finale);

            // //Image à selectionner

            // //Selection de l'image correspondant à la date
            // // print_r($picture_name);


            // // $picture_name_select = $picture_name[$position]; //Nom de l'image par la position dans son tableau

            // //Image apparition

            $id_picture = 'data/print/';
            //$id_picture = str_replace('"\"', "/", $id_picture); //changer les antislashes pour windows

            // $glob_picture = glob($id_picture, GLOB_BRACE); //Tableau qui contient le chemin des images
            // print($glob_picture[$position]); //Selection du chemin de la bonne image


            // $sql_file_query = "SELECT DISTINCT filename FROM `photomaton` WHERE answer = '" . $number . "';";
            // $sql_file_result = mysqli_query($mysqli, $sql_file_query); //Requête SQL executée

            // $row = mysqli_fetch_array($sql_file_result, MYSQLI_NUM);
            // $sql_file_final = $row[0];
            // $file_img = $sql_file_final;

            //echo '<img src="print/' . $file_img . '" alt="ta photo" id="photo1">';
            echo '<img src="data/print/20220603_075352_412.jpg" alt="ta photo" id="photo1">';
            //  print(substr($glob_picture[$position], 15));
        }
    }
    ?>
    <aside id="photos">
        <?php
        lecture_img($chemin_dossier);
        ?>
    </aside>
    </section>
    <section class="image">
        <script type="text/javascript">
            /*_____________________________POP-UPs_____________________________*/
            //Apparition des pop-up
            //pop-up 1
            setTimeout('pose1();', 85000);

            function pose1() {
                document.getElementsByClassName('pop')[0].style.visibility = "visible";
            }
            //pop-up 2
            setTimeout('pose2();', 87200);

            function pose2() {
                document.getElementsByClassName('pop')[1].style.visibility = "visible";
            }
            //pop-up 3
            setTimeout('pose3();', 89400);

            function pose3() {
                document.getElementsByClassName('pop')[2].style.visibility = "visible";
            }
            //pop-up 4
            setTimeout('pose4();', 90700);

            function pose4() {
                document.getElementsByClassName('pop')[3].style.visibility = "visible";
            }
            //pop-up 5
            setTimeout('pose5();', 91600);

            function pose5() {
                document.getElementsByClassName('pop')[4].style.visibility = "visible";
            }
            //pop-up 6
            setTimeout('pose6();', 92800);

            function pose6() {
                document.getElementsByClassName('pop')[5].style.visibility = "visible";
            }
            //pop-up 7
            setTimeout('pose7();', 93600);

            function pose7() {
                document.getElementsByClassName('pop')[6].style.visibility = "visible";
            }
            //pop-up 8
            setTimeout('pose8();', 95300);

            function pose8() {
                document.getElementsByClassName('pop')[7].style.visibility = "visible";
            }
            //pop-up 9
            setTimeout('pose9();', 96200);

            function pose9() {
                document.getElementsByClassName('pop')[8].style.visibility = "visible";
            }
            //pop-up 10
            setTimeout('pose10();', 97100);

            function pose10() {
                document.getElementsByClassName('pop')[9].style.visibility = "visible";
            }
            //pop-up 11
            setTimeout('pose11();', 98700);

            function pose11() {
                document.getElementsByClassName('pop')[10].style.visibility = "visible";
            }
            //pop-up 12
            setTimeout('pose12();', 99500);

            function pose12() {
                document.getElementsByClassName('pop')[11].style.visibility = "visible";
            }
            //pop-up 13
            setTimeout('pose13();', 100100);

            function pose13() {
                document.getElementsByClassName('pop')[12].style.visibility = "visible";
            }
            //pop-up 14
            setTimeout('pose14();', 101300);

            function pose14() {
                document.getElementsByClassName('pop')[13].style.visibility = "visible";
            }
            //pop-up 15
            setTimeout('pose15();', 102700);

            function pose15() {
                document.getElementsByClassName('pop')[14].style.visibility = "visible";
            }
            //pop-up 16
            setTimeout('pose16();', 103900);

            function pose16() {
                document.getElementsByClassName('pop')[15].style.visibility = "visible";
            }
            //pop-up 17
            setTimeout('pose17();', 105300);

            function pose17() {
                document.getElementsByClassName('pop')[16].style.visibility = "visible";
            }
            //pop-up 18
            setTimeout('pose18();', 106000);

            function pose18() {
                document.getElementsByClassName('pop')[17].style.visibility = "visible";
            }
            //pop-up 19
            setTimeout('pose19();', 107400);

            function pose19() {
                document.getElementsByClassName('pop')[18].style.visibility = "visible";
            }
            //pop-up 20
            setTimeout('pose20();', 108500);

            function pose20() {
                document.getElementsByClassName('pop')[19].style.visibility = "visible";
            }
            //pop-up 21
            setTimeout('pose21();', 109100);

            function pose21() {
                document.getElementsByClassName('pop')[20].style.visibility = "visible";
            }
            //pop-up 22
            setTimeout('pose22();', 109700);

            function pose22() {
                document.getElementsByClassName('pop')[21].style.visibility = "visible";
            }
            //pop-up 23
            setTimeout('pose23();', 110000);

            function pose23() {
                document.getElementsByClassName('pop')[22].style.visibility = "visible";
            }
            //pop-up 24
            setTimeout('pose24();', 111000);

            function pose24() {
                document.getElementsByClassName('pop')[23].style.visibility = "visible";
            }
            //pop-up 25
            setTimeout('pose25();', 114200);

            function pose25() {
                document.getElementsByClassName('pop')[24].style.visibility = "visible";
            }
        </script>
        <div class="pop pose1">
            <i class="photofille1"></i>
            <div>
                <h2>maferarch</h2>
                <p>Ohh ça change mais j’adore !!! 😍</p>
                <div>
                    <h3>Juin</h3>
                    <h4>63 J' aime</h4>
                    <h5>Répondre</h5>
                </div>
            </div>
            <i></i>
        </div>
        <div class="pop pose2">
            <i class="photofille2"></i>
            <div>
                <h2>alefit</h2>
                <p>Pas mal ta coupe de cheveux !</p>
                <div>
                    <h3>Juin</h3>
                    <h4>30 J'aime</h4>
                    <h5>Répondre</h5>
                </div>
            </div>
            <i></i>
        </div>
        <div class="pop pose3">
            <i class="photogars1"></i>
            <div>
                <h2>alainproviste</h2>
                <p>Incroyable 😍😍</p>
                <div>
                    <h3>Juin</h3>
                    <h4>2 J'aime</h4>
                    <h5>Répondre</h5>
                </div>
            </div>
            <i></i>
        </div>
        <div class="pop pose4">
            <i class="photogars2"></i>
            <div>
                <h2>remifasol</h2>
                <p>J’adore 🔥🔥🔥</p>
                <div>
                    <h3>Juin</h3>
                    <h4>6 J'aime</h4>
                    <h5>Répondre</h5>
                </div>
            </div>
            <i></i>
        </div>
        <div class="pop pose5">
            <i class="photogars3"></i>
            <div>
                <h2>henricochet</h2>
                <p>EUHR c’est bizarre quand même 😅</p>
                <div>
                    <h3>Juin</h3>
                    <h4>130 J'aime</h4>
                    <h5>Répondre</h5>
                </div>
            </div>
            <i></i>
        </div>
        <div class="pop pose6">
            <i class="photogars4"></i>
            <div>
                <h2>teddyficile</h2>
                <p>Ah l’arnaque 🤣</p>
                <div>
                    <h3>Juin</h3>
                    <h4>600 J'aime</h4>
                    <h5>Répondre</h5>
                </div>
            </div>
            <i></i>
        </div>
        <div class="pop pose7">
            <i class="photofille3"></i>
            <div>
                <h2>cecilencieux</h2>
                <p>Oula c’est vraiment la même personne&nbsp;???</p>
                <div>
                    <h3>Juin</h3>
                    <h4> 120 J'aime</h4>
                    <h5>Répondre</h5>
                </div>
            </div>
            <i></i>
        </div>
        <div class="pop pose8">
            <i class="photogars5"></i>
            <div>
                <h2>theocourant</h2>
                <p>Wtttffffff !!!</p>
                <div>
                    <h3>Juin</h3>
                    <h4>452 J'aime</h4>
                    <h5>Répondre</h5>
                </div>
            </div>
            <i></i>
        </div>
        <div class="pop pose9">
            <i class="photofille4"></i>
            <div>
                <h2>cecilhouette</h2>
                <p>Pas oufff jme désabonne...</p>
                <div>
                    <h3>Juin</h3>
                    <h4>854 J'aime</h4>
                    <h5>Répondre</h5>
                </div>
            </div>
            <i></i>
        </div>
        <div class="pop pose10">
            <i class="photofille5"></i>
            <div>
                <h2>sophistiqué</h2>
                <p>C’est quoi vos influenceurs en carton !!</p>
                <div>
                    <h3>Juin</h3>
                    <h4>156 J'aime</h4>
                    <h5>Répondre</h5>
                </div>
            </div>
            <i></i>
        </div>
        <div class="pop pose11">
            <i class="photofille6"></i>
            <div>
                <h2>laratatouille</h2>
                <p>Mais c’est quoi cette tête 🤣🤣</p>
                <div>
                    <h3>Juin</h3>
                    <h4>158 J'aime</h4>
                    <h5>Répondre</h5>
                </div>
            </div>
            <i></i>
        </div>
        <div class="pop pose12">
            <i class="photofille7"></i>
            <div>
                <h2>ellalapeche</h2>
                <p>Ratio.</p>
                <div>
                    <h3>Juin</h3>
                    <h4>10 000 J'aime</h4>
                    <h5>Répondre</h5>
                </div>
            </div>
            <i></i>
        </div>
        <div class="pop pose13">
            <i class="photofille8"></i>
            <div>
                <h2>saracroche</h2>
                <p>Ya vraiment des gens qui like ça ?</p>
                <div>
                    <h3>Juin</h3>
                    <h4>320 J'aime</h4>
                    <h5>Répondre</h5>
                </div>
            </div>
            <i></i>
        </div>
        <div class="pop pose14">
            <i class="photogars12"></i>
            <div>
                <h2>phiphilantrope</h2>
                <p>T’aurai pas du poster ça 🤣</p>
                <div>
                    <h3>Juin</h3>
                    <h4>556 J'aime</h4>
                    <h5>Répondre</h5>
                </div>
            </div>
            <i></i>
        </div>
        <div class="pop pose15">
            <i class="photofille9"></i>
            <div>
                <h2>albarbecue</h2>
                <p>OHHH que c'est moche !!</p>
                <div>
                    <h3>Juin</h3>
                    <h4>2000 J'aime</h4>
                    <h5>Répondre</h5>
                </div>
            </div>
            <i></i>
        </div>
        <div class="pop pose16">
            <i class="photogars6"></i>
            <div>
                <h2>quentintamarre</h2>
                <p>Tu ressemble à un poulpe 🐙</p>
                <div>
                    <h3>Juin</h3>
                    <h4>1006 J'aime</h4>
                    <h5>Répondre</h5>
                </div>
            </div>
            <i></i>
        </div>
        <div class="pop pose17">
            <i class="photogars7"></i>
            <div>
                <h2>sachapeaudepaille</h2>
                <p>Pour faire ça autant ne rien faire...</p>
                <div>
                    <h3>Juin</h3>
                    <h4>5000 J'aime</h4>
                    <h5>Répondre</h5>
                </div>
            </div>
            <i></i>
        </div>
        <div class="pop pose18">
            <i class="photogars8"></i>
            <div>
                <h2>jeanmichelvaillant</h2>
                <p>Arrête de vivre t'es qu’une merde</p>
                <div>
                    <h3>Juin</h3>
                    <h4>2608 J'aime</h4>
                    <h5>Répondre</h5>
                </div>
            </div>
            <i></i>
        </div>
        <div class="pop pose19">
            <i class="photogars9"></i>
            <div>
                <h2>martinmystere</h2>
                <p>Arrête les réseaux t'es descendu dans l’estime de tous 🤣🤣</p>
                <div>
                    <h3>Juin</h3>
                    <h4>5685 J'aime</h4>
                    <h5>Répondre</h5>
                </div>
            </div>
            <i></i>
        </div>
        <div class="pop pose20">
            <i class="photofille11"></i>
            <div>
                <h2>katlove</h2>
                <p>T’es nul</p>
                <div>
                    <h3>Juin</h3>
                    <h4>6300 J'aime</h4>
                    <h5>Répondre</h5>
                </div>
            </div>
            <i></i>
        </div>
        <div class="pop pose21">
            <i class="photogars10"></i>
            <div>
                <h2>abelauboisdormant</h2>
                <p>C’est affreux !!</p>
                <div>
                    <h3>Juin</h3>
                    <h4>1963 J'aime</h4>
                    <h5>Répondre</h5>
                </div>
            </div>
            <i></i>
        </div>
        <div class="pop pose22">
            <i class="photofille10"></i>
            <div>
                <h2>claire_voyance</h2>
                <p>Comment c'est possible de faire autant de la merde...</p>
                <div>
                    <h3>Juin</h3>
                    <h4>8753 J'aime</h4>
                    <h5>Répondre</h5>
                </div>
            </div>
            <i></i>
        </div>
        <div class="pop pose23">
            <i class="photogars11"></i>
            <div>
                <h2>henrigole</h2>
                <p>Un conseil cache ton visage 🤣</p>
                <div>
                    <h3>Juin</h3>
                    <h4>13 000J'aime</h4>
                    <h5>Répondre</h5>
                </div>
            </div>

            <i></i>
        </div>
        <div class="pop pose24">
            <i class="photogars13"></i>
            <div>
                <h2>rabibocher</h2>
                <p>Pfff encore un pseudo influenceur qui se prend pour une star</p>
                <div>
                    <h3>Juin</h3>
                    <h4>6698 J'aime</h4>
                    <h5>Répondre</h5>
                </div>
            </div>
            <i></i>
        </div>
        <div class="pop pose25">
            <i class="photofille12"></i>
            <div>
                <h2>aïe.jai.mal</h2>
                <p>T’aurais dû faire de la chirurgie 😘</p>
                <div>
                    <h3>Juin</h3>
                    <h4>14 962 J'aime</h4>
                    <h5>Répondre</h5>
                </div>
            </div>
            <i></i>
        </div>
    </section>
    <footer>
        <a href="index.html" title="Retour"><i></i>Retour à l'accueil</a>
    </footer>
</body>

</html>