<?php
    interface Authenticator{
        public function hashPassword();
        public function isPasswordCorrect();
    }
?>