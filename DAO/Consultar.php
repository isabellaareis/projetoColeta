<?php
namespace PHP\Modelo\DAO;
require_once('Conexao.php');
use PHP\Modelo\DAO\Conexao;

class Consultar
{
    function consultarResiduo(Conexao $conexao, string $dt = "", string $codigo = "")
    {
        try {
            // Conectar ao banco de dados
            $conn = $conexao->conectar();
            
            // Se a data for fornecida, converta-a
            if (!empty($dt)) {
                $dtConvertida = date("Y-m-d", strtotime(str_replace('/', '-', $dt)));
            }
            
            // Construir a consulta dependendo dos parâmetros fornecidos
            if (!empty($dt) && !empty($codigo)) {
                $sql = "SELECT * FROM residuo WHERE dt = ? AND codigo = ?";
            } elseif (!empty($dt)) {
                $sql = "SELECT * FROM residuo WHERE dt = ?";
            } elseif (!empty($codigo)) {
                $sql = "SELECT * FROM residuo WHERE codigo = ?";
            } else {
                // Exibir modal com erro caso não haja data nem código
                echo "
                <div id='modalErro' class='modal'>
                    <div class='modal-content'>
                        <span class='close' onclick='fecharModal()'>&times;</span>
                        <p>Por favor, forneça uma data ou um código para a consulta.</p>
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
                return;
            }
    
            $stmt = mysqli_prepare($conn, $sql);
    
            // Bind de parâmetros, dependendo do que foi fornecido
            if (!empty($dt) && !empty($codigo)) {
                mysqli_stmt_bind_param($stmt, "ss", $dtConvertida, $codigo);
            } elseif (!empty($dt)) {
                mysqli_stmt_bind_param($stmt, "s", $dtConvertida);
            } elseif (!empty($codigo)) {
                mysqli_stmt_bind_param($stmt, "s", $codigo);
            }
    
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
    
            if (mysqli_num_rows($result) > 0) {
                // Exibir os estilos da tabela
                echo "
                <style>
                    .tabela-container {
                        margin-top: 80px;
                        padding: 30px;
                        border-radius: 12px;
                        background: linear-gradient(45deg, #2a6c56, #74b9a1);
                        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                        overflow: hidden;
                    }
                    table {
                        width: 100%;
                        border-collapse: collapse;
                        border-radius: 10px;
                        overflow: hidden;
                        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                        background-color: white;
                    }
                    thead {
                        background-color: #2a6c56;
                        color: #fff;
                        text-transform: uppercase;
                        font-weight: bold;
                        letter-spacing: 1px;
                    }
                    th, td {
                        padding: 18px 20px;
                        border-bottom: 1px solid #ddd;
                        font-size: 16px;
                        color: #333;
                        transition: background-color 0.3s ease, transform 0.3s ease;
                    }
                    tr:nth-child(even) {
                        background-color: #f4f4f4;
                    }
                    tr:hover {
                        background-color: #e0e0e0;
                        transform: translateY(-2px);
                    }
                    th {
                        font-size: 18px;
                    }
                    td {
                        font-size: 16px;
                    }
                    td, th {
                        padding: 12px 20px;
                    }
                    tr:first-child th {
                        border-top-left-radius: 10px;
                        border-top-right-radius: 10px;
                    }
                    tr:last-child td {
                        border-bottom-left-radius: 10px;
                        border-bottom-right-radius: 10px;
                    }
                    tr:hover td {
                        cursor: pointer;
                    }
                    td {
                        text-align: center;
                    }
                    /* Alinhamento específico por coluna */
                    td.codigo, th.codigo {
                        text-align: center;  /* Alinha 'Código' no centro */
                    }
    
                    td.nome, th.nome {
                        text-align: left;  /* Alinha 'Nome' à esquerda */
                    }
    
                    td.peso, th.peso {
                        text-align: right;  /* Alinha 'Peso' à direita */
                    }
    
                    /* Responsividade */
                    .tabela-container {
                        overflow-x: auto;
                    }
    
                    @media (max-width: 768px) {
                        table, th, td {
                            font-size: 14px;
                        }
                    }
                </style>
                ";
    
                // Início da tabela com o conteúdo
                $saida = "<div class='tabela-container'>
                            <table class='table'>
                                <thead>
                                    <tr>
                                        <th class='codigo'>Código</th>
                                        <th class='nome'>Nome</th>
                                        <th class='codigo'>Data</th>
                                        <th class='nome'>Resíduo</th>
                                        <th class='peso'>Peso</th>
                                    </tr>
                                </thead>
                                <tbody>";
    
                while ($dados = mysqli_fetch_assoc($result)) {
                    $saida .= "<tr>
                                <td class='codigo'>" . htmlspecialchars($dados['codigo']) . "</td>
                                <td class='nome'>" . htmlspecialchars($dados['nomePessoa']) . "</td>
                                <td class='codigo'>" . htmlspecialchars($dados['dt']) . "</td>
                                <td class='nome'>" . htmlspecialchars($dados['nomeResiduo']) . "</td>
                                <td class='peso'>" . htmlspecialchars($dados['peso']) . "</td>
                              </tr>";
                }
    
                // Fechando a tabela
                $saida .= "</tbody></table></div>";
    
                echo $saida;
            } else {
                // Exibir modal com erro se não encontrar dados
                echo "
                <div id='modalErro' class='modal'>
                    <div class='modal-content'>
                        <span class='close' onclick='fecharModal()'>&times;</span>
                        <p>Nenhum resíduo encontrado para os critérios fornecidos.</p>
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
                return;
            }
    
            // Fechar a conexão
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
    
        } catch (Exception $erro) {
            // Exibir erro no modal
            echo "
            <div id='modalErro' class='modal'>
                <div class='modal-content'>
                    <span class='close' onclick='fecharModal()'>&times;</span>
                    <p>Erro ao consultar: " . $erro->getMessage() . "</p>
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
    
    
    

    function consultarFuncionarioIndividual(Conexao $conexao, string $cpf)
    {
        try {
            $conn = $conexao->conectar();
            $sql = "SELECT * FROM Funcionario WHERE codigo = '$cpf'";
            $result = mysqli_query($conn, $sql);
    
            if (mysqli_num_rows($result) > 0) {
                $saida = "


                  <style>
                    .tabela-container {
                        margin-top: 80px;
                        padding: 30px;
                        border-radius: 12px;
                        background: linear-gradient(45deg, #2a6c56, #74b9a1);
                        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                        overflow: hidden;
                    }
                    table {
                        width: 100%;
                        border-collapse: collapse;
                        border-radius: 10px;
                        overflow: hidden;
                        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                        background-color: white;
                    }
                    thead {
                        background-color: #2a6c56;
                        color: #fff;
                        text-transform: uppercase;
                        font-weight: bold;
                        letter-spacing: 1px;
                    }
                    th, td {
                        padding: 18px 20px;
                        border-bottom: 1px solid #ddd;
                        font-size: 16px;
                        color: #333;
                        transition: background-color 0.3s ease, transform 0.3s ease;
                    }
                    tr:nth-child(even) {
                        background-color: #f4f4f4;
                    }
                    tr:hover {
                        background-color: #e0e0e0;
                        transform: translateY(-2px);
                    }
                    th {
                        font-size: 18px;
                    }
                    td {
                        font-size: 16px;
                    }
                    td, th {
                        padding: 12px 20px;
                    }
                    tr:first-child th {
                        border-top-left-radius: 10px;
                        border-top-right-radius: 10px;
                    }
                    tr:last-child td {
                        border-bottom-left-radius: 10px;
                        border-bottom-right-radius: 10px;
                    }
                    tr:hover td {
                        cursor: pointer;
                    }
                    td {
                        text-align: center;
                    }
                    /* Alinhamento específico por coluna */
                    td.codigo, th.codigo {
                        text-align: center;  /* Alinha 'Código' no centro */
                    }
    
                    td.nome, th.nome {
                        text-align: left;  /* Alinha 'Nome' à esquerda */
                    }
    
                    td.peso, th.peso {
                        text-align: right;  /* Alinha 'Peso' à direita */
                    }
    
                    /* Responsividade */
                    .tabela-container {
                        overflow-x: auto;
                    }
    
                    @media (max-width: 768px) {
                        table, th, td {
                            font-size: 14px;
                        }
                    }
                </style>
                
                <div class='tabela-container'>
                            <table class='table'>
                                <thead>
                                    <tr>
                                        <th class='codigo'>Código</th>
                                        <th class='nome'>Nome</th>
                                        <th class='codigo'>Telefone</th>
                                        <th class='nome'>Endereço</th>
                                        <th class='peso'>Email</th>
                                        <th class='peso'>Senha</th>
                                    </tr>
                                </thead>
                                <tbody>";
    
                while ($dados = mysqli_fetch_assoc($result)) {
                    $saida .= "<tr>
                                    <td class='codigo'>" . htmlspecialchars($dados['codigo']) . "</td>
                                    <td class='nome'>" . htmlspecialchars($dados['nome']) . "</td>
                                    <td class='codigo'>" . htmlspecialchars($dados['telefone']) . "</td>
                                    <td class='nome'>" . htmlspecialchars($dados['endereco']) . "</td>
                                    <td class='peso'>" . htmlspecialchars($dados['email']) . "</td>
                                    <td class='peso'>" . htmlspecialchars($dados['senha']) . "</td>
                                </tr>";
                }
    
                $saida .= "</tbody></table></div>";
                echo $saida;
            } else {
                echo "
                <div id='modalErro' class='modal'>
                    <div class='modal-content'>
                        <span class='close' onclick='fecharModal()'>&times;</span>
                        <p>Nenhum funcionário encontrado com o CPF fornecido.</p>
                    </div>
                </div>

                <style>
                    .modal { display: none; position: fixed; z-index: 1; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.4); }
                    .modal-content { background-color: #fff; margin: 15% auto; padding: 20px; border: 1px solid #888; width: 30%; text-align: center; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); position: relative; }
                    .close { color: #aaa; font-size: 28px; font-weight: bold; cursor: pointer; position: absolute; top: 10px; right: 10px; }
                    .close:hover { color: black; }
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
            echo "
            <div id='modalErro' class='modal'>
                <div class='modal-content'>
                    <span class='close' onclick='fecharModal()'>&times;</span>
                    <p>Erro ao consultar: " . htmlspecialchars($erro->getMessage()) . "</p>
                </div>
            </div>
            <style>
                    .modal { display: none; position: fixed; z-index: 1; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.4); }
                    .modal-content { background-color: #fff; margin: 15% auto; padding: 20px; border: 1px solid #888; width: 30%; text-align: center; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); position: relative; }
                    .close { color: #aaa; font-size: 28px; font-weight: bold; cursor: pointer; position: absolute; top: 10px; right: 10px; }
                    .close:hover { color: black; }
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
    
} // Fim da classe
?>