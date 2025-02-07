<?php
    namespace PHP\Modelo\DAO;
    require_once('Conexao.php');
    use PHP\Modelo\DAO\Conexao;
 
    class Excluir{
 
        function excluirResiduo(Conexao $conexao, int $codigo)
        {
            try {
                // Conectar ao banco de dados
                $conn = $conexao->conectar();
                
                // Preparar a consulta SQL para deletar o registro
                $sql = "DELETE FROM residuo WHERE codigo = '$codigo'";
                $result = mysqli_query($conn, $sql);
                
                // Verificar se a consulta foi bem-sucedida
                if (mysqli_affected_rows($conn) > 0) {
                    // Exibição do modal de sucesso
                    echo " 
                    <div id='modalSucesso' class='modal'>
                        <div class='modal-content'>
                            <span class='close' onclick='fecharModal()'>&times;</span>
                            <p>Excluído com sucesso!</p>
                        </div>
                    </div>
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
                            position: relative; 
                        }
                        .close { 
                            color: #aaa; 
                            font-size: 28px; 
                            font-weight: bold; 
                            cursor: pointer; 
                            position: absolute; 
                            top: 10px; 
                            right: 10px; 
                        }
                        .close:hover { 
                            color: black; 
                        }
                    </style>
                    <script>
                        function fecharModal() {
                            document.getElementById('modalSucesso').style.display = 'none';
                        }
                        document.getElementById('modalSucesso').style.display = 'block';
                        window.onclick = function(event) {
                            let modal = document.getElementById('modalSucesso');
                            if (event.target === modal) {
                                modal.style.display = 'none';
                            }
                        };
                    </script>
                    ";
                } else {
                    // Exibição do modal de erro se não houver linhas afetadas
                    echo " 
                    <div id='modalErro' class='modal'>
                        <div class='modal-content'>
                            <span class='close' onclick='fecharModal()'>&times;</span>
                            <p>Nenhum resíduo encontrado com o código informado.</p>
                        </div>
                    </div>
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
                            position: relative; 
                        }
                        .close { 
                            color: #aaa; 
                            font-size: 28px; 
                            font-weight: bold; 
                            cursor: pointer; 
                            position: absolute; 
                            top: 10px; 
                            right: 10px; 
                        }
                        .close:hover { 
                            color: black; 
                        }
                    </style>
                    <script>
                        function fecharModal() {
                            document.getElementById('modalErro').style.display = 'none';
                        }
                        document.getElementById('modalErro').style.display = 'block';
                        window.onclick = function(event) {
                            let modal = document.getElementById('modalErro');
                            if (event.target === modal) {
                                modal.style.display = 'none';
                            }
                        };
                    </script>
                    ";
                }
        
                // Fechar a conexão
                mysqli_close($conn);
            } catch (Exception $erro) {
                // Exibição do modal de erro genérico
                echo " 
                <div id='modalErro' class='modal'>
                    <div class='modal-content'>
                        <span class='close' onclick='fecharModal()'>&times;</span>
                        <p>Erro: " . htmlspecialchars($erro->getMessage()) . "</p>
                    </div>
                </div>
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
                        position: relative; 
                    }
                    .close { 
                        color: #aaa; 
                        font-size: 28px; 
                        font-weight: bold; 
                        cursor: pointer; 
                        position: absolute; 
                        top: 10px; 
                        right: 10px; 
                    }
                    .close:hover { 
                        color: black; 
                    }
                </style>
                <script>
                    function fecharModal() {
                        document.getElementById('modalErro').style.display = 'none';
                    }
                    document.getElementById('modalErro').style.display = 'block';
                    window.onclick = function(event) {
                        let modal = document.getElementById('modalErro');
                        if (event.target === modal) {
                            modal.style.display = 'none';
                        }
                    };
                </script>
                ";
            }
        }
        
        
        function excluirFuncionario(Conexao $conexao, string $cpf)
        {
            try {
                $conn = $conexao->conectar();
                $sql = "DELETE FROM funcionario WHERE codigo = '$cpf'";
                $result = mysqli_query($conn, $sql);
        
                if (mysqli_affected_rows($conn) > 0) {
                    // Exibição do modal de sucesso
                    echo " 
                    <div id='modalSucesso' class='modal'>
                        <div class='modal-content'>
                            <span class='close' onclick='fecharModal()'>&times;</span>
                            <p>Excluído com sucesso!</p>
                        </div>
                    </div>
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
                            position: relative; 
                        }
                        .close { 
                            color: #aaa; 
                            font-size: 28px; 
                            font-weight: bold; 
                            cursor: pointer; 
                            position: absolute; 
                            top: 10px; 
                            right: 10px; 
                        }
                        .close:hover { 
                            color: black; 
                        }
                    </style>
                    <script>
                        function fecharModal() {
                            document.getElementById('modalSucesso').style.display = 'none';
                        }
                        document.getElementById('modalSucesso').style.display = 'block';
                        window.onclick = function(event) {
                            let modal = document.getElementById('modalSucesso');
                            if (event.target === modal) {
                                modal.style.display = 'none';
                            }
                        };
                    </script>
                    ";
                } else {
                    // Exibição do modal de erro se não houver linhas afetadas
                    echo " 
                    <div id='modalErro' class='modal'>
                        <div class='modal-content'>
                            <span class='close' onclick='fecharModal()'>&times;</span>
                            <p>Nenhum funcionário encontrado com o CPF informado.</p>
                        </div>
                    </div>
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
                            position: relative; 
                        }
                        .close { 
                            color: #aaa; 
                            font-size: 28px; 
                            font-weight: bold; 
                            cursor: pointer; 
                            position: absolute; 
                            top: 10px; 
                            right: 10px; 
                        }
                        .close:hover { 
                            color: black; 
                        }
                    </style>
                    <script>
                        function fecharModal() {
                            document.getElementById('modalErro').style.display = 'none';
                        }
                        document.getElementById('modalErro').style.display = 'block';
                        window.onclick = function(event) {
                            let modal = document.getElementById('modalErro');
                            if (event.target === modal) {
                                modal.style.display = 'none';
                            }
                        };
                    </script>
                    ";
                }
        
                mysqli_close($conn);
            } catch (Exception $erro) {
                // Exibição do modal de erro genérico
                echo " 
                <div id='modalErro' class='modal'>
                    <div class='modal-content'>
                        <span class='close' onclick='fecharModal()'>&times;</span>
                        <p>Erro: " . htmlspecialchars($erro->getMessage()) . "</p>
                    </div>
                </div>
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
                        position: relative; 
                    }
                    .close { 
                        color: #aaa; 
                        font-size: 28px; 
                        font-weight: bold; 
                        cursor: pointer; 
                        position: absolute; 
                        top: 10px; 
                        right: 10px; 
                    }
                    .close:hover { 
                        color: black; 
                    }
                </style>
                <script>
                    function fecharModal() {
                        document.getElementById('modalErro').style.display = 'none';
                    }
                    document.getElementById('modalErro').style.display = 'block';
                    window.onclick = function(event) {
                        let modal = document.getElementById('modalErro');
                        if (event.target === modal) {
                            modal.style.display = 'none';
                        }
                    };
                </script>
                ";
            }
        }
        
    }//fim da classe
?>