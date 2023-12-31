<?php
session_start();

if (isset($_POST['to-enter-login'])) {
    $user = strip_tags($_POST['user']);
    $password = strip_tags($_POST['password']);

    // Conectando no banco de dados
    $conn = new PDO("mysql:host=localhost; dbname=banco_pdv", "root", "");

    // Obtendo o hash da senha armazenado no banco de dados para o usuário correspondente
    $query = $conn->prepare("SELECT user, password, tipo, id_empresa FROM usuarios WHERE user = ?");
    $query->execute([$user]);
    $result = $query->fetch(PDO::FETCH_ASSOC);

    // Obtendo o usuário admin sem criptográfia.
    $queryAdmin = $conn->prepare("SELECT user, password, tipo FROM usuarios WHERE user = ? AND password = ?");
    $queryAdmin->execute([$user, $password]);
    $resultAdmin = $queryAdmin->fetch(PDO::FETCH_ASSOC);

    if ($result || $resultAdmin) {
        // Usuário encontrado, agora verifica a senha
        $hashDaSenhaArmazenado = $result['password'];
        // Senha correta
        $tipo = $result['tipo'];
        $tipoAdmin = $resultAdmin['tipo'];
        // Redirecionar com base no tipo de usuário
        if ($tipoAdmin == 'administrador') {
            $_SESSION['usuario_administrador'] = true;
            header("Location: ../../painel-controle/index.php");
            exit();
        }
        // Use password_verify para comparar a senha fornecida com o hash armazenado
        if (password_verify($password, $hashDaSenhaArmazenado)) {
            if ($tipo == 'cliente') {
                $_SESSION['usuario_cliente'] = true;
                $_SESSION['id_cliente'] = $result['id_empresa'];
                header("Location: ../pdv.php");
                exit();
            } else {
                echo "<script>alert('Tipo de usuário não informado!')</script>";
                header("Location: ../../index.php");
                exit();
            }
        } else {
            // Senha incorreta
            echo '<script>
                    document.getElementById("p-user").innerText = "Usuário ou senha incorretos";
                    document.getElementById("p-password").innerText = "Usuário ou senha incorretos";
                  </script>';
            header("Location: ../../index.php");
            exit();
        }
    } else {
        // Usuário não encontrado
        echo '<script>
                document.getElementById("p-user").innerText = "Usuário ou senha incorretos";
                document.getElementById("p-password").innerText = "Usuário ou senha incorretos";
              </script>';
        header("Location: ../../index.php");
        exit();
    }
}
?>
