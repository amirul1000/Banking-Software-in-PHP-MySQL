<?php

/**
 * Author: Amirul Momenin
 * Desc:Currency Model
 */
class Currency_model extends CI_Model
{
	protected $currency = 'currency';
	
    function __construct(){
        parent::__construct();
    }
	
    /** Get currency by id
	 *@param $id - primary key to get record
	 *
     */
    function get_currency($id){
        $result = $this->db->get_where('currency',array('id'=>$id))->row_array();
		if(!(array)$result){
			$fields = $this->db->list_fields('currency');
			foreach ($fields as $field)
			{
			   $result[$field] = ''; 	  
			}
		}
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    } 
	
    /** Get all currency
	 *
     */
    function get_all_currency(){
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('currency')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit currency
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_currency($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('currency')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count currency rows
	 *
     */
	function get_count_currency(){
       $result = $this->db->from("currency")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	
	 /** Get all users-currency
	 *
     */
    function get_all_users_currency(){
        $this->db->order_by('id', 'desc');
		$this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('currency')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit users-currency
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_users_currency($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
		$this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('currency')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count users-currency rows
	 *
     */
	function get_count_users_currency(){
	   $this->db->where('users_id', $this->session->userdata('id'));
       $result = $this->db->from("currency")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** function to add new currency
	 *@param $params - data set to add record
	 *
     */
    function add_currency($params){
        $this->db->insert('currency',$params);
        $id = $this->db->insert_id();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $id;
    }
	
    /** function to update currency
	 *@param $id - primary key to update record,$params - data set to add record
	 *
     */
    function update_currency($id,$params){
        $this->db->where('id',$id);
        $status = $this->db->update('currency',$params);
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
	
    /** function to delete currency
	 *@param $id - primary key to delete record
	 *
     */
    function delete_currency($id){
        $status = $this->db->delete('currency',array('id'=>$id));
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
}
