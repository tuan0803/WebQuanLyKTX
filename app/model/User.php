<?php
class User extends Model{
    
    function __construct(){
        parent::__construct();
    }
    function tableFill(){
        
        return "user";
    }
    function fieldFill(){
        return "*";
    }
    function primaryKey(){
        return "username";
    }
    
    
    
}