<?php
class Notif extends Model{
    
    function __construct(){
        parent::__construct();
    }
    function tableFill(){
        
        return "notif";
    }
    function fieldFill(){
        return "*";
    }
    function primaryKey(){
        return "id";
    }
    
    
    public function getDetail($id){
        $data = [
            'item1',
            'item2',
            'item3'
        ];
        return $data[$id];
    }
}