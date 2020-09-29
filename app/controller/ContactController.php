<?php
namespace App\Controller;

use App\Model\Contact;

class ContactController
{
    public $request;
    public $files;
 
    public function __construct()
    {
        $this->request = $_REQUEST;
        $this->files = $_FILES;
    }

     public function __get($nome)
    {
        if (isset($this->request[$nome])) {
            return $this->request[$nome];
        }
        return false;
    }


    public function home(){
        include('view\home.php');
    }

    public function store(){
        $contact = new Contact;
        //var_dump($this->request);die();
        $contact->name = $this->request['name'];
        $contact->telefone = $this->request['telefone'];
        $contact->email = $this->request['email'];
        $contact->message = $this->request['message'];
        $contact->file = $this->files['file']['name'];
        $contact->ip = $_SERVER['REMOTE_ADDR'];

        $response = $contact->save();

        if ($response) {
            header("location: ?action=result&success");
        } elseif ($response == -1) {
            header("location: ?action=result&failEmail");
        } elseif( $response == -2) {
            header("location: ?action=result&failUpload");
        } elseif ($response == -3) {
            header("location: ?action=result&fail");
        }
        return null;
    }

    public function result(){
        include('view\result.php');
    }

}