<?php 
session_start();

if(!isset($_SESSION['usuario_cliente'])){
    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <button id="sair-pdv">Sair</button>

    <script src="js/main.js"></script>
</body>
</html>