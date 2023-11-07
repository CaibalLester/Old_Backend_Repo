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
        'position' => $json->position,
        'preferredArea' => $json->preferredArea,
        'referral' => $json->referral,
        'referralBy' => $json->referralBy,
        'onlineAd' => $json->onlineAd,
        'walkIn' => $json->walkIn,
        'othersRef' => $json->othersRef,
        'fname' => $json->fname,
        'nickname' => $json->nickname,
        'birthdate' => $json->birthdate,
        'placeOfBirth' => $json->placeOfBirth,
        'gender' => $json->gender,
        'bloodType' => $json->bloodType,
        'homeAddress' => $json->homeAddress,
        'mobileNo' => $json->mobileNo,
        'landline' => $json->landline,
        'email' => $json->email,
        'citizenship' => $json->citizenship,
        'othersCitizenship' => $json->othersCitizenship,
        'naturalizationInfo' => $json->naturalizationInfo,
        'maritalStatus' => $json->maritalStatus,
        'maidenName' => $json->maidenName,
        'spouseName' => $json->spouseName,
        'sssNo' => $json->sssNo,
        'tin' => $json->tin
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
