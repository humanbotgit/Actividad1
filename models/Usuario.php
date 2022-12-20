<?php
    require_once "config/conexion.php";
    class Usuario{
        public static function getAll(){
            $db = new conexion();
            $query = "SELECT * FROM usuario";
            $resultado = $db->query($query);
            $datos = [];
            if($resultado->num_rows){
                while($row=$resultado->fetch_assoc()){
                    $datos[] = [
                        'id_usuario'=>$row['id_usuario'],
                        'nombres_usuario'=>$row['nombres_usuario'],
                        'apellido_paterno_usuario'=>$row['apellido_paterno_usuario'],
                        'apellido_materno_usuario'=>$row['apellido_materno_usuario'],
                        'genero_usuario'=>$row ['genero_usuario']
                    ];
                }
            }
            return $datos;
        }
        public static function getWhere($id_usuario){
            $db = new conexion();
            $query = "SELECT * FROM usuario WHERE id_usuario=$id_usuario";
            $resultado = $db->query($query);
            $datos = [];
            if($resultado->num_rows){
                while($row=$resultado->fetch_assoc()){
                    $datos[] = [
                        'id_usuario'=>$row['id_usuario'],
                        'nombres_usuario'=>$row['nombres_usuario'],
                        'apellido_paterno_usuario'=>$row['apellido_paterno_usuario'],
                        'apellido_materno_usuario'=>$row['apellido_materno_usuario'],
                        'genero_usuario'=>$row ['genero_usuario']
                    ];
                }
            }
            return $datos;
        }
        public static function insert($nombres_usuario,$apellido_paterno_usuario,$apellido_materno_usuario,$genero_usuario){
            $db = new conexion();
            $query = "INSERT INTO usuario(nombres_usuario,apellido_paterno_usuario,apellido_materno_usuario,genero_usuario) 
            VALUES ('".$nombres_usuario."','".$apellido_paterno_usuario."','".$apellido_materno_usuario."','".$genero_usuario."')";
            $db->query($query);
            if($db->affected_rows){
                return true;
            }
        return false;
        }
        public static function update($id_usuario,$nombres_usuario,$apellido_paterno_usuario,$apellido_materno_usuario,$genero_usuario){
            $db = new conexion();
            $query = "UPDATE usuario SET
            nombres_usuario='".$nombres_usuario."',
            apellido_paterno_usuario='".$apellido_paterno_usuario."',
            apellido_materno_usuario='".$apellido_materno_usuario."',
            genero_usuario='".$genero_usuario."' 
            WHERE id_usuario=$id_usuario";
            $db->query($query);
            if($db->affected_rows){
                return true;
            }
            return false;
        }
        public static function delete($id_usuario){
        $db = new conexion;
        $query = "DELETE FROM usuario WHERE id_usuario=$id_usuario";
        $db->query($query);
        if($db->affected_rows){
            return TRUE;
        }
        return FALSE;
        }
    }

?>