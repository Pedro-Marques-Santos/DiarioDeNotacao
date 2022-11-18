<?php

    class api_response {

        private $data;

        public function __construct() {
            $this->data = [];
        }

        // ======================================================================================
        public function set_endpoint($endpoint) {
            // set the request endpoint
            $this->data['endpoint'] = $endpoint;
        }

        // ======================================================================================
        public function get_endpoint() {
            return $this->data['endpoint'];
        }

        // ======================================================================================
        public function api_request_error($message = '') {
            // output an api error mesage

            $data_error = [
                'status' => 'ERROR',
                'message' => $message,
                'results' => null
            ];

            $this->data['data'] = $data_error;
            $this->send_response();
        }

        // ======================================================================================
        public function send_api_status() {
            // output an api error mesage
            $this->data['status'] = 'SUCCESS';
            $this->data['message'] = 'API is Running ok!';
            $this->send_response();
        }

        // ======================================================================================
        public function send_response($message = '') {
            // output final response
            header("Content-Type:application/json");
            echo json_encode($this->data);
            die(1);
        }

        // ======================================================================================
        public function add_do_data($key, $value) {
            // add new key to data
            $this->data[$key] = $value;
        }

    }

?>