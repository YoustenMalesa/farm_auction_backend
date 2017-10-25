<?php
    class ResponseUtils {
        private $message;
        private $code;
        private $response;


        public function setMessage($newMessage) {
            $this->message = $newMessage;
        }

        public function setCode($newCode) {
            $this->code = $newCode;
        }

        public function setResponse($newResponse) {
            $this->response = $newResponse;
        }

        public function getMessage() {
            return $this->message;
        }

        public function getCode() {
            return $this->code;
        }

        public function getResponse() {
            return $this->response;
        }

        public function exponse() {
            return get_object_vars($this);
        }
    }

?>