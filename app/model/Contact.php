<?php
namespace App\Model;

use App\ConnectionDB;
use App\Upload;

class Contact
{
    private $id;
    private $name;
    private $telefone;
    private $email;
    private $message;
    private $file;
    private $ip;

    public function __set($atribute, $value){
        $this->$atribute = $this->sanitize($value);
    }

    public function __get($atribute){
        return $this->atribute;
    }

    private function uploadImage($id){
        $target_dir = "uploads/".$id."/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["file"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
    }

    public function save(){
        $query = "INSERT INTO contacts (name, email, telefone, message, file, ip) VALUES (?,?,?,?,?,?);";
        if ($pdo = ConnectionDB::getInstance()) {
            $pdo->beginTransaction();
            $stmt = $pdo->prepare($query);
            
            $name = filter_var($this->name, FILTER_SANITIZE_STRING);
            $email = filter_var($this->email, FILTER_SANITIZE_EMAIL);
            $telefone = filter_var($this->telefone, FILTER_SANITIZE_NUMBER_INT);
            $message = filter_var($this->message, FILTER_SANITIZE_STRING);
            $file = filter_var($this->file, FILTER_SANITIZE_STRING);
            
            try{
                $stmt->execute([$name, $email, $telefone, $message, $file, $this->ip]);
                $id = $pdo->lastInsertId();
                $upload = Upload::uploadFile($id);
                if($upload == 1){
                    $dados = 
                        "Nome:".$name. "<br>".
                        "Telefone: ".$telefone. "<br>".
                        "E-mail: ".$email. "<br>".
                        "Mensagem: ".$message. "<br>".
                        "IP: " . $this->ip;
                        
                    mail(EMAIL, 'Contato', $dados);

                    $pdo->commit();
                    return $id;
                }
                else{
                    $pdo->rollBack();
                    return 0;
                }
            }
            catch (Exception $e){
                throw $e;
            }
        }
        return false;
    }

    private function sanitize($dados)
    {
        if (is_string($dados) & !empty($dados)) {
            return "".addslashes($dados)."";
        } elseif (is_bool($dados)) {
            return $dados ? 'TRUE' : 'FALSE';
        } elseif ($dados !== '') {
            return $dados;
        } else {
            return 'NULL';
        }
    }

}