<?php

namespace App\Controllers;

use App\Models\BlogModel;
use CodeIgniter\Pager\Pager;
use CodeIgniter\Pager\PagerRenderer;

class Pages extends BaseController
{
    public function index()
    {
        $model = new BlogModel();
        $latestPosts = $model->orderBy('created_at', 'desc')->findAll(5);

        $data['latestPosts'] = $latestPosts;

        echo view('templates/header', $data);
        echo view('pages/home', $data);
        echo view('templates/footer');
    }

    public function showme($page = 'home')
    {
        if (!is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }

        if ($page === 'blog_list') {
            $model = new BlogModel();

            $pager = service('pager');

            $allPosts = $model->paginate(6);

            $data['posts'] = $allPosts;
            $data['pager'] = $model->pager;

            echo view('templates/header');
            echo view('pages/' . $page, $data);
            echo view('templates/footer');
        } else {
            echo view('templates/header');
            echo view('pages/' . $page);
            echo view('templates/footer');
        }
    }
}
