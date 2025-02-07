<?php
    namespace PHP\Modelo;

    class Pessoa{
        protected string $cpf;
        protected string $nome;
        protected string $telefone;
        protected string $endereco;

        public function __construct(string $cpf, string $nome, string $telefone, string $endereco)
        {
            //instanciar
            $this->cpf = $cpf;
            $this->nome = $nome;
            $this->telefone = $telefone;
            $this->endereco = $endereco;
        }//fim do contrutor

        public function __get(string $variavel):mixed
        {
            return $this->variavel;
        }//fim do get

        public function __set(string $variavel, string $novoDado):void//void não retorna nenhum dado
        {
            $this->varaivel = $novoDado;
        }//fim do set

        public function imprimir():string
        {
            return"<br><br>CPF: ".$this->cpf.
                  "<br>Nome: ".$this->nome.
                  "<br>Telefone: ".$this->telefone.
                  "<br>Endereço: ".$this->endereco;
        }//fim do método imprimir

    }//fim da classe pessoa




?>