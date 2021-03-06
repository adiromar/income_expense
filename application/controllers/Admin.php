<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->library('form_validation');
		$this->load->helper('file');
        
	}

	public function dash(){
		$data['title'] = 'Dashboard';
		$user_id = $this->session->userdata('user_id');

		$data['income'] = $this->db->where('user_id', $user_id)->order_by('date', 'desc')->get('income')->result();
		$data['expenses'] = $this->db->where('user_id', $user_id)->order_by('date', 'desc')->get('expenses')->result();

		$this->load->view('templates/header');
		$this->load->view('admin/dashboard', $data);
		$this->load->view('templates/footer');
	}

	public function addIncome(){
		$data['title'] = 'Add Income';

		$this->load->view('templates/header');
		$this->load->view('admin/addIncome', $data);
		$this->load->view('templates/footer');
	}

	public function addExpense(){
		$data['title'] = 'Add Expenses';

		$this->load->view('templates/header');
		$this->load->view('admin/addExpense', $data);
		$this->load->view('templates/footer');
	}

	public function editIncome(){
		$data['title'] = 'Edit Income';
		$tid = $this->uri->segment(3);
		$data['tid'] = $tid;
		$data['income'] = $this->db->get_where('income', ['id' => $tid])->result();

		$this->load->view('templates/header');
		$this->load->view('admin/editIncome', $data);
		$this->load->view('templates/footer');
	}

	public function editExpenses(){
		$data['title'] = 'Edit expenes';
		$tid = $this->uri->segment(3);
		$data['tid'] = $tid;
		$data['expenses'] = $this->db->get_where('expenses', ['id' => $tid])->result();

		$this->load->view('templates/header');
		$this->load->view('admin/editExpense', $data);
		$this->load->view('templates/footer');
	}

	public function store_income(){
		// print_r($_POST);die;;
		$user_id = $this->session->userdata('user_id');
		if(isset($_POST['btnsubmit'])){
			$date = $this->input->post("date");
			$income = $this->input->post("income");

			$data = array(
				'date' => $date,
				'income' => $income,
				'user_id' => $user_id
			);
			$ins = $this->db->insert('income', $data);

			if($ins){
				$this->session->set_flashdata('success', 'Successfully Added Income details');
				redirect($_SERVER['HTTP_REFERER']);
			}else{
				$this->session->set_flashdata('error', 'Error');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}
	}

	public function store_expenses(){
		// print_r($_POST);die;;
		$user_id = $this->session->userdata('user_id');

		if(isset($_POST['btnsubmit'])){
			$date = $this->input->post("date");
			$expenses = $this->input->post("expenses");

			$data = array(
				'date' => $date,
				'expenses' => $expenses,
				'user_id' => $user_id
			);
			$ins = $this->db->insert('expenses', $data);

			if($ins){
				$this->session->set_flashdata('success', 'Successfully added Expenses');
				redirect($_SERVER['HTTP_REFERER']);
			}else{
				$this->session->set_flashdata('error', 'Error! Please Try Again');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}
	}

	public function saving_calculator(){
		error_reporting(0);
		$user_id = $this->session->userdata('user_id');
		$date1 = $_POST['date1'];
		$date2 = $_POST['date2'];
		$data['date1'] = $date1;
		$data['date2'] = $date2;

		if(!empty($date1) && (!empty($date2)) ){
			$data['income'] = $this->admin_model->get_savings_date_range('income', $date1, $date2, $user_id);
			$data['expenses'] = $this->admin_model->get_savings_date_range('expenses', $date1, $date2, $user_id);

			$data['title'] = $date1 . ' - '. $date2;
			$this->load->view('admin/fetch', $data);
		}elseif(!empty($date1) && empty($date2)){
			$data['income'] = $this->admin_model->get_savings_date_range_date1('income', $date1, $user_id);
			$data['expenses'] = $this->admin_model->get_savings_date_range_date1('expenses', $date1, $user_id);

			$data['title'] = 'Result Data greater than ' .$date1;
			$this->load->view('admin/fetch', $data);
		}elseif(!empty($date2) && empty($date1)){
			$data['income'] = $this->admin_model->get_savings_date_range_date2('income', $date2, $user_id);
			$data['expenses'] = $this->admin_model->get_savings_date_range_date2('expenses', $date2, $user_id);

			$data['title'] = 'Result Data less than ' .$date2;
			$this->load->view('admin/fetch', $data);
		}elseif(empty($date1) || empty($date2)){
			echo "Select Both Parameters.";die;
		}
		// print_r($data);
	}

	public function calculations(){
		
		$date = date("Y-m-d");
		$user_id = $this->session->userdata('user_id');

		if (empty($_GET['filter'])){
			$data['title'] = 'Daily Income/Expenses calculations';
			$data['income'] = $this->db->where('date', $date)->where('user_id', $user_id)->get('income')->result();

			$data['expenses'] = $this->db->where('date', $date)->where('user_id', $user_id)->get('expenses')->result();
		}elseif($_GET['filter'] == 'weekly' ){
			$data['title'] = 'Weekly Income/Expenses calculations';
			$week = date("Y-m-d", strtotime("-1 week"));

			$data['income'] = $this->db->where('date >=', $week)->where('user_id', $user_id)->get('income')->result();
			$data['expenses'] = $this->db->where('date >=', $week)->where('user_id', $user_id)->get('expenses')->result();
		}elseif($_GET['filter'] == 'monthly'){
			$month = date("Y-m-d", strtotime("-1 months"));
			$data['title'] = 'Monthly Income/Expenses calculations';
		}elseif($_GET['filter'] == 'yearly'){
			$data['title'] = 'Yearly Income/Expenses calculations';
			$year = date("Y-m-d", strtotime("-1 years"));
		}else{

			// $data['calculations'] = $this->db->select('*,income.id as inc_id,expenses.id as exp_id');
   //     								$this->db->from('income');
			// 						$this->db->where('date', $date)->where('user_id', $user_id);
			// 						$this->db->join('expenses', 'expenses.user_id = $user_id');
			// 						return $this->db->get()->result();
		}
		$this->load->view('templates/header');
		$this->load->view('admin/calculations', $data);
		$this->load->view('templates/footer');
	}

	public function update_income(){
		// print_r($_POST);die;;
		$user_id = $this->session->userdata('user_id');

		if(isset($_POST['btnsubmit'])){
			$date = $this->input->post("date");
			$income = $this->input->post("income");
			$tid = $this->input->post("id");
			
			$data = array(
				'date' => $date,
				'income' => $income,
			);
			$ins = $this->db->where('id', $tid);
				$this->db->update('income', $data);

			if($ins){
				$this->session->set_flashdata('success', 'Successfully Updated Income Details');
				redirect('/dash');
			}else{
				$this->session->set_flashdata('error', 'Error! Please Try Again');
				redirect('/dash');
			}
		}
	}

	public function update_expenses(){
		// print_r($_POST);die;;
		$user_id = $this->session->userdata('user_id');

		if(isset($_POST['btnsubmit'])){
			$date = $this->input->post("date");
			$expenses = $this->input->post("expenses");
			$tid = $this->input->post("id");
			
			$data = array(
				'date' => $date,
				'expenses' => $expenses,
			);
			$ins = $this->db->where('id', $tid);
				$this->db->update('expenses', $data);

			if($ins){
				$this->session->set_flashdata('success', 'Successfully Updated Expenses Details');
				redirect('/dash');
			}else{
				$this->session->set_flashdata('error', 'Error! Please Try Again');
				redirect('/dash');
			}
		}
	}

	public function delete(){
		echo "hrllo";die;
		print_r($_POST['dataString']);
		print_r($dataString);die;


		if(isset($_POST['btnsubmit'])){
			$tbl_id = $this->input->post('tbl_id');
			$tbl = $this->input->post('tbl');

			$del = $this->db->delete($tbl, array('id' => $tbl_id));
			if($del){
				$this->session->set_flashdata('error', 'Table Record Deleted');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}else{
			$this->session->set_flashdata('error', 'Some Error Occurred. Please Try Again.');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

}


?>