<?php 

//echo 'informacion:' .file_get_contents('php://input');
header("Content-Type: appication/json");
include_once("../pruebadiagnostico/class-usuario.php");
switch ($_SERVER['REQUEST_METHOD']) {

    case 'POST':
        $_POST   = json_decode(file_get_contents('php://input'),true );
        $usuario = new Usuario($_POST["nombre"],$_POST["apellido"],$_POST["fechaNacimiento"],$_POST["pais"] ); 
        $usuario -> guardarUsuario();
        $resultado["mensaje"]="guardar usuario, informacion:". json_encode($_POST); 
        echo json_encode($resultado); 
        break;

        
    case 'GET':
        if(isset($_GET['id'])){
            Usuario::obtenerUsuario($_GET['id']);
        }else{
         Usuario::obtenerUsuarios();
         
        } 
         break;
    
    case 'PUT':
        $_PUT   = json_decode(file_get_contents('php://input'),true );
        $usuario = new Usuario($_PUT['nombre'],$_PUT['apellido'],$_PUT['fechaNacimiento'],$_PUT['pais']);
        $usuario->actualizarUsuario($_GET['id']);  
        $resultado["mensaje"]="Actualizar un usuario con el id:".$_GET['id'];
                              ", informacion a actualizar:".json_encode($_PUT);
        echo json_encode($resultado); 
        break;
    
    
    case 'DELETE':
        usuario :: eliminarUsuario($_GET["id"]);
        $resultado["mensaje"]="Eliminar un usuario con el id:" .$_GET['id'];
        echo json_encode($resultado); 
        break;
    
}
?>

