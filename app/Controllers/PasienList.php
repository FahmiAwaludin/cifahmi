<?php namespace App\Controllers;
use App\Models\menupasien;
class PasienList extends BaseController
{
	public function __construct()
	{
		$this->menuModel = new menupasien();
	}
	public function index()
	{
		$main = $this->menuModel->main_menu();
		$pasien = [];
		foreach ($main as $key => $val){
			$pasien[$key]=$main[$key];
		}
		$data['pasien']=$pasien;
		$data['main']=$main;
		return view('pasien/list/index', $data);
	}
    public function view()
    {
        // membuka koneksi ke database
        $mysqli = $this->db->connect();
        $sql = "SELECT * FROM pasien ORDER BY id ASC";
        $result = $mysqli->query($sql);
        while ($data = $result->fetch_assoc()) {
            $hasil[] = $data;
        }
        // menutup koneksi database
        $mysqli->close();
        // nilai kembalian dalam bentuk array
        return $hasil;
    }
	public function create()
    {
        //lakukan validasi
        $validation = \Config\Services::validation();
        $rules = ['nama_pasien' => 'required', 'umur' => 'required']; 
        $validation->setrules($rules);
        $isDataValid = $validation->withRequest($this->request)->run();
        // jika data valid, simpan ke database
        if($isDataValid){
            $this->menuModel->insert([
                "nama_pasien" => $this->request->getPost('nama_pasien'),
                "umur" => $this->request->getPost('umur'),
                "nama_kamar" => $this->request->getPost('nama_kamar'),
                "jenis_kelamin" => $this->request->getPost('jenis_kelamin'),
                "jenis_kamar" => $this->request->getPost('jenis_kamar'),
                "alamat" => $this->request->getPost('alamat'),
            ]);
            return redirect('pasien/list');
        }
    }
    public function update($id)
    {
        // lakukan validasi
        $validation =  \Config\Services::validation();
        $rules = ['nama_pasien' => 'required', 'umur' => 'required'];
        $validation->setRules($rules);
        $isDataValid = $validation->withRequest($this->request)->run();
        // dd($this->request->getPost());
        // jika data valid, simpan ke database
        if($isDataValid){
            $this->menuModel->update($id,[
                "nama_pasien" => $this->request->getPost('nama_pasien'),
                "umur" => $this->request->getPost('umur'),
                "nama_kamar" => $this->request->getPost('nama_kamar'),
                "jenis_kelamin" => $this->request->getPost('jenis_kelamin'),
                "jenis_kamar" => $this->request->getPost('jenis_kamar'),
                "alamat" => $this->request->getPost('alamat'),
            ]);
            return redirect('pasien/list');
        }

        return redirect('pasien/list');
    }

    public function edit($id){
        $data = $this->menuModel->find($id);
        return json_encode($data);
    }
    public function delete($id){
        $this->menuModel->delete($id);
        return redirect('pasien/list');
    }
}