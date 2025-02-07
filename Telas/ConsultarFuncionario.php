<?php
    namespace PHP\Modelo\Tela;
    require_once('..\DAO\Consultar.php');
    require_once('..\DAO\Conexao.php');
    use PHP\Modelo\DAO\Consultar;
    use PHP\Modelo\DAO\Conexao;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Funcionario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');
            body {
                font-family: poppins;
                background-color: #f8f9fa;
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
            margin: 20px auto 80px auto; /* Adicionei margin-bottom de 30px para o espaçamento */
        }

        .consult-form {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-top: 100px;
            padding: 20px;
            border-radius: 10px;
            background-color: #f5f5f5;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 0 auto;
        }
                .consult-form label {
                    font-size: 16px;
                    font-weight: 600;
                    color: #2a6c56;
                    margin-bottom: 10px;
                    text-align: center;
                }

                .consult-form input {
                    width: 100%;
                    padding: 10px;
                    margin-bottom: 20px;
                    border: 2px solid #2a6c56;
                    border-radius: 30px;
                    font-size: 16px;
                    outline: none;
                    transition: border-color 0.3s ease-in-out;
                }

                .consult-form input:focus {
                    border-color: #74B9A1FF;
                }

                .consult-form button {
                    width: 100%;
                    padding: 12px;
                    border: none;
                    border-radius: 30px;
                    background-color: #2a6c56;
                    color: #fff;
                    font-size: 16px;
                    font-weight: bold;
                    cursor: pointer;
                    transition: background-color 0.3s ease, transform 0.2s ease-in-out;
                }

                .consult-form button:hover {
                    background-color: #74B9A1FF;
                    transform: translateY(-2px);
                }

                .consult-form button:active {
                    background-color: #2a6c56;
                    transform: translateY(1px);
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

    <h1>Consultar Funcionários</h1>
    <form method="post" class="consult-form">
        <label for="tCpf">Informe um Código</label>
        <input type="text" name="tCpf" id="tCpf" placeholder="000.000.000-00" required/>
        <button type="submit">Consultar
        <?php
                error_reporting(E_ALL & ~E_WARNING);
                ini_set('display_errors', 0);

                $conexao = new Conexao();
                $cpf     = $_POST['tCpf'];
                $consultar = new Consultar();
            ?>
        </button>
    </form>

    <?php
        if(isset($_POST['tCpf'])){
            echo $consultar->consultarFuncionarioIndividual($conexao,$cpf);
        }else{
            /*echo "Preencha o campo CPF";*/
        }
    ?>
    

</body>
</html>