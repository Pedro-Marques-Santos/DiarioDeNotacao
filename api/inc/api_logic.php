<?php

    require_once('database.php');

    class api_logic 
    {

        private $endpoint;
        private $params;

        // ---------------------------------------------------------------
        public function __construct($endpoint, $params = 'null')
        {
            //defines the object/class properties
            $this->endpoint = $endpoint;
            $this->params = $params;
        }
        

        public function endpoint_exists() {
            //check if the endpoint is a valid class method , procura dentro dessa class, se existe uma funcao ou method com esse nome
            return method_exists($this, $this->endpoint);
        }
        


        // ---------------------------------------------------------------
        // ---------------------------------------------------------------
        // ENDPOINTS
        // ---------------------------------------------------------------
        // ---------------------------------------------------------------

        public function status() {
            return [
                'status' => 'SUCCESS',
                'message' => 'API is running ok STATUS!',
                'result' => null
            ];
        }

        public function get_all_anotacoes() {
            // return all anotações
            $db = new database();
            $results = $db->EXE_QUERY( "SELECT * FROM tb_notacao" );

            return [
                'status' => 'SUCCESS',
                'message' => 'Recuperar Anotacoes!',
                'result' => $results
            ];
        }

        public function salvar_anotacao() {
            // salvar anotacao
            $db = new database();

            //$result = $this->params['valor_requesicao'][0];

            //add new notacao
            $result = [
                ':conteudonotacao' => $this->params['valor_requesicao'][1],
                ':campo_cor' => $this->params['valor_requesicao'][2],
                ':titulo_anotacao' => $this->params['valor_requesicao'][0],
            ];

            $db->EXE_QUERY(
                "
                    INSERT INTO tb_notacao VALUES(
                        0,
                        :conteudonotacao,
                        :campo_cor,
                        :titulo_anotacao
                    )
                ", $result);

            return [
                'status' => 'SUCCESS',
                'message' => 'Anotacao adicionada ao banco de dados',
                'result' => $result
            ];
        }

        public function get_anotacao() {
            // retornar todas as anotacoes

            $valor_id = intval($this->params['valor_requesicao'][0]);

            $sql = ("SELECT * FROM tb_notacao WHERE id_notacao = " . $valor_id );

            $db = new database();
            $result = $db->EXE_QUERY($sql);

            return [
                'status' => 'SUCCESS',
                'message' => 'Anotacao recuperada',
                'result' => $result
            ];

        }

        public function deletar_anotacao() {
            //  deletar a anotacao

            $valor_id = intval($this->params['valor_requesicao']);

            $sql = ("DELETE FROM tb_notacao WHERE id_notacao = ". $valor_id );

            $db = new database();
            $result = $db->EXE_NON_QUERY($sql);

            return [
                'status' => 'SUCCESS',
                'message' => 'Anotacao recuperada',
                'result' => $result
            ];
        }

        public function editar_anotacao() {
            // editar anotacao

            //add params uma nova edicao da notacao
            /*
            $result = [
                ':valorid' => $this->params['valor_requesicao'][3][0],
                ':conteudonotacao' => $this->params['valor_requesicao'][1],
                ':campo_cor' => $this->params['valor_requesicao'][2],
                ':titulo_anotacao' => $this->params['valor_requesicao'][0]
            ];
            */

            $result = [
                ':valorid' => $this->params['valor_requesicao'][3][0],
                ':conteudonotacao' => $this->params['valor_requesicao'][1],
                ':campo_cor' => $this->params['valor_requesicao'][2],
                ':titulo_anotacao' => $this->params['valor_requesicao'][0]
            ];

            $db = new database();

            $db->EXE_NON_QUERY(
                "
                    UPDATE  tb_notacao SET
                        conteudonotacao = :conteudonotacao,
                        campo_cor = :campo_cor,
                        titulo_anotacao = :titulo_anotacao
                    WHERE id_notacao = :valorid

                ", $result);

            return [
                'status' => 'SUCCESS',
                'message' => 'Anotacao recuperada',
                'result' => $result
            ];
        }

    }