<?php

    class connection {
        private $server = "COMPLETAR";
        private $user = "COMPLETAR";
        private $password ="COMPLETAR";
        private $database = "COMPLETAR";
        private $connection;

        public function __construct(){
            
            try{
                $this->connection = new PDO("mysql:host=$this->server;dbname=$this->database",$this->user,$this->password);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $e){  
                return "Falla en la conexión ".$e;
            }

        }

        public function ejecutar($sql){
            $this->connection->exec($sql);
            return $this->connection->lastInsertId();
        }

        public function consultar($sql){
            $sentencia=$this->connection->prepare($sql);
            $sentencia->execute();
            return $sentencia->fetchAll();
        }

    }

?>