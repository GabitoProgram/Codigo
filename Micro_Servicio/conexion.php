<?php
class Conexion { // Esta línea define una clase llamada 'Conexion'.

  private $pdo; // Esta línea declara una propiedad privada llamada '$pdo'. Esta propiedad se utilizará para almacenar el objeto PDO que representa la conexión a la base de datos.

  public function __construct() { // Esta línea define el constructor de la clase. El constructor es un método que se llama automáticamente cuando se crea un nuevo objeto de la clase.

    try { // Este bloque 'try' contiene código que puede lanzar una excepción. Si se lanza una excepción dentro del bloque 'try', el código dentro del bloque 'catch' correspondiente se ejecutará.

      $this->pdo = new PDO("mysql:host=localhost;dbname=acadenico; charset=utf8", "root", ""); // Esta línea intenta crear un nuevo objeto PDO que representa una conexión a la base de datos. Los parámetros son la cadena de conexión, el nombre de usuario y la contraseña.

      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Esta línea establece el atributo 'ERRMODE' del objeto PDO a 'ERRMODE_EXCEPTION'. Esto significa que si ocurre un error en una operación de base de datos, se lanzará una excepción.

    } catch (PDOException $e) { // Este bloque 'catch' captura cualquier excepción de tipo 'PDOException' que se haya lanzado en el bloque 'try' correspondiente.

      echo "Error: " . $e->getMessage(); // Esta línea imprime el mensaje de la excepción. Esto proporcionará información sobre el error que ocurrió.

    }
  }

  public function conectar() { // Esta línea define un método público llamado 'conectar'.

    return $this->pdo; // Esta línea devuelve el objeto PDO almacenado en la propiedad '$pdo'. Esto permitirá a otros códigos utilizar la conexión a la base de datos.

  }
}

?>  
