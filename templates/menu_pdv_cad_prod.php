<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style_asidebar.css">
    <link rel="stylesheet" href="../css/style_cadastro_produtos.css">
</head>

<body>
    <aside class="container-menu">
        <button type="button" class=""><i class="fa-solid fa-gauge"></i> Dashboard</button>
        <button type="button" class="active"><i class="fa-solid fa-pen-to-square"></i> Cadastros</button>
        <button type="button" class=""><i class="fa-solid fa-cart-shopping"></i> Vendas</button>
        <button type="button" class=""><i class="fa-solid fa-chart-column"></i> Relatórios</button>
        <button type="button" class=""><i class="fa-solid fa-pen-to-square"></i> Alterar produto</button>
        <button type="button" class=""><i class="fas fa-cogs"></i> Conta</button>
        <div>
            <button type="button"><i class="fas fa-arrow-left"></i> Sair do menu</button>
        </div>
    </aside>

    <div class="container-acoes">
        <section class="cadastrar-produto" id="cadastrar-produto">
            <header class="header-cad-produto">
                <i class="fas fa-box"></i>
                <h2>Cadastro de Produtos</h2>
            </header>

            <form id="cadastroProd" action="processos_dados/processar_cadastro_produtos.php" method="post">
                <!-- CÓDIGO E DESCRIÇÃO DO PRODUTO -->
                <div class="two-input">
                    <div class="single-input single-input-icon">
                        <label for="cod-produto">Cód. Produto</label>
                        <input type="text" name="cod-produto" id="cod-produto" required>
                    </div>
                    <div class="single-input">
                        <label for="descricao">Descrição</label>
                        <input type="text" name="descricao" id="descricao" required>
                    </div>
                </div>

                <!-- DATA DE ATUALIZAÇÃO E PREÇO DE CUSTO -->
                <div class="two-input">
                    <div class="single-input">
                        <label for="data-atualizacao">Data de Atualização</label>
                        <input type="date" name="data-atualizacao" id="data-atualizacao" required>
                    </div>
                    <div class="single-input">
                        <label for="preco-custo">Preço de Custo</label>
                        <input type="text" name="preco-custo" id="preco-custo" required>
                    </div>
                </div>

                <!-- FORNECEDOR E MARCA -->
                <div class="two-input">
                    <div class="single-input">
                        <label for="fornecedor">Fornecedor</label>
                        <input type="text" name="fornecedor" id="fornecedor" required>
                    </div>
                    <div class="single-input">
                        <label for="marca">Marca</label>
                        <input type="text" name="marca" id="marca" required>
                    </div>
                </div>

                <!-- IPI E LUCRO -->
                <div class="two-input">
                    <div class="single-input">
                        <label for="ipi">IPI</label>
                        <input type="text" name="ipi" id="ipi" required>
                    </div>
                    <div class="single-input">
                        <label for="lucro">Lucro</label>
                        <input type="text" name="lucro" id="lucro" required>
                    </div>
                </div>

                <!-- PREÇO DE VENDA E QUANTIDADE MÍNIMA -->
                <div class="two-input">
                    <div class="single-input">
                        <label for="preco-venda">Preço de Venda</label>
                        <input type="text" name="preco-venda" id="preco-venda" required>
                    </div>
                    <div class="single-input">
                        <label for="qtde-minima">Qtde Mínima</label>
                        <input type="text" name="qtde-minima" id="qtde-minima" required>
                    </div>
                </div>

                <div class="two-input">
                    <div class="single-input">
                        <label for="preco-venda">Estoque</label>
                        <input type="text" name="estoque" id="estoque" required>
                    </div>
                </div>

                <div class="cancel-confirm">
                    <button type="button" id="cancelar">Cancelar</button>
                    <button type="submit" id="confirmar" name="confirmar_cad_prod">Confirmar</button>
                </div>
            </form>
        </section>
    </div>

    <?php 
        if(isset($_SESSION['produto_cadastrado']) && $_SESSION['produto_cadastrado']){    
    ?>
        <div id="success-message" class="success-message">
            <div class="message-container">
                <p>Produtos cadastrados com sucesso!</p>
                <button class="btn-msg" id="btn-produto-cad-ok">OK</button>
            </div>
        </div>   
    <?php 
        // Limpa a variável de sessão para não exibir a mensagem novamente
        unset($_SESSION['produto_cadastrado']);
        }
    ?>
    <script src="../js/manipulacao_btn_menu.js"></script>
</body>

</html>