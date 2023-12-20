const btnCadastrar = document.querySelector("#btn-cadastrar");
const cadastrarEmpresa = document.querySelector("#cadastrar-empresa");

// Abri o cadastro de empresa
btnCadastrar.addEventListener('click', () =>{
    cadastrarEmpresa.style.display = 'block';
})

// Cancela o envio do formulário
document.getElementById('cancelar').addEventListener('click', function(event) {
    event.preventDefault();
    // Ocultar o formulário
    document.getElementById('cadastrar-empresa').style.display = 'none';
});

// Retornando ao painel de controle
function returnToDashboard() {
    const closeMessage = document.getElementById('success-message');
    closeMessage.style.display = 'none';
}

// Sair do painel de controle
document.getElementById('sair-painel').addEventListener('click', () => {
    // Fazer uma solicitação ao servidor para remover a sessão
    fetch('./logout.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
    })
    .then(response => response.json())
    .then(data => {
        // Redirecionar para a página de login ou realizar outras ações, se necessário
        window.location.href = "../index.php";
    })
    .catch(error => {
        console.error('Erro ao fazer logout:', error);
    });
});

function exibirImagem() {
    const inputLogo = document.getElementById('logo');
    const previewImagem = document.getElementById('preview-imagem');

    const file = inputLogo.files[0];

    if (file) {
        const reader = new FileReader();

        reader.onload = function (e) {
            previewImagem.src = e.target.result;
        };

        reader.readAsDataURL(file);
    }
}