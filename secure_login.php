<?php

    // First start a session. This should be right at the top of your login page.
    session_start();

    if (isset($_GET['login-submit'])) {

        if (isset($_GET['email']) && isset($_GET['password'])) {
            $email = $_GET['email'];
            $password = $_GET['password'];

           
            include('db_connect.php');
            $db = connect();
            mysqli_query($db,"SET NAMES 'utf8'");
            $result = mysqli_query($db,"SELECT id, email, password, username, level FROM users WHERE email = '$email' or username = '$email'");
            if(!$result){echo $db->error;}
            $count = mysqli_num_rows($result);
        //if($count == 0){return [];return;}
            $row = mysqli_fetch_object($result);
        @mysqli_free_result($result);


            if (($row !== false) && ($count > 0)) {
                if ($row->password == $password) {
                    $_SESSION['is_auth'] = true;
                    $_SESSION['user_level'] = $row->level;
                    $_SESSION['user_id'] = $row->id;
                    $_SESSION['username'] = $row->username;
                    header('location: index.php');
                    exit;
                }
                else {
                    $error = "Email ou mot de passe invalide. Veuillez réessayer.";
                }
            }
            else {
                    $error = "Email ou mot de passe invalide. Veuillez réessayer.";
            }

        }
        else {
            $error = "S'il vous plaît entrer un e-mail et mot de passe pour vous connecter.";
        }
    }

    ?>


<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>App PFE</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<style type="text/css">
    @CHARSET "UTF-8";
/*
over-ride "Weak" message, show font in dark grey
*/

.progress-bar {
    color: #333;
} 

/*
Reference:
http://www.bootstrapzen.com/item/135/simple-login-form-logo/
*/

* {
    -webkit-box-sizing: border-box;
       -moz-box-sizing: border-box;
            box-sizing: border-box;
    outline: none;
}

    .form-control {
      position: relative;
      font-size: 16px;
      height: auto;
      padding: 10px;
        @include box-sizing(border-box);

        &:focus {
          z-index: 2;
        }
    }

body {
    background: url(http://i.imgur.com/GHr12sH.jpg) no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}

.login-form {
    margin-top: 60px;
}

form[role=login] {
    color: #5d5d5d;
    background: #f2f2f2;
    padding: 26px;
    border-radius: 10px;
    -moz-border-radius: 10px;
    -webkit-border-radius: 10px;
}
    form[role=login] img {
        display: block;
        margin: 0 auto;
        margin-bottom: 35px;
    }
    form[role=login] input,
    form[role=login] button {
        font-size: 18px;
        margin: 16px 0;
    }
    form[role=login] > div {
        text-align: center;
    }
    
.form-links {
    text-align: center;
    margin-top: 1em;
    margin-bottom: 50px;
}
    .form-links a {
        color: #fff;
    }
</style>
  </head>
  <body>







<div class="container">
  
  <div class="row" id="pwd-container">
    <div class="col-md-4"></div>
    
    <div class="col-md-4">
      <section class="login-form">
        <form method="get" action="" role="login">
          <img src="/logo.gif" class="img-responsive" alt="" />
          <input type="text" name="email" placeholder="Email" required class="form-control input-lg" value="" />
          <input type="password" class="form-control input-lg" name="password" placeholder="Password" required="" />
          <input type="hidden" name="login-submit">
        
                  <div class="pwstrength_viewport_progress">
                      
                      <?php 
                      if(isset($error)) echo $error;
                       ?>

                  </div>
          
          
          <button type="submit" name="go" class="btn btn-lg btn-primary btn-block">Sign in</button>
          

          
        </form>
        
        <div class="form-links">
          <a href="#">www.poste.tn</a>
        </div>
      </section>  
      </div>
      
      <div class="col-md-4"></div>
      

  </div>
  

  
</div>

</body>
</html>
