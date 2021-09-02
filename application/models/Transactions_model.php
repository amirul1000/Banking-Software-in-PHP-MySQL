<?php

/**
 * Author: Amirul Momenin
 * Desc:Transactions Model
 */
class Transactions_model extends CI_Model
{
	protected $transactions = 'transactions';
	
    function __construct(){
        parent::__construct();
    }
	
    /** Get transactions by id
	 *@param $id - primary key to get record
	 *
     */
    function get_transactions($id){
        $result = $this->db->get_where('transactions',array('id'=>$id))->row_array();
		if(!(array)$result){
			$fields = $this->db->list_fields('transactions');
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
	
    /** Get all transactions
	 *
     */
    function get_all_transactions(){
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('transactions')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit transactions
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_transactions($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('transactions')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count transactions rows
	 *
     */
	function get_count_transactions(){
       $result = $this->db->from("transactions")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	
	 /** Get all users-transactions
	 *
     */
    function get_all_users_transactions(){
        $this->db->order_by('id', 'desc');
		$this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('transactions')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit users-transactions
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_users_transactions($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
		$this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('transactions')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count users-transactions rows
	 *
     */
	function get_count_users_transactions(){
	   $this->db->where('users_id', $this->session->userdata('id'));
       $result = $this->db->from("transactions")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** function to add new transactions
	 *@param $params - data set to add record
	 *
     */
    function add_transactions($params){
        $this->db->insert('transactions',$params);
        $id = $this->db->insert_id();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $id;
    }
	
    /** function to update transactions
	 *@param $id - primary key to update record,$params - data set to add record
	 *
     */
    function update_transactions($id,$params){
        $this->db->where('id',$id);
        $status = $this->db->update('transactions',$params);
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
	
    /** function to delete transactions
	 *@param $id - primary key to delete record
	 *
     */
    function delete_transactions($id){
        $status = $this->db->delete('transactions',array('id'=>$id));
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
}
