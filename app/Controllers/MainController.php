<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\RestFul\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\MainModel;

class MainController extends ResourceController
{
    public function index()
    {
        //
    }
    public function save()
    {
        $json = $this->request->getJSON();
        $data = [
            'email' => $json->email,
            'password' => $json->password,
            'type' => $json->type,
        ];
        $main = new MainModel();
        $r = $main->insert($data); // assuming you are inserting the data
        return $this->respond($r, 200);
    }
    public function getData()
    {
        $main = new MainModel();
        $data = $main->findAll();
        return $this->respond($data, 200);
    }
}
