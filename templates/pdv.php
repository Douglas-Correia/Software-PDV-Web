<?php
session_start();

if (!isset($_SESSION['usuario_cliente'])) {
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style_pdv.css">
</head>

<body>

    <header class="header">
        <div class="logo-img">
            <img src="img/icons/Logo-caixa.ico" alt="" width="70px">
        </div>

        <h2>CAIXA LIVRE</h2>

        <h3>Cliente x</h3>
    </header>

    <div class="container">
        <div class="container-select-produtos">
            <div class="search-produto">
                <label for="searchInput">Cód. / Produto (F2)</label>
                <div class="input-container">
                    <span class="span-barcode"><i class="fa-solid fa-barcode"></i></span>
                    <input type="search" id="searchInput" name="searchInput">
                    <span class="span-search"><i class="fa-solid fa-magnifying-glass"></i></span>
                </div>
            </div>

            <div class="quantidade-produto">
                <label for="">Quantidade</label>
                <input type="text" name="" id="">
            </div>

            <div class="valor-unitario">
                <label for="">Valor Unitário</label>
                <input type="text" name="" id="">
            </div>
            <div class="clear"></div>

            <div class="valor-total">
                <label for="">Valor Total</label>
                <input type="text" name="" id="">
            </div>

            <button id="btn-incluir" class="btn-incluir">INCLUIR(ENTER)</button>

            <div class="logo-cliente">
                <img src="" alt="">
            </div>

            <div class="info-caixa">
                <p id="">20/12/2023 - <strong>Caixa</strong> 0001</p>
                <p id="">Operador <strong>1 - douglas1751</strong> </p>
                <p id="">Validade Certificado - N° Série:</p>
                <p id=""><strong>Empresa</strong> R D FREIOS E PECAS LTDA <strong>CNPJ:</strong> 07.578.882/0001-16</p>
            </div>
        </div><!-- CONTAINER SELECGT-PRODUTOS -->

        <div class="container-data-produtos">
            <div class="container-table">
                <table>
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Código</th>
                            <th>Descrição</th>
                            <th>Qtde</th>
                            <th>Desc</th>
                            <th>Unitário R$</th>
                            <th>Total R$</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>123</td>
                            <td>Produto A</td>
                            <td>2</td>
                            <td>0%</td>
                            <td>25.00</td>
                            <td>50.00</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>456</td>
                            <td>Produto B</td>
                            <td>1</td>
                            <td>5%</td>
                            <td>30.00</td>
                            <td>30.00</td>
                        </tr>
                    </tbody>

                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>123</td>
                            <td>Produto A</td>
                            <td>2</td>
                            <td>0%</td>
                            <td>25.00</td>
                            <td>50.00</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>456</td>
                            <td>Produto B</td>
                            <td>1</td>
                            <td>5%</td>
                            <td>30.00</td>
                            <td>30.00</td>
                        </tr>
                    </tbody>
                </table><!-- TABLE -->

            </div><!-- CONTAINER TABLE -->

            <div class="tot-itens-tot-valor">
                <h4>Itens: 000</h4>
                <h4>Subtotal: 0,00</h4>
            </div>
            <div class="btn-comands">
                <button id="menu">MENU(F1)</button>
                <button id="movimento">MOVIMENTO(F10)</button>
                <button id="cancelar_compra">CANCELAR(F9)</button>
                <button id="salvar_compra_localStorage">SALVAR(F7)</button>
                <button id="finalizar-sessao">FINALIZAR(F6)</button>
            </div>
        </div><!-- CONTAINER DATA PRODUTOS -->
    </div><!-- CONTAINER -->

    <script src="../js/main.js"></script>
</body>

</html>