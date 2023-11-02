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
    public function getData()
    {
        $main = new MainModel();
        $data = $main->findAll();
        return $this->respond($data);
    }
}
