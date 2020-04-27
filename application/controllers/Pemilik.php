<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemilik extends CI_Controller {

	function __construct(){
		parent::__construct();
			// if($this->session->userdata('status') != "login"){
			// 	// redirect(base_url("index.php/"));
			// }
		if($this->session->userdata('role') != "pemilik"){
			redirect(base_url("index.php/"));
		}
	}
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
	// public function index()
	// {
	// 	$this->load->view('pemilik/header_pemilik');
	// }

    public function dataPenghuni()
    {
        // code...
    }

    public function transaksi()
    {
        // code...
    }

	public function header()
	{
		$id_pemilik = $this->session->userdata('id_user');
		$where = array('id_user' => $id_pemilik);
		$data['nama'] = $this->M_All->view_where('pemilik', $where)->row();
		$this->load->view('pemilik/sidebar_pemilik');
		$this->load->view('pemilik/header_pemilik', $data);
	}

	public function index(){
		// if (empty($_SESSION['pemilik'])) {
  		// header("location: ".base_url());
		// } else{
			// $sql      		= "SELECT nama_pemilik FROM pemilik WHERE id_pemilik = '$_SESSION[id_pemilik]';";
            // $data['nama']   = $this->conn->query($sql);
		// $total_transaksi = $this->M_All->count('transaksi');
		// $where = array('id_transaksi' => 0, );
		// $yang_belum = $this->M_All->count_where('transaksi', $where);
		// $f = 0;
		// if ($total_transaksi > 0) {
		// 	$f = $yang_belum/$total_transaksi;
		// }
		// $persen = number_format($f*100, 0);
		// $data['per'] = array(
		// 	'total_transaksi' => $total_transaksi,
		// 	'persen' => $persen,
		// 	'yang_belum' => $yang_belum,
		// );
		// $data['jumlah_orang'] = $this->M_All->count('pencari');
		// $data['jumlah_kamar'] = $this->M_All->count('kamar');
		// $id_pemilik = $this->session->userdata('id_user');
		// $where = array('id_user' => $id_pemilik);
		// $data['nama'] = $this->M_All->view_where('pemilik', $where)->row();
		// // print_r($this->session->userdata());
		// // print_r($data);
		// $this->load->view('pemilik/sidebar_pemilik');
		// $this->load->view('pemilik/header_pemilik', $data);
		$this->header();
		$this->load->view('pemilik/dashboard');
		$this->load->view('pemilik/foot_pemilik');
		// }
	}

	public function booking(){
		// if (empty($_SESSION['pemilik'])) {
  		// header("location: ".base_url());
		// } else{
			//
			// $sql      		= "SELECT nama_pemilik FROM pemilik WHERE id_pemilik = '$_SESSION[id_pemilik]';";
            // $data['nama']   = $this->conn->query($sql);
		$id_pemilik = $this->session->userdata('id_pemilik');
		$where = array('id_pemilik' => $id_pemilik);
		$data['nama'] = $this->M_All->view_where('pemilik', $where)->row();
		$data['result'] = $this->M_All->join_transaksi('transaksi', 'kamar', 'kosan', 'pemilik', 'pencari')->result();
		$this->load->view('pemilik/sidebar_pemilik');
		$this->load->view('pemilik/header_pemilik', $data);
		$this->load->view('pemilik/booking', $data);
		$this->load->view('pemilik/foot_pemilik');
		// }
	}

	public function proses_booking($id)
	{
		$where = array('id_transaksi' => $id, );
		$data = array('status_transaksi' => 1, );
		$this->M_All->update('transaksi', $where, $data);
		redirect('index.php/pemilik/booking');
	}

	public function data_tamu(){
		// if (empty($_SESSION['pemilik'])) {
  		// header("location: ".base_url());
		// } else{
		// 	$sql      		= "SELECT nama_pemilik FROM pemilik WHERE id_pemilik = '$_SESSION[id_pemilik]';";
        //     $data['nama']   = $this->conn->query($sql);
		$id_pemilik = $this->session->userdata('id_pemilik');
		$where = array('id_pemilik' => $id_pemilik);
		$data['nama'] = $this->M_All->view_where('pemilik', $where)->row();
		$data['result'] = $this->M_All->join_transaksi('transaksi', 'kamar', 'kosan', 'pemilik', 'pencari')->result();
		$this->load->view('pemilik/sidebar_pemilik');
		$this->load->view('pemilik/header_pemilik', $data);
		$this->load->view('pemilik/data_tamu', $data);
		$this->load->view('pemilik/foot_pemilik');
		// }
	}

	public function pemasukan(){
		// if (empty($_SESSION['pemilik'])) {
  		// header("location: ".base_url());
		// } else{
		// 	$sql      		= "SELECT nama_pemilik FROM pemilik WHERE id_pemilik = '$_SESSION[id_pemilik]';";
        //     $data['nama']   = $this->conn->query($sql);
		$id_pemilik = $this->session->userdata('id_pemilik');
		$where = array('id_pemilik' => $id_pemilik);
		$data['nama'] = $this->M_All->view_where('pemilik', $where)->row();
		$data['result'] = $this->M_All->join_('transaksi', 'kamar', 'kosan', 'pemilik')->result();
		$this->load->view('pemilik/sidebar_pemilik');
		$this->load->view('pemilik/header_pemilik', $data);
		$this->load->view('pemilik/pemasukan', $data);
		$this->load->view('pemilik/foot_pemilik');
		// }
	}

	public function pengeluaran(){
		// if (empty($_SESSION['pemilik'])) {
  		// header("location: ".base_url());
		// } else{
		// 	$sql      		= "SELECT nama_pemilik FROM pemilik WHERE id_pemilik = '$_SESSION[id_pemilik]';";
        //     $data['nama']   = $this->conn->query($sql);

		$id_pemilik = $this->session->userdata('id_pemilik');
		$where = array('id_pemilik' => $id_pemilik);
		$data['nama'] = $this->M_All->view_where('pemilik', $where)->row();
		$data['result'] = $this->M_All->get('pengeluaran')->result();
		$this->load->view('pemilik/sidebar_pemilik');
		$this->load->view('pemilik/header_pemilik', $data);
		$this->load->view('pemilik/pengeluaran', $data);
		$this->load->view('pemilik/foot_pemilik');
		// }
	}

	public function tambah_pengeluaran()
	{
		$data = array(
			'keterangan_pengeluaran' => $this->input->post('keterangan_pengeluaran'),
			'harga' => $this->input->post('harga'),
			'jumlah' => $this->input->post('jumlah'),
		);
		$this->M_All->insert('pengeluaran', $data);
		redirect('index.php/pemilik/pengeluaran');
	}

	public function edit_pengeluaran()
	{
		$where = array('kode_pengeluaran' => $this->input->post('kode_pengeluaran'), );
		$data = array(
			'keterangan_pengeluaran' => $this->input->post('keterangan_pengeluaran'),
			'harga' => $this->input->post('harga'),
			'jumlah' => $this->input->post('jumlah'),
		);
		$this->M_All->update('pengeluaran', $where, $data);
		redirect('index.php/pemilik/pengeluaran');
	}

	public function hapus_pengeluaran($id)
	{
		$where = array('kode_pengeluaran' => $id);
		$this->M_All->delete($where,'pengeluaran');
		redirect('index.php/pemilik/pengeluaran');
	}

	public function view_data_kos(){
		// if (empty($_SESSION['pemilik'])) {
  		// header("location: ".base_url());
		// } else{
			// $sql      		= "SELECT nama_pemilik FROM pemilik WHERE id_pemilik = '$_SESSION[id_pemilik]';";
            // $data['nama']   = $this->conn->query($sql);

		$id_pemilik = $this->session->userdata('id_pemilik');
		$where = array('id_pemilik' => $id_pemilik);
		$data['nama'] = $this->M_All->view_where('pemilik', $where)->row();

		// $sql="SELECT * FROM kosan WHERE id_pemilik='$_SESSION[id_pemilik]'";
		// $data['result']=$this->conn->query($sql);

		$data['result'] = $this->M_All->view_where('kosan', $where)->result();
		$this->load->view('pemilik/sidebar_pemilik');
		$this->load->view('pemilik/header_pemilik',$data);
		$this->load->view('pemilik/data_kos', $data);
		$this->load->view('pemilik/foot_pemilik');
		// }
	}
	public function logoutt(){
		session_destroy();
		header("location: ".base_url());
	}

	function Logout(){
        $this->session->sess_destroy();
        redirect(base_url('index.php/welcome'));
    }

	public function input_data_kos(){
		// if (empty($_SESSION['pemilik'])) {
  		// header("location: ".base_url());
		// } else{
			// $sql      		= "SELECT nama_pemilik FROM pemilik WHERE id_pemilik = '$_SESSION[id_pemilik]';";
            // $data['nama']   = $this->conn->query($sql);
		// $id_pemilik = $this->session->userdata('id_pemilik');
		// $where = array('id_pemilik' => $id_pemilik);
		// $data['nama'] = $this->M_All->view_where('pemilik', $where)->row();
		// $this->load->view('pemilik/sidebar_pemilik');
		// $this->load->view('pemilik/header_pemilik', $data);
		$this->header();
		$this->load->view('pemilik/input_data_kos');
		$this->load->view('pemilik/foot_pemilik');
		// }
	}

	public function insert_data_kos(){
		$config['upload_path']          = './assets_admin/upload_kos/';
		$config['overwrite']        = true;
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1024;
		// $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('foto')){
            $error = array('error' => $this->upload->display_errors());
            // $this->load->view('upload_form', $error);
			echo "<script> alert('Foto Kos Gagal diunggah');</script>";
        }else{
            $data = array('upload_data' => $this->upload->data());
            // $this->load->view('upload_success', $data);
			$nama_kos = $this->input->post('nama_kos');
			$karakter= '123456789';
			$string = '';
			for ($i = 0; $i < 4; $i++) {
				$pos = rand(0, strlen($karakter)-1);
				$string .= $karakter[$pos];
			}
			$kode_kos = substr($nama_kos, 1,4).$string;
			$alamat = $this->input->post('alamat');
			$deskripsi = $this->input->post('deskripsi');
			$jenis_kosan = $this->input->post('jenis_kosan');
			$foto = $this->upload->data('file_name');

			$data = array(
				'kode_kos' => $kode_kos,
				'nama_kos' => $nama_kos,
				'alamat' => $alamat,
				'deskripsi' => $deskripsi,
				'foto' => $foto,
				'jenis_kosan' => $jenis_kosan,
				'saldo_kos' => 0,
				'id_pemilik' => $this->session->userdata('id_pemilik'),
			);
			if ($this->M_All->insert('kosan', $data) != true) {
				redirect('index.php/pemilik/view_data_kos');
				echo "<script> alert('Data Kos berhasil ditambah');</script>";
			}else{
				redirect('index.php/pemilik/input_data_kos');
				echo "<script> alert('Data Kos gagal ditambah');</script>";
			}
        }

		// $target_dir   = "././asset_admin/upload_kos/"; // Untuk Foto
	    // $target_dir2   = "asset_admin/upload_kos/"; // Untuk Foto
	    // $file_name    = basename($_FILES["foto"]["name"]); // Untuk Foto
	    // $target_file  = $target_dir . $file_name; // Untuk Foto
	    // $target_file2  = $target_dir2 . $file_name; // Untuk Foto
	    // $imageFileType  = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); // untuk foto
	    // if (move_uploaded_file($_FILES["foto"]["tmp_name"],$target_file)) {
		// 	$nama_kos = $_POST['nama_kos'];
		// 	$karakter= '123456789';
		// 	$string = '';
		// 	for ($i = 0; $i < 4; $i++) {
		// 	$pos = rand(0, strlen($karakter)-1);
		// 	$string .= $karakter{$pos};
		// 	    }
		// 	$kode_kos = substr($nama_kos, 1,4).$string;
		// 	$alamat = $_POST['alamat'];
		// 	$deskripsi = $_POST['deskripsi'];
		// 	$jenis_kosan = $_POST['jenis_kosan'];
		// 	$saldo_kos = 0;
		// 	$id_pemilik=$_SESSION['id_pemilik'];
		// 	$sql="INSERT INTO kosan VALUES ('$kode_kos', '$nama_kos', '$alamat', '$deskripsi', '$target_file2', '$jenis_kosan', $saldo_kos, '$id_pemilik')";
		// 	$result=$this->conn->query($sql);
		// 	if ($result == true) {
		// 	    echo "<script> alert('data kost berhasil disimpan');</script>";
		// 	} else {
		// 	    echo "<script> alert('data kost berhasil disimpan');</script>";
		// 	}
		// 	header("location: ".base_url('index.php/pemilik'));
		//
		// } else {
		// echo "<script> alert('Foto Gagal diunggah');</script>";
		// header("location: ".base_url('index.php/pemilik/input_data_kos'));
		// }
		// 	mysqli_close($this->conn);
	}

	public function data_kamar()
	{
		$id_pemilik = $this->session->userdata('id_pemilik');
		$where = array('id_pemilik' => $id_pemilik);
		$data['nama'] = $this->M_All->view_where('pemilik', $where)->row();
		$this->load->view('pemilik/sidebar_pemilik');
		$this->load->view('pemilik/header_pemilik', $data);
		// $this->load->view('pemilik/input_data_kos');
		$this->load->view('pemilik/foot_pemilik');
	}

	public function edit_kos($id)
	{
		$newdat = array(
			'kode_kos' => $id
		);
		$this->session->set_userdata($newdat);
		$id_pemilik = $this->session->userdata('id_pemilik');
		$where = array('id_pemilik' => $id_pemilik);
		$where_ = array('kode_kos' => $id);
		$data['nama'] = $this->M_All->view_where('pemilik', $where)->row();
		$data['kos'] = $this->M_All->view_where('kosan', $where_)->row();

		$data['result'] = $this->M_All->view_where('kamar', $where_)->result();
		$this->load->view('pemilik/sidebar_pemilik');
		$this->load->view('pemilik/header_pemilik', $data);
		$this->load->view('pemilik/view_data_kos', $data);
		$this->load->view('pemilik/foot_pemilik');
	}

	public function update_kos()
	{
		$where = array('kode_kos' => $this->input->post('kode_kos'), );
		$data = array(
			'nama_kos' => $this->input->post('nama_kos'),
			'alamat' => $this->input->post('alamat'),
			'deskripsi' => $this->input->post('deskripsi'),
		);
		$this->M_All->update('kosan', $where, $data);
		redirect('index.php/pemilik/view_data_kos');
	}

	public function hapus_kos($id)
	{
		$where = array('kode_kos' => $id);
		$this->M_All->delete($where,'kosan');
		redirect('index.php/pemilik/view_data_kos');
	}

	public function tambah_kamar()
	{
		$config['upload_path']          = './asset_admin/upload_kos/';
		$config['overwrite']        = true;
        $config['allowed_types']        = 'gif|jpg|png';
        // $config['max_size']             = 1024;
		// $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('foto')){
            $error = array('error' => $this->upload->display_errors());
            // $this->load->view('upload_form', $error);
			echo "<script> alert('Foto Kos Gagal diunggah');</script>";
        }else{
            $data = array('upload_data' => $this->upload->data());
            // $this->load->view('upload_success', $data);
			$kode_kamar = $this->input->post('kode_kamar');
			$harga = $this->input->post('harga');
			$deskripsi = $this->input->post('deskripsi');
			$status = $this->input->post('status');
			$tanggal_tersedia = $this->input->post('tgl_tersedia');
			$foto = $this->upload->data('file_name');

			$data = array(
				'kode_kamar' => $kode_kamar,
				'kode_kos' => $this->session->userdata('kode_kos'),
				'harga' => $harga,
				'deskripsi' => $deskripsi,
				'status' => $status,
				'foto' => $foto,
				'tgl_tersedia' => $tanggal_tersedia,

			);
			if ($this->M_All->insert('kamar', $data) != true) {
				redirect('index.php/pemilik/edit_kos/'.$this->session->userdata('kode_kos'));
				echo "<script> alert('Data Kos berhasil ditambah');</script>";
			}else{
				redirect('index.php/pemilik/edit_kos/'.$this->session->userdata('kode_kos'));
				echo "<script> alert('Data Kos gagal ditambah');</script>";
			}
        }
	}

	public function edit_kamar($id)
	{
		$where = array('id_pemilik' => $this->session->userdata('id_pemilik'));
		$where_ = array('kode_kamar' => $id, );
		$data['kamar'] = $this->M_All->view_where('kamar', $where_)->row();
		$data['nama'] = $this->M_All->view_where('pemilik', $where)->row();
		$this->load->view('pemilik/sidebar_pemilik');
		$this->load->view('pemilik/header_pemilik', $data);
		$this->load->view('pemilik/view_kamar', $data);
		$this->load->view('pemilik/foot_pemilik');
	}

	public function update_kamar()
	{
		$where = array('kode_kamar' => $this->input->post('kode_kamar'), );
		$data = array(
			'harga' => $this->input->post('harga'),
			'deskripsi' => $this->input->post('deskripsi'),
			'status' => $this->input->post('status'),
			'tgl_tersedia' => $this->input->post('tgl_tersedia'),
		);
		$this->M_All->update('kamar', $where, $data);
		redirect('index.php/pemilik/edit_kamar/'.$this->input->post('kode_kamar'));
	}

	public function hapus_kamar($id)
	{
		$where = array('kode_kamar' => $id);
		$this->M_All->delete($where,'kamar');
		redirect('index.php/pemilik/edit_kos/'.$this->session->userdata('kode_kos'));
	}

}
