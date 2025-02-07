<?php
    namespace PHP\Modelo\Tela;
    require_once('../DAO/Atualizar.php');
    require_once('../DAO/Conexao.php');

    use PHP\Modelo\DAO\Atualizar;
    use PHP\Modelo\DAO\Conexao;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
 <script>
        function mostrarCampos() {
            var campoSelecionado = document.querySelector('select[name="tCampo"]').value;
            var campoTexto = document.getElementById('campoTexto');
            var campoResiduo = document.getElementById('campoResiduo');
            var campoData = document.getElementById('campoData');

            if (campoSelecionado === "nomeResiduo") {
                campoTexto.style.display = "none";
                campoResiduo.style.display = "block";
                campoData.style.display = "none";
            } else if (campoSelecionado === "dt") {
                campoTexto.style.display = "none";
                campoResiduo.style.display = "none";
                campoData.style.display = "block";
            } else {
                campoTexto.style.display = "block";
                campoResiduo.style.display = "none";
                campoData.style.display = "none";
            }
        }
    </script>


        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');
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

        body {
            font-family: poppins;
            background-color: #f8f9fa;
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

        </style>
</head>
<body>
    <a href="Menu2.php">
        <button class="voltar">
            <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024">
                <path d="M874.690416 495.52477c0 11.2973-9.168824 20.466124-20.466124 20.466124l-604.773963 0 188.083679 188.083679c7.992021 7.992021 7.992021 20.947078 0 28.939099-4.001127 3.990894-9.240455 5.996574-14.46955 5.996574-5.239328 0-10.478655-1.995447-14.479783-5.996574l-223.00912-223.00912c-3.837398-3.837398-5.996574-9.046027-5.996574-14.46955 0-5.433756 2.159176-10.632151 5.996574-14.46955l223.019353-223.029586c7.992021-7.992021 20.957311-7.992021 28.949332 0 7.992021 8.002254 7.992021 20.957311 0 28.949332l-188.073446 188.073446 604.753497 0C865.521592 475.058646 874.690416 484.217237 874.690416 495.52477z"></path>
            </svg>
            <span></span>
        </button>
    </a>

<h1>Atualizar Resíduo</h1>
<div class="container mt-5">
    <form method="POST" class="custom-form">
        <div class="mb-3">
            <label class="form-label">Código:</label>
            <input type="number" name="tCodigo" class="form-control" required placeholder="Insira o código">
        </div>

        <div class="mb-3">
            <label style="font-weigth: bold;">Escolha o campo que deseja atualizar:</label>   
            <select name="tCampo" class="form-select" onchange="mostrarCampos()" required>
                <option value="nomePessoa">Nome do Funcionário</option>
                <option value="nomeResiduo">Categoria do Resíduo</option>
                <option value="dt">Data</option>
                <option value="peso">Peso Residuo</option>
            </select>
        </div>

        <!-- Campo para novo dado -->
        <div class="mb-3" id="campoTexto">
            <label class="form-label">Novo Dado:</label>
            <input type="text" name="tNovoDado" class="form-control" required placeholder="Digite aqui">
        </div>

        <div class="button-container">
            <button class="btn" type="submit">
                Atualizar
            </button>
        </div>
    </form>

    <div class="mt-3">
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (!empty($_POST['tCodigo']) && !empty($_POST['tCampo']) && !empty($_POST['tNovoDado'])) {
                    $conexao = new Conexao();
                    $atualizar = new Atualizar();

                    $codigo = intval($_POST['tCodigo']); // Converter para inteiro
                    $campo = $_POST['tCampo'];
                    $novoDado = $_POST['tNovoDado'];

                    // Chamada da função para atualizar os dados
                    $resultado = $atualizar->atualizarResiduo($conexao, $campo, $novoDado, $codigo);

                    // Verifique o resultado e forneça um feedback
                    /*if ($resultado) {
                        echo "<p class='text-success'>Dados atualizados com sucesso!</p>";
                    } else {
                        echo "<p class='text-danger'>Erro ao atualizar os dados. Tente novamente.</p>";
                    }*/
                } else {
                    echo "<p class='text-danger'>Preencha todos os campos!</p>";
                }
            }
        ?>
    </div>
</div>

<script>
    function mostrarCampos() {
        var campoSelecionado = document.querySelector('select[name="tCampo"]').value;
        var campoTexto = document.getElementById('campoTexto');

        // Verifica se a opção selecionada é 'nomeResiduo'
        if (campoSelecionado == 'nomeResiduo') {
            campoTexto.querySelector('input').setAttribute("placeholder", "Digite a categoria do resíduo"); // Atualiza o placeholder
        } else {
            campoTexto.querySelector('input').setAttribute("placeholder", "Digite aqui"); // Reseta o placeholder
        }
    }
</script>


</body>
</html>
