<?php namespace App\Controllers;
use App\Models\Menu1;
class SettingMenu extends BaseController
{
	public function __construct()
	{
		$this->menuModel = new Menu1();
	}
	public function index()
	{
		$main = $this->menuModel->main_menu();
		$menus = [];
		foreach ($main as $key => $val){
			$menus[$key]=$main[$key];
			$menus[$key]['sub']=$this->menuModel->sub_menu($val['id']);
		}
		$data['menus']=$menus;
		$data['main']=$main;
		return view('settings/menu/index', $data);
	}

	public function create()
    {
        //lakukan validasi
        $validation = \Config\Services::validation();
        $rules = ['menu_id' => 'required', 'title' => 'required', 'link' => 'required']; 
        $validation->setrules($rules);
        $isDataValid = $validation->withRequest($this->request)->run();
        // jika data valid, simpan ke database
        if($isDataValid){
            $this->menuModel->insert([
                "menu_id" => $this->request->getPost('menu_id'),
                "menu_level" => $this->request->getPost('menu_level'),
                "title" => $this->request->getPost('title'),
                "icon" => $this->request->getPost('icon'),
                "link" => $this->request->getPost('link'),
                "parent_id" => $this->request->getPost('parent_id'),
                "is_active" => $this->request->getPost('is_active'),
            ]);
            return redirect('settings/menu');
        }
    }

    public function update($id)
    {
        // lakukan validasi
        $validation =  \Config\Services::validation();
        $rules = ['menu_id' => 'required', 'title' => 'required', 'link' => 'required'];
        $validation->setRules($rules);
        $isDataValid = $validation->withRequest($this->request)->run();
        // dd($this->request->getPost());
        // jika data valid, simpan ke database
        if($isDataValid){
            $this->menuModel->update($id,[
                "menu_id" => $this->request->getPost('menu_id'),
                "menu_level" => $this->request->getPost('menu_level'),
                "title" => $this->request->getPost('title'),
                "icon" => $this->request->getPost('icon'),
                "link" => $this->request->getPost('link'),
                "parent_id" => $this->request->getPost('parent_id'),
                "is_active" => $this->request->getPost('is_active'),
            ]);
            return redirect('settings/menu');
        }

        return redirect('settings/menu');
    }

    public function edit($id){
        $data = $this->menuModel->find($id);
        return json_encode($data);
    }
    public function delete($id){
        $this->menuModel->delete($id);
        return redirect('settings/menu');
    }
}