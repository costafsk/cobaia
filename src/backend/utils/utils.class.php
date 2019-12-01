<?php

    class Utils {
        private $hash = '76544564bafd4725772c4e8cc8cda3fc27cde44c';

        public function encrypt ($string) {
            $enc = md5($string);

            return $enc.$this -> hash;
        }

        public function compare ($userpass, $saved) {
            return md5($userpass).$this->hash === $saved;
        }
    }

?>
