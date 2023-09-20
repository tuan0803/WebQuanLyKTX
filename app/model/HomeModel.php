<?php
class HomeModel{

    public function getListNotif(){
        return [
            'item1',
            'item2',
            'item3'
        ];
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