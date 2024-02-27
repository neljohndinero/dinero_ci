<?php

namespace App\Controllers;
use App\Models\UseModel;
use App\Models\GenderModel;

class UserController extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
    public function adduser()  
    {
        $data = array ();
        helper('form');
        
        //When button is clicked
        if($this->request =='post'){
        $post = $this ->request->getPost(['first_name', 'middle_name',
        'last_name','age','gender_id','email','password']);

        $rules = [
             'first_name'=>['label' => 'first_name',
             'rules' => 'required'],
             'middle_name' => ['label' => 'middle_name',
             'rules' => 'permit_empty'],
             'last_name' =>['label' => 'last_name',
             'rules' => 'required'],
             'age' => ['label' => 'age',
             'rules' => 'required|numeric'],
             'gender_id' => ['required'],
             'email'=>['label' => 'email'],
             'rules' =>['label' => 'confirm password'],
             'password' =>['label' => 'first_name',
             'rules' => 'required_with[password]']
        ];

        if(! $this->validate($rules))
        {
            $data['validation']=$this->validator;
        }   
         
        else
        {   
            // Encrypt Password
            $post['password'] = sha1($post['password']);

            $userModel= new UserModel();
            $userModel->save($post);

            return 'User Successfully saved!';
        }
    }

    //Fetch all values from gender table
    $genderModel = new GenderModel();
    $data = [gender]=$genderModel->findAll();
    return view('user/add');
}
}

