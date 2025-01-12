
<?php

session_start();
include_once "config.php";

// Récupération et échappement des valeurs des champs du formulaire
$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Vérification que tous les champs sont remplis
if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
    // Validation de l'adresse email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Vérification si l'email existe déjà dans la base de données
        $sql_check_email = "SELECT email FROM users WHERE email = '$email'";
        $result_check_email = mysqli_query($conn, $sql_check_email);
        
        if (mysqli_num_rows($result_check_email) > 0) {
            echo "$email existe déjà";
        } else {
            // Traitement de l'upload d'image s'il y en a une
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $img_name = $_FILES['image']['name'];
                $img_tmp = $_FILES['image']['tmp_name'];
                $img_ext = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
                $extensions = ['png', 'jpg', 'jpeg'];
                
                // Vérification de l'extension de l'image
                if (in_array($img_ext, $extensions)) {
                    // Nom de fichier unique basé sur le timestamp
                    $new_img_name = time() . '_' . $img_name;
                    $upload_path = "../images/" . $new_img_name;
                    
                    // Déplacement du fichier téléchargé vers le dossier images
                    if (move_uploaded_file($img_tmp, $upload_path)) {
                        $status = "ACTIVE";
                        $random_id = rand(time(), 10000000);
                        
                        // Insertion des données dans la base de données
                        $sql_insert = "INSERT INTO users (unique_id, fname, lname, email, password, img, status) 
                                       VALUES ('$random_id','$fname', '$lname', '$email', '$password', '$new_img_name', '$status')";
                        
                        if (mysqli_query($conn, $sql_insert)) {
                            // Récupération de l'utilisateur nouvellement inséré
                            $user_id = mysqli_insert_id($conn);
                            $_SESSION['unique_id'] = $user_id;
                            echo "Cool connectez vous maintenant!";
                           
                        } else {
                            echo "Échec lors de l'insertion : " . mysqli_error($conn);
                        }
                    } else {
                        echo "Échec de l'upload de l'image";
                    }
                } else {
                    echo "Choisissez un format d'image valide (png, jpg, jpeg)";
                }
            } else {
                echo "Erreur lors de l'upload de l'image : " . $_FILES['image']['error'];
            }
        }
    } else {
        echo "$email est invalide";
    }
} else {
    echo "Tous les champs sont obligatoires";
}

// Fermeture de la connexion à la base de données
mysqli_close($conn);
?>




