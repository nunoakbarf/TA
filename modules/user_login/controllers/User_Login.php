<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Login extends CI_Controller {

	public function index() { 
		// Fungsi Login 
		$valid = $this->form_validation; 
		$uname = $this->input->post('uname'); 
		$pw = $this->input->post('pw'); 
		$valid->set_rules('uname','uname','required'); 
		$valid->set_rules('pw','pw','required'); 
		
		if($valid->run()) { 
			$this->simple_login_user->user_login($uname,$pw, base_url('user_dashboard'), base_url('user_login')); 
		} // End fungsi login 
		if($this->session->userdata('uname') == '') {
			$data['judul'] = "K⍜PIKU | Log In User";
			$this->load->model('cart/M_Cart');
			$data['cart']= $this->M_Cart->get_data();
			$data['sum_jumlah']= $this->M_Cart->jumlah_cart();
			$this->load->view('beranda/template/user_header', $data);
            $this->load->view('account/userloginv');
			$this->db->empty_table('cart');
			$this->load->view('beranda/template/user_footer', $data);
        } else {
            redirect(site_url('user_dashboard'));
        }
	} 
	public function logout(){
		$this->load->model('cart/M_Cart');
		$this->M_Cart->hapus_all_cart();
		$this->simple_login_user->logout();
	}
}
