<?php
class Juguete
{

    private $juguetes = [];
    private $dbc;

    public function __construct()
    {
        $this->dbc = new PDO("mysql:host=localhost;dbname=jugueteria", "root", "");
    }

    public function setJuguete($nombre, $precio, $proveedor, $descuento, $imagen)
    {
        $sql = "INSERT INTO juguetes() VALUES( default,'{$nombre}', '{$precio}', '{$proveedor}', '{$descuento}', '../componentes/juguetes/{$imagen}')";
        $result = $this->dbc->query($sql);
        $this->dbc = null;
        return $result;
    }

    public function getJuguetes()
    {
        $sql = "SELECT * FROM juguetes";
        foreach ($this->dbc->query($sql) as $res) {
            $this->juguetes[] = $res;
        }
        $this->dbc = null;
        return $this->juguetes;
    }

    public function editar($id)
    {
        $sql = "SELECT * from juguetes where id = {$id}";
        $result = $this->dbc->query($sql);
        $this->dbc = null;
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizar($id, $nombre, $precio, $proveedor, $descuento, $imagen)
    {
        $sql = "UPDATE juguetes SET nombre='$nombre',precio='$precio',proveedor='$proveedor',descuento='$descuento',imagen='../componentes/juguetes/$imagen' where id = {$id}";
        $result = $this->dbc->query($sql);
        $this->dbc = null;
        return $result;
    }

    public function borrar($id)
    {
        $sql = "DELETE FROM juguetes where id = {$id}";
        $result = $this->dbc->query($sql);
        $this->dbc = null;
        return $result;
    }
}
