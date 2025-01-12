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
            <section class="form login">
                <header>Realtime Chat App</header>
                <form action="#" autocomplete="off">
                    <div class="error-txt"></div>
                    
                    <div class="field input">
                        <label>Email Address</label>
                        <input type="text" name="email"
                            placeholder="Enter your email">
                    </div>
                    <div class="field input">
                        <label>Password</label>
                        <input type="password" name="password"
                            placeholder="Enter new password">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                    </div>
                    
                    <div class="field button">
                        <input type="submit" value="Continuer a Chatter">
                    </div>
                </form>
<div class="link">Pas encore inscrit?<a href="index.php">Inscrit toi maintenant!</a></div>
            </section>
        </div>
        <script src="javascript/pass-show-hide.js"></script>
        <script src="javascript/login.js"></script>
    </body>
</html>