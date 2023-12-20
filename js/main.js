// Sair do painel de controle
document.getElementById('sair-pdv').addEventListener('click', () => {
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