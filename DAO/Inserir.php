<?php
    namespace PHP\Modelo\DAO;
    require_once('Conexao.php');
    use PHP\modelo\DAO\Conexao;

    class Inserir {
        function cadastrarResiduo(Conexao $conexao, string $nomePessoa, string $dt, string $nomeResiduo, string $peso, string $loca) {
            try {
                $conn = $conexao->conectar(); //Abrir o banco
                $sql  = "Insert into residuo(codigo, nomePessoa, dt, nomeResiduo, peso, loca)
                         values('','$nomePessoa','$dt','$nomeResiduo','$peso', '$loca')";    
                $result = mysqli_query($conn, $sql);
                mysqli_close($conn);
                //Verificar o resultado
                if($result){
                    return '<div id="modalSucesso" class="modal">
                                <div class="modal-content">
                                    <span class="close" onclick="fecharModal()">&times;</span>
                                    <p>Inserido com sucesso!</p>
                                </div>
                            </div>
                              <script>
                        function fecharModal() {
                            document.getElementById("modalSucesso").style.display = "none";
                        }
        
                        // Exibir o modal
                        document.getElementById("modalSucesso").style.display = "block";
        
                        // Fechar modal ao clicar fora dele
                        window.onclick = function(event) {
                            let modal = document.getElementById("modalSucesso");
                            if (event.target === modal) {
                                modal.style.display = "none";
                            }
                        };
                    </script>
                    <style>
                        .modal {
                            display: none;
                            position: fixed;
                            z-index: 1;
                            left: 0;
                            top: 0;
                            width: 100%;
                            height: 100%;
                            background-color: rgba(0, 0, 0, 0.4);
                        }
                        .modal-content {
                            background-color: #fff;
                            margin: 15% auto;
                            padding: 20px;
                            border: 1px solid #888;
                            width: 30%;
                            text-align: center;
                            border-radius: 10px;
                            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                        }

                           .modal-content p{
                            color: black;
                        }

                        .close {
                            color: #aaa;
                            float: right;
                            font-size: 28px;
                            font-weight: bold;
                            cursor: pointer;
                        }
                        .close:hover {
                            color: black;
                        }
                    </style>';
                }
                return '<div id="modalErro" class="modal">
                            <div class="modal-content">
                                <span class="close" onclick="fecharModal()">&times;</span>
                                <p>Não Inserido!</p>
                            </div>
                        </div>
                           <script>
                        function fecharModal() {
                            document.getElementById("modalSucesso").style.display = "none";
                        }
        
                        // Exibir o modal
                        document.getElementById("modalSucesso").style.display = "block";
        
                        // Fechar modal ao clicar fora dele
                        window.onclick = function(event) {
                            let modal = document.getElementById("modalSucesso");
                            if (event.target === modal) {
                                modal.style.display = "none";
                            }
                        };
                    </script>
                    <style>
                        .modal {
                            display: none;
                            position: fixed;
                            z-index: 1;
                            left: 0;
                            top: 0;
                            width: 100%;
                            height: 100%;
                            background-color: rgba(0, 0, 0, 0.4);
                        }
                        .modal-content {
                            background-color: #fff;
                            margin: 15% auto;
                            padding: 20px;
                            border: 1px solid #888;
                            width: 30%;
                            text-align: center;
                            border-radius: 10px;
                            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                        }

                           .modal-content p{
                            color: black;
                        }

                        .close {
                            color: #aaa;
                            float: right;
                            font-size: 28px;
                            font-weight: bold;
                            cursor: pointer;
                        }
                        .close:hover {
                            color: black;
                        }
                    </style>';
            } catch (Exception $erro) {
                echo '<div id="modalErro" class="modal">
                        <div class="modal-content">
                            <span class="close" onclick="fecharModal()">&times;</span>
                            <p>Não deu certo!</p>
                        </div>
                    </div>
                       <script>
                        function fecharModal() {
                            document.getElementById("modalSucesso").style.display = "none";
                        }
        
                        // Exibir o modal
                        document.getElementById("modalSucesso").style.display = "block";
        
                        // Fechar modal ao clicar fora dele
                        window.onclick = function(event) {
                            let modal = document.getElementById("modalSucesso");
                            if (event.target === modal) {
                                modal.style.display = "none";
                            }
                        };
                    </script>
                    <style>
                        .modal {
                            display: none;
                            position: fixed;
                            z-index: 1;
                            left: 0;
                            top: 0;
                            width: 100%;
                            height: 100%;
                            background-color: rgba(0, 0, 0, 0.4);
                        }
                        .modal-content {
                            color: black;
                            background-color: #fff;
                            margin: 15% auto;
                            padding: 20px;
                            border: 1px solid #888;
                            width: 30%;
                            text-align: center;
                            border-radius: 10px;
                            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                        }

                        .modal-content p{
                            color: black;
                        }

                        .close {
                            color: #aaa;
                            float: right;
                            font-size: 28px;
                            font-weight: bold;
                            cursor: pointer;
                        }
                        .close:hover {
                            color: black;
                        }
                    </style>';
            }
        }
        
        public function cadastrarFuncionario(Conexao $conexao, string $cpf, string $nome, string $telefone, string $endereco, string $email, string $senha) {
            try {
                $conn = $conexao->conectar();
                // Definir o SQL de inserção com a coluna 'codigo' no lugar de 'cpf'
                $sql = "INSERT INTO funcionario (codigo, nome, telefone, endereco, email, senha) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_prepare($conn, $sql); // Preparar a consulta
        
                // Associar os parâmetros
                mysqli_stmt_bind_param($stmt, 'ssssss', $cpf, $nome, $telefone, $endereco, $email, $senha);
        
                // Executar a consulta
                $result = mysqli_stmt_execute($stmt);
        
                // Fechar a conexão e o statement
                mysqli_stmt_close($stmt);
                mysqli_close($conn);
        
                // Verificar se a inserção foi bem-sucedida
                if ($result) {
                    return '
                    <div id="modalSucesso" class="modal">
                        <div class="modal-content">
                            <span class="close" onclick="fecharModal()">&times;</span>
                            <p>Inserido com sucesso!</p>
                        </div>
                    </div>
                    <script>
                        function fecharModal() {
                            document.getElementById("modalSucesso").style.display = "none";
                        }
        
                        // Exibir o modal
                        document.getElementById("modalSucesso").style.display = "block";
        
                        // Fechar modal ao clicar fora dele
                        window.onclick = function(event) {
                            let modal = document.getElementById("modalSucesso");
                            if (event.target === modal) {
                                modal.style.display = "none";
                            }
                        };
                    </script>
                    <style>
                        .modal {
                            display: none;
                            position: fixed;
                            z-index: 1;
                            left: 0;
                            top: 0;
                            width: 100%;
                            height: 100%;
                            background-color: rgba(0, 0, 0, 0.4);
                        }
                        .modal-content {
                            background-color: #fff;
                            margin: 15% auto;
                            padding: 20px;
                            border: 1px solid #888;
                            width: 30%;
                            text-align: center;
                            border-radius: 10px;
                            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                        }
                        .close {
                            color: #aaa;
                            float: right;
                            font-size: 28px;
                            font-weight: bold;
                            cursor: pointer;
                        }
                        .close:hover {
                            color: black;
                        }
                    </style>
                    ';
                } else {
                    return '
                    <div id="modalErro" class="modal">
                        <div class="modal-content">
                            <span class="close" onclick="fecharModal()">&times;</span>
                            <p>Erro ao cadastrar funcionário.</p>
                        </div>
                    </div>
                    <script>
                        function fecharModal() {
                            document.getElementById("modalErro").style.display = "none";
                        }
        
                        // Exibir o modal
                        document.getElementById("modalErro").style.display = "block";
        
                        // Fechar modal ao clicar fora dele
                        window.onclick = function(event) {
                            let modal = document.getElementById("modalErro");
                            if (event.target === modal) {
                                modal.style.display = "none";
                            }
                        };
                    </script>
                    <style>
                        .modal {
                            display: none;
                            position: fixed;
                            z-index: 1;
                            left: 0;
                            top: 0;
                            width: 100%;
                            height: 100%;
                            background-color: rgba(0, 0, 0, 0.4);
                        }
                        .modal-content {
                            background-color: #fff;
                            margin: 15% auto;
                            padding: 20px;
                            border: 1px solid #888;
                            width: 30%;
                            text-align: center;
                            border-radius: 10px;
                            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                        }
                        .close {
                            color: #aaa;
                            float: right;
                            font-size: 28px;
                            font-weight: bold;
                            cursor: pointer;
                        }
                        .close:hover {
                            color: black;
                        }
                    </style>
                    ';
                }
            } catch (Exception $erro) {
                return "<br><br>Erro: " . $erro->getMessage();
            }
        }
    }
    
    
    
 




?>