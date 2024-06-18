<?php

if(isset($_POST["reserver_btn"])){

    $prenom = $_POST["prenom"] ; 
    $password = $_POST["password"] ;
    $date_debut = $_POST["date_debut"] ;
    $date_fin = $_POST["date_fin"]  ; 
    $nbr_pers = $_POST["per"] ; 
    $nom = $_POST["nom"] ; 
    $email = $_POST["email"] ;
    
    $server_name = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "hotel";

    $query = "INSERT INTO client (nom,prenom,email ,password ,solde) VALUES ('$nom','$prenom','$email' , '$password' , NULL)";
    $connection = mysqli_connect($server_name,$db_username,$db_password,$db_name);
    $query_run = mysqli_query($connection, $query);
    $query1 = "SELECT * FROM client WHERE nom = '$nom'";
    $query_run2 = mysqli_query($connection, $query1);
    $query3 = "INSERT INTO reservation (date_debut , date_fin , nbr_personne ,chambre_id , receptionniste_id , client_id ) VALUES ('$date_debut' , 
    '$date_fin' ,'$nbr_pers' , NULL , NULL , NULL )" ; 

            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "reservation Added";
                $_SESSION['status_code'] = "success";
                header('Location:../indee.php');
            }
            else 
            {
                $_SESSION['status'] = "Reservation  Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: reserver.php');  
            }

}