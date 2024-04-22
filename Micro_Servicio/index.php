<?php 
require  "conexion.php"; // Esta línea incluye el archivo 'conexion.php'. Este archivo probablemente contiene el código para conectarse a una base de datos.

$conexion =  new Conexion(); // Esta línea crea un nuevo objeto de la clase Conexion. Esta clase probablemente está definida en el archivo 'conexion.php' y se utiliza para establecer una conexión con la base de datos.

$pdo = $conexion->conectar(); // Esta línea llama al método 'conectar' del objeto '$conexion'. Este método probablemente devuelve un objeto PDO que representa una conexión a la base de datos.

if($_SERVER["REQUEST_METHOD"]=="GET"){ // Esta línea verifica si el método de la solicitud HTTP es 'GET'. Si es así, ejecuta el código dentro del bloque if.

    $sql = "select * from alumno"; // Esta línea define una consulta SQL para seleccionar todos los registros de la tabla 'alumno'.

    $variables = []; // Esta línea inicializa un array vacío llamado '$variables'. Este array se utilizará para almacenar las variables que se utilizarán en la consulta SQL.

    if(isset($_GET["id"])){ // Esta línea verifica si se ha proporcionado un parámetro 'id' en la solicitud GET. Si es así, ejecuta el código dentro del bloque if.

        $sql.=" where id=:id"; // Esta línea añade una cláusula WHERE a la consulta SQL para seleccionar sólo el registro con el 'id' especificado.

        $variables[":id"]=$_GET["id"]; // Esta línea añade el 'id' proporcionado al array '$variables'.

    }

    $ejec = $pdo->prepare($sql); // Esta línea prepara la consulta SQL para su ejecución. La consulta SQL se pasa al método 'prepare' del objeto PDO.

    $ejec->execute($variables); // Esta línea ejecuta la consulta SQL. Las variables en '$variables' se pasan al método 'execute'.

    $ejec->setFetchMode(PDO::FETCH_ASSOC); // Esta línea establece el modo de recuperación de datos a 'PDO::FETCH_ASSOC'. Esto significa que los datos se devolverán como un array asociativo.

    header("HTTP/1.1 200 Bien"); // Esta línea envía una respuesta HTTP con el código de estado 200, que significa 'OK'.

    echo json_encode($ejec->fetchAll()); // Esta línea envía los datos recuperados de la base de datos como una respuesta JSON.

    exit; // Esta línea termina la ejecución del script.

}

if($_SERVER["REQUEST_METHOD"]=="PUT"){ // Esta línea verifica si el método de la solicitud HTTP es 'PUT'. Si es así, ejecuta el código dentro del bloque if.

    $sql = "update  alumno set nombre=:nombre,paterno=:paterno, edad=:edad where id=:id"; // Esta línea define una consulta SQL para actualizar un registro en la tabla 'alumno'.

    $ejec = $pdo->prepare($sql); // Esta línea prepara la consulta SQL para su ejecución. La consulta SQL se pasa al método 'prepare' del objeto PDO.

    $ejec->binValue(":nombre", $_GET["nombre"]); // Esta línea vincula el valor del parámetro 'nombre' proporcionado en la solicitud PUT a la variable ':nombre' en la consulta SQL.

    $ejec->binValue(":paterno", $_GET["paterno"]); // Esta línea vincula el valor del parámetro 'paterno' proporcionado en la solicitud PUT a la variable ':paterno' en la consulta SQL.

    $ejec->binValue(":edad", $_GET["edad"]); // Esta línea vincula el valor del parámetro 'edad' proporcionado en la solicitud PUT a la variable ':edad' en la consulta SQL.

    $ejec->binValue(":id",$_GET["id"]); // Esta línea vincula el valor del parámetro 'id' proporcionado en la solicitud PUT a la variable ':id' en la consulta SQL.

    header("HTTP/1.1 200 Bien"); // Esta línea envía una respuesta HTTP con el código de estado 200, que significa 'OK'.

    exit; // Esta línea termina la ejecución del script.

}
?>  
