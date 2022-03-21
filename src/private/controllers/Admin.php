<?php

namespace App\Controllers;

use App\Libraries\Controller;


class Admin extends Controller
{
    public function home()
    {
        $data = $this->model('Posts')::find('all');
        $this->view('index', $data);


    }
    public function signup()
    {
        $this->view('sign/signup');
    }
    public function signin()
    {
        $this->view('sign/signin');
    }
    public function user_signup()
    {
        
        $postdata = $_POST ?? array() ;
        echo "<pre>";
        print_r($postdata);
        echo "</pre>";
        if (isset($postdata['username']) && isset($postdata['email']) && isset($postdata['password'])) {
            // $users =  new Users();
            $users = $this->model('Users') ;
            $users->username = $postdata['username'] ;
            $users->email = $postdata['email'] ;
            $users->password = $postdata['password'] ;
            $users->role = $postdata['role'];
            $users->status = "Restricted";
            $users->save();
            
        }
        $this->view('sign/signin');
    }
    

    public function user_login() {   
        $postdata = $_POST ?? array();
        $email = $_POST['email'];
        $pass = $_POST['password'];
        if($email == "" || $pass == ""){
            $this->views('sign/signin');

        }
        $data = $this->model('Users')::find(array('email'=>$email ,'password'=> $pass));
        if (!isset($_SESSION['login'])) {
            $_SESSION['login'] = array();
            $userdata = array(
                    'user_id'=> $data->user_id,
                    'email' => $data->email
                );
            $_SESSION['login'] = $userdata;
            print_r($_SESSION['login']);
        }
        if ($data == "") {
            $this->views('sign/signin');
        } else {
            $this->view('home');
        }
        
            
                
    }

    public function post_blog(){


        if (isset($_POST['submit'])) {
            $posts = $this->model('Posts') ;
            $posts->user_id = $_SESSION['login']['user_id'];
            $posts->title = $_POST['title'];
            $posts->content = $_POST['content'];
            $posts->status = "Pending";
            $posts->save();
            $data = $this->model('Posts')::find('all');
            $_SESSION['data'] = $data;
            // echo "<pre>";
            // print_r($_SESSION['data']);
            // echo "</pre>";
            $this->view('index', $data);
        }




    }



    public function list_blog() {
        $data = $this->model('Posts')::find('all');
        $this->view('dashboard', $data);


    }

    public function authenticate() {
        $value = $_POST['submit'];
        $id = $_POST['idd'];
        $data = $this->model('Posts')::find_by_post_id($id);
        $data->status = $value;
        if ($value == "delete") {
            $data = $this->model('Posts')::find_by_post_id($id);
            $data->delete();

        }
        if($value == "edit") {
            $bid = $_POST['idd'];
            $udata = $this->model('Posts')::find_by_post_id($bid);
            $this->view('updateblog', $udata);
        }
        $data->save();
        // print_r($data);
        $udata = $this->model('Posts')::find('all');
        $this->view('dashboard', $udata);
    }

    public function list_user() {
        $data = $this->model('Users')::find('all');
        $this->view('userlist', $data);

    }

    public function user_authenticate(){
        $value = $_POST['submit'];
        $id = $_POST['idd'];
        $data = $this->model('Users')::find_by_user_id($id);
        $data->status = $value;
        if ($value == "delete") {
            $data = $this->model('Users')::find_by_user_id($id);
            $data->delete();

        }
        $data->save();
        // print_r($data);
        $udata = $this->model('Users')::find('all');
        $this->view('userlist', $udata);

    }

    public function update() {
        $this->view('updateblog');
    }

    public function update_blog(){
        echo "<pre>";
        print_r($_SESSION['data']);
        echo "</pre>";
    }
        
    


   

}