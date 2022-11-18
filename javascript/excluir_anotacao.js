class Receberid {
    constructor() {
        this.id = null
    }

    setId( id ) {
        this.id = id
    }

    getId() {
        let id = this.id
        return id
    }
}

var receberid = new Receberid() //teste

//=========================================================================================================
//button excluir do slider
//=========================================================================================================
const select_id = document.getElementById('lista_anotacoes')

//evento de clique
var listener = function (event) {
    let elementoclick = event.target.classList;
    let id = event.target.id;

    if( !elementoclick.contains('principal-item') && !elementoclick.contains('principal-titulo') && !elementoclick.contains('principal-conteudo') ) {
        return 0;
    }

    console.log(id);
    let  tipo_requesicao = 'get_anotacao'
    let  valor_requesicao = [id]
    passardados(tipo_requesicao, valor_requesicao)

    abrirModalExcluir()

}

//função executada quando apertar excluir no slider de menu
function excluir_anotacao() {

    select_id.addEventListener('click', listener, false)

}

//requesição ao servidor
function passardados(tipo_requesicao, valor_requesicao) {

    fetch('http://localhost/DiarioDeNotacao/api/', {
        method: 'POST',
        body: JSON.stringify({tipo_requesicao, valor_requesicao}),
        headers: {  
                    'Content-type': "application/json",
                    'Accept': 'application/json'
                 }
    }).then(response => response.json())
    .then(texto => {

        if( texto.data.result.length == 0 ) {
            alert('houve um erro no retorno da anotação')
            location.reload()
        }

        console.log( texto )
        receberid.setId(texto.data.result[0].id_notacao)
        let titulo_anotacao = document.getElementById('titulo_anotacao')
        titulo_anotacao.innerHTML = texto.data.result[0].titulo_anotacao


    } )
}


function abrirModalExcluir() {
    const modal_adicionar_excluir = document.getElementById('modal-excluir')
    modal_adicionar_excluir.style.display = 'flex'
}

function fecharModalExcluir() {
    const modal_adicionar_excluir_fechar = document.getElementById('modal-excluir')
    modal_adicionar_excluir_fechar.style.display = 'none'
    select_id.removeEventListener('click', listener, false)
}

const backdrop_adicionar_excluir = document.getElementById('backdrop-excluir')
backdrop_adicionar_excluir.addEventListener('click', (event) => {
    fecharModalExcluir()
});

//=========================================================================================================
//button função delete do modal-excluir
//=========================================================================================================
function deletarAnotacao() {
    let tipo_requesicao = 'deletar_anotacao'
    let valor_requesicao = receberid.getId()
    
    nova_requesicao(tipo_requesicao, valor_requesicao)
    location.reload()

}

//requesição ao servidor
function nova_requesicao(tipo_requesicao, valor_requesicao) {

    fetch('http://localhost/DiarioDeNotacao/api/', {
        method: 'POST',
        body: JSON.stringify({tipo_requesicao, valor_requesicao}),
        headers: {  
                    'Content-type': "application/json",
                    'Accept': 'application/json'
                 }
    }).then(response => response.json())
    .then(texto => {

        console.log( texto )

    } )
}