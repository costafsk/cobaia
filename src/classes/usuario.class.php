<?php

  class Usuario {
    private $CPF;
    private $username;
    private $email;
    private $senha;
    private $projetosConcluidos;

    public function  __construct ($CPF, $username, $email, $senha) {
      $this -> CPF = $CPF;
      $this -> username = $username;
      $this -> email = $email;
      $this -> senha = $senha;
    }

    /**
     * @method Getter
     * @return String
     * @global
     */
    public function getCPF () {
      return $this -> CPF;
    }

    /**
     * @method Getter
     * @return String
     * @global
     */
    public function getUsername () {
      return $this -> username;
    }

    /**
     * @method Getter
     * @return String
     * @global
     */
    public function getEmail () {
      return $this -> email;
    }

    /**
     * @todo Retorna uma lista com * projetos
     * @method Getter
     * @return Array
     * @see classes/projeto.class.php
     * @global
     */
    public function getProjetosConcluidos () {
      return $this -> projetosConcluidos;
    }

    /**
     * @method Setter
     * @param CPF string
     * @global
     */
    public function setCPF ($CPF) {
      $this -> CPF =  $CPF;
    }

    /**
     * @method Setter
     * @param Username string
     * @global
     */
    public function setUsername ($username) {
      $this -> username =  $username;
    }

    /**
     * @method Setter
     * @param email string
     * @global
     */
    public function setEmail ($email) {
      $this -> email =  $email;
    }

  /**
   * @method Setter
   * @param senha string
   * @global
   */
    public function setSenha ($senha) {
      $this -> $senha = $senha;
    }

  /**
   * @method Setter
   * @param projeto object
   * @global
   */
    public function setProjetoConcluido ($projeto) {
      array_push($this -> projetosConcluidos, $projeto);
    }
  }
