<?php

 /**
 * Author: Amirul Momenin
 * Desc:Transactions Controller
 *
 */
class Transactions extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url'); 
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('Customlib');
		$this->load->helper(array('cookie', 'url')); 
		$this->load->database();  
		$this->load->model('Transactions_model');
		if(! $this->session->userdata('validated')){
				redirect('admin/login/index');
		}  
    } 
	
    /**
	 * Index Page for this controller.
	 *@param $start - Starting of transactions table's index to get query
	 *
	 */
    function index($start=0){
		$limit = 10;
        $data['transactions'] = $this->Transactions_model->get_limit_transactions($limit,$start);
		//pagination
		$config['base_url'] = site_url('admin/transactions/index');
		$config['total_rows'] = $this->Transactions_model->get_count_transactions();
		$config['per_page'] = 10;
		//Bootstrap 4 Pagination fix
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tag_close']   = '<span aria-hidden="true"></span></span></li>';
		$config['next_tag_close']   = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tag_close']   = '</span></li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tag_close']  = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tag_close']   = '</span></li>';		
		$this->pagination->initialize($config);
        $data['link'] =$this->pagination->create_links();
		
        $data['_view'] = 'admin/transactions/index';
        $this->load->view('layouts/admin/body',$data);
    }
	
	 /**
     * Save transactions
	 *@param $id - primary key to update
	 *
     */
    function save($id=-1){   
		 
		$created_at = "";
        $updated_at = "";

		if($id<=0){
			 $created_at = date("Y-m-d H:i:s");
		 }
		else if($id>0){
			 $updated_at = date("Y-m-d H:i:s");
		 }

		$params = array(
						'customer_id' => html_escape($this->input->post('customer_id')),
						'subject' => html_escape($this->input->post('subject')),
						'description' => html_escape($this->input->post('description')),
						'currency_id' => html_escape($this->input->post('currency_id')),
						'debit' => html_escape($this->input->post('debit')),
						'credit' => html_escape($this->input->post('credit')),
						'reference' => html_escape($this->input->post('reference')),
						'created_at' =>$created_at,
						'updated_at' =>$updated_at,

				);
		 
		if($id>0){
			unset($params['created_at']);
		  }if($id<=0){
			unset($params['updated_at']);
		  } 
		$data['id'] = $id;
		//update		
        if(isset($id) && $id>0){
			$data['transactions'] = $this->Transactions_model->get_transactions($id);
            if(isset($_POST) && count($_POST) > 0){   
                $this->Transactions_model->update_transactions($id,$params);
				$this->session->set_flashdata('msg','Transactions has been updated successfully');
                redirect('admin/transactions/index');
            }else{
                $data['_view'] = 'admin/transactions/form';
                $this->load->view('layouts/admin/body',$data);
            }
        } //save
		else{
			if(isset($_POST) && count($_POST) > 0){   
                $transactions_id = $this->Transactions_model->add_transactions($params);
				$this->session->set_flashdata('msg','Transactions has been saved successfully');
                redirect('admin/transactions/index');
            }else{  
			    $data['transactions'] = $this->Transactions_model->get_transactions(0);
                $data['_view'] = 'admin/transactions/form';
                $this->load->view('layouts/admin/body',$data);
            }
		}
        
    } 
	
	function select_customer($id){
	   $_SESSION['selected_customer_id'] = $id;
	   redirect('admin/transactions/index');
	}
	
	function select_customer2(){
	   $_SESSION['selected_customer_id'] = $_REQUEST['selected_customer_id'];
	   redirect('admin/transactions/index');
	}
	/**
     * Details transactions
	 * @param $id - primary key to get record
	 *
     */
	function details($id){
        $data['transactions'] = $this->Transactions_model->get_transactions($id);
		$data['id'] = $id;
        $data['_view'] = 'admin/transactions/details';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Deleting transactions
	 * @param $id - primary key to delete record
	 *
     */
    function remove($id){
        $transactions = $this->Transactions_model->get_transactions($id);

        // check if the transactions exists before trying to delete it
        if(isset($transactions['id'])){
            $this->Transactions_model->delete_transactions($id);
			$this->session->set_flashdata('msg','Transactions has been deleted successfully');
            redirect('admin/transactions/index');
        }
        else
            show_error('The transactions you are trying to delete does not exist.');
    }
	
	/**
     * Search transactions
	 * @param $start - Starting of transactions table's index to get query
     */
	function search($start=0){
		if(!empty($this->input->post('key'))){
			$key =$this->input->post('key');
			$_SESSION['key'] = $key;
		}else{
			$key = $_SESSION['key'];
		}
		
		$limit = 10;		
		$this->db->like('id', $key, 'both');
		$this->db->or_like('customer_id', $key, 'both');
		$this->db->or_like('subject', $key, 'both');
		$this->db->or_like('description', $key, 'both');
		$this->db->or_like('currency_id', $key, 'both');
		$this->db->or_like('debit', $key, 'both');
		$this->db->or_like('credit', $key, 'both');
		$this->db->or_like('reference', $key, 'both');
		$this->db->or_like('created_at', $key, 'both');
		$this->db->or_like('updated_at', $key, 'both');


		$this->db->order_by('id', 'desc');
		
        $this->db->limit($limit,$start);
        $data['transactions'] = $this->db->get('transactions')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		
		//pagination
		$config['base_url'] = site_url('admin/transactions/search');
		$this->db->reset_query();		
		$this->db->like('id', $key, 'both');
		$this->db->or_like('customer_id', $key, 'both');
		$this->db->or_like('subject', $key, 'both');
		$this->db->or_like('description', $key, 'both');
		$this->db->or_like('currency_id', $key, 'both');
		$this->db->or_like('debit', $key, 'both');
		$this->db->or_like('credit', $key, 'both');
		$this->db->or_like('reference', $key, 'both');
		$this->db->or_like('created_at', $key, 'both');
		$this->db->or_like('updated_at', $key, 'both');

		$config['total_rows'] = $this->db->from("transactions")->count_all_results();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		$config['per_page'] = 10;
		// Bootstrap 4 Pagination fix
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tag_close']   = '<span aria-hidden="true"></span></span></li>';
		$config['next_tag_close']   = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tag_close']   = '</span></li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tag_close']  = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tag_close']   = '</span></li>';
		$this->pagination->initialize($config);
        $data['link'] =$this->pagination->create_links();
		
		$data['key'] = $key;
		$data['_view'] = 'admin/transactions/index';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Export transactions
	 * @param $export_type - CSV or PDF type 
     */
	function export($export_type='CSV'){
	  if($export_type=='CSV'){	
		   // file name 
		   $filename = 'transactions_'.date('Ymd').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; ");
		   // get data 
		   $this->db->order_by('id', 'desc');
		   $transactionsData = $this->Transactions_model->get_all_transactions();
		   // file creation 
		   $file = fopen('php://output', 'w');
		   $header = array("Id","Customer Id","Subject","Description","Currency Id","Debit","Credit","Reference","Created At","Updated At"); 
		   fputcsv($file, $header);
		   foreach ($transactionsData as $key=>$line){ 
			 fputcsv($file,$line); 
		   }
		   fclose($file); 
		   exit; 
	  }else if($export_type=='Pdf'){
		    $this->db->order_by('id', 'desc');
		    $transactions = $this->db->get('transactions')->result_array();
		   // get the HTML
			ob_start();
			include(APPPATH.'views/admin/transactions/print_template.php');
			$html = ob_get_clean();
			require_once FCPATH.'vendor/autoload.php';			
			$mpdf = new \Mpdf\Mpdf();
			$mpdf->WriteHTML($html);
			$mpdf->Output();
			exit;
	  }
	   
	}
}
//End of Transactions controller