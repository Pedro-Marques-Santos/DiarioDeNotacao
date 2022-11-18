// evento de cor EDITAR
let caixacor_editar = new CaixaCor()

const select_cor_eidtar = document.getElementById('select_cor_editar')
select_cor_eidtar.addEventListener('click', (event) => {

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
        caixacor_editar.setCor( tipo_cor_selecionada )
        //console.log( tipo_cor_selecionada )
    }

});