<?php

 /**
 * Author: Amirul Momenin
 * Desc:Currency Controller
 *
 */
class Currency extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url'); 
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('Customlib');
		$this->load->helper(array('cookie', 'url')); 
		$this->load->database();  
		$this->load->model('Currency_model');
		if(! $this->session->userdata('validated')){
				redirect('admin/login/index');
		}  
    } 
	
    /**
	 * Index Page for this controller.
	 *@param $start - Starting of currency table's index to get query
	 *
	 */
    function index($start=0){
		$limit = 10;
        $data['currency'] = $this->Currency_model->get_limit_currency($limit,$start);
		//pagination
		$config['base_url'] = site_url('admin/currency/index');
		$config['total_rows'] = $this->Currency_model->get_count_currency();
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
		
        $data['_view'] = 'admin/currency/index';
        $this->load->view('layouts/admin/body',$data);
    }
	
	 /**
     * Save currency
	 *@param $id - primary key to update
	 *
     */
    function save($id=-1){   
		 
		
		
		$params = array(
					 'code' => html_escape($this->input->post('code')),
'name' => html_escape($this->input->post('name')),
'symbol' => html_escape($this->input->post('symbol')),

				);
		 
		 
		$data['id'] = $id;
		//update		
        if(isset($id) && $id>0){
			$data['currency'] = $this->Currency_model->get_currency($id);
            if(isset($_POST) && count($_POST) > 0){   
                $this->Currency_model->update_currency($id,$params);
				$this->session->set_flashdata('msg','Currency has been updated successfully');
                redirect('admin/currency/index');
            }else{
                $data['_view'] = 'admin/currency/form';
                $this->load->view('layouts/admin/body',$data);
            }
        } //save
		else{
			if(isset($_POST) && count($_POST) > 0){   
                $currency_id = $this->Currency_model->add_currency($params);
				$this->session->set_flashdata('msg','Currency has been saved successfully');
                redirect('admin/currency/index');
            }else{  
			    $data['currency'] = $this->Currency_model->get_currency(0);
                $data['_view'] = 'admin/currency/form';
                $this->load->view('layouts/admin/body',$data);
            }
		}
        
    } 
	
	/**
     * Details currency
	 * @param $id - primary key to get record
	 *
     */
	function details($id){
        $data['currency'] = $this->Currency_model->get_currency($id);
		$data['id'] = $id;
        $data['_view'] = 'admin/currency/details';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Deleting currency
	 * @param $id - primary key to delete record
	 *
     */
    function remove($id){
        $currency = $this->Currency_model->get_currency($id);

        // check if the currency exists before trying to delete it
        if(isset($currency['id'])){
            $this->Currency_model->delete_currency($id);
			$this->session->set_flashdata('msg','Currency has been deleted successfully');
            redirect('admin/currency/index');
        }
        else
            show_error('The currency you are trying to delete does not exist.');
    }
	
	/**
     * Search currency
	 * @param $start - Starting of currency table's index to get query
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
$this->db->or_like('code', $key, 'both');
$this->db->or_like('name', $key, 'both');
$this->db->or_like('symbol', $key, 'both');


		$this->db->order_by('id', 'desc');
		
        $this->db->limit($limit,$start);
        $data['currency'] = $this->db->get('currency')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		
		//pagination
		$config['base_url'] = site_url('admin/currency/search');
		$this->db->reset_query();		
		$this->db->like('id', $key, 'both');
$this->db->or_like('code', $key, 'both');
$this->db->or_like('name', $key, 'both');
$this->db->or_like('symbol', $key, 'both');

		$config['total_rows'] = $this->db->from("currency")->count_all_results();
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
		$data['_view'] = 'admin/currency/index';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Export currency
	 * @param $export_type - CSV or PDF type 
     */
	function export($export_type='CSV'){
	  if($export_type=='CSV'){	
		   // file name 
		   $filename = 'currency_'.date('Ymd').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; ");
		   // get data 
		   $this->db->order_by('id', 'desc');
		   $currencyData = $this->Currency_model->get_all_currency();
		   // file creation 
		   $file = fopen('php://output', 'w');
		   $header = array("Id","Code","Name","Symbol"); 
		   fputcsv($file, $header);
		   foreach ($currencyData as $key=>$line){ 
			 fputcsv($file,$line); 
		   }
		   fclose($file); 
		   exit; 
	  }else if($export_type=='Pdf'){
		    $this->db->order_by('id', 'desc');
		    $currency = $this->db->get('currency')->result_array();
		   // get the HTML
			ob_start();
			include(APPPATH.'views/admin/currency/print_template.php');
			$html = ob_get_clean();
			require_once FCPATH.'vendor/autoload.php';			
			$mpdf = new \Mpdf\Mpdf();
			$mpdf->WriteHTML($html);
			$mpdf->Output();
			exit;
	  }
	   
	}
}
//End of Currency controller