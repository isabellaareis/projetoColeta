<?php
    namespace PHP\Modelo;
    require_once('Cliente.php');
    use PHP\Modelo\Cliente;

    require_once('Funcionario.php');
    use PHP\Modelo\Funcionario;

    
    //Criando o imprimir
    $cliente1 = new Cliente("12345678910", "Isabella", "11 980806728", "avenida senador vergueiro, 408", 205);

    $funcionario1 = new Funcionario("12345678910", "julia", "11 989506731", "avenida senador vergueiro, 400", 1790);


    //visualizar $person1
    echo $cliente1->imprimir();
    echo $funcionario1->imprimir();



?>