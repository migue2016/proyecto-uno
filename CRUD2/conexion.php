<?php
/*
$usuario = "root";
$password = "";
$conexion = new PDO("mysql:host=localhost;dbname=crud_usuarios",$usuario, $password);
*/
// Conexión a la base de datos
/*try {
    $pdo = new PDO('mysql:host=localhost;dbname=crud_usuarios', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Suponiendo que estás recibiendo un ID a través de una solicitud GET
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Preparar la consulta
        $query = "SELECT * FROM usuarios WHERE id = :id";

    

        $stmt = $pdo->prepare($query);
        
        // Vincular el parámetro
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener el resultado
        $registro = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($registro) {
            // Procesar el registro (por ejemplo, mostrarlo)
            print_r($registro);
        } else {
            echo "No se encontró el registro.";
        }
    } else {
        echo "No se ha proporcionado un ID.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}*/

/*
class Database
{
    private $hostname = "localhost";
    private $database = "crud_usuarios";
    private $username = "root";
    private $password = "";
    private $charset = "utf8";

    function conectar()
    
    {
        try {

            $conexion = "mysql:host=" . $this->hostname . ";dbname=" . $this->database . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];

            $pdo = new PDO($conexion, $this->username, $this->password, $options);

            return $pdo;
        } catch (PDOException $e) {
            echo 'Error conexion: ' . $e->getMessage();
            exit;
        }
    }
}
*/
class Database {
    private $host = "localhost";
    private $db_name = "crud_usuarios"; // Cambia esto
    private $username = "root"; // Cambia esto
    private $password = ""; // Cambia esto
    public $conn;

    public function conectar() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Error de conexión: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>