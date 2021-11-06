<?php
    class Articulos extends Conectar{
        public function get_articulos(){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT * From ma_articulos ";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public function get_articulo($ID){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT * From ma_articulos where estado='A' and ID = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$ID);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        public function insert_articulo($Descripcion,$Unidad,$Costo,$Precio,$Aplica_Isv,$Porcentaje_Isv,$ID_Socio){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO ma_articulos(ID,Descripcion,Unidad,Costo,Precio,Aplica_Isv,Porcentaje_Isv,Estado,ID_Socio)
            VALUES (null,?,?,?,?,?,?,'A',?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $Descripcion);
            $sql->bindValue(2, $Unidad);
            $sql->bindValue(3, $Costo);
            $sql->bindValue(4, $Precio);
            $sql->bindValue(5, $Aplica_Isv);
            $sql->bindValue(6, $Porcentaje_Isv);                        
            $sql->bindValue(7, $ID_Socio);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        public function update_articulo($ID,$Descripcion,$Unidad,$Costo,$Precio,$Aplica_Isv,$Porcentaje_Isv,$ID_Socio){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE  ma_articulos set 
            Descripcion =?,
            Unidad =?,
            Costo=?,
            Precio=?,
            Aplica_Isv=?,
            Porcentaje_Isv=?,
            Estado=?,
            ID_Socio=?,
            WHERE
            ID =?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $Descripcion);
            $sql->bindValue(2, $Unidad);
            $sql->bindValue(3, $Costo);
            $sql->bindValue(4, $Precio);
            $sql->bindValue(5, $Aplica_Isv);
            $sql->bindValue(6, $Porcentaje_Isv);                        
            $sql->bindValue(7, $ID_Socio);
            $sql->bindValue(8, $ID);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_articulo($ID){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE ma_articulo set
                Estado = 'A'
                where
                ID=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $ID);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>