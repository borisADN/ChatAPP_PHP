<?php

session_start();
include_once "config.php";

// Récupération et échappement des valeurs des champs du formulaire
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if (!empty($email) && !empty($password)) {
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' AND password = '$password'");

    if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
        $_SESSION['unique_id'] = $row['unique_id'];
        echo "success";
    

    } else {
        echo "Email ou mot de passe incorrect";
    }
}else {
    echo "Veuillez remplir tous les champs";
}
