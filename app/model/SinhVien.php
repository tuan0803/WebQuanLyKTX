<?php
class SinhVien extends Model{
    function __construct(){
        parent::__construct();
    }
    function tableFill(){
        
        return "student";
    }
    function fieldFill(){
        return "*";
    }
    function primaryKey(){
        return "id";
    }
}
?>