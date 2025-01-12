<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Chat APP</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
            integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <div class="wrapper">
            <section class="form signup">
                <header>Realtime Chat App</header>
                <form action="./php/signup.php"  method="POST"  enctype="multipart/form-data">
                    <div class="error-txt"></div>
                    <div class="name-details">
                        <div class="field input">
                            <label>First Name</label>
                            <input type="text"  placeholder="First Name" name="fname" required>
                        </div>
                        <div class="field input">
                            <label>Last Name</label>
                            <input type="text"  placeholder="Last Name" name="lname" required>
                        </div>
                       
                    </div>
                    <div class="field input">
                        <label>Email Address</label>
                        <input type="email" placeholder="Enter your email" name="email" required>
                    </div>
                    <div class="field input">
                        <label>Password</label>
                        <input type="password" placeholder="Enter new password" name="password" required>
                            <i class="fa fa-eye" aria-hidden="true"></i>
                    </div>
                    <div class="field image">
                        <label>Select Image</label>
                        <input type="file" placeholder="choose an image" name="image" required>
                    </div>
                    <div class="field button">
                        <input type="submit" value="Continuer a Chatter" name="validate" required>
                    </div>
                </form>
<div class="link">Deja Inscrit?<a href="login.php">Connectez vous maintenant</a></div>
            </section>
        </div>
        <script src="javascript/pass-show-hide.js"></script>
        <script src="javascript/signup.js"></script>
    </body>
</html>