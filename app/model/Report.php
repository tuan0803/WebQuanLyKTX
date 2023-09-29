<?php
class Report extends Model{
    function __construct(){
        parent::__construct();
    }
    function tableFill(){
        
        return "report";
    }
    function fieldFill(){
        return "*";
    }
    function primaryKey(){
        return "id";
    }
}
?>