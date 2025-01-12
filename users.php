<?php
session_start();
if (!isset($_SESSION['unique_id'])) {
    header("location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat APP</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="wrapper">
        <section class="users">
            <header>
                <?php
                include_once "php/config.php";
                $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
                if (mysqli_num_rows($sql) > 0) {
                    $row = mysqli_fetch_assoc($sql);
                }

                ?>
                <div class="content">
                    <img src="images/<?php echo $row['img'] ?>" alt="">
                    <div class="details">
                        <span><?php echo $row['fname'] . " " . $row['lname'] ?></span>
                        <p><?php echo $row['status'] ?></p>
                    </div>
                </div>
                <a href="#" class="logout">Deconnexion</a>
            </header>
            <div class="search">
                <span class="text">Selectionner un utilisateur pour
                    commencer</span>
                <input type="search" placeholder="Entrer un nom a rechercher">
                <button><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>
            <div class="users-list">
                

            </div>
        </section>
    </div>
    <script src="javascript/user.js"></script>
</body>

</html>