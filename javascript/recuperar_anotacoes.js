let  tipo_requesicao = 'get_all_anotacoes'
let  valor_requesicao = ['segunda-feira', 'acordar tarde','amarelo']


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


        //console.log( texto )
        //console.log( texto.data.result )
        
        let i = 0

        texto.data.result.forEach(function(d){
            //console.log(texto.data.result[i].campo_cor);
            let cor = texto.data.result[i].campo_cor;

            //recuperando id da section que vai ficar todos os elementos
            let section_lista = document.getElementById('lista_anotacoes');

            //criando todas os elementos
            let div_principal = document.createElement('div');
            let div_titulo = document.createElement('div');
            let div_conteudo = document.createElement('div');

            //editando os elementos
            div_principal.classList.add("principal-item",`${cor}`);
            div_titulo.classList.add("principal-titulo");
            div_titulo.innerHTML = texto.data.result[i].titulo_anotacao;
            div_conteudo.classList.add("principal-conteudo");
            div_conteudo.innerHTML = texto.data.result[i].conteudonotacao;

            //colocar o id na div principal
            div_principal.id = texto.data.result[i].id_notacao
            div_titulo.id = texto.data.result[i].id_notacao
            div_conteudo.id = texto.data.result[i].id_notacao

            //colocar elementos na div conteudo
            div_principal.appendChild( div_titulo );
            div_principal.appendChild( div_conteudo );

            //adicionar a section
            section_lista.appendChild( div_principal );

            i++;
        }) 

    } )
}