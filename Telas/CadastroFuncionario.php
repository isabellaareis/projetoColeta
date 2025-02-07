<?php
    namespace PHP\Modelo\Telas;
    require_once('..\Funcionario.php');
    require_once('..\DAO\Conexao.php');
    require_once('..\DAO\Inserir.php');
    use PHP\Modelo\Funcionario;
    use PHP\Modelo\DAO\Conexao;
    use PHP\Modelo\DAO\Inserir;
?>

<!DOCTYPE html>
<html lang="PT-Br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Funcionario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');
        body {
            font-family: Poppins;
            background-color: #f8f9fa;
        }

        ::-webkit-scrollbar {
            height: .1rem;
            width: .5rem;
        }

        ::-webkit-scrollbar-track {
            background-color: #99CD85;
        }

        ::-webkit-scrollbar-thumb {
            background-color: #2a6c56;
            border-radius: 5rem;
        }
        
        .custom-form {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 50px auto;
        }

        .custom-form .form-label {
            font-weight: 600;
            color: #495057;
        }

        .custom-form .form-control,
        .custom-form select.custom-select {
            border-radius: 8px;
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ced4da;
            transition: border-color 0.3s;
        }

        .custom-form .form-control:focus,
        .custom-form select.custom-select:focus {
            border-color: #2a6c56;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.25);
        }

        .btn {
            outline: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #94f0a9; /* Cor do botão */
            border: 2px solid #2a6c56; /* Borda com o tom do botão de voltar */
            border-radius: 50px; /* Bordas arredondadas para um botão mais suave */
            box-shadow: 0 4px 12px rgba(0, 0, 0, .1);
            box-sizing: border-box;
            padding: 8px 16px; /* Botão menor */
            color: #00000;
            font-size: 14px; /* Tamanho de fonte menor */
            font-weight: 600;
            letter-spacing: 1.2px;
            text-transform: uppercase;
            cursor: pointer;
            width: 180px;
            margin: 0 auto; /* Centraliza o botão */
            display: block; /* Garante que o botão fique no centro */
        }

        .btn:hover {
            background-color: #2a6c56; /* Cor de fundo do botão de hover */
            border-color: #2a6c56; /* Borda do botão de hover */
            color: white; /* Mantém o texto branco */
            opacity: 0.95;
        }

        .btn .animation {
            border-radius: 100%;
            animation: ripple 0.6s linear infinite;
        }

        /* Centraliza o botão no formulário */
        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 20px; /* Margem para afastar o botão do conteúdo acima */
        }

        @keyframes ripple {
            0% {
                box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.1), 0 0 0 20px rgba(255, 255, 255, 0.1), 0 0 0 40px rgba(255, 255, 255, 0.1), 0 0 0 60px rgba(255, 255, 255, 0.1);
            }

            100% {
                box-shadow: 0 0 0 20px rgba(255, 255, 255, 0.1), 0 0 0 40px rgba(255, 255, 255, 0.1), 0 0 0 60px rgba(255, 255, 255, 0.1), 0 0 0 80px rgba(255, 255, 255, 0);
            }
        }

        .custom-select {
            border-radius: 8px;
            padding: 12px;
        }

        /* Responsividade */
        @media (max-width: 576px) {
            .custom-form {
                padding: 20px;
            }
        }

        /* Centralizar o botão */
        .button-container {
            display: flex;
            justify-content: center;
            width: 100%;
        }

        .voltar {
            margin-top: 20px;
            margin-left: 20px;
            display: flex;
            height: 30px; /* Definindo a altura */
            width: 30px;  /* Largura igual à altura para ser um círculo */
            align-items: center;
            justify-content: center;
            background-color: #fff; /* Fundo branco */
            border-radius: 50%; /* Tornando o botão redondo */
            border: 2px solid #2a6c56; /* Borda com o tom #2a6c56 */
            transition: all 0.2s linear;
            cursor: pointer;
        }

        .voltar>svg {
            font-size: 20px; /* Tamanho do ícone */
            transition: all 0.4s ease-in;
        }

        .voltar:hover>svg {
            font-size: 1.2em;
            transform: translateX(-5px);
        }

        .voltar:hover {
            background-color: #2a6c56; /* Fundo do botão muda para o tom #2a6c56 */
            color: white; /* Texto/marcador do ícone fica branco */
            border: 2px solid #2a6c56; /* A borda permanece na cor do fundo */
            transform: translateY(-2px); /* Efeito de "levitação" */
        }

        h1 {
            color: #2a6c56;
            text-align: center;
            font-weight: 700;
            font-size: 3em;
            font-family: "Poppins", sans-serif;
            text-transform: uppercase;
            letter-spacing: 2px;
            padding: 15px 30px;
            border-radius: 10px;
            background-color: #f4f4f4;
            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.1);
            display: block;
            width: fit-content;
            margin: 20px auto;
        }
    </style>
</head>
<body>

<a href="Menu.php">
        <button class="voltar">
            <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024">
                <path d="M874.690416 495.52477c0 11.2973-9.168824 20.466124-20.466124 20.466124l-604.773963 0 188.083679 188.083679c7.992021 7.992021 7.992021 20.947078 0 28.939099-4.001127 3.990894-9.240455 5.996574-14.46955 5.996574-5.239328 0-10.478655-1.995447-14.479783-5.996574l-223.00912-223.00912c-3.837398-3.837398-5.996574-9.046027-5.996574-14.46955 0-5.433756 2.159176-10.632151 5.996574-14.46955l223.019353-223.029586c7.992021-7.992021 20.957311-7.992021 28.949332 0 7.992021 8.002254 7.992021 20.957311 0 28.949332l-188.073446 188.073446 604.753497 0C865.521592 475.058646 874.690416 484.217237 874.690416 495.52477z"></path>
            </svg>
            <span></span>
        </button>
    </a>

    <h1>Cadastre os Funcionários</h1>
    <form method="POST" class="custom-form">
        <div class="mb-3">
        <label for="Cpf" class="form-label">Código</label>
            <input type="text" class="form-control" id="tCpf" name="tCpf" placeholder="000.000.000-00">
        </div>
        <div class="mb-3">
            <label for="lNome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="tNome" name="tNome" placeholder="Insira seu nome">
        </div>
        <div class="mb-3">
            <label for="lTelefone" class="form-label">Telefone</label>
            <input type="text" class="form-control" id="tTelefone" name="tTelefone" placeholder="(xx) xxxxx-xxxx">
        </div>
        <div class="mb-3">
            <label for="lEndereco" class="form-label">Endereço</label>
            <input type="text" class="form-control" id="tEndereco" name="tEndereco" placeholder="Insira seu endereço">
        </div>
        <div class="mb-3">
            <label for="lEmail" class="form-label">Email</label>
            <input type="text" class="form-control" id="tEmai" name="tEmail" placeholder="insiraUm@email.com">
        </div>
        <div class="mb-3">
            <label for="lSenha" class="form-label">Senha</label>
            <input type="text" class="form-control" id="tSenha" name="tSenha" placeholder="Insira uma senha">
        </div>

         <!-- Centralizando o botão -->
         <div class="button-container">
            <button class="btn" type="submit">
                Cadastrar
                <?php
                 error_reporting(E_ALL & ~E_WARNING);
                 ini_set('display_errors', 0);
                $conexao = new Conexao();//conectar no banco

                if(isset($_POST['tCpf'])){
                    $cpf = $_POST['tCpf'];
                    $nome = $_POST['tNome'];
                    $telefone = $_POST['tTelefone'];
                    $endereco = $_POST['tEndereco'];
                    $email = $_POST['tEmail'];
                    $senha = $_POST['tSenha'];
                //Instaciar
                $inserir = new Inserir();
                echo $inserir->cadastrarFuncionario($conexao, $cpf, $nome, $telefone, $endereco, $email, $senha);
                }
            ?>
            </button>
        </div>
    </form>

   
</body>
</html>