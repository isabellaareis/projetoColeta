<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>

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

       body {
            font-family: 'Poppins', sans-serif;
            background-color: #ffffff;
            color: white;
            overflow-x: hidden;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        .navbar {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 40px;
        }

        .logo {
            display: flex;
            align-items: center;
            font-size: 25px;
            font-weight: bold;
            color: #2a6c56;
            text-decoration: none;
        }


        .signup-btn {
            width: 110px;
            height: 40px;
            padding: 8px 15px;
            border: 2px solid #2a6c56;
            border-radius: 40px;
            background: none;
            cursor: pointer;
            font-size: 14px;
            color: #2a6c56;
            font-weight: bold;
        }

        .signup-btn:hover {
            background: #2a6c56;
            color: #fff;
        }

        .team-section {
            margin-top: 90px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .team-title {
            font-size: 24px;
            font-weight: bold;
            color: #2a6c56;
        }

        .underline {
            width: 50px;
            height: 4px;
            background-color: #74B9A1FF;
            margin: 5px auto;
            border-radius: 2px;
        }

        .team-text {
            font-size: 14px;
            color: #666;
            margin-top: 10px;
        }

        .container {
            justify-content: center;
            margin-top: 50px;
            display: flex;
            flex-direction: column;
            gap: 16px;
            align-items: center;
        }

        .row {
            display: flex;
            gap: 20px;
            justify-content: center;
        }

        .cardP {
            margin-top: 10px;
            border-radius: 10px;
            background-color: #d1d1d1;
            height: 170px;
            width: 250px;
        }

        .cardP img {
            height: 170px;
            width: 250px;
            border-radius: 10px;
        }

        .card-title {
            color: #262626;
            font-size: 1.5em;
            line-height: normal;
            font-weight: 700;
            margin-bottom: 0.5em;
        }

        .small-desc {
            font-size: 1em;
            font-weight: 400;
            line-height: 1.5em;
            color: #452c2c;
        }

        .go-corner {
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            width: 2em;
            height: 2em;
            overflow: hidden;
            top: 0;
            right: 0;
            background: #2a6c56;
            border-radius: 0 4px 0 32px;
        }

        .go-arrow {
            margin-top: -4px;
            margin-right: -4px;
            color: white;
            font-family: courier, sans;
        }

        .cardLarge {
            display: block;
            position: relative;
            width: 500px;
            height: 170px;
            border-radius: 10px;
            padding: 2em 1.2em;
            margin: 12px;
            text-decoration: none;
            z-index: 0;
            overflow: hidden;
            background: #94f0a9;
        }

        .cardLarge:before {
            content: '';
            position: absolute;
            z-index: -1;
            top: -16px;
            right: -16px;
            background: #2a6c56;
            height: 32px;
            width: 32px;
            border-radius: 32px;
            transform: scale(1);
            transform-origin: 60% 37%;
            transition: transform 0.35s ease-out;
        }

        .cardLarge:hover:before {
            transform: scale(28);
        }

        .cardLarge:hover .small-desc {
            transition: all 0.5s ease-out;
            color: rgba(255, 255, 255, 0.8);
        }

        .cardLarge:hover .card-title {
            transition: all 0.5s ease-out;
            color: #ffffff;
        }

        button {
            margin-left: 320px;
            padding: 8px 20px; /* Reduzido o padding */
            border-radius: 50px;
            cursor: pointer;
            border: 0;
            background-color: #2a6c56;
            box-shadow: rgb(0 0 0 / 5%) 0 0 8px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            font-size: 12px; /* Reduzido o tamanho da fonte */
            transition: all 0.5s ease;
            color: #fff;
        }

        button:hover {
            letter-spacing: 3px;
            background-color: hsl(148, 80%, 70%);
            color: #000000; /* Cor da escrita preta no hover */
            box-shadow: 0px 4px 10px 2px rgba(148, 240, 169, 0.7), 0px 2px 4px 0px rgba(148, 240, 169, 0.4);
        }

        button:active {
            letter-spacing: 3px;
            background-color: hsl(148, 80%, 60%);
            color: #94f0a9;
            box-shadow: 0px 4px 10px 2px rgba(148, 240, 169, 0.7), 0px 2px 4px 0px rgba(148, 240, 169, 0.4);
            transform: translateY(10px);
            transition: 100ms;
        }

        .footer {
    margin-top: 80px;
    background: #103A28FF; 
    color: #ffffff; 
    text-align: center;
    padding: 15px 0;
    font-size: 14px;
    font-family: 'Poppins', sans-serif;
}

.footer-container {
    max-width: 100%;
    margin: auto;
}

/* Animação de Fade-In */
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Aplicando a animação de fade-in para o conteúdo */
        .fade-in {
            opacity: 0;
            animation: fadeIn 1s forwards;
        }

        /* Adiciona a animação de Fade-In para o conteúdo */
        .fade-in {
            opacity: 0;
            animation: fadeIn 1s forwards;
            animation-delay: 0.2s; /* Atraso para a animação */
        }

        #progress {
            position: fixed;
            /*background: #103A28FF;*/
            z-index: 1000;
            bottom: 70px;
            right: 10px;
            width: 50px;
            height: 50px;
            display: none;
            place-items: center;
            border-radius: 50%;
            color: #1d002c;
            cursor: pointer;
        }

        #progress-value {
            transform: translate(-2%, -2%);
            display: block;
            height: calc(100% - 12px);
            width: calc(100% - 12px);
            background: #fff;
            border-radius: 50%;
            display: grid;
            place-items: center;
            font-size: 30px ;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <a href="#" class="logo fade-in">Área do Funcionário</a>
        <a href="Login.php">
        <button class="signup-btn fade-in">Sair</button>
        </a>
      
    </nav>

    <section class="team-section fade-in">
        <h2 class="team-title">Bem Vindo!</h2>
        <div class="underline"></div>
        <p class="team-text">Nossa equipe é formada apenas pelos melhores talentos!</p>
    </section>

    <div class="container fade-in">
        <div class="row">
            <div class="cardP">
                <img src="../img/img1.jpg" alt="">
            </div>
            <div class="cardLarge">
                <p class="card-title">Cadastrar Resíduos</p>
                <p class="small-desc">Registre os resíduos agora e ajude na reciclagem e no descarte correto!</p>
                <a href="CadastroResiduo.php">
                    <button>Cadastrar</button>
                </a>
        
                <div class="go-corner">
                    <div class="go-arrow">→</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="cardLarge">
                <p class="card-title">Consultar Resíduos</p>
                <p class="small-desc">Quer saber para onde os resíduos vão? Faça uma consulta rápida!</p>
                <a href="ConsultarResiduo.php">
                    <button>Consultar</button>
                </a>
                <div class="go-corner">
                    <div class="go-arrow">→</div>
                </div>
            </div>
            <div class="cardP">
                <img src="../img/img2.jpg" alt="">
            </div>
        </div>

        <div class="row">
            <div class="cardP">
                <img src="../img/img3.jpg" alt="">
            </div>
            <div class="cardLarge">
                <p class="card-title">Excluir Resíduos</p>
                <p class="small-desc">Exclua os resíduos agora rápido e fácil!</p>
                <a href="ExcluirResiduo2.php">
                    <button>Cadastrar</button>
                </a>
        
                <div class="go-corner">
                    <div class="go-arrow">→</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="cardLarge">
                <p class="card-title">Atualizar Resíduos</p>
                <p class="small-desc">Atualize qualquer Resíduo!</p>
                <a href="AtualizarResiduo2.php">
                    <button>Consultar</button>
                </a>
                <div class="go-corner">
                    <div class="go-arrow">→</div>
                </div>
            </div>
            <div class="cardP">
                <img src="../img/img4.jpg" alt="">
            </div>
        </div>
    </div>

    <footer class="footer">
    <div class="footer-container">
        <p>&copy; 2025 Pesagem Residuos. Todos os direitos reservados.</p>
    </div>
</footer>

<div id="progress">
        <span id="progress-value">
            <i class='bx bx-chevrons-up'></i>
        </span>
    </div>


<script>
    let scrollProgress = document.getElementById("progress");

    // Função para atualizar o progresso da rolagem e exibir a barra
    let calcScrollvalue = () => {
        let pos = document.documentElement.scrollTop;
        let calcHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        let scrollValue = Math.round((pos * 100) / calcHeight);

        // Aplica o progresso circular
        scrollProgress.style.background = `conic-gradient(#103A28FF ${scrollValue}%, #99CD85 ${scrollValue}%)`;

        // Mostra ou esconde o progresso
        if (pos > 100) {
            scrollProgress.style.display = "grid";
        } else {
            scrollProgress.style.display = "none";
        }
    };

    // Evento de clique para rolar até o topo
    if (scrollProgress) {
        scrollProgress.addEventListener("click", () => {
            window.scrollTo({
                top: 0,
                behavior: "smooth" // Rolagem suave
            });
        });
    }

    window.onscroll = calcScrollvalue;
    window.onload = calcScrollvalue;
</script>


</body>
</html>
