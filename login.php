<?php
session_start();

require('connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>IPhoneAR - LogIN</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="style.css">
<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: sans-serif;
  }

  body {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100vw;
    min-height: 100vh;
    background-color: #DDEAFF;
  }

  .sec-left {
    position: relative;
    width: 380px;
    height: 480px;
    border-radius: 12px 0 0 12px;
    box-shadow: -3px 8px 15px rgba(0, 0, 0, 0.4);
  }

  .form-box {
    position: absolute;
    width: 100%;
    height: 100%;
    background-color: #fff;
    border-radius: 12px 0 0 12px;
  }

  .form-box form {
    padding: 50px;
  }

  .form-box form h2 {
    text-align: center;
    font-size: 30px;
    font-weight: 800;
    margin-top: -8px;
  }

  .form-box form .icons {
    display: grid;
    grid-template-columns: auto auto;
    place-items: center;
    margin-top: 40px;
    margin-inline: 85px;
  }

  .form-box form .icons i {
    font-size: 25px;
    border-radius: 100%;
    border: 1px solid rgba(0, 0, 0, 0.3);
    width: 40px;
    height: 40px;
    padding: 8px;
    cursor: pointer;
  }

  .form-box form .icons i:hover {
    opacity: 0.5;
  }

  .form-box form p {
    font-size: 13px;
    color: #777;
    text-align: center;
    margin-top: 30px;
  }

  .form-box form .input-box {
    position: relative;
  }

  .form-box form .input-box input {
    width: 100%;
    outline: none;
    border: none;
    background-color: rgba(0, 0, 0, 0.07);
    padding: 15px;
    margin-top: 15px;
    border-radius: 1px;
  }

  .form-box form a {
    text-decoration: none;
    color: #666;
    display: flex;
    justify-content: center;
    margin-top: 20px;
  }

  .form-box form a:hover {
    text-decoration: underline;
    text-underline-offset: 3px;
  }

  .form-box form button {
    width: 40%;
    padding: 15px;
    border: none;
    outline: none;
    border-radius: 50px;
    background-color: #6EA5FF;
    color: #fff;
    text-transform: uppercase;
    font-weight: 600;
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    margin-top: 20px;
    cursor: pointer;
  }

  .form-box form button:hover {
    opacity: 0.9;
  }

  .sec-rgt {
    position: relative;
    width: 380px;
    height: 480px;
    border-radius: 0 12px 12px 0;
    box-shadow: 3px 8px 15px rgba(0, 0, 0, 0.4);
    background: linear-gradient(to right, #3380FF, #2E67C7, #19499A);
    padding: 50px;
    text-align: center;
  }

  .sec-rgt img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    opacity: 30%
  }

  .sec-rgt h2 {
    color: #fff;
    text-align: center;
    font-size: 30px;
    font-weight: 800;
    margin-top: 80px;
  }

  .sec-rgt p {
    color: #e4e4e4;
    text-align: center;
    margin-top: 25px;
  }
</style>
</head>
<body>
  <div class="sec-left">
    <div class="form-box">
      <form id="login" method="POST">
        <h2>Login</h2>
        <br><br><br>
        
        <?php if (!empty($error_message)) : ?>
            <p style="color: red;"><?php echo $error_message; ?></p>
        <?php endif; ?>
        
        <div class="input-box">
            <input type="email" placeholder="Ingrese su correo..." name="email" required>
            <input type="password" placeholder="Ingrese su contraseña..." name="password" required>
        </div>

        <a href="#">Olvidó su contraseña?</a>
        <br><br><br>
        <button type="submit" id="enviar" name="insert">Log In</button>
      </form>
    </div>
  </div>

  <div class="sec-rgt">
    <img src="img/iphones.png" alt="IphoneAR">
  </div>
  <?php
$error_message = ""; 

if (isset($_POST['insert'])) {
    $usuario = $_POST['email'];
    $password = $_POST['password'];


    $stmt = "SELECT email, password FROM usuario WHERE email = '$usuario' AND password = '$password'";
    $result = mysqli_query($conn, $stmt);

    if (mysqli_num_rows($result) == 1) {
        header("Location: index.php");
    } else {
        $error_message = "El correo o la contraseña son incorrectos.";
    }
}
?>
</body>
</html>
