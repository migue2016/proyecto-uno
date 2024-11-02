<?php


include_once("conexion.php");
include_once("funciones.php");

try {

    // Crear instancia de la conexión a la base de datos
    $db = new Database();
    $pdo = $db->conectar();


    // Base de la consulta SQL
    $sql = "SELECT * FROM usuarios";
    $params = []; // Array para almacenar parámetros de consulta preparados


    // Filtro de búsqueda
    if (isset($_POST["search"]["value"]) && $_POST["search"]["value"] !== '') {
        $sql .= " WHERE nombre LIKE :search OR apellidos LIKE :search";
        $params[':search'] = '%' . $_POST["search"]["value"] . '%';
    }
////////////////////////////////////////////////////////////////////////

    // Orden de resultados
    if (isset($_POST["order"]) && is_array($_POST["order"])) {

        $columnIndex = intval($_POST["order"][0]["column"]);
        //$column = intval($_POST["order"][0]["column"]);
        $dir = $_POST["order"][0]["dir"] === "desc" ? "DESC" : "ASC";
       // $sql .= " ORDER BY " . $column . " " . $dir;


        // Mapeo de índices a nombres de columnas
        $columnNames = ["id", "nombre", "apellido", "telefono", "email", "imagen", "fecha_creacion"];
        $sql .= " ORDER BY " . $columnNames[$columnIndex] . " " . $dir;

//////////////////////////////////////////////////////////////////////


    } else {
        $sql .= " ORDER BY id DESC";
    }


    // Límite de resultados para paginación
    if (isset($_POST["length"]) && $_POST["length"] != -1) {
        $sql .= " LIMIT :start, :length";
        $params[':start'] = intval($_POST["start"]);
        $params[':length'] = intval($_POST["length"]);
    }


    // Preparar y ejecutar la consulta
    $stmt = $pdo->prepare($sql);

    // Asignar parámetros
    foreach ($params as $key => $value) {
        $stmt->bindValue($key, $value, is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
    }

/////////////////////////////////////////////////////////////////

// Ejecutar la consulta
if ($stmt->execute()) {

    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {

    throw new Exception("Error ejecutando la consulta.");
}

   // $stmt->execute();
   // $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);


    // Procesar resultados
    $datos = [];
    foreach ($resultado as $fila) {
        $imagen = $fila["imagen"] ? '<img src="img/' . $fila["imagen"] . '" class="img-thumbnail" width="50" height="50">' : '';

        $sub_array = [
            $fila["id"],
            $fila["nombre"],
            $fila["apellido"],
            $fila["telefono"],
            $fila["email"],
            $imagen,
            $fila["fecha_creacion"],
            '<button type="button" name="editar" id="' . $fila["id"] . '" class="btn btn-warning btn-xs editar">Editar</button>',
            '<button type="button" name="borrar" id="' . $fila["id"] . '" class="btn btn-danger btn-xs borrar">Borrar</button>'
        ];
        $datos[] = $sub_array;
    }

    // Crear salida en formato JSON
    $salida = [
        "draw" => intval($_POST["draw"]),
        "recordsTotal" => $stmt->rowCount(),
        "recordsFiltered" => obtener_todos_registros(),
        "data" => $datos
    ];

    echo json_encode($salida);
} catch (PDOException $e) {
    echo json_encode(["error" => "Error en la consulta: " . $e->getMessage()]);
} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}

?>