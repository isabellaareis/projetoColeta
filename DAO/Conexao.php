<?php
namespace PHP\Modelo\DAO;

class Conexao{
    public function conectar(){
        try {
            // Conectar ao banco de dados
            $conn = mysqli_connect('localhost', 'root', '', 'phptint012');

            if (!$conn) {
                // Lançar uma exceção caso a conexão falhe
                throw new Exception('Erro ao conectar ao banco de dados: ' . mysqli_connect_error());
            }

           /* echo "<br>Conectado com sucesso!";*/
            return $conn;

        } catch (Exception $erro) {
            // Capturar e exibir o erro
            return "Algo deu errado!<br><br>" . $erro->getMessage();
        }
    }
}
?>
