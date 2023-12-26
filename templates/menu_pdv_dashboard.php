<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style_asidebar.css">
    <link rel="stylesheet" href="../css/style_dashboard.css">
</head>

<body>

    <aside class="container-menu">
        <button type="button" class="active"><i class="fa-solid fa-gauge"></i> Dashboard</button>
        <button type="button" class=""><i class="fa-solid fa-pen-to-square"></i> Cadastros</button>
        <button type="button" class=""><i class="fa-solid fa-cart-shopping"></i> Vendas</button>
        <button type="button" class=""><i class="fa-solid fa-chart-column"></i> Relatórios</button>
        <button type="button" class=""><i class="fa-solid fa-pen-to-square"></i> Alterar produto</button>
        <button type="button" class=""><i class="fas fa-cogs"></i> Conta</button>
        <div>
            <button type="button"><i class="fas fa-arrow-left"></i> Sair do menu</button>
        </div>
    </aside>

    <!-- INICIO DA SESSÃO DO CONTEÚDO-->
    <div class="content">
        <div class="titulo-secao">
            <h2>Dashbord Sale</h2>
            <br>
            <div class="separador"></div>
            <br>
            <p><i class="fa-solid fa-house"></i> / Dashbord Sale</p>
        </div>

        <!-- INCIO DO BOX DE FINANÇAS -->
        <div class="box-info">
            <!-- INCIO DO BOX 1-->
            <div class="box-info-single" style="background:linear-gradient(45deg, #FF5370, #ff869a);">
                <div class="info-text">
                    <h3>Total Despesas</h3>
                    <p id="p-despesas">R$ 1.000</p>
                </div>
                <i class="fa-solid fa-money-check-dollar"></i>
            </div>

            <!-- INCIO DO BOX 2-->
            <div class="box-info-single" style="background:linear-gradient(45deg, #4099ff, #73b4ff);">
                <div class="info-text">
                    <h3>Total Receitas</h3>
                    <p id="p-receitas">R$ 1.000</p>
                </div>
                <i class="fa-solid fa-money-check-dollar"></i>
            </div>

            <!-- INCIO DO BOX 3-->
            <div class="box-info-single" style="background:linear-gradient(45deg, #2ed8b6, #59e0c5);">
                <div class="info-text">
                    <h3>Total Lucro</h3>
                    <p id="p-lucro">R$ 1.000</p>
                </div>
                <i class="fa-solid fa-money-check-dollar"></i>
            </div>
        </div>

    </div><!--Content-->
    <!-- FIM DA SESSÃO DO CONTEÚDO-->

    <div class="section-table">
        <table>
            <tr>
                <thead>
                <th>Código</th>
                <th>Produto</th>
                <th>Data venda</th>
                <th>Tot. Compra</th>
                <th>Qtde. Vendida</th>
                <th>Pagamento</th>
                <th>Valor pago</th>
                <th>Troco</th>
                </thead>
            </tr>

            <tr>
                <tbody>
                    <td>00001</td>
                    <td>Arroz Tio João</td>
                    <td>2023/12/25</td>
                    <td>22,99</td>
                    <td>X 1</td>
                    <td>Dinheiro</td>
                    <td>25,00</td>
                    <td>2,01</td>
                </tbody>
            </tr>
        </table>
        
    </div><!-- SECTION TABELA -->/

    <script src="../js/manipulacao_btn_menu.js"></script>
</body>

</html>