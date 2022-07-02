
<!DOCTYPE html>

<html>

    <head>
        <title>Diário de Notação</title>
        <meta charset="utf-8">

        <link rel="stylesheet" type="text/css" href="css/estilo.css" >
        <link rel="stylesheet" type="text/css" href="css/normalize.css" >
        <script src="https://kit.fontawesome.com/58a5b6c916.js" crossorigin="anonymous"></script>

        <script src="javascript/slidetogger.js"></script>
        <script defer src="javascript/modaladicionar.js"></script>

        

    </head>

    <body>

        <div id="modal-adicionar">
            <div id="backdrop-adicionar"></div>
            <div id="modal-content-adicionar">
                <div class="modal-content-adicionar">
                    <div class="titulo-modal">
                        <div class="titulo-modal-principal">Fazer anotação</div>
                        <div class="incone-fechar" onclick="fecharModalAdicionar()">&#x2718</div>
                    </div>
                    <form>
                        <div class="modal-adicionar-input"><input type="text" class="modal-titulo-postagem" placeholder="Título"></div>
                        <div class="modal-adicionar-input"><textarea type="text" class="modal-conteudo-postagem" placeholder="Observação"></textarea></div>
                    </form>
                    <div>
                        <div class="modal-cores-container">
                            <div class="marcador-ok area-cor"><div class="icone-ok"><i class="fa-solid fa-check"></div></i></div>
                            <div class="area-cor cor-1"></div>
                            <div class="area-cor cor-2"></div>
                            <div class="area-cor cor-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <header class="topo">
            <div>
                <nav class="menu">
                    <div class="menu-item" id="nav-btn" onclick="slidetogger()">
                        <i class="fa-solid fa-align-justify menu-icone-principal"></i>
                    </div>
                    <div class="menu-item-logo">Diário Pessoal</div>
                </nav>
            </div>
        </header>

        <section id="nav-slide">
            <p class="slide-item" onclick="adicionarNotacao()">Adicionar Notação</p>
            <p class="slide-item">Excluir</p>
        </section>

        <section class="principal">
            <div class="principal-item cor-1">
                <div class="principal-titulo">Titulo</div>
                <div class="principal-conteudo">Conteúdo</div>
            </div>
            <div class="principal-item cor-2">
                <div class="principal-titulo">Titulo</div>
                <div class="principal-conteudo">Conteúdo</div>
            </div>
            <div class="principal-item cor-3">
                <div class="principal-titulo">Titulo</div>
                <div class="principal-conteudo">Conteúdo</div>
            </div>
            <div class="principal-item cor-3">
                <div class="principal-titulo">Titulo</div>
                <div class="principal-conteudo">Conteúdo</div>
            </div>
            <div class="principal-item cor-3">
                <div class="principal-titulo">Titulo</div>
                <div class="principal-conteudo">Conteúdo</div>
            </div>
            <div class="principal-item cor-1">
                <div class="principal-titulo">Titulo</div>
                <div class="principal-conteudo">Conteúdo</div>
            </div>
            <div class="principal-item cor-2">
                <div class="principal-titulo">Titulo</div>
                <div class="principal-conteudo">Conteúdo</div>
            </div>
        </section>

    </body>

</html>