<?php
session_start();

if (isset($_POST['confirmar_cad_prod'])) {
    // Recuperando os dados digitados no input
    $codProduto = $_POST['cod-produto'];
    $descricao = $_POST['descricao'];
    $dataAtualizacao = $_POST['data-atualizacao'];
    $precoCusto = $_POST['preco-custo'];
    $fornecedor = $_POST['fornecedor'];
    $marca = $_POST['marca'];
    $ipi = $_POST['ipi'];
    $lucro = $_POST['lucro'];
    $precoVenda = $_POST['preco-venda'];
    $qtdadeMinima = $_POST['qtde-minima'];
    $estoque = $_POST['estoque'];

    try {
        if (isset($_SESSION['usuario_cliente']) && isset($_SESSION['id_cliente'])) {
            $id_empresa = $_SESSION['id_cliente'];
            $conn = new PDO("mysql:host=localhost; dbname=banco_pdv", "root", "");

            $query = $conn->prepare("INSERT INTO produtos_$id_empresa (codigo_interno, data_atualizacao, descricao, preco_custo, ipi, lucro, preco_venda, qtde_minima, marca, fornecedor, estoque, id_empresa) VALUES (:codigo_interno, :data_atualizacao, :descricao, :preco_custo, :ipi, :lucro, :preco_venda, :qtde_minima, :marca, :fornecedor, :estoque, :id_empresa)");

            $query->bindParam(':codigo_interno', $codProduto);
            $query->bindParam(':data_atualizacao', $dataAtualizacao);
            $query->bindParam(':descricao', $descricao);
            $query->bindParam(':preco_custo', $precoCusto);
            $query->bindParam(':ipi', $ipi);
            $query->bindParam(':lucro', $lucro);
            $query->bindParam(':preco_venda', $precoVenda);
            $query->bindParam(':qtde_minima', $qtdadeMinima);
            $query->bindParam(':marca', $marca);
            $query->bindParam(':fornecedor', $fornecedor);
            $query->bindParam(':estoque', $estoque);
            $query->bindParam(':id_empresa', $id_empresa);

            $query->execute();

            $_SESSION['produto_cadastrado'] = true;
            header('Location: ../menu_pdv_cad_prod.php');
        }else{
            echo "<script>alert('Não existe essa sessão!')</script>";
            header('Location: ../menu_pdv_cad_prod.php');
        }
    } catch (PDOException $e) {
        echo "<script>alert('Erro ao cadastrar produtos: " . $e->getMessage() . "')</script>";
        header('Location: ../menu_pdv_cad_prod.php');
    }
}
?>