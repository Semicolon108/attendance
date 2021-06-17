<?php
    include_once "./vendor/autoload.php";

    use App\Controllers\AttendanceController;
    use App\Controllers\Teachers;

    
    if(isset($_POST['login'])){

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
    if(isset($_POST['mark'])){
        $data = [
            "student_id" => $_POST['student_id'],
            "attendance" => $_POST['attendance']
        ];
        $attendance = new AttendanceController;
        $attendance->createAttendance($data);
    }
?>