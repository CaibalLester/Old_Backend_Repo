<?php

namespace App\Controllers;
use CodeIgniter\HTTP\Response;


use App\Controllers\BaseController;
use CodeIgniter\RestFul\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\MainModel;
use App\Models\UserModel;
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

    public function getuserData()
    {
        $main = new UserModel();
        $data = $main->findAll();
        return $this->respond($data, 200);
    }

    public function authreg()
    {
        helper(['form']);
        $rules = [
            'email' => 'required|min_length[1]|max_length[100]|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[1]|max_length[100]',
            'role' => 'required|in_list[applicant,admin,agent]',
        ];

        if ($this->validate($rules)) {
            $userModel = new UserModel();
            $data = [
                'email' => $this->request->getVar('email'),
                'role' => $this->request->getVar('role'), // Assuming 'type' field in the database represents the user role.
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $userModel->save($data);

            return $this->response->setStatusCode(201)->setJSON(['message' => 'Registration successful']);
        } else {
            $validationErrors = $this->validator->getErrors();
            return $this->response->setStatusCode(400)->setJSON(['errors' => $validationErrors]);
        }
    }

    public function authlog()
    {
        $session = session();
        $userModel = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $data = $userModel->where('email', $email)->first();
        if ($data) {
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if ($authenticatePassword) {
                $ses_data = [
                    'id' => $data['id'],
                    'email' => $data['email'],
                    'role' => 'applicant',
                    'isLoggedIn' => true,
                ];
                $session->set($ses_data);

                // Return a JSON response to Vue.js with the authenticated user data
                return $this->response->setStatusCode(Response::HTTP_OK)->setJSON($ses_data);
            } else {
                // Return an error message for incorrect password
                return $this->response->setStatusCode(Response::HTTP_UNAUTHORIZED)->setJSON(['msg' => 'Password is incorrect.']);
            }
        } else {
            // Return an error message for non-existing email
            return $this->response->setStatusCode(Response::HTTP_NOT_FOUND)->setJSON(['msg' => 'Email does not exist.']);
        }
    }

}
