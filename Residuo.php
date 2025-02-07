<?php
    namespace PHP\Modelo;

    class Residuo{
        protected string $odigo;
        protected string $nomePessoa;
        protected date $dt;
        protected string $nomeResiduo;
        protected float $peso;

        public function __construct(int $codigo, string $nomePessoa, string $dt, string $nomeResiduo, float $peso)
        {
            //instanciar
            $this->codigo = $codigo;
            $this->nomePessoa = $nomePessoa;
            $this->dt = $dt;
            $this->nomeResiduo = $nomeResiduo;
            $this->peso = $peso;
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
            return"<br><br>Código: ".$this->codigo.
                  "<br>Nome: ".$this->nomePessoa.
                  "<br>Data: ".$this->dt.
                  "<br>Resíduo: ".$this->nomeResiduo.
                  "<br>Peso: ".$this->peso;
        }//fim do método imprimir

    }//fim da classe pessoa





?>