<?php

if (isset($_POST['confirmar'])) {

    // Dados da empresa
    $cnpj = strip_tags($_POST['cnpj']);
    $razaoSocial = strip_tags($_POST['razao-social']);
    $fantasia = strip_tags($_POST['fantasia']);
    $inscricaoEstadual = strip_tags($_POST['inscricao-estadual']);
    $contato = strip_tags($_POST['contato']);
    $inscricaoMunicipal = strip_tags($_POST['inscricao-municipal']);
    $telefone = strip_tags($_POST['telefone']);
    $email = strip_tags($_POST['email']);
    $cep = strip_tags($_POST['cep']);
    $logradouro = strip_tags($_POST['logradouro']);
    $numeroStreet = strip_tags($_POST['numero']);
    $complemento = strip_tags($_POST['complemento']);
    $uf = strip_tags($_POST['uf']);
    $bairro = strip_tags($_POST['bairro']);
    $cidade = strip_tags($_POST['cidade']);

    // Dados de acesso do cliente
    $usuario = strip_tags($_POST['usuario']);
    $senha = password_hash(strip_tags($_POST['senha']), PASSWORD_DEFAULT); // Hash da senha

    // Conectar ao banco de dados
    $conn = new PDO("mysql:host=localhost; dbname=banco_pdv", "root", "");

    // Inserir dados da empresa com declarações preparadas
    $queryEmpresa = $conn->prepare("
        INSERT INTO dados_empresa (cnpj, razao_social, nome_fantasia, inscricao_estadual, contato, inscricao_municipal, telefone, email, cep, logradouro, numero, complemento, uf, bairro, cidade)
        VALUES (:cnpj, :razaoSocial, :fantasia, :inscricaoEstadual, :contato, :inscricaoMunicipal, :telefone, :email, :cep, :logradouro, :numeroStreet, :complemento, :uf, :bairro, :cidade)
    ");

    $queryEmpresa->bindParam(':cnpj', $cnpj);
    $queryEmpresa->bindParam(':razaoSocial', $razaoSocial);
    $queryEmpresa->bindParam(':fantasia', $fantasia);
    $queryEmpresa->bindParam(':inscricaoEstadual', $inscricaoEstadual);
    $queryEmpresa->bindParam(':contato', $contato);
    $queryEmpresa->bindParam(':inscricaoMunicipal', $inscricaoMunicipal);
    $queryEmpresa->bindParam(':telefone', $telefone);
    $queryEmpresa->bindParam(':email', $email);
    $queryEmpresa->bindParam(':cep', $cep);
    $queryEmpresa->bindParam(':logradouro', $logradouro);
    $queryEmpresa->bindParam(':numeroStreet', $numeroStreet);
    $queryEmpresa->bindParam(':complemento', $complemento);
    $queryEmpresa->bindParam(':uf', $uf);
    $queryEmpresa->bindParam(':bairro', $bairro);
    $queryEmpresa->bindParam(':cidade', $cidade);

    $queryEmpresa->execute();

    // Inserir dados de acesso do cliente com declarações preparadas
    $queryCliente = $conn->prepare("
        INSERT INTO usuarios (user, password, tipo)
        VALUES (:usuario, :senha, 'cliente')
    ");

    $queryCliente->bindParam(':usuario', $usuario);
    $queryCliente->bindParam(':senha', $senha);

    $queryCliente->execute();

    // Após a inserção bem-sucedida dos dados
    echo '<script>window.location.href = "index.php";</script>';
        exit();
} else {
    echo "<script>alert(Erro ao processar o formulário.)</script>";
}
?>