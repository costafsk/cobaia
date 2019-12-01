<?php

  class UsuarioModelo {
    private $CPF;
    private $username;
    private $email;
    private $senha;
    private $descricao;


    public function  __construct ($CPF, $username, $email, $senha = null) {
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
    public function getDescricao () {
      return $this -> descricao;
    }

    /**
     * @method Getter
     * @return String
     * @global
     */
    public function getSenha () {
      return $this -> senha;
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
      $this -> senha = $senha;
    }

  /**
   * @method Setter
   * @param descricao string
   * @global
   */
    public function setDescricao ($descricao) {
      $this -> descricao = $descricao;
    }
  }
