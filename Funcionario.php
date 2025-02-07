<?php
    namespace PHP\Modelo;
    require_once('Pessoa.php');
    use PHP\Modelo\Pessoa;

    Class Funcionario extends Pessoa{
        protected float $salario;

        public function __construct(string $cpf, string $nome, string $telefone, string $endereco, string $email, string $senha)
        {
            parent::__construct($cpf, $nome, $telefone, $endereco);
            $this->email = $email;
            $this->senha = $senha;
        }//fim do contrutor

        public function __get(string $variavel):mixed
        {
            return $this->variavel;
        }//fim do get

        public function __set(string $variavel, string $novoDado):void
        {
            $this->variavel = $novoDado;
        }//fim do set

        public function imprimir():string
        {
            return parent::imprimir().
                   "<br>Email: ".$this->email;
                   "<br>Senha: ".$this->senha;
                   

        }//fim do metodo
    }





?>