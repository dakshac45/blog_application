<?php namespace App\Controllers;

use App\Models\BlogModel;

class Blog extends BaseController
{

    function post($slug)
    {   
        $model = new BlogModel();

        $data['post'] = $model->getPosts($slug);

        echo view('templates/header', $data);
        echo view('blog/post');
        echo view('templates/footer');
    }

    function create(){

        helper('form');
        $model = new BlogModel();
        if(! $this->validate([
            'title' => 'required|min_length[3]|max_length[255]',
            'description' => 'required',
            'image' => 'uploaded[image]|max_size[image,1024]|is_image[image]',
            'tags' => 'required'
        ])){
            echo view('templates/header');
            echo view('blog/create');
            echo view('templates/footer');
        }else{
                
            $image = $this->request->getFile('image');

            if ($image->isValid() && !$image->hasMoved()) {
                $newName = $image->getRandomName();
                $image->move(ROOTPATH . 'public/uploads', $newName);
                $imagePath = '/uploads/' . $newName;

                $resizedImage = \Config\Services::image()
                ->withFile(ROOTPATH . 'public' . $imagePath)
                ->fit(400, 300, 'center')
                ->save(ROOTPATH . 'public' . $imagePath);
            } else {
                $imagePath = ''; // If no image is uploaded or an error occurs
            }

             $model->save(
                //$data =
                [
                    'title' => $this->request->getVar('title'),
                    'description' => $this->request->getVar('description'),
                    'image' => $imagePath,
                    'tags' => $this->request->getVar('tags'),
                    'slug' => url_title($this->request->getVar('title'))
                ]

                //$model->savePost($data);
            );
            $session = \Config\Services::session();
            $session->setFlashdata('success', 'New post was successfully created!');
            
            return redirect()->to('/')->with('message', [
                'text' => 'New post was successfully created!',
                'timeout' => 10 // Set the timeout for 10 seconds
            ]); 
        }
    }

}