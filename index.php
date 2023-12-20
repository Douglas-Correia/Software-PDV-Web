<?php 
session_start(); 

if(isset($_SESSION['usuario_administrador'])){
    header("Location: painel-controle/index.php");
    exit(); 
}

if(isset($_SESSION['usuario_cliente'])){
    header("Location: pdv.php");
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ds Sistema PDV Login</title>
    <link rel="stylesheet" href="css/style_login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div class="container">
        <section class="section-img">
            <h2>SISTEMA DE PDV</h2>
            <div>
                <img src="img/icons/Logo-login.png" alt="">
            </div>
        </section> <!--SECTION IMG -->

        <seciton class="section-login">
            <h2>EFETUAR LOGIN</h2>
            <form action="verificar_login.php" method="post">
                <div class="single-input">
                    <span><i class="fa-solid fa-user"></i></span>
                    <input type="text" name="user" id="user" placeholder="Entre com Usuário" require>
                    <p id="p-user">*O campo de usuário é de carater obrigatório</p>
                </div><!-- DIV USUÁRIO -->

                <div class="single-input">
                    <span><i class="fa-solid fa-lock"></i></span>
                    <input type="password" name="password" id="password" placeholder="Entre com a Senha" require>
                    <p id="p-password">*O campo de usuário é de carater obrigatório</p>
                </div><!-- DIV PASSWORD -->

                <div class="check"><input type="checkbox" name="remember-password" id="remember-password"><label for="">Lembrar senha</label></div>

                <input type="submit" value="Entrar" name="to-enter-login">

                <div class="contact">
                    <p>Não possui uma conta? <a href="https://wa.me/67999956506" target="_blank">Entre em contato</a></p>
                </div>

            </form><!--SECTION FORM -->
        </seciton> <!--SECTION LOGIN -->
    </div><!-- CONTAINER -->

</body>

</html>