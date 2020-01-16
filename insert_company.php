<?php

    // Appel à la BDD
    require_once('inc/init.inc.php');

    // simulate slow server en terme de secondes
    // sleep(2);

    // Check de la requête AJAX côté serveur
    function is_ajax_request() 
    {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
          $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
    }
    // Si pas de requête AJAX, alors nous quittons le script
    if(is_ajax_request()) 
    { 
        if($_POST)
        {
            // print_r($_POST);
            
            $msg = [];
            
            // Nous contrôlons la validité des datas
            if(empty($_POST["firstname"]))
            {
                $msg[] = "firstname";
            }
            if(empty($_POST["lastname"]))
            {
                $msg[] = "lastname";
            }
            
            if(!is_numeric($_POST["salary"]))
            {
                $msg[] = "salary";
            }
            
            // Si message n'est pas vide, alors on retourne les erreurs sous format JSON
            if(!empty($msg))
            {
                // Attention AJAX est sensible au quote !!! Pas de single quote : exemple suivant ne marchera pas
                // echo "{ 'error': " . json_encode($msg) . "}";
                $errorsArray = array('errors' => $msg);
                print json_encode($errorsArray);
                exit;
            } else {
                $pdoST_insertEmployee = $pdo->prepare("INSERT INTO employee (firstname, lastname, gender, department, recruitment_date, salary) VALUES (:firstname, :lastname, :gender, :department, :recruitment_date, :salary)");
                
                $pdoST_insertEmployee->bindValue(":firstname", $_POST['firstname'], PDO::PARAM_STR);
                $pdoST_insertEmployee->bindValue(":lastname", $_POST['lastname'], PDO::PARAM_STR);
                $pdoST_insertEmployee->bindValue(":gender", $_POST['gender'], PDO::PARAM_STR);
                $pdoST_insertEmployee->bindValue(":department", $_POST['department'], PDO::PARAM_STR);
                $pdoST_insertEmployee->bindValue(":recruitment_date", $_POST['recruitment_date'], PDO::PARAM_STR);
                $pdoST_insertEmployee->bindValue(":salary", $_POST['salary'], PDO::PARAM_STR);
                
                if($pdoST_insertEmployee->execute())
                {
                    print json_encode(array('infos' => $_POST));
                } else {
                    print "false";
                }
            }
        }
        
    } else {

        if($_POST)
        {
            print '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">';
            // print_r($_POST);
            
            $msg = "";
            
            // Nous contrôlons la validité des datas
            if(empty($_POST["firstname"]))
            {
                $msg .= "<div class='alert alert-danger'>Veuillez remplir un prénom</div>";
            }
            if(empty($_POST["lastname"]))
            {
                $msg .= "<div class='alert alert-danger'>Veuillez remplir un nom</div>";
            }
            
            if(!is_numeric($_POST["salary"]))
            {
                $msg .= "<div class='alert alert-danger'>Veuillez remplir un salaire</div>";
            }
            
            if(!empty($msg))
            {
                print $msg;    
            } else {
                $pdoST_insertEmployee = $pdo->prepare("INSERT INTO employee (firstname, lastname, gender, department, recruitment_date, salary) VALUES (:firstname, :lastname, :gender, :department, :recruitment_date, :salary)");
                
                $pdoST_insertEmployee->bindValue(":firstname", $_POST['firstname'], PDO::PARAM_STR);
                $pdoST_insertEmployee->bindValue(":lastname", $_POST['lastname'], PDO::PARAM_STR);
                $pdoST_insertEmployee->bindValue(":gender", $_POST['gender'], PDO::PARAM_STR);
                $pdoST_insertEmployee->bindValue(":department", $_POST['department'], PDO::PARAM_STR);
                $pdoST_insertEmployee->bindValue(":recruitment_date", $_POST['recruitment_date'], PDO::PARAM_STR);
                $pdoST_insertEmployee->bindValue(":salary", $_POST['salary'], PDO::PARAM_STR);
                
                if($pdoST_insertEmployee->execute())
                {
                    print "<div class='alert alert-success'>Vous êtes bien enregistré $_POST[firstname].</div>";
                } else {
                    print "<div class='alert alert-danger'>Une erreur est survenue, veuillez réessayer.</div>";
                }
            }

            print "<a class='btn btn-dark' href='index.php'>Retour au formulaire</a>";
        }
    }

?>
