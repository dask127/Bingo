<?php

class Model
{

    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_bingo;charset=utf8', 'root', '');
        $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }

    function GetEstadoDeJuego()
    {
        $sentencia = $this->db->prepare("SELECT juego.estado FROM juego");
        $sentencia->execute();
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function getByDNI($dni)
    {
        $sentencia = $this->db->prepare("SELECT * FROM usuario WHERE dni = ?");
        $sentencia->execute([$dni]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function setEstadoByDNI($estado, $dni)
    {
        $sentencia = $this->db->prepare("UPDATE usuario SET estado=? WHERE dni=?");
        $sentencia->execute(array($estado, $dni));
    }

    function GetBingoCards()
    {
        $sentencia = $this->db->prepare("SELECT * FROM carton WHERE usado = 0 LIMIT 6");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function InserBingoCard($fecha, $matrix)
    {
        $sentencia = $this->db->prepare("INSERT INTO carton(fecha, numeros) VALUES(?,?)");
        $sentencia->execute(array($fecha, $matrix));
        return $sentencia->rowCount();
    }

    function MarkCardAsUsed($card_id)
    {
        $sentencia = $this->db->prepare("UPDATE carton SET usado = 1 WHERE id=?");
        $sentencia->execute(array($card_id));
    }

    function addOwnerToCard($card_id, $dni)
    {
        $sentencia = $this->db->prepare("UPDATE carton SET dni_jugador = ? WHERE id=?");
        $sentencia->execute(array($dni, $card_id));
        return $sentencia->rowCount();
    }

    function getLastNumber()
    {
        $sentencia = $this->db->prepare("SELECT * FROM numero_de_juego ORDER BY id DESC LIMIT 1");
        $sentencia->execute();
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }
}
