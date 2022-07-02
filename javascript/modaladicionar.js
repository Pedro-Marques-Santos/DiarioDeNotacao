function abrirModal() {
    const modal_adicionar = document.getElementById('modal-adicionar')
    modal_adicionar.style.display = 'flex'
}

function fecharModal() {
    const modal_adicionar = document.getElementById('modal-adicionar')
    modal_adicionar.style.display = 'none'
}

function adicionarNotacao() {
    abrirModal()
}

const backdrop_adicionar = document.getElementById('backdrop-adicionar')
backdrop_adicionar.addEventListener('click', (event) => {
    fecharModal()
});

function fecharModalAdicionar() {
    const modal_adicionar = document.getElementById('modal-adicionar')
    modal_adicionar.style.display = 'none'
}