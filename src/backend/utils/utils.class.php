<?php

    class Utils {
        private $hash = '76544564bafd4725772c4e8cc8cda3fc27cde44c';

        public function encrypt ($string) {
            $enc = $this -> md5($string);

            return $enc.$hash;
        }

        public function compare ($str1, $str2) {
            return md5(substr($str1, 40)) === $str2; 
        }
    }

?>