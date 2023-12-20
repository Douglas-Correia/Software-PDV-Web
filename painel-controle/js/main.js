const btnCadastrar = document.querySelector("#btn-cadastrar");
const cadastrarEmpresa = document.querySelector("#cadastrar-empresa");
const btnCancelar = document.querySelector("#cancelar");

btnCadastrar.addEventListener('click', () =>{
    cadastrarEmpresa.style.display = 'block';
})

btnCancelar.addEventListener('click', () =>{
    cadastrarEmpresa.style.display = 'none';
})