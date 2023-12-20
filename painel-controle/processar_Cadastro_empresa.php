<?php

if (isset($_POST['confirmar'])) {

    try {
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

        // Upload do arquivo de logo
        $nomeArquivo = $_FILES['logo']['name'];
        $caminhoTemporario = $_FILES['logo']['tmp_name'];
        $caminhoDestino = "C:/Users/{$nomeArquivo}";

        move_uploaded_file($caminhoTemporario, $caminhoDestino);

        // Dados de acesso do cliente
        $usuario = strip_tags($_POST['usuario']);
        $senha = password_hash(strip_tags($_POST['senha']), PASSWORD_DEFAULT); // Hash da senha

        // Conectar ao banco de dados
        $conn = new PDO("mysql:host=localhost; dbname=banco_pdv", "root", "");

        // Inserir dados da empresa com declarações preparadas
        $queryEmpresa = $conn->prepare("
            INSERT INTO dados_empresa (cnpj, razao_social, nome_fantasia, inscricao_estadual, contato, inscricao_municipal, telefone, email, cep, logradouro, numero, complemento, uf, bairro, cidade, logo_path)
            VALUES (:cnpj, :razaoSocial, :fantasia, :inscricaoEstadual, :contato, :inscricaoMunicipal, :telefone, :email, :cep, :logradouro, :numeroStreet, :complemento, :uf, :bairro, :cidade, :logo_path)
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
        // Caminho da logo
        $logoPath = "C:/Users/{$nomeArquivo}";
        $queryEmpresa->bindParam(':logo_path', $logoPath);

        $queryEmpresa->execute();

        // Obter o ID da empresa recém-inserida
        $idEmpresa = $conn->lastInsertId();

        // Criar tabelas específicas para a empresa (assumindo que você usa um prefixo para evitar conflitos de nome)
        $produtoTableName = "produtos_" . $idEmpresa;
        $relatorioTableName = "relatorios_" . $idEmpresa;

        // Tabela de Produtos
        $queryCreateProdutos = $conn->prepare("
            CREATE TABLE $produtoTableName (
                id INT PRIMARY KEY AUTO_INCREMENT,
                codigo_interno TEXT NOT NULL,
                data_atualizacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                descricao TEXT NOT NULL,
                preco_custo DECIMAL(10, 2) NOT NULL,
                ipi INT NOT NULL,
                lucro INT NOT NULL,
                preco_venda DECIMAL(10, 2) NOT NULL,
                qtde_minima INT,
                marca TEXT,
                fornecedor TEXT,
                estoque INT NOT NULL,
                id_empresa INT,
                FOREIGN KEY (id_empresa) REFERENCES dados_empresa(id)
            )
        ");
        $queryCreateProdutos->execute();

        // Tabela de Relatórios
        $queryCreateRelatorios = $conn->prepare("
            CREATE TABLE $relatorioTableName (
                id INT PRIMARY KEY AUTO_INCREMENT,
                data TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                nome_produto TEXT,
                total_compra DECIMAL(10, 2),
                quantidade_vendida DECIMAL(10, 2),
                forma_pagamento TEXT,
                valor_pago DECIMAL(10, 2),
                troco DECIMAL(10, 2),
                id_empresa INT,
                FOREIGN KEY (id_empresa) REFERENCES dados_empresa(id)
            )
        ");
        $queryCreateRelatorios->execute();

        // Atualizar o usuário (cliente) com o ID da empresa
        $queryCliente = $conn->prepare("
            INSERT INTO usuarios (user, password, tipo, id_empresa)
            VALUES (:usuario, :senha, 'cliente', :idEmpresa)
        ");

        $queryCliente->bindParam(':usuario', $usuario);
        $queryCliente->bindParam(':senha', $senha);
        $queryCliente->bindParam(':idEmpresa', $idEmpresa);

        $queryCliente->execute();

        // Após a inserção bem-sucedida dos dados
        session_start();
        $_SESSION['cadastro_sucesso'] = true;
        echo "<script>window.location.href = 'index.php';</script>";
        exit();

    } catch (PDOException $e) {
        // Handle database errors
        echo "Erro no banco de dados: " . $e->getMessage();
    }

} else {
    echo "<script>alert(Erro ao processar o formulário.)</script>";
}
?>