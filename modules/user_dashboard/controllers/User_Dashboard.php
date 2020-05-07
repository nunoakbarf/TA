<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Dashboard extends CI_Controller{
	
	function __construct(){
		parent::__construct();		
		$this->load->model('M_Akun_User');
		$this->load->helper('url');
		$this->simple_login_user->cek_login_user(); 
	}
 
	function index(){
		$data['judul'] = "K⍜PIKU | My Account";

		$this->load->model('cart/M_Cart');
		$data['cart']= $this->M_Cart->get_data();
		$data['sum_jumlah']= $this->M_Cart->jumlah_cart();

        $data['uname'] = $this->session->userdata('uname');
		$this->load->view('beranda/template/user_header', $data);
		$this->load->view('userdashboardv',$data);
		$this->load->view('beranda/template/user_footer', $data);
	}

	function akun($uname){
		$data['judul'] = "K⍜PIKU | My Account";
		$this->load->model('cart/M_Cart');
		$data['cart']= $this->M_Cart->get_data();
		$data['sum_jumlah']= $this->M_Cart->jumlah_cart();
		$where = array('uname' => $uname);
		$data['users'] = $this->M_Akun_User->tampil_data($where,'users')->result();
		$data['uname'] = $this->session->userdata('uname');
		$this->load->view('beranda/template/user_header', $data);
		$this->load->view('account/user',$data);
		$this->load->view('beranda/template/user_footer', $data);
	}

	function edit($uname){
		$data['judul'] = "Edit | My Account";
		$this->load->model('cart/M_Cart');
		$data['cart']= $this->M_Cart->get_data();
		$data['sum_jumlah']= $this->M_Cart->jumlah_cart();
		$where = array('uname' => $uname);
		$data['users'] = $this->M_Akun_User->edit_data($where,'users')->result();
		$this->load->view('beranda/template/user_header', $data);
		$this->load->view('account/update_user',$data);
		$this->load->view('beranda/template/user_footer', $data);
	}

	function update(){
		$id_user = $this->input->post('id_user');
		$uname = $this->input->post('uname');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$email = $this->input->post('email');
		$nohp = $this->input->post('nohp');
	 
		$data = array(
			'nama' => $nama,
			'uname' => $uname,
			'alamat' => $alamat,
			'email' => $email,
			'nohp' => $nohp
		);
	 
		$where = array(
			'uname' => $uname
		);
	 
		$this->M_Akun_User->update_data($where,$data,'users');
		redirect('user_dashboard');
	}
}
