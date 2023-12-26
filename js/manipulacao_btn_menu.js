// Percorrer o container menu e pegar os filhos(botoes)
document.querySelectorAll('.container-menu button').forEach((button, key) => {
    button.addEventListener('click', () => {
        // Remover a classe 'active' de todos os botões
        document.querySelectorAll('.container-menu button').forEach(btn => {
            btn.classList.remove('active');
        });
        // Adicionar a classe 'active' apenas ao botão clicado
        button.classList.add('active');

        // Redirecionar com base no ídice
        switch (key) {
            case 0:
                window.location.href = 'menu_pdv_dashboard.php';
                break;
            case 1:
                window.location.href = 'menu_pdv_cad_prod.php';
                break;
            case 2:
                window.location.href = 'menu_pdv_vendas.php';
                break;
            case 3:
                window.location.href = 'menu_pdv_relatorio.php';
                break;
            case 4:
                window.location.href = 'menu_pdv_alterar_preco.php';
                break;
            case 5:
                window.location.href = 'menu_pdv_conta_config.php';
                break;
            case 6:
                window.location.href = 'pdv.php';
                break;
            default:
                alert('Erro inesperado!');
        }
    });
});

document.querySelector('#btn-produto-cad-ok').addEventListener('click', () =>{
    const closeMessage = document.getElementById('success-message');
    closeMessage.style.display = 'none';
})