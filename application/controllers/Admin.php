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

		$data['income'] = $this->db->get('income')->result();
		$data['expenses'] = $this->db->get('expenses')->result();

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
			$month = date("Y-m-d", strtotime("-1 month"));
			$data['title'] = 'Monthly Income/Expenses calculations';
		}elseif($_GET['filter'] == 'yearly'){
			$data['title'] = 'Yearly Income/Expenses calculations';
			$year = date("Y-m-d", strtotime("-1 year"));
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

}


?>