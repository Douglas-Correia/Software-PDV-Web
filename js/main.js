// Sair do painel de venda
document.getElementById('finalizar-sessao').addEventListener('click', () => {
    // Fazer uma solicitação ao servidor para remover a sessão
    fetch('painel-controle/logout.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
    })
    .then(response => response.json())
    .then(data => {
        // Redirecionar para a página de login ou realizar outras ações, se necessário
        window.location.href = "index.php";
    })
    .catch(error => {
        console.error('Erro ao fazer logout:', error);
    });
});

// Redirecionar para a página de menu e cadastro de produtos
let = menu = document.getElementById('menu').addEventListener('click', () =>{
    window.location.href = './menu_pdv_dashboard.php';
})