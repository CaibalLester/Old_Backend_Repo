<?php

namespace App\Controllers;

use CodeIgniter\HTTP\Response;


use App\Controllers\BaseController;
use CodeIgniter\RestFul\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\MainModel;
use App\Models\AIALModel;
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
            'tin' => $json->tin,

            'lifeInsuranceExperience' => $json->lifeInsuranceExperience,
                'traditional' => $json->traditional,
                'variable' => $json->variable,
                'recentInsuranceCompany' => $json->recentInsuranceCompany,
                'highSchool' => $json->highSchool,
                'highSchoolCourse' => $json->highSchoolCourse,
                'highSchoolYear' => $json->highSchoolYear,
                'college' => $json->college,
                'collegeCourse' => $json->collegeCourse,
                'collegeYear' => $json->collegeYear,
                'graduateSchool' => $json->graduateSchool,
                'graduateCourse' => $json->graduateCourse,
                'graduateYear' => $json->graduateYear,
                'companyName1' => $json->companyName1,
                'position1' => $json->position1,
                'employmentFrom1' => $json->employmentFrom1,
                'employmentTo1' => $json->employmentTo1,
                'reason1' => $json->reason1,
                'companyName2' => $json->companyName2,
                'position2' => $json->position2,
                'employmentFrom2' => $json->employmentFrom2,
                'employmentTo2' => $json->employmentTo2,
                'reason2' => $json->reason2,
                'companyName3' => $json->companyName3,
                'position3' => $json->position3,
                'employmentFrom3' => $json->employmentFrom3,
                'employmentTo3' => $json->employmentTo3,
                'reason3' => $json->reason3,
                'companyName' => $json->companyName,
                'resposition' => $json->resposition,
                'contactName' => $json->contactName,
                'contactPosition' => $json->contactPosition,
                'emailAddress' => $json->emailAddress,
                'contactNumber' => $json->contactNumber,
                'yescuremployed' => $json->yescuremployed,
                'nocuremployed' => $json->nocuremployed,
                'allowed' => $json->allowed,
                'notallowed' => $json->notallowed,
                'ifnoProvdtls' => $json->ifnoProvdtls,
        ];
        $main = new MainModel();
        $r = $main->insert($data); // assuming you are inserting the data
        return $this->respond($r, 200);
    }

    public function save2()
    {
        $json = $this->request->getJSON();
        $data = [
            'nonlife' => $json->nonlife,
            'life' => $json->life,
            'varlife' => $json->varlife,
            'accaAndHealth' => $json->accaAndHealth,
            'othercb' => $json->othercb,
            'othertb' => $json->othertb,
            'agencyname' => $json->othertb,
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
            'tin' => $json->tin,

            
        ];
        $main = new AIALModel();
        $r = $main->insert($data); // assuming you are inserting the data
        return $this->respond($r, 200);
    }
    public function getData()
    {
        $main = new MainModel();
        $data = $main->findAll();
        return $this->respond($data, 200);
    }
    public function getData2()
    {
        $main = new AIALModel();
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
            'email' => 'required|min_length[6]|max_length[100]|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]|max_length[255]',
        ];

        if ($this->validate($rules)) {
            $userModel = new UserModel();

            $token = $this->verification(50); // Make sure this method generates a secure random token

            $data = [
                'email' => $this->request->getVar('email'),
                'role' => $this->request->getVar('role'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'token' => $token,
                'status' => 'active',

            ];

            $userModel->save($data);

            return $this->respond(['msg' => 'okay', 'token' => $token]);
        } else {
            $validationErrors = $this->validator->getErrors();
            return $this->respond(['msg' => 'failed', 'errors' => $validationErrors]);
        }
    }

    public function verification($length)
    {
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        return substr(
            str_shuffle($str_result),
            0,
            $length
        );
    }


    public function login()
  {
      $user = new UserModel();
      $email = $this->request->getVar('email');
      $password = $this->request->getVar('password');
      $role = $this->request->getVar('role');
      $data = $user->where('email', $email)->first();

      if ($data) {
          $pass = $data['password'];
          $authenticatePassword = password_verify($password, $pass);

          if ($authenticatePassword && $data['role'] == 'applicant') {
              return $this->respond(['msg' => 'okay', 'token' => $data['token']]);
          } else {
              return $this->respond(['msg' => 'error'], 200);
          }
      }
  }

}
