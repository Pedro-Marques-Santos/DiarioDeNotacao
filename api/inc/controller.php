<?php

    function recuperarRequisicao() {
        /* Get content type */
        $contentType = trim($_SERVER["CONTENT_TYPE"] ?? ''); // PHP 8+
        // Otherwise:
        // $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        /* Send error to Fetch API, if unexpected content type */
        if ($contentType !== "application/json")
        die(json_encode([
            'value' => 0,
            'error' => 'Content-Type is not set as "application/json"',
            'data' => null,
        ]));

        /* Receive the RAW post data. */
        $content = trim(file_get_contents("php://input"));

        /* $decoded can be used the same as you would use $_POST in $.ajax */
        $decoded = json_decode($content, true);


        header("Content-Type:application/json");
        return $decoded;
    }


