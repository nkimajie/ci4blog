<?php namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\NewsModel;

class Dashboard extends BaseController{
    // public function index(){
        
    //     $data =[
    //         'title' => 'Admin Dashboard',
    //     ];
        // dd(session()->get('isLoggedIn'));

        // if(session()->get('isLoggedIn') == null){
        // return redirect()->to('/login');
        // }

    //     echo view('templetes/header', $data);
    //     echo view('admin/dashboard');
    //     echo view('templetes/footer');
    // }

    public function showPost(){
        $data =[
            'title' => 'All Post',
        ];
        helper('text');

        $model = new NewsModel();

        $data['table'] = $model->findAll();

        echo view('templetes/header', $data);
        echo view('admin/allpost');
        echo view('templetes/footer');
    }

    public function Delete($id){
        $model = new NewsModel();

        $model->where('id', $id)->delete();
        $session = session();
        $session->setFlashData('danger', 'Post Deleted');
        return redirect()->to(site_url('/dashboard?delete'));
    }

    public function create(){
        $data = [
            'title' => 'Create A New Post',
        ];
        // dd($this->request->getMethod() == 'post');
        $model = new NewsModel();
        if($this->request->getMethod() == 'post'){
            $rules = [
            'body' => 'required|min_length[20]',
            'p_title' => [
                'rules' => 'required|min_length[3]|max_length[100]',
                'label' => 'Post Title',
                'errors' => [
                    'required' => 'Post title is required',
                ]
                ],
            // 'photo' => [
            //     'rules' => 'uploaded[photo]|max_size[photo, 2000]|is_image[photo]',
            //     'label' => 'Cover Photo'
            // ]
            ];
            if($this->validate($rules)){
                // $file = $this->request->getFile('photo');
                //     if($file->isValid() && !$file->hasMoved()){
                //         $file->move('./uploads/images');
                //     }
                    $newdata = [
                        'p_title' => $this->request->getPost('p_title'),
                        'slug' => url_title($this->request->getPost('p_title'), '-', TRUE),
                        'body' => $this->request->getPost('body'),
                    ];
                    // dd('$model->save($newdata)');
                    $model->save($newdata);
                    // $session = session();
                    // $session->setFlashData('success', 'Post Successful');
                    
            
                    return redirect()->to('/create?success');
                
                
            }else{

                $data['validation'] = $this->validator;
        
    }
     }

     echo view('templetes/header', $data);
     echo view('pages/create');
     echo view('templetes/footer');
     
    }

    // public function create(){
    //     $model = new NewsModel();
    //     if($this->request->getMethod() === 'post' && $this->validate([
    //         'p_title' => 'required|min_length[5]|max_length[255]',
    //         'body' => 'required',
    //     ])){
    //         $model->save([
    //             'p_title' => $this->request->getPost('p_title'),
    //             'slug' => url_title($this->request->getPost('p_title'), '-', TRUE),
    //             'body' => $this->request->getPost('body')
    //         ]);
    //         echo "post updated successful";
            
    //     }else{
    //         echo view('templetes/header', ['title' => 'Create a new post']);
    //         echo view('pages/create');
    //         echo view('templetes/footer');
    //     }
    // }

    public function edit($id){
        $data = [
            'title' => 'Edit Post',
        ];
        $model = new NewsModel();
        $data['edit'] = $model->where('id', $id)->first();
        if($this->request->getMethod() == 'post'){
            $model = new NewsModel();
            $_POST['id'] = $id;
            $model->save($_POST);

            return redirect()->to('/dashboard?edit');
        }

        echo view('templetes/header', $data);
        echo view('pages/edit');
        echo view('templetes/footer');


    }

}