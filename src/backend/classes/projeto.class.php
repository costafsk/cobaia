<?php

  class ProjetoModelo {
    private $ID;
    private $titulo;
    private $tipoDePagamento;
    private $valor;
    private $prazo;
    private $descricao;
    private $criador;
    private $moeda;
    private $status;

    public function  __construct ($titulo, $criador, $valor, $prazo, $moeda, $descricao, $tipoDePagamento, $status = 'D') {
      $this -> titulo = $titulo;
      $this -> criador = $criador;
      $this -> valor = $valor;
      $this -> prazo = $prazo;
      $this -> status = $status;
      $this -> moeda = $moeda;
      $this -> descricao = $descricao;
      $this -> tipoDePagamento = $tipoDePagamento;
    }

    /**
     * @method Getter
     * @return String
     * @global
     */
    public function getID () {
      return $this -> ID;
    }

    /**
     * @method Getter
     * @return String
     * @global
     */
    public function getMoeda () {
      return $this -> moeda;
    }

    /**
     * @method Getter
     * @return String
     * @global
     */
    public function getStatus () {
      return $this -> status;
    }

    /**
     * @method Getter
     * @return String
     * @global
     */
    public function getTitulo () {
      return $this -> titulo;
    }

    /**
     * @method Getter
     * @return String
     * @global
     */
    public function getDescricao () {
      return $this -> descricao;
    }

    /**
     * @method Getter
     * @return String
     * @global
     */
    public function getTipoDePagamento () {
      return $this -> tipoDePagamento;
    }

    /**
     * @todo Traz a classe Usuario
     * @see classes/projeto.class.php
     * @method Getter
     * @return Object
     * @global
     */
    public function getCriador () {
      return $this -> criador;
    }

    /**
     * @method Getter
     * @return String
     * @global
     */
    public function getValor () {
      return $this -> valor;
    }

    /**
     * @method Getter
     * @return String
     * @global
     */
    public function getPrazo () {
      return $this -> prazo;
    }

    /**
     * @method Setter
     * @param String $titulo
     * @global
     */
    public function setID ($ID) {
      $this -> ID = $ID;
    }

    /**
     * @method Setter
     * @param String $titulo
     * @global
     */
    public function setTitulo ($titulo) {
      $this -> titulo = $titulo;
    }

    /**
     * @todo Seta a propriedade criador com uma instancia da classe criador
     * @see classes/projeto.class.php
     * @param Object $criador
     * @method Setter
     * @global
     */
    public function setCriador ($criador) {
      $this -> criador = $criador;
    }

    /**
     * @method Setter
     * @param Number $valor
     * @global
     */
    public function setValor ($valor) {
      $this -> valor = $valor;
    }

    /**
     * @method Getter
     * @param String $prazo
     * @global
     */
    public function setPrazo ($prazo) {
      $this -> prazo = $prazo;
    }

    /**
     * @method Setter
     * @param String $prazo
     * @global
     */
    public function setDescricao ($desc) {
      $this -> descricao = $desc;
    }

    /**
     * @method Setter
     * @param String
     * @global
     */
    public function setTipoDePagamento ($tipo) {
      $this -> tipoDePagamento = $tipo;
    }

    /**
     * @method Setter
     * @param String
     * @global
     */

    public function setMoeda ($moeda) {
      $this -> moeda = $moeda;
    }

    /**
     * @method Setter
     * @param String
     * @global
     */
    public function setStatus ($status) {
      $this -> status = $status;
    }
  }
