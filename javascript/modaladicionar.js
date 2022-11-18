class CaixaCor {

    constructor() {
        this.cor = null
        this.cor_retornar_editar = null
    }

    getCor() {
        let x = this.cor
        return x
    }

    getCorInicio() {
        let x = this.cor_retornar_editar
        return x
    }

    setCor(cor) {
        this.cor = cor
    }

    setCorInicio(cor) {
        this.cor_retornar_editar = cor
    }

}

let caixacor = new CaixaCor()

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

const select_cor = document.getElementById('select_cor')
select_cor.addEventListener('click', (event) => {

    let elementoevent = event.target.classList
    if( !elementoevent.contains('area-cor') ) {
        return 0
    }

    let tipo_cor_selecionada;

    if( elementoevent.contains('area-cor') ) {
        if( elementoevent.contains('cor-1') ) {
            tipo_cor_selecionada = 'cor-1'
        } else 
        if( elementoevent.contains('cor-2') ) {
            tipo_cor_selecionada = 'cor-2'
        } else 
        if( elementoevent.contains('cor-3') ) {
            tipo_cor_selecionada = 'cor-3'
        }
        caixacor.setCor( tipo_cor_selecionada )

    }

});

function abrirFormAdicionar() {
    
    let titulo = document.getElementById('titulo').value
    let notacao = document.getElementById('notacao').value
    let cor = caixacor.getCor()

    let tipo_requesicao = 'salvar_anotacao'
    let valor_requesicao = [ titulo, notacao, cor ]

    console.log( valor_requesicao )

    if( titulo != null && notacao != null && cor != null && titulo != '' && notacao != '' && cor != '') {
        passardados(tipo_requesicao, valor_requesicao)

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
                console.log( texto )
    
                const modal_adicionar = document.getElementById('modal-adicionar')
                modal_adicionar.style.display = 'none'
                location.reload()
    
            })
        }
    }

}

