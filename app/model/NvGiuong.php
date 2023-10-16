<?php
class NvGiuong extends Model{
    function __construct(){
        parent::__construct();
    }
    function tableFill(){
        
        return "bed";
    }
    function fieldFill(){
        return "*";
    }
    function primaryKey(){
        return "bedid";
    }
    public function deletebed($id){
        $condition = "bedid= '$id'";
        $table    = $this->tableFill();
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