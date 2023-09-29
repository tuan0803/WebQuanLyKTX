<?php
class Servicebill extends Model{
    function __construct(){
        parent::__construct();
    }
    function tableFill(){
        
        return "servicebill";
    }
    function fieldFill(){
        return "*";
    }
    function primaryKey(){
        return "id";
    }
}
?>