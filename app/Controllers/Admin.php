<?php namespace App\Controllers;

use App\Models\UserModel;

class Admin extends BaseController{
    public function register(){
        $data = [
            'title' => 'Create New User'
        ];
        helper(['form']);
        if($this->request->getMethod() == 'post'){
            $rules = [
                'firstname' => 'required|min_length[3]|max_length[20]',
                'lastname' => 'required|min_length[3]|max_length[20]',
                'email' => 'required|min_length[3]|max_length[100]|valid_email',
                'password' => 'required|min_length[3]|max_length[255]',
                'cpassword' => 'matches[password]',
            ];
            // $errors =[
            //     'cpassword' => [
            //         'matches[password]' => 'confirm password does not matches password'
            //     ]
            // ];
            if(! $this->validate($rules)){
                $data['validation'] = $this->validator;
            }else{
                $model = new UserModel();
                $newdata = [
                    'firstname' => $this->request->getVar('firstname'),
                    'lastname' => $this->request->getVar('lastname'),
                    'email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password'),
                ];

                $model->save($newdata);
                $session = session();
                $session->setFlashData('success', 'Registration Was Sucessful, Please Login');

                return redirect()->to('/login');

            }

        }
        
        echo view('templetes/header', $data);
        echo view('admin/register');
        echo view('templetes/footer');
    }

    public function login(){
        $data = [
            'title' => 'Login'
        ];
        helper(['form']);

        if($this->request->getMethod() == 'post'){
            $rules = [
                'email' => 'required|min_length[3]|max_length[50]|valid_email',
                'password' => 'required|validateUser[email, password]',
            ];
            $errors = [
                'password' => [
                    'validateUser' => 'email or password incorrect',
                ]
                ];

            if(! $this->validate($rules, $errors)){
                $data['validation'] = $this->validator;
            }else{
                $model = new UserModel();
                $user = $model->where('email', $this->request->getVar('email'))
                              ->first();
                $this->setUserSession($user);


                return redirect()->to('/dashboard');
            }
        }


        echo view('templetes/header', $data);
        echo view('admin/login');
        echo view('templetes/footer');
    }
    private function setUserSession($user){
        $data = [
            'id' => $user['id'],
            'firstname' => $user['firstname'],
            'lastname' => $user['lastname'],
            'email' => $user['email'],
            'isLoggedIn' => true,
        ];
        session()->set($data);
        return true;
    }

    public function logOut(){
        session()->destroy();
        return redirect()->to('/');
    }

}
