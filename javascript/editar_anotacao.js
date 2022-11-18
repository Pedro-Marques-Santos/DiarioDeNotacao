//instanciando class id
var receberid_editar = new Receberid()

//=========================================================================================================
//button editar do slider
//=========================================================================================================
const select_id_editar = document.getElementById('lista_anotacoes')

//evento de clique
var listener_editar = function (event) {
    let elementoclick = event.target.classList;
    let id = event.target.id;

    if( !elementoclick.contains('principal-item') && !elementoclick.contains('principal-titulo') && !elementoclick.contains('principal-conteudo') ) {
        return 0;
    }

    //console.log(id);
    let  tipo_requesicao = 'get_anotacao'
    let  valor_requesicao = [id]
    passardados_editar(tipo_requesicao, valor_requesicao)

    abrirModalEditar()

}

function editar_anotacao() {
    //console.log('aqui')
    select_id_editar.addEventListener('click', listener_editar, false)
}

//requesição ao servidor
function passardados_editar(tipo_requesicao, valor_requesicao) {

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

        if( texto.data.result.length == 0 ) {
            alert('houve um erro no retorno da anotação')
            location.reload()
        }

        document.getElementById("titulo_editar").setAttribute('value',texto.data.result[0].titulo_anotacao );
        document.getElementById("notacao_editar").innerHTML = texto.data.result[0].conteudonotacao;
        caixacor_editar.setCorInicio(texto.data.result[0].campo_cor)

        let receberdado = [texto.data.result[0].id_notacao]

        receberid_editar.setId(receberdado)

    })
}

function abrirModalEditar() {
    const modal_adicionar_excluir = document.getElementById('modal-editar')
    modal_adicionar_excluir.style.display = 'flex'
}

function fecharModalEditar() {
    const modal_adicionar_excluir_editar = document.getElementById('modal-editar')
    modal_adicionar_excluir_editar.style.display = 'none'
    select_id_editar.removeEventListener('click', listener_editar, false)
}

const backdrop_adicionar_editar = document.getElementById('backdrop-editar')
backdrop_adicionar_editar.addEventListener('click', (event) => {
    fecharModalEditar() //
});

function editarAnotacao() {

    let titulo_editar = document.getElementById('titulo_editar').value
    let notacao_editar = document.getElementById('notacao_editar').value
    let cor_editar = caixacor_editar.getCor()
    let id = receberid_editar.getId()

    if( cor_editar == null || cor_editar == '' ) {
        cor_editar = caixacor_editar.getCorInicio()
    }

    let elementos_editar = [ titulo_editar, notacao_editar, cor_editar, id ]

    if( titulo_editar != null && notacao_editar != null && cor_editar != null && titulo_editar != '' && notacao_editar != '' && cor_editar != '') {
        passardados_editar_definitivo( 'editar_anotacao', elementos_editar )
    }
}

function passardados_editar_definitivo(tipo_requesicao, valor_requesicao) {

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
        location.reload()
    } )
}