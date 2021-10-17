<?php
class CreateController extends Model{

    public function testMetods(){

        // $rows = $this->insert('tbl_admin', $data);
        // print_r($rows);

        $rows = $this->select('tbl_admin');
        return $rows;

    }

    public function getAdmin($tableName='tbl_admin', $rows="*",$where = null){

        $rows = $this->select($tableName, $rows, $where);
        return $rows;
    }

    public function insertAdmin($para=array()){

        return $this->insert('tbl_admin', $para);
    }

    public function insertExam($para=array()){

        return $this->insert('tbl_online_exam', $para);
    }

    public function getExam($where = null){
        // echo '<br> where → ' .$where;

        if($where != null && $where !== '' ){

            return $this->select('tbl_online_exam', '*', $where);
        } else {

            return $this->innerJoin('tbl_admin', 'tbl_online_exam', '*', 'admin_id', 'admin_id' );
        }

    }

    public function updateExam($id, $data){
      $filter = 'exam_id=' . $id;
      return $this->update('tbl_online_exam', $data, $filter);
    }

    public function deleteExam($id){

        if($id){

            return $this->delete('tbl_online_exam', 'exam_id = "' .$id . '"' );
        } else {
            echo 'Please Proved Id';
        }
    }

    public function insertQuestion($para=array()){

        $this->insert('tbl_question', $para);
        return $this->mysqli;
    }

    public function insertOption($para=array()){

        return $this->insert('tbl_option', $para);
        // return $this->mysqli;
    }

    public function getQuestion($where){
        return $this->select('tbl_question', '*', $where);
    }

    public function getOption($where){
        return $this->select('tbl_option', '*', $where);
    }
}
