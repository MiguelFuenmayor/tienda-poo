<?php
class general{
    public $db;
    public function __construct(){
        $this->db= new mysqli('localhost','root','','tienda');
    }

    public function ObtenerTodos(){
        if($this->db->errno==0){
        $nombre=__CLASS__;
        $todos=$this->db->query("SELECT * FROM $nombre");}
        return $todos;
    }



}?>