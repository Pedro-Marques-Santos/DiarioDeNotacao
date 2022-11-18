<?php

    //dependencies
    //dirname retorna o diretorio ao caminho do pai
    require_once(dirname(__FILE__).'/inc/controller.php');
    require_once(dirname(__FILE__).'/inc/api_response.php');
    require_once(dirname(__FILE__).'/inc/api_logic.php');
    require_once(dirname(__FILE__).'/inc/database.php');

    $valores = recuperarRequisicao();

    // ======================================================================================
    //instancia da api_response
    $api_response = new api_response();

    //set endpoint
    $api_response->set_endpoint($valores['tipo_requesicao']);
    $params = $valores;

    // ======================================================================================
    // prepare the api logic
    $api_logic = new api_logic($api_response->get_endpoint(), $params);

    // ======================================================================================
    // check if endpoint exists
    if(!$api_logic->endpoint_exists()) {
        $api_response->api_request_error('Inexistent endpoint: ' . $api_response->get_endpoint());
    }

    // request to the api_logic,, vai buscar o nome do end_point,, e executa o methodo
    $result = $api_logic->{$api_response->get_endpoint()}();
    $api_response->add_do_data('data', $result);

    $api_response->send_response();

    

    //echo json_encode($valores);

    

?>