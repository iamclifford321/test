<?php
/*
___________________________________________________________________________
___________________________________________________________________________

Model For admin table
___________________________________________________________________________
___________________________________________________________________________

*/
class Model extends Connection{


    /*
        Insert Method
    */
    protected function insert($tableName, $para=array()){
        // print_r($para);
        $table_columns = implode(',', array_keys($para));
        $table_value = implode("','", $para);

        $sql="INSERT INTO $tableName($table_columns) VALUES('$table_value')";

        // var_dump('SQL → ', $sql);
        $isSuccess = $this->mysqli->query($sql);
        // echo 'test 2';
        if($isSuccess === true){
            return 'Successful Create Record.';
        } else{
            return $this->mysqli->error;
        }

    }


    /*
        Update Method
    */
    protected function update($tableName, $para=array(), $filter){
        $args = array();

        foreach ($para as $key => $value) {
            $args[] = "$key = '$value'";
        }

        $sql="UPDATE  $tableName SET " . implode(',', $args);

        $sql .=" WHERE $filter";

        $isSuccess = $this->mysqli->query($sql);

        if($isSuccess === true){
            return 'Successfuly Updated Record.';
        } else{
            return $this->mysqli->error;
        }

    }


    /*
        Delete Method
    */
    protected function delete($tableName, $id){
        $sql="DELETE FROM $tableName";
        $sql .=" WHERE $id ";
        $sql;
        // echo 'sql '. $sql;
        $isSuccess = $this->mysqli->query($sql);

        if($isSuccess === true){
            return 'Successfuly Delete Record.';
        } else{
            return $this->mysqli->error;
        }
        // echo 'model → ' . $isSuccess;
        // echo 'model erro → ' . $this->mysqli->error;
    }


    /*
        Select Method
    */
    protected function select($tableName='tbl_admin', $rows="*",$where = null){

        if ($where != null) {
            $sql="SELECT $rows FROM $tableName WHERE $where";
        }else{
            $sql="SELECT $rows FROM $tableName";
        }
        // echo $sql;
        $this->mysqli->query($sql);
        if($this->mysqli->error != null){
            return 'Error: '.$this->mysqli->error;
        }else{
            return $this->mysqli->query($sql);
        }

    }


    /*
        InnerJoin Method
    */
    protected function innerJoin($table1='',$table2='', $rows="*", $table1ColumnName='', $table2ColumnName='' ){

        $sql = "SELECT $rows ";
        $sql = $sql . "FROM $table1 ";
        $sql = $sql . "INNER JOIN $table2 ON $table1.$table1ColumnName = $table2.$table2ColumnName";
        // echo $sql;
        $this->mysqli->query($sql);
        if($this->mysqli->error != null){
            die('Error: '.$this->mysqli->error);
        }else{
            return $this->mysqli->query($sql);
        }
    }



}
