<?php
    namespace PHP\Modelo\Telas;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="estilo.css">
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
            margin-top: 80px;
            justify-content: center;
            display: flex;
            flex-wrap: wrap; 
            gap: 20px; 
        }

        .card1 {
            cursor:pointer;
            border-radius: 20px;
            background-color: #94f0a9;
            width: 240px;
            height: 420px;
            position: relative;
            z-index: 0;
            overflow: hidden;
            text-decoration: none;
        }

        .card1:before {
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
            transform-origin: 35% 20%;
            transition: transform 0.35s ease-out;
        }

        .card1:hover:before {
            transform: scale(28);
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

        .title-1 {
            margin-left: 20px;
            margin-top: 50px;
            color: #452c2c;
            font-size: 1.8em;
            line-height: normal;
            font-weight: 700;
            margin-bottom: 0.5em;
        }


        .p1 {
            margin-top: 30px;
            margin-left: 20px;
            max-width: 200px;
            font-size: 1em;
            font-weight: 500;
            line-height: 1.5em;
            color: #452c2c;

        }

        .card1:hover .p1 {
            transition: all 0.5s ease-out;
            color: #fff;
        }

        .card1:hover .title-1 {
            transition: all 0.5s ease-out;
            color: #fff;
        }

    
        .card2 {
            cursor:pointer;
            border-radius: 20px;
            background-color: #94f0a9;
            width: 440px;
            height: 220px;
            position: relative;
            z-index: 0;
            overflow: hidden;
            text-decoration: none;
        }


        .card2:before {
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
            transform-origin: 55% 50%;
            transition: transform 0.35s ease-out;
        }

        .card2:hover:before {
            transform: scale(28);
        }

        .title-2 {
            margin-left: 20px;
            margin-top: 30px;
            color: #452c2c;
            font-size: 1.8em;
            line-height: normal;
            font-weight: 700;
            margin-bottom: 0.5em;
        }


        .p2 {
            margin-top: 20px;
            margin-left: 20px;
            max-width: 400px;
            font-size: 1em;
            font-weight: 500;
            line-height: 1.5em;
            color: #452c2c;

        }

        .card2:hover .p2 {
            transition: all 0.5s ease-out;
            color: #fff;
        }

        .card2:hover .title-2 {
            transition: all 0.5s ease-out;
            color: #fff;
        }

        .card3 {
            cursor:pointer;
            border-radius: 20px;
            background-color: #94f0a9;
            width: 210px;
            height: 180px;
            margin-top: 240px; 
            margin-left: -458px;
            position: relative;
            z-index: 0;
            overflow: hidden;
            text-decoration: none;
        }

    
        .title-3 {
            margin-left: 20px;
            margin-top: 30px;
            color: #452c2c;
            font-size: 1.2em;
            line-height: normal;
            font-weight: 700;
            margin-bottom: 0.5em;
        }


        .p3 {
            margin-top: 20px;
            margin-left: 20px;
            max-width: 400px;
            font-size: 1em;
            font-weight: 500;
            line-height: 1.5em;
            color: #452c2c;

        }

        .card3:hover .p3 {
            transition: all 0.5s ease-out;
            color: #fff;
        }

        .card3:hover .title-3 {
            transition: all 0.5s ease-out;
            color: #fff;
        }

        .card3:before {
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
            transform-origin: 50% 50%;
            transition: transform 0.35s ease-out;
        }

        .card3:hover:before {
            transform: scale(28);
        }



        .card4 {
            cursor:pointer;
            border-radius: 20px;
            background-color: #94f0a9;
            width: 210px;
            height: 180px;
            margin-top: 240px; 
            position: relative;
            z-index: 0;
            overflow: hidden;
            text-decoration: none;
        }

        .title-4 {
            margin-left: 20px;
            margin-top: 20px;
            color: #452c2c;
            font-size: 1.2em;
            line-height: normal;
            font-weight: 700;
            margin-bottom: 0.5em;
        }


        .p4 {
            margin-top: 10px;
            margin-left: 20px;
            font-size: 1em;
            font-weight: 500;
            line-height: 1.5em;
            color: #452c2c;

        }

        .card4:hover .p4 {
            transition: all 0.5s ease-out;
            color: #fff;
        }

        .card4:hover .title-4 {
            transition: all 0.5s ease-out;
            color: #fff;
        }

        .card4:before {
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
            transform-origin: 50% 50%;
            transition: transform 0.35s ease-out;
        }

        .card4:hover:before {
            transform: scale(28);
        }


        .card5 {
            cursor:pointer;
            border-radius: 20px;
            width: 470px;
            height: 180px;
            background-color: #94f0a9;
            margin-top: 435px;
            margin-left: -720px;
            position: relative;
            z-index: 0;
            overflow: hidden;
            text-decoration: none;
        }

        .title-5 {
            margin-left: 20px;
            margin-top: 30px;
            color: #452c2c;
            font-size: 1.2em;
            line-height: normal;
            font-weight: 700;
            margin-bottom: 0.5em;
        }


        .p5 {
            margin-top: 20px;
            margin-left: 20px;
            font-size: 1em;
            font-weight: 500;
            line-height: 1.5em;
            color: #452c2c;

        }

        .card5:hover .p5 {
            transition: all 0.5s ease-out;
            color: #fff;
        }

        .card5:hover .title-5 {
            transition: all 0.5s ease-out;
            color: #fff;
        }

        .card5:before {
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
            transform-origin: 55% 45%;
            transition: transform 0.35s ease-out;
        }

        .card5:hover:before {
            transform: scale(28);
        }

        .card6 {
            cursor:pointer;
            border-radius: 20px;
            background-color: #94f0a9;
            width: 210px;
            height: 180px;
            margin-top: 435px;
            position: relative;
            z-index: 0;
            overflow: hidden;
            text-decoration: none;
            
        }

        .title-6 {
            margin-left: 20px;
            margin-top: 30px;
            color: #452c2c;
            font-size: 1.2em;
            line-height: normal;
            font-weight: 700;
            margin-bottom: 0.5em;
        }


        .p6 {
            margin-top: 20px;
            margin-left: 20px;
            font-size: 1em;
            font-weight: 500;
            line-height: 1.5em;
            color: #452c2c;

        }

        .card6:hover .p6 {
            transition: all 0.5s ease-out;
            color: #fff;
        }

        .card6:hover .title-6 {
            transition: all 0.5s ease-out;
            color: #fff;
        }

        .card6:before {
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
            transform-origin: 50% 50%;
            transition: transform 0.35s ease-out;
        }

        .card6:hover:before {
            transform: scale(28);
        }

        .card7 {
            width: 330px;
            cursor:pointer;
            border-radius: 20px;
            height: 180px;
            background-color: #94f0a9;
            margin-top: 630px;
            margin-left: -720px;
            position: relative;
            z-index: 0;
            overflow: hidden;
            text-decoration: none;
        }

        .title-7 {
            margin-left: 20px;
            margin-top: 30px;
            color: #452c2c;
            font-size: 1.2em;
            line-height: normal;
            font-weight: 700;
            margin-bottom: 0.5em;
        }


        .p7 {
            margin-top: 20px;
            margin-left: 20px;
            font-size: 1em;
            font-weight: 500;
            line-height: 1.5em;
            color: #452c2c;

        }

        .card7:hover .p7 {
            transition: all 0.5s ease-out;
            color: #fff;
        }

        .card7:hover .title-7 {
            transition: all 0.5s ease-out;
            color: #fff;
        }

        .card7:before {
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
            transform-origin: 50% 50%;
            transition: transform 0.35s ease-out;
        }

        .card7:hover:before {
            transform: scale(28);
        }


        .card8 {
            width: 348px;
            cursor:pointer;
            border-radius: 20px;
            height: 180px;
            background-color: #94f0a9;

            margin-top: 630px;
            position: relative;
            z-index: 0;
            overflow: hidden;
            text-decoration: none;
        }

        .title-8 {
            margin-left: 20px;
            margin-top: 30px;
            color: #452c2c;
            font-size: 1.2em;
            line-height: normal;
            font-weight: 700;
            margin-bottom: 0.5em;
        }


        .p8 {
            margin-top: 20px;
            margin-left: 20px;
            font-size: 1em;
            font-weight: 500;
            line-height: 1.5em;
            color: #452c2c;

        }

        .card8:hover .p8 {
            transition: all 0.5s ease-out;
            color: #fff;
        }

        .card8:hover .title-8 {
            transition: all 0.5s ease-out;
            color: #fff;
        }

        .card8:before {
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
            transform-origin: 50% 50%;
            transition: transform 0.35s ease-out;
        }

        .card8:hover:before {
            transform: scale(28);
        }


        .go-arrow {
            margin-top: -4px;
            margin-right: -4px;
            color: white;
            font-family: courier, sans;
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

       
        .btn1 {
            margin-top: 30px;
            margin-left: 30px;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            width: 35px;
            height: 35px;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition-duration: .3s;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.199);
            background-color: #2a6c56;
           
        }

      

        .btn2 {
            margin-top: 10px;
            margin-left: 20px;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            width: 35px;
            height: 35px;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition-duration: .3s;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.199);
            background-color: #2a6c56;
        }

        .btn3{
            margin-top: 10px;
            margin-left: 25px;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            width: 35px;
            height: 35px;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition-duration: .3s;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.199);
            background-color: #2a6c56;
        }

        .btn4 {
            margin-top: 10px;
            margin-left: 20px;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            width: 35px;
            height: 35px;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition-duration: .3s;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.199);
            background-color: #2a6c56;
        }

        .btn5 {
            margin-top: 10px;
            margin-left: 20px;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            width: 35px;
            height: 35px;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition-duration: .3s;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.199);
            background-color: #2a6c56;
        }

        .btn6 {
            margin-top: 30px;
            margin-left: 20px;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            width: 35px;
            height: 35px;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition-duration: .3s;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.199);
            background-color: #2a6c56;
        }

        .btn7 {
            margin-top: 30px;
            margin-left: 20px;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            width: 35px;
            height: 35px;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition-duration: .3s;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.199);
            background-color: #2a6c56;
        }

        .btn8 {
            margin-top: 10px;
            margin-left: 20px;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            width: 35px;
            height: 35px;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition-duration: .3s;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.199);
            background-color: #2a6c56;
        }

/* plus sign */
.sign {
  width: 100%;
  transition-duration: .3s;
  display: flex;
  align-items: center;
  justify-content: center;
}

.sign svg {
  width: 17px;
}

.sign svg path {
  fill: white;
}
/* text */
.text {
  position: absolute;
  right: 0%;
  width: 0%;
  opacity: 0;
  color: white;
  font-size: 1.2em;
  font-weight: 600;
  transition-duration: .3s;
}
/* hover effect on button width */
.btn1:hover {
  width: 100px;
  border-radius: 40px;
  transition-duration: .3s;
}

.btn1:hover .sign {
  width: 30%;
  transition-duration: .3s;
  padding-left: 20px;
}
/* hover effect button's text */
.btn1:hover .text {
  opacity: 1;
  width: 70%;
  transition-duration: .3s;
  padding-right: 10px;
}
/* button click effect*/
.btn2:active {
  transform: translate(2px ,2px);
}


.btn2:hover {
  width: 100px;
  border-radius: 40px;
  transition-duration: .3s;
}

.btn2:hover .sign {
  width: 30%;
  transition-duration: .3s;
  padding-left: 20px;
}
/* hover effect button's text */
.btn2:hover .text {
  opacity: 1;
  width: 70%;
  transition-duration: .3s;
  padding-right: 10px;
}
/* button click effect*/
.btn2:active {
  transform: translate(2px ,2px);
}

.btn3:hover {
  width: 100px;
  border-radius: 40px;
  transition-duration: .3s;
}

.btn3:hover .sign {
  width: 30%;
  transition-duration: .3s;
  padding-left: 20px;
}
/* hover effect button's text */
.btn3:hover .text {
  opacity: 1;
  width: 70%;
  transition-duration: .3s;
  padding-right: 10px;
}
/* button click effect*/
.btn3:active {
  transform: translate(2px ,2px);
}

.btn4:hover {
  width: 100px;
  border-radius: 40px;
  transition-duration: .3s;
}

.btn4:hover .sign {
  width: 30%;
  transition-duration: .3s;
  padding-left: 20px;
}
/* hover effect button's text */
.btn4:hover .text {
  opacity: 1;
  width: 70%;
  transition-duration: .3s;
  padding-right: 10px;
}
/* button click effect*/
.btn4:active {
  transform: translate(2px ,2px);
}

.btn5:hover {
  width: 100px;
  border-radius: 40px;
  transition-duration: .3s;
}

.btn5:hover .sign {
  width: 30%;
  transition-duration: .3s;
  padding-left: 20px;
}
/* hover effect button's text */
.btn5:hover .text {
  opacity: 1;
  width: 70%;
  transition-duration: .3s;
  padding-right: 10px;
}
/* button click effect*/
.btn5:active {
  transform: translate(2px ,2px);
}

.btn6:hover {
  width: 100px;
  border-radius: 40px;
  transition-duration: .3s;
}

.btn6:hover .sign {
  width: 30%;
  transition-duration: .3s;
  padding-left: 20px;
}
/* hover effect button's text */
.btn6:hover .text {
  opacity: 1;
  width: 70%;
  transition-duration: .3s;
  padding-right: 10px;
}
/* button click effect*/
.btn6:active {
  transform: translate(2px ,2px);
}

.btn7:hover {
  width: 100px;
  border-radius: 40px;
  transition-duration: .3s;
}

.btn7:hover .sign {
  width: 30%;
  transition-duration: .3s;
  padding-left: 20px;
}
/* hover effect button's text */
.btn7:hover .text {
  opacity: 1;
  width: 70%;
  transition-duration: .3s;
  padding-right: 10px;
}
/* button click effect*/
.btn7:active {
  transform: translate(2px ,2px);
}

.btn8:hover {
  width: 100px;
  border-radius: 40px;
  transition-duration: .3s;
}

.btn8:hover .sign {
  width: 30%;
  transition-duration: .3s;
  padding-left: 20px;
}
/* hover effect button's text */
.btn8:hover .text {
  opacity: 1;
  width: 70%;
  transition-duration: .3s;
  padding-right: 10px;
}
/* button click effect*/
.btn8:active {
  transform: translate(2px ,2px);
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
<nav class="navbar fade-in">
        <a href="Menu.php" class="logo">Área do Administrador</a>
        <a href="Login.php">
        <button class="signup-btn">Sair</button>
        </a>
      
    </nav>

    <section class="team-section fade-in ">
        <h2 class="team-title">Bem Vindo!</h2>
        <div class="underline"></div>
        <p class="team-text">Nossa equipe é formada apenas pelos melhores talentos!</p>
    </section>

    <div class="container fade-in">

        <div class="card1">
            <h2 class="title-1">Cadastrar Funcionário</h2>
            <p class="p1">Cadastre os funcionários agora e mantenha sua equipe organizada e sempre conectada! Preencha os dados e comece a gerenciar com mais eficiência.</p>
            <div class="go-corner"><div class="go-arrow">→</div></div>
            <a href="CadastroFuncionario.php">
                <button class="btn1">
                    <div class="sign"><svg viewBox="0 0 512 512"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path></svg></div>
                    <div class="text">Ir</div>
                </button>
            </a>
        </div>

        <div class="card2">
            <h2 class="title-2">Consultar Funcionário</h2>
            <p class="p2">Precisa consultar informações sobre um funcionário? Acesse agora e obtenha todos os dados de forma rápida e segura!</p>
            <div class="go-corner"><div class="go-arrow">→</div></div>
            <a href="ConsultarFuncionario.php">
            <button class="btn2">
                    <div class="sign"><svg viewBox="0 0 512 512"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path></svg></div>
                    <div class="text">Ir</div>
                </button>
            </a>
        </div>

        <div class="card3">
            <h2 class="title-3">Excluir Funcionário</h2>
            <p class="p3">Excluir Funcionário da Equipe</p>
            <div class="go-corner"><div class="go-arrow">→</div></div>
            <a href="ExcluirFuncionario.php">
                <button class="btn3">
                        <div class="sign"><svg viewBox="0 0 512 512"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path></svg></div>
                        <div class="text">Ir</div>
                    </button>
            </a>
            
        </div>

        <div class="card4">
            <h2 class="title-4">Atualizar Funcionário</h2>
            <p class="p4">Atualizar Informações do Funcionário</p>
            <div class="go-corner"><div class="go-arrow">→</div></div>
            <a href="AtualizarFuncionario.php">
                <button class="btn4">
                        <div class="sign"><svg viewBox="0 0 512 512"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path></svg></div>
                        <div class="text">Ir</div>
                    </button>
            </a>
            
        </div>

        <div class="card5">
            <h2 class="title-5">Cadastrar Residuos</h2>
            <p class="p5">Registre os resíduos agora e ajude na reciclagem e no descarte correto!</p>
            <div class="go-corner"><div class="go-arrow">→</div></div>
            <a href="CadastroResiduo2.php">
                <button class="btn5">
                        <div class="sign"><svg viewBox="0 0 512 512"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path></svg></div>
                        <div class="text">Ir</div>
                    </button>
            </a>
            
        </div>

        <div class="card6">
            <h2 class="title-6">Excluir Residuos</h2>
            <p class="p6">Excluir Residuos</p>
            <div class="go-corner"><div class="go-arrow">→</div></div>
            <a href="ExcluirResiduo.php">
                <button class="btn6">
                        <div class="sign"><svg viewBox="0 0 512 512"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path></svg></div>
                        <div class="text">Ir</div>
                    </button>
            </a>
            
        </div>

        <div class="card7">
            <h2 class="title-7">Atualizar Residuos</h2>
            <p class="p7">Atualizar Informações dos Residuos</p>
            <div class="go-corner"><div class="go-arrow">→</div></div>
            <a href="AtualizarResiduo.php">
                <button class="btn7">
                        <div class="sign"><svg viewBox="0 0 512 512"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path></svg></div>
                        <div class="text">Ir</div>
                    </button>
            </a>
            
        </div>

        <div class="card8">
            <h2 class="title-8">Consultar Residuos</h2>
            <p class="p8">Quer saber para onde os resíduos vão? Faça uma consulta rápida!</p>
            <div class="go-corner"><div class="go-arrow">→</div></div>
            <a href="ConsultarResiduo2.php">
                <button class="btn8">
                        <div class="sign"><svg viewBox="0 0 512 512"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path></svg></div>
                        <div class="text">Ir</div>
                    </button>
            </a>
            
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