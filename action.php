<?php

include "db.php";

class DataOperation extends Database
{
    public function insert_record($table,$fields)
    {
        $sql = "";
        $sql .= "INSERT INTO ".$table;
        $sql .= "(" .implode(",",array_keys($fields)) .") VALUES ";
        $sql .= "('".implode("','",array_values($fields))."')";
        $query = mysqli_query($this->con,$sql);
        if($query){
            return true;
        }
    }
}

$obj = new DataOperation;
if(isset($_POST['submit'])){
    $myarray = array(
        "name" => $_POST['name']
    );
if($obj -> insert_record("testtb",$myarray)){
    header("location:index.php?msg=RecordInserted");
}

}

?>