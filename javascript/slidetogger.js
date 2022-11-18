function slidetogger() {

    let slider = document.getElementById('nav-slide')

    if( slider.style.left == "0px" ) {
        slider.style.left = "-270px"
    } else {
        select_id.removeEventListener('click', listener, false)
        select_id_editar.removeEventListener('click', listener_editar, false)
        slider.style.left = "0px"
    }
    
}

window.onclick = function(e) {

    let slider = document.getElementById('nav-slide')
    //verificar se o elemento clicado contem o id
    let verificarid = e.target.classList.contains('menu-icone-principal')
    if(slider.style.left == "0px" && !verificarid) {
        slider.style.left = "-270px"
    }

}