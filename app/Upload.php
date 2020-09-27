<?php
namespace App;

class Upload
{
    private static $link;
    private $up;

    private function __construct(){}

    public function uploadFile($id){
        $up['pasta'] = 'uploads/'.$id."/";
        $up['tamanho'] = 1024 * 500; // 500Kb
        $up['extensoes'] = array('pdf', 'doc', 'docx', 'odt', 'txt', 'jpg');

        $name = $_FILES['file']['name'];
        if ($_FILES['file']['error'] != 0) {
            return 0;
        }
        
        $extensao = strtolower(end(explode('.', $name)));
        if (array_search($extensao, $up['extensoes']) === false) {
            return 0;
        }
        else if ($up['tamanho'] < $_FILES['file']['size']) {
            return 0;
        }
        else { 
            mkdir($up['pasta'] );
            if (move_uploaded_file($_FILES['file']['tmp_name'], $up['pasta'] . $name)) {
                return 1;
            } else {
                return 0;
            }
        }

    }

}