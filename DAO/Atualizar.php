<?php
   namespace PHP\Modelo\DAO;
   require_once('Conexao.php');
   use PHP\Modelo\DAO\Conexao;
 
    class Atualizar{
        
        function atualizarResiduo(Conexao $conexao, string $campo, $novoDado, int $codigo) {
            try {
                $conn = $conexao->conectar();
            
                // Campos permitidos para atualização
                $camposPermitidos = ["nomePessoa", "dt", "nomeResiduo", "peso", "tResiduo"]; // Adicionando 'tResiduo'
                if (!in_array($campo, $camposPermitidos)) {
                    echo "<script>alert('Erro: Campo inválido!');</script>";
                    return;
                }
            
                // Converter formato de data se necessário
                if ($campo === "dt") {
                    if (preg_match("/^(\d{2})\/(\d{2})\/(\d{4})$/", $novoDado, $matches)) {
                        // Converte DD/MM/YYYY para YYYY-MM-DD
                        $novoDado = "{$matches[3]}-{$matches[2]}-{$matches[1]}";
                    } elseif (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $novoDado)) {
                        echo "<script>alert('Erro: Formato de data inválido! Use DD/MM/YYYY ou YYYY-MM-DD.');</script>";
                        return;
                    }
                }
            
                // Verifica se o código existe antes de atualizar
                $sqlVerifica = "SELECT * FROM residuo WHERE codigo = ?";
                $stmtVerifica = mysqli_prepare($conn, $sqlVerifica);
                mysqli_stmt_bind_param($stmtVerifica, "i", $codigo);
                mysqli_stmt_execute($stmtVerifica);
                $resultadoVerifica = mysqli_stmt_get_result($stmtVerifica);
            
                if (mysqli_num_rows($resultadoVerifica) == 0) {
                    echo "
                    <div id='modalErro' class='modal'>
                        <div class='modal-content'>
                            <span class='close' onclick='fecharModal()'>&times;</span>
                            <p>Erro: Código não encontrado.</p>
                        </div>
                    </div>
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
                    <style>
                        .modal { display: none; position: fixed; z-index: 1; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.4); }
                        .modal-content { background-color: #fff; margin: 15% auto; padding: 20px; border: 1px solid #888; width: 30%; text-align: center; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); position: relative; }
                        .close { color: #aaa; font-size: 28px; font-weight: bold; cursor: pointer; position: absolute; top: 10px; right: 10px; }
                        .close:hover { color: black; }
                    </style>
                    ";
                    mysqli_close($conn);
                    return;
                }
            
                // Determinar o tipo do dado para mysqli_stmt_bind_param
                $tipo = "s"; // Assume string por padrão
                if ($campo === "peso") {
                    if (!is_numeric($novoDado)) {
                        echo "<script>alert('Erro: O campo \"peso\" deve ser um número.');</script>";
                        return;
                    }
                    $tipo = "d"; // "d" para double (float)
                }
            
                // Se for o campo 'tResiduo', o tipo também é string
                if ($campo === "tResiduo") {
                    $tipo = "s"; // "s" para string
                }
            
                // Preparar a atualização
                $sql = "UPDATE residuo SET $campo = ? WHERE codigo = ?";
                $stmt = mysqli_prepare($conn, $sql);
            
                if (!$stmt) {
                    echo "<script>alert('Erro na preparação da query: " . mysqli_error($conn) . "');</script>";
                    return;
                }
            
                mysqli_stmt_bind_param($stmt, $tipo . "i", $novoDado, $codigo);
                $executado = mysqli_stmt_execute($stmt);
            
                if ($executado && mysqli_stmt_affected_rows($stmt) > 0) {
                    // Exibir modal de sucesso
                    echo "
                    <div id='modalSucesso' class='modal'>
                        <div class='modal-content'>
                            <span class='close' onclick='fecharModal()'>&times;</span>
                            <p>Atualizado com sucesso!</p>
                        </div>
                    </div>
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
                    <style>
                        .modal { display: none; position: fixed; z-index: 1; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.4); }
                        .modal-content { background-color: #fff; margin: 15% auto; padding: 20px; border: 1px solid #888; width: 30%; text-align: center; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); position: relative; }
                        .close { color: #aaa; font-size: 28px; font-weight: bold; cursor: pointer; position: absolute; top: 10px; right: 10px; }
                        .close:hover { color: black; }
                    </style>
                    ";
                } else {
                    /*echo "<script>alert('Nenhuma alteração feita. Verifique o código e o campo.');</script>";*/
                }
            
                // Fechar conexão
                mysqli_stmt_close($stmt);
                mysqli_close($conn);
            } catch (Exception $erro) {
                echo "<script>alert('Erro ao atualizar: " . htmlspecialchars($erro->getMessage()) . "');</script>";
            }
        }
        

        function atualizarFuncionario(Conexao $conexao, string $campo, string $novoDado, string $cpf) {
            try {
                $conn = $conexao->conectar();
        
                // Verifica se o CPF existe na tabela antes de tentar atualizar
                $sqlVerifica = "SELECT * FROM funcionario WHERE codigo = '$cpf'";
                $resultadoVerifica = mysqli_query($conn, $sqlVerifica);
        
                // Se o CPF não for encontrado
                if (mysqli_num_rows($resultadoVerifica) == 0) {
                    echo "
                    <div id='modalErro' class='modal'>
                        <div class='modal-content'>
                            <span class='close' onclick='fecharModal()'>&times;</span>
                            <p>Erro: CPF não encontrado.</p>
                        </div>
                    </div>
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
                    <style>
                        .modal { display: none; position: fixed; z-index: 1; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.4); }
                        .modal-content { background-color: #fff; margin: 15% auto; padding: 20px; border: 1px solid #888; width: 30%; text-align: center; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); position: relative; }
                        .close { color: #aaa; font-size: 28px; font-weight: bold; cursor: pointer; position: absolute; top: 10px; right: 10px; }
                        .close:hover { color: black; }
                    </style>
                    ";
                    mysqli_close($conn);
                    return; // Encerra a função se o CPF não for encontrado
                }
        
                // Se o CPF existir, tenta a atualização
                $sql = "UPDATE funcionario SET $campo = '$novoDado' WHERE codigo = '$cpf'";
                $result = mysqli_query($conn, $sql);
                mysqli_close($conn);
        
                if ($result) {
                    // Exibir modal de sucesso
                    echo "
                    <div id='modalSucesso' class='modal'>
                        <div class='modal-content'>
                            <span class='close' onclick='fecharModal()'>&times;</span>
                            <p>Atualizado com sucesso!</p>
                        </div>
                    </div>
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
                    <style>
                        .modal { display: none; position: fixed; z-index: 1; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.4); }
                        .modal-content { background-color: #fff; margin: 15% auto; padding: 20px; border: 1px solid #888; width: 30%; text-align: center; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); position: relative; }
                        .close { color: #aaa; font-size: 28px; font-weight: bold; cursor: pointer; position: absolute; top: 10px; right: 10px; }
                        .close:hover { color: black; }
                    </style>
                    ";
                } else {
                    // Exibir modal de erro caso não tenha sucesso
                    echo "
                    <div id='modalErro' class='modal'>
                        <div class='modal-content'>
                            <span class='close' onclick='fecharModal()'>&times;</span>
                            <p>Erro ao atualizar. Verifique os dados ou o CPF informado.</p>
                        </div>
                    </div>
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
                    <style>
                        .modal { display: none; position: fixed; z-index: 1; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.4); }
                        .modal-content { background-color: #fff; margin: 15% auto; padding: 20px; border: 1px solid #888; width: 30%; text-align: center; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); position: relative; }
                        .close { color: #aaa; font-size: 28px; font-weight: bold; cursor: pointer; position: absolute; top: 10px; right: 10px; }
                        .close:hover { color: black; }
                    </style>
                    ";
                }
            } catch (Exception $erro) {
                // Exibe erro inesperado
                echo "
                <div id='modalErro' class='modal'>
                    <div class='modal-content'>
                        <span class='close' onclick='fecharModal()'>&times;</span>
                        <p>Erro: " . htmlspecialchars($erro->getMessage()) . "</p>
                    </div>
                </div>
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
                <style>
                    .modal { display: none; position: fixed; z-index: 1; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.4); }
                    .modal-content { background-color: #fff; margin: 15% auto; padding: 20px; border: 1px solid #888; width: 30%; text-align: center; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); position: relative; }
                    .close { color: #aaa; font-size: 28px; font-weight: bold; cursor: pointer; position: absolute; top: 10px; right: 10px; }
                    .close:hover { color: black; }
                </style>
                ";
            }
        }
        
        
    }//fim do método

      
?>