const btnCadastrar = document.querySelector("#btn-cadastrar");
const cadastrarEmpresa = document.querySelector("#cadastrar-empresa");

// Abri o cadastro de empresa
btnCadastrar.addEventListener('click', () =>{
    cadastrarEmpresa.style.display = 'block';
})

// Retornando ao painel de controle
function returnToDashboard() {
    const closeMessage = document.getElementById('success-message');
    closeMessage.style.display = 'none';
}