<?php

    abstract class DAO {

        /**
         * @todo Cria novo projeto
         * @param Object Classe modelo
         * @method Setter
         * @return Boolean
         */
        public function getConexao () {
            return new PDO ("pgsql:host=localhost;dbname=cobaia;port=5432", "postgres", "");
        }

        /**
         * @todo Cria novo projeto
         * @param Object Classe modelo
         * @method Setter
         * @return Boolean
         */
        abstract protected function cria ($objeto);

        /**
         * @todo Altera projeto
         * @param Object Classe modelo
         * @method Setter
         * @return Boolean
         * @global
         */

        abstract protected function altera ($objeto);

        /**
         * @todo Lista * Classes Modelos
         * @method Setter
         * @return Array
         */

        abstract protected function lista ();

        /**
         * @todo Deleta projeto
         * @param Object Classe modelo
         * @method Setter
         * @return Boolean
         */

        abstract protected function deleta ($ID);

        /**
         * @todo Pega uma unica linha referente ao ID
         * @param Object Classe modelo
         * @method Setter
         * @return Boolean
         */

        abstract protected function busca ($ID);
    }
?>
