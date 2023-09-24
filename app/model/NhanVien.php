<?php
class NhanVien extends Model{
    
    function __construct(){
        parent::__construct();
    }
    function tableFill(){
        
        return "staff";
    }
    function fieldFill(){
        return "*";
    }
    function primaryKey(){
        return "id";
    }
    public function deletenv($id){
        $condition = "id = $id";
        $table     = $this->tableFill();
        $this->deleteData($table, $condition);
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