<?php

/* 
 * This page for connect and queries with database.
 * Developer by khaled AbdElRahim!!
 */
class Db_blog extends CI_Model
{
    /*
     * This function works on insert some data into one table, 
     * By put array with data and keys have name like filds name,     
     * (Put name of table here , Put the array here)
     */
    public function insert_db($table,$data){
        $insert = $this->db->insert("$table",$data);
        return $insert ;
    }
    /*
     * This function works on get some data from one table, 
     * By put the table and, after that you can use the loop for show this data,     
     * (Put table name here )
     */
    public function get_db($table){
        $GET = $this->db->get("$table");
        return $GET->result();
    }
    /*
     * This function works on bring the row  by a field,
     * By put the table and name of a field and his value,
     * After that you can use the loop for show this data,
     * (Put the table, put a field , put a value of the field )
     */
    public function get_where_db($table,$field,$value){
        $GET = $this->db->get_where("$table", array("$field" => "$value"));
        return $GET->result();
    }
    /*
     * This function works on get some data by one field from one table, 
     * By put the table and the filed, after that you can use the loop for show this data,     
     * (Put name of table here , Put name of filed here )
     */
    public function get_by_field_db($table,$filed){
        $this->db->order_by("$filed",'desc');
        $GET = $this->db->get("$table");
       
        return $GET->result();
    }
    /*
     * This function works on get some data from two tables, 
     * By put two tables and the main filed, after that you can use the loop for show this data,      
     * (Put name of main table here ,Put name of subtable here , 
     *  Put name of main filed here ,Put name of field you want get by it here 'If you want' )
     */
    public function get_by_join_db($table1, $table2, $field, $orderby='') {
        $this->db->order_by("$orderby",'desc');
        
        $this->db->select('*');
        $this->db->from("$table1");
        $this->db->join("$table2","$table1.$field = $table2.$field");
        $GET = $this->db->get();
        
        return $GET->result();
    }
    /*
     * This function works on get some data from two tables, 
     * By put two tables and the main filed, after that you can use the loop for show this data,      
     * (Put name of main table here ,Put name of subtable here , 
     *  Put name of main filed here ,Put any thing you want here 'If you want' ) 
     */
    public function get_some_postes($table1,$table2,$field,$more='') {
        /*
         * $sql = "SELECT `posts`.*, `sections`.* FROM `posts` LEFT JOIN  `sections` ON"
         *   . " `posts`.`section_id` = `sections`.`section_id` WHERE field =10 LIMIT 0 , 30";
         */
        $sql = "SELECT `$table1`.*, `$table2`.* FROM `$table1` LEFT JOIN  `$table2` ON"
             . " `$table1`.`$field` = `$table2`.`$field` $more";
        
        $data = $this->db->query($sql);
        return $data->result();
    }
    /*
     * This function works on update a row,
     * By but a new data into the table by a field and his value,
     * (Put the table there, put the data there, put the field, put value of the field)
     */
    public function update_db($table,$data,$field,$id) {        
        $this->db->update("$table", $data, array("$field" => $id) );
    }
    /*
     * This function works on delete a row,
     * By put the table and name of a field and his value,   
     * (Put the table, put a field , put a value of the field )  
     */
    public function delete_db($table,$field,$id) {
        $this->db->delete("$table", array("$field" => $id) );
    }
    /*
     * This function works on validate of username and password,
     * By put a value of username and password fields,
     * (Put the username, put the password )
     */
    public function login($user,$pass){   
        $this->db->where('name',$user);
        $this->db->where('password',$pass);
        
        $get = $this->db->get('admin');
        return $get->result();
    }
    
}
