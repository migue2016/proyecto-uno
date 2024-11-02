<?php


//creamos la funcion para subir la imagen

function subir_imagen()
{
    if (isset($_FILES["imagen_usuario"])) {

        //VALIDAR EXTENSION DE ARCHIVO
        /*
        $extension = explode('.', $$_FILES["imagen_usuario"]['name']);
        $nuevo_nombre = rand() . '.' . $extension[1];
        $ubicacion = './img/' . $nuevo_nombre;
*/
        // Validar extensión de archivo
        $extension = pathinfo($_FILES["imagen_usuario"]['name'], PATHINFO_EXTENSION);
        $nuevonombre = rand() . '.' . $extension;
        $ubicacion = './img/' . $nuevonombre;

/*
        move_uploaded_file($_FILES["imagen_usuario"]['tmp_name'], $ubicacion);
        return $nuevo_nombre;
 */    

    }else{
        return false;// O manejar el error de alguna manera  
    }
}
return false; // Retornamos false si no se subió ninguna imagen


//funcion para obtener el nombre de la imagen

function obtener_nombre_imagen($id_usuario)
{
    //incluimos el archivo de la conexion de base de datos
    /*include("conexion.php");
    $stmt = $conexion->prepare("SELECT imagen FROM usuarios WHERE id = '$id_usuario'");
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    foreach ($resultado as $fila) {

        return $fila["imagen"];
    }*/

  // Incluimos el archivo de la conexión de base de datos
  include_once("conexion.php");
  $stmt = $conexion->prepare("SELECT imagen FROM usuarios WHERE id = :id_usuario");
  $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT); // Usar parámetros para evitar inyección SQL
  $stmt->execute();
  $resultado = $stmt->fetch(PDO::FETCH_ASSOC);


  return $resultado ? $resultado["imagen"] : null; // Retorno seguro

}


//mostrara todos los datos de la base de datos 

function obtener_todos_registros()
{
    //incluimos el archivo de la conexion de base de datos
   /* include("conexion.php");
    $stmt = $conexion->prepare("SELECT * FROM usuarios ");
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    return $stmt->rowCount();
    */
    include_once("conexion.php");
    global $pdo;
    $stmt = $pdo->prepare("SELECT count(*) FROM usuarios");
    $stmt->execute();
   // $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtener todos los registros como un array asociativo

    //return $resultado; // Retornar los registros
    return $stmt->fetchcolumn();
}
