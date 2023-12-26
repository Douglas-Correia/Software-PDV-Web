<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados da conta</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style_cadastro_produtos.css">
    <link rel="stylesheet" href="../css/style_pdv.css">
</head>

<body>
    <aside class="container-menu">
        <button type="button" class=""><i class="fa-solid fa-gauge"></i> Dashboard</button>
        <button type="button" class=""><i class="fa-solid fa-pen-to-square"></i> Cadastros</button>
        <button type="button" class=""><i class="fa-solid fa-cart-shopping"></i> Vendas</button>
        <button type="button" class=""><i class="fa-solid fa-chart-column"></i> Relatórios</button>
        <button type="button" class=""><i class="fa-solid fa-pen-to-square"></i> Alterar produto</button>
        <button type="button" class="active"><i class="fas fa-cogs"></i> Conta</button>
        <div>
            <button type="button"><i class="fas fa-arrow-left"></i> Sair do menu</button>
        </div>
    </aside>

    <div class="container-acoes">
        <section class="cadastrar-empresa" id="cadastrar-empresa">
            <header class="header-cad-empresa">
                <i class="fa-solid fa-house"></i>
                <h2>Cadastro de Empresa</h2>
            </header>

            <form id="cadastroForm" action="processar_cadastro_empresa.php" method="post" enctype="multipart/form-data">
                <!-- CNPJ RAZÃO SOCIAL -->
                <div class="two-input">
                    <div class="single-input single-input-icon">
                        <label for="">CNPJ</label>
                        <input type="text" name="cnpj" id="cnpj">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    <div class="single-input">
                        <label for="">Razão Social</label>
                        <input type="text" name="razao-social" id="razao-social">
                    </div>
                </div><!-- CNPJ RAZÃO SOCIAL -->

                <!-- FANTASIA INSC. ESTADUAL -->
                <div class="two-input">
                    <div class="single-input">
                        <label for="">Fantasia</label>
                        <input type="text" name="fantasia" id="fantasia">
                    </div>
                    <div class="single-input">
                        <label for="">Insc. Estadual</label>
                        <input type="text" name="inscricao-estadual" id="inscricao-estadual">
                    </div>
                </div><!-- FANTASIA INSC. ESTADUAL -->

                <!-- CONTATO INSC. MUNICIPAL -->
                <div class="two-input">
                    <div class="single-input">
                        <label for="">Contato</label>
                        <input type="text" name="contato" id="contato">
                    </div>
                    <div class="single-input">
                        <label for="">Insc. Municipal</label>
                        <input type="text" name="inscricao-municipal" id="inscricao-municipal">
                    </div>
                </div><!-- CONTATO INSC. MUNICIPAL -->

                <!-- TELEFONE E-MAIL -->
                <div class="two-input">
                    <div class="single-input">
                        <label for="">Telefone</label>
                        <input type="text" name="telefone" id="telefone">
                    </div>
                    <div class="single-input">
                        <label for="">E-mail</label>
                        <input type="text" name="email" id="email">
                    </div>
                </div><!-- CONTATO INSC. MUNICIPAL -->

                <!-- CEP LOGRADOURO -->
                <div class="two-input">
                    <div class="single-input single-input-icon">
                        <label for="">CEP</label>
                        <input type="text" name="cep" id="cep">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    <div class="single-input">
                        <label for="">Logradouro</label>
                        <input type="text" name="logradouro" id="logradouro">
                    </div>
                </div><!-- CEP LOGRADOURO -->

                <!-- NUMERO COMPLEMENTO -->
                <div class="two-input">
                    <div class="single-input">
                        <label for="">Número</label>
                        <input type="text" name="numero" id="numero">
                    </div>
                    <div class="single-input">
                        <label for="">Complemento</label>
                        <input type="text" name="complemento" id="complemento">
                    </div>
                </div><!-- NUMERO COMPLEMENTO -->

                <!-- UF BAIRRO CIDADE -->
                <div class="two-input">
                    <div class="single-input">
                        <label for="">UF</label>
                        <input type="text" name="uf" id="uf">
                    </div>
                    <div class="single-input">
                        <label for="">Bairro</label>
                        <input type="text" name="bairro" id="bairro">
                    </div>
                    <div class="single-input">
                        <label for="">Cidade</label>
                        <input type="text" name="cidade" id="cidade">
                    </div>
                </div><!-- NUMERO COMPLEMENTO -->

                <span class="h3-dados-plataforma"><i class="fa-solid fa-user-plus"></i>
                    <h3> Dados de acesso a Plataforma</h3>
                </span>
                <section class="dados-acesso-plataforma">
                    <div class="logo-empresa">
                        <img id="preview-imagem" src="" alt="">
                    </div>

                    <!-- DADOS USUARIO -->
                    <div class="dados-usuario">
                        <div class="usuarios">
                            <span><i class="fa-solid fa-user"></i></span>
                            <input type="text" name="usuario" id="usuario" placeholder="Usuário">
                        </div>
                        <div class="usuarios">
                            <span><i class="fa-solid fa-lock"></i></span>
                            <input type="password" name="senha" id="senha" placeholder="Senha">
                        </div>

                        <div class="btn">
                            <input type="file" name="logo" id="logo" accept="*" onchange="exibirImagem()">
                        </div>
                    </div><!-- DADOS USUARIO -->
                </section>
                <div class="cancel-confirm">
                    <button type="button" id="cancelar">X Cancelar</button>
                    <button type="submit" id="confirmar" name="confirmar">&#10004 Confirmar</button>
                </div>
            </form>
        </section>
    </div>

    <script src="../js/manipulacao_btn_menu.js"></script>
</body>

</html>