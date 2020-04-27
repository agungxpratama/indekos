<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{

	}

    public function login()
    {
		$this->load->view('auth/login');
    }

	public function proses_login()
	{
		$username = $this->input->post('username');
        // mendapatkan variabel username dari halaman login
		$password = $this->input->post('password');
        // mendapatkan variabel password dari halaman login
		$where = array(
			'username' => $username,
			'password' => md5($password),
			// 'password' => $password,
			);
            // ditampung di array
		$cek = $this->M_All->view_where('user' ,$where)->num_rows();
        // cek apabila data yang dimasukan ada dalam database

        $role = $this->M_All->view_where('user' ,$where)->row();
        // $mail = $this->M_User->get_mail('users',$where)->row();
        // cek role yang terdapat pada database
		if($cek > 0){
			$ket_role = ' ';
			if ($role->role == 2) {
				$ket_role = 'penghuni';
			}else {
				$ket_role = 'pemilik';
			}
			$data_session = array(
				'nama' => $username,
				'status' => "login",
                'role' => $ket_role,
                'id_user' => $role->id_user,
                'mail' => $role->email
				);

			$this->session->set_userdata($data_session);
            // menerapkan data session sesuai dengan nama username
			print_r($this->session->userdata());
			redirect(base_url("index.php/pemilik"));
            // apabila berhasil maka akan langsung ke halaman welcome
		}else{
			echo "Username dan password salah !";
		}
	}

    public function register()
    {
		$this->load->view('auth/register');
    }

	public function proses_registrasi()
	{
		if ($this->input->post('password') == $this->input->post('repeat_password')) {
			$data_user = array(
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'email' => $this->input->post('email'),
				'role' => 2,
			);
			if ($this->M_All->insert('user', $data_user) != true) {
				$where = array(
					'username' => $this->input->post('username'),
					'password' => md5($this->input->post('password')),
				);
				$user = $this->M_All->view_where('user', $where)->row();
				$data = array(
					'nama' => $this->input->post('nama_depan'),
					'nama_belakang' => $this->input->post('nama_belakang'),
					// 'alamat' => $this->input->post('alamat'),
					// 'kota' => $this->input->post('kota'),
					// 'no_telp' => $this->input->post('no_telp'),
					// 'kode_pos' => $this->input->post('kode_pos'),
					// 'email' => $this->input->post('email'),
					'id_user' => $user->id_user
				);
				$this->M_All->insert('penghuni', $data);
				redirect('/auth/login');
			}else {
				redirect('/auth/register');
			}
		}
		else {
			echo "<script> alert('Password tidak sama'); </script>";
			// header("location: ".base_url('index.php/auth/register'));
			redirect('/auth/register');
		}
	}

    public function logout()
    {
		$this->session->sess_destroy();
		redirect(base_url('index.php/'));
    }


}
