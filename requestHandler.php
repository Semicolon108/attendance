<?php
    include_once "./vendor/autoload.php";

    use App\Controllers\Teachers;

    
    if($_POST){

        $teacher = new Teachers;
        $data = [
            "email" => $_POST['email'],
            "password" => $_POST['password']
        ];
        $login = $teacher->login($data);

        if($login){
            echo "success";
        }
    }
?>