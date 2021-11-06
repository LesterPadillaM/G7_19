<?php
    class Articulos extends Conectar{
        public function get_articulos(){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT * From ma_articulos where estado = 1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public function get_articulos($id){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT * From ma_articulos where estado = 1 AND id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        
    }
?>