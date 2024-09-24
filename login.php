<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <div class="container">
    <div class="form-box box">

    <?php
      include "api/config.php";
      if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $sql = "select * from users where email='$email'";
        $res = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($res) > 0) {
           $row = mysqli_fetch_assoc($res);
          $password = $row['password'];
          //$decrypt = password_verify($pass, $password);
          $decrypt = ($pass == $password);
          if ($decrypt) {
            $_SESSION['id'] = $row['id'];
            header("location: index.php");
          }
        }
    } 
        ?>

        <header>Login</header>
        <hr>
        <form action="#" method="POST">

          <div class="form-box">


            <div class="input-container">
              <i class="fa fa-envelope icon"></i>
              <input class="input-field" type="email" placeholder="Email Address" name="email">
            </div>

            <div class="input-container">
              <i class="fa fa-lock icon"></i>
              <input class="input-field password" type="password" placeholder="Password" name="password">
              <i class="fa fa-eye toggle icon"></i>
            </div>
            </div>

          </div>



          <input type="submit" name="login" id="submit" value="Login" class="button">

        </form>
      </div>
  </div>
</body>

</html>