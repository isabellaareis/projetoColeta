<?php
// Incluir a classe de conexão
include('../DAO/Conexao.php');

session_start(); 

$erro_login = ""; 

// Verificar se o formulário foi enviado
if(isset($_POST['email']) || isset($_POST['senha'])) {
    if(strlen($_POST['email']) == 0) {
        $erro_login = "Preencha seu email";
    } else if(strlen($_POST['senha']) == 0){
        $erro_login = "Preencha sua senha";
    } else {
        
        $conexao = new \PHP\Modelo\DAO\Conexao();
        $conn = $conexao->conectar(); 

       
        if($conn) {
            // Obter dados do formulário
            $email = $conn->real_escape_string($_POST['email']);
            $senha = $conn->real_escape_string($_POST['senha']);

            // Consultar o banco de dados para verificar o email e a senha
            $sql_code = "SELECT * FROM funcionario WHERE email = '$email' AND senha = '$senha'";
            $sql_query = $conn->query($sql_code);

            // Verificar se o usuário existe
            if($sql_query->num_rows == 1) {
                $usuario = $sql_query->fetch_assoc();

                // Armazenar os dados do usuário na sessão
                $_SESSION['id'] = $usuario['codigo'];
                $_SESSION['nome'] = $usuario['nome'];

                // Verificar se "adm" está presente no email ou na senha
                $redirect_page = (stripos($email, 'adm') !== false || stripos($senha, 'adm') !== false) ? 'Menu.php' : 'Menu2.php';
                header("Location: $redirect_page");
                exit; // Sempre usar exit após header para evitar que o código continue executando
                
            } else {
                $erro_login = "Erro ao logar! Email ou senha incorretos.";
            }
        } else {
            $erro_login = "Erro de conexão com o banco de dados.";
        }
    }
}
?>

<!-- Formulário HTML para o login -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="estilo.css">

    <style>
               
            body {
                margin: 0;
                padding: 0;
                font-family: sans-serif;
                height: 100vh;
                background: #05181C; 
                display: flex;
                justify-content: center;
                align-items: center;
            }

     
        .background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('../img/fundo5.jpg');
            background-size: cover;
            background-position: center;
            animation: fadeInBackground 2.2s ease-in-out forwards; 
        }

       
        @keyframes fadeInBackground {
            0% {
                opacity: 0; /* Começa invisível */
            }
            100% {
                opacity: 1; /* Fica visível ao final */
            }
        }
        .voltar-index {
        position: fixed; 
        top: 20px;
        left: 20px; 
        display: flex;
        height: 30px; 
        width: 30px;  
        align-items: center;
        justify-content: center;
        background: white;
        border-radius: 50%; 
        border: 2px solid #FFFFFFFF; 
        transition: all 0.2s linear;
        cursor: pointer;
        z-index: 9999; 
    }

    .voltar-index>svg {
        font-size: 20px;
        transition: all 0.4s ease-in;
    }

    .voltar-index:hover>svg {
        font-size: 1.2em;
        transform: translateX(-5px);
    }

    .voltar-index:hover {
        background-color: #FFFFFFFF; 
        color: white; 
        border: 2px solid #FFFFFFFF; 
        transform: translateY(-2px); 
    }

    

    </style>
</head>
<body>

    <div class="background"></div>

    <a href="../html/index.html">
        <button class="voltar-index">
            <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024">
                <path d="M874.690416 495.52477c0 11.2973-9.168824 20.466124-20.466124 20.466124l-604.773963 0 188.083679 188.083679c7.992021 7.992021 7.992021 20.947078 0 28.939099-4.001127 3.990894-9.240455 5.996574-14.46955 5.996574-5.239328 0-10.478655-1.995447-14.479783-5.996574l-223.00912-223.00912c-3.837398-3.837398-5.996574-9.046027-5.996574-14.46955 0-5.433756 2.159176-10.632151 5.996574-14.46955l223.019353-223.029586c7.992021-7.992021 20.957311-7.992021 28.949332 0 7.992021 8.002254 7.992021 20.957311 0 28.949332l-188.073446 188.073446 604.753497 0C865.521592 475.058646 874.690416 484.217237 874.690416 495.52477z"></path>
            </svg>
            <span></span>
        </button>
    </a>
    <div class="login-box">
        <h2>Login</h2>
        <form action="" method="POST">
            <div class="user-box">
                <input type="text"  name="email" required>
                <label>Email</label>
            </div>
            <div class="user-box">
                <input type="password" name="senha" required>
                <label >Senha</label>
            </div>
            <button type="submit" >
                <span></span>
                <span></span>
                <span></span>
                <span></span>Entrar
            </button>
        </form>
    </div>

      <!-- Modal de erro -->
    <div id="errorModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p><?php echo $erro_login; ?></p>
        </div>
    </div>

    <script>
        window.onload = function() {
            var errorMessage = "<?php echo $erro_login; ?>";
            if (errorMessage !== "") {
                var modal = document.getElementById("errorModal");
                var closeBtn = document.getElementsByClassName("close")[0];

                modal.style.display = "block"; // Exibe o modal

                // Fechar modal ao clicar no botão de fechar (X)
                closeBtn.onclick = function() {
                    modal.style.display = "none";
                };

                // Fechar modal ao clicar fora dele
                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                };
            }
        };
    </script>

</body>
</html>
