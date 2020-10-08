<?php namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\NewsModel;

class Pages extends Controller {
    public function index(){
        helper('text');

        $model = new NewsModel();

        $data = [
            'news' => $model->getNews(),
            'title' => 'Latest Post',
        ];

        echo view('templetes/header', $data);
        echo view('pages/home');
        echo view('templetes/footer');

    }

    public function view($slug = null){
        $model = new NewsModel();
        
        $data = [
            'news' => $model->getNews($slug),
            'title' => 'Post',
        ];


        $data['p_title'] = $data['news']['body'];

        echo view('templetes/header',$data);
        echo view('pages/newsView');
        echo view('templetes/footer');
    }

    // public function create(){
    //     $model = new NewsModel();
    //     if($this->request->getMethod() === 'post' && $this->validate([
    //         'p_title' => 'required|min_length[5]|max_length[50]',
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


    // public function view($pages = 'home'){

    //     $data['title'] = $pages;

    //     echo view('templetes/header', $data);
    //     echo view('pages/home');
    //     echo view('templetes/footer');

    // }

}