
<!DOCTYPE html>

<html>

    <head>
        <title>Diário de Notação</title>
        <meta charset="utf-8">

        <link rel="stylesheet" type="text/css" href="css/estilo.css" >
        <link rel="stylesheet" type="text/css" href="css/moda_excluir.css" >
        <link rel="stylesheet" type="text/css" href="css/moda_editar.css" >
        <link rel="stylesheet" type="text/css" href="css/normalize.css" >
        <script src="https://kit.fontawesome.com/58a5b6c916.js" crossorigin="anonymous"></script>

        <script defer src="javascript/evento_listener_icone.js"></script>
        <script src="javascript/slidetogger.js"></script>
        <script defer src="javascript/modaladicionar.js"></script>
        <script defer src="javascript/evento_listener_cor.js"></script>
        <script defer src="javascript/recuperar_anotacoes.js"></script>
        <script defer src="javascript/excluir_anotacao.js"></script>
        <script defer src="javascript/editar_anotacao.js"></script>

        

    </head>

    <body>

        <!-- MODAL ADICIONAR -->
        <div id="modal-adicionar">
            <div id="backdrop-adicionar"></div>
            <div id="modal-content-adicionar">
                <div class="modal-content-adicionar">
                    <div class="titulo-modal">
                        <div class="titulo-modal-principal">Fazer anotação</div>
                        <div class="incone-fechar" onclick="fecharModalAdicionar()">&#x2718</div>
                    </div>
                    <div id="form_adicionar">
                        <div class="modal-adicionar-input"><input id="titulo" type="text" class="modal-titulo-postagem" placeholder="Título"></div>
                        <div class="modal-adicionar-input"><textarea id="notacao" type="text" class="modal-conteudo-postagem" placeholder="Observação"></textarea></div>
                        <div>
                            <div class="modal-cores-container" id="select_cor">
                                <div class="area-cor cor-1" value="cor-1"></div>
                                <div class="area-cor cor-2" value="cor-2"></div>
                                <div class="area-cor cor-3" value="cor-3"></div>
                                <button onclick="abrirFormAdicionar()" class="marcador-ok area-cor"><div class="icone-ok"><i class="fa-solid fa-check"></div></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL EXCLUIR -->
        <div id="modal-excluir">
            <div id="backdrop-excluir"></div>
            <div id="modal-content-excluir">
                <div class="modal-content-excluir-titulo">
                    <div class="modal-content-excluir-iten1">Você deseja excluir a anotação</div>
                    <div class="item-excluir" id="titulo_anotacao"></div>
                </div>
                <div class="modal-content-excluir-executar">
                    <div class="modal-content-excluir-iten1 area-conteudo-excluir area-excluir" onclick="deletarAnotacao()">excluir</div>
                    <div class="area-conteudo-excluir area-cancelar" onclick="fecharModalExcluir()">cancelar</div>
                </div>
            </div>
        </div>

        <!-- MODAL EDITAR -->
        <div id="modal-editar">
            <div id="backdrop-editar"></div>
            <div id="modal-content-editar">
                <div class="modal-content-editar">
                    <div class="titulo-modal">
                        <div class="titulo-modal-principal">Editar anotação</div>
                        <div class="incone-fechar" onclick="fecharModalEditar()">&#x2718</div>
                    </div>
                    <div id="form_adicionar">
                        <div class="modal-adicionar-input"><input id="titulo_editar" type="text" class="modal-titulo-postagem" placeholder="Título"></div>
                        <div class="modal-adicionar-input"><textarea id="notacao_editar" type="text" class="modal-conteudo-postagem" placeholder="Observação"></textarea></div>
                        <div>
                            <div class="modal-cores-container" id="select_cor_editar">
                                <div class="area-cor cor-1" value="cor-1"></div>
                                <div class="area-cor cor-2" value="cor-2"></div>
                                <div class="area-cor cor-3" value="cor-3"></div>
                                <button onclick="editarAnotacao()" class="marcador-ok area-cor"><div class="icone-ok"><i class="fa-solid fa-check"></div></i></button>
                            </div>
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
            <p class="slide-item" id="abrir_anotacao_excluir" onclick="excluir_anotacao()">Excluir</p>
            <p class="slide-item" onclick="editar_anotacao()">Editar</p>
        </section>

        <section class="principal" id="lista_anotacoes">
            
        </section>

    </body>

</html>