<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NameModel;

class NameCrud extends BaseController
{
    protected $nameModel;

    public function __construct()
    {
        $this->nameModel = new NameModel();
    }

    public function index()
    {
        $data['users'] = $this->nameModel->orderBy('id', 'DESC')->findAll();
        return view('namelist', $data);
    }

    public function create()
    {
        return view('addname');
    }

    public function store()
    {
        $data = [
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email')
        ];

        $this->nameModel->insert($data);
        return redirect()->to('/namelist');
    }

    public function singleUser($id = null)
    {
        $data['user_obj'] = $this->nameModel->where('id', $id)->first();
        return view('editname', $data);
    }

    public function update()
    {
        $id = $this->request->getVar('id');
        $data = [
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email')
        ];

        $this->nameModel->update($id, $data);
        return redirect()->to('/namelist');
    }
    public function delete($id = null)
    {
        $data['user'] = $this->nameModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/namelist'));
    }
}
