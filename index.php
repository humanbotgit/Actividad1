<?php
require_once "models/Usuario.php";
switch($_SERVER['REQUEST_METHOD']){
    case 'GET':
        if(isset($_GET['id'])){
            echo json_encode(Usuario::getWhere($_GET['id']));
        }
        else{
            echo json_encode(Usuario::getAll());
        }
        //
        break;
    case 'POST':
        $datos = json_decode(file_get_contents('php://input'));
        if($datos!=NULL){
            if(Usuario::insert($datos->nombres_usuario,
            $datos->apellido_paterno_usuario,
            $datos->apellido_materno_usuario,
            $datos->genero_usuario)){
                http_response_code(200);
            }else{
                http_response_code(400);
            }
        }
        else{
            http_response_code(405);
        }
        break;
    case 'PUT':
        $datos = json_decode(file_get_contents('php://input'));
        if($datos!=NULL){
            if(Usuario::update($datos->id_usuario,
            $datos->nombres_usuario,
            $datos->apellido_paterno_usuario,
            $datos->apellido_materno_usuario,
            $datos->genero_usuario)){
                http_response_code(200);
            }else{
                http_response_code(400);
            }
        }
        else{
            http_response_code(405);
        }
        break;
    case 'DELETE':
        if(isset($_GET['id'])){
            if(Usuario::delete($_GET['id'])){
                http_response_code(200);
            }else{
                http_response_code(400);
            }
        }else{
            http_response_code(405);
        }
    default:
        http_response_code(405);
        break;
}
?>