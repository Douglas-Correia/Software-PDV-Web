<?php
session_start();
if(isset($_POST['to-enter-login'])){
    $user = strip_tags($_POST['user']);
    $password = strip_tags($_POST['password']);
    $checkbox = strip_tags($_POST['remember-password']);

    // Conectando no banco de dados
    $conn = new PDO("mysql:host=localhost; dbname=banco_pdv", "root", "");

    // Verificando usuário
    $query = $conn->prepare("SELECT user, password, tipo FROM usuarios WHERE user = ? AND password = ?");
    $query->execute([$user, $password]);
    $result = $query->fetch(PDO::FETCH_ASSOC);

    if($result){
        // Usuário autenticado com sucesso.
        $tipo = $result['tipo'];

        // Redirecionar com base no tipo de usuário
        if($tipo == 'administrador'){
            $_SESSION['usuario_administrador'] = True;
            header("Location: painel-controle/index.php");
            exit();
        }
        else if($tipo == 'cliente'){
            $_SESSION['usuario_cliente'] = True;
            header("Location: pdv.php");
            exit();
        } else{
            echo "<script>alert('Tipo de usuário não informado!')</script>";
            header("Location: index.php");
            exit();
        }
    }
    else{
        // Usuário ou senha incorreto
        echo '<script>
                document.getElementById("p-user").innerText = "Usuário incorreto";
                document.getElementById("p-password").innerText = "Senha incorreta";
              </script>';
        header("Location: index.php");
    }
}