<?php

  class ProjetoModelo {
    private $ID;
    private $titulo;
    private $criador;
    private $valor;
    private $prazo;
    private $moeda;
    private $status;
    private $descricao;
    private $tipoDePagamento;
    private $freelancer = null;

    public function  __construct ($titulo, $criador, $valor, $prazo, $moeda, $descricao, $nota, $tipoDePagamento, $status = null) {
      $this -> titulo = $titulo;
      $this -> criador = $criador;
      $this -> valor = $valor;
      $this -> prazo = $prazo;
      $this -> status = $status;
      $this -> descricao = $descricao;
      $this -> tipoDePagamento = $tipoDePagamento;
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
    public function getFreelancer () {
      return $this -> freelancer;
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
     * @method Getter
     * @return String
     * @global
     */

     public function getMoeda () {
      return $this -> moeda;
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
     * @param Object
     * @global
     */
    public function setFreelancer ($freelancer) {
      $this -> freelancer = $freelancer;
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
