<?php
    header('Content-Type: application/json');

    require_once("../config/conexion.php");
    require_once("../models/Articulos.php");
    $articulos = new Articulos();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["op"]){

        case "GetArticulos":
            $datos=$articulos->get_articulos();
            echo json_encode($datos);
        break;

        case "GetUno":
            $datos=$articulos->get_articulo($body["ID"]);
            echo json_encode($datos);
        break;
        
        case "InsertArticulos":
            $datos=$articulos->insert_articulo($body["Descripcion"],$body["Unidad"],$body["Costo"],$body["Precio"],$body["Aplica_Isv"],$body["Porcentaje_Isv"],$body["Id_Socio"]);
            echo json_encode("Articulos Agregados");
        break;

        case "UpdateArticulos":
            $datos=$articulos->update_articulo($body["ID"],$body["Descripcion"],$body["Unidad"],$body["Costo"],$body["Precio"],$body["Aplica_Isv"],$body["Porcentaje_Isv"],$body["Id_Socio"]);
            echo json_encode("Articulos Actualizados");
        break;

        case "DeleteArticulos":
            $datos=$articulos->delete_articulo($body["ID"]);
            echo json_encode("Articulos Borrado");
        break;
    }
?>