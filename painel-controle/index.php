<?php session_start(); 

if(!isset($_SESSION['usuario_administrador'])){
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de controle</title>
    <link rel="stylesheet" href="css/style-panel.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <header class="header">
        <div class="logo">
            <img src="img/Logo-caixa.ico" alt="" width="70px">
        </div>

        <h2>PAINEL ADMINISTRATIVO</h2>

        <button id="sair-painel" type="submit" style="cursor: pointer;"><i class="fa-solid fa-power-off"></i> Sair</button>
    </header>

    <section class="section-add-clients">
        <button id="add-client">Meus Clientes</button>
        <button id="my-data">Meus Dados</button>
    </section>

    <section class="section-register-company">
        <div class="register-company">
            <div><i class="fa-solid fa-users"></i>
                <p>Meus Clientes</p>
            </div>

            <button id="btn-cadastrar" onclick="cadastrarEmpresa()">Cadastrar Nova Empresa</button>
        </div>
    </section>

    <?php
    // Conectar ao banco de dados
    $conn = new PDO("mysql:host=localhost; dbname=banco_pdv", "root", "");

    // Consulta para obter os dados da tabela
    $query = $conn->query("SELECT * FROM dados_empresa");

    // Verifica se há dados na tabela
    if ($query->rowCount() > 0) {
        $resultados = $query->fetchAll(PDO::FETCH_ASSOC);
    }
    ?>
    <section class="show-customers">
        <div class="clients-data">
            <table>
                <thead>
                    <th>#</th>
                    <th>Data</th>
                    <th>Empresa</th>
                    <th>CNPJ</th>
                    <th>UF</th>
                    <th>Telefone</th>
                    <th>E-mail</th>
                    <th>Ação</th>
                </thead>

                <?php
                foreach ($resultados as $row) {
                ?>
                    <tbody>
                        <td><?= $row['id']; ?></td>
                        <td><?= $row['data']; ?></td>
                        <td><?= $row['razao_social']; ?></td>
                        <td><?= $row['cnpj']; ?></td>
                        <td><?= $row['uf']; ?></td>
                        <td><?= $row['telefone']; ?></td>
                        <td><?= $row['email']; ?></td>
                        <td><i class="fa-solid fa-lock-open" style="background-color: green; color:white"></i>
                            <i class="fa-solid fa-user-pen" style="background-color: orange;"></i>
                        </td>
                    </tbody>
                <?php
                }
                ?>
            </table>
        </div>
    </section>

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

    <?php
    // Verifica se a variável de sessão está presente
    if (isset($_SESSION['cadastro_sucesso']) && $_SESSION['cadastro_sucesso']) {
        // Exibe a mensagem de sucesso com o novo estilo
    ?>
        <div id="success-message" class="success-message">
            <div class="message-container">
                <p>Dados cadastrados com sucesso!</p>
                <button class="btn-msg" onclick="returnToDashboard()">OK</button>
            </div>
        </div>
    <?php
        // Limpa a variável de sessão para não exibir a mensagem novamente
        unset($_SESSION['cadastro_sucesso']);
    }
    ?>

    <script src="./js/main.js"></script>
</body>

</html>