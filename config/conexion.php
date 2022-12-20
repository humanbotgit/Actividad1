<?php
    class conexion extends Mysqli{
        private $host='localhost';
        private $user='root';
        private $pass='';
        private $dbname='bd1';
        function __construct(){
            
            parent::__construct($this->host, $this->user,$this->pass,$this->dbname);
            $this->set_charset('utf-8');
            $this->connect_error==NULL ? 'Conexion exitosa a la Base de Datos':die('Error al conectarse a la base de datos');
        }
    }
?>