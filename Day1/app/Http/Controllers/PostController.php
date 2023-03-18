<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    private $_allPosts;

    public function __construct()
    {
        $this->_allPosts = [
            [
                'id' => 1,
                'title' => 'Laravel',
                'posted_by' => 'Ahmed',
                'created_at' => '2022-08-01 10:00:00',
                'email' => 'ahmed@gmail.com'
            ],

            [
                'id' => 2,
                'title' => 'PHP',
                'posted_by' => 'Mohamed',
                'created_at' => '2022-08-01 10:00:00',
                'email' => 'Mohamed@gmail.com'
            ],

            [
                'id' => 3,
                'title' => 'Javascript',
                'posted_by' => 'Ali',
                'created_at' => '2022-08-01 10:00:00',
                'email' => 'Ali@gmail.com'
            ]
            ,

            [
                'id' => 4,
                'title' => 'Java',
                'posted_by' => 'Saad',
                'created_at' => '2022-08-01 10:00:00',
                'email' => 'saad@gmail.com'
            ]
            ,
            [
                'id' => 5,
                'title' => 'Shell',
                'posted_by' => 'Mahmoud',
                'created_at' => '2022-08-01 10:00:00',
                'email' => 'Mohmoud@gmail.com'
            ]
        ];
    }

    public function index () {
        $posts = $this->_allPosts;
        return view('post.index',['posts' => $posts]);
    }

    public function show ($id) { 
        
        $posts = $this->_allPosts;
        $selectedPost = NULL ;
        foreach ($posts as $post) {
            if ( $post['id'] === intval($id) ) {
                $selectedPost = $post ;
                break;
            }
        }

        return view('post.show' , ['post' => $selectedPost]);
    }

    public function update () {
        return view ('post.update');
    }

    
    public function delete () {
        return view ('post.delete');
    }
}
