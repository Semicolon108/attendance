<?php
   /* include_once "./vendor/autoload.php";

    use App\Controllers\Student;
    //use App\Controllers\AttendanceController;
    use App\Controllers\Teachers;
    $student = new Student();
    //$attendance = new AttendanceController;

    $data = [
        "name" => "Gabriel john",
        "class" => "primary 2"
    ];
    //$class = "primary 2";
    $student->createStudent($data);
    //$attendance->updateAttendanceRecord($data);*/
    $date = date_create_from_format("m-d-Y", "03-08-2020")->format("Y-M-D");
    echo $date;
?>