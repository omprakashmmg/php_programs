<?php
include __DIR__.'/DB.php';

class update_query extends DB{
    
    public function update($tablename,$formdata=[]){
        $column=implode(",",array_keys($formdata));
        $values=implode(",",array_values($formdata));
        $id=$_GET['id'];
        $query="UPDATE {$tablename}SET($column) where id=($id);";
        
    }
	
}