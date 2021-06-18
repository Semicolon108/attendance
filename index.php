<?php
   include_once "./vendor/autoload.php";

    use App\Controllers\School;
    //use App\Controllers\AttendanceController;
    //use App\Controllers\Teachers;
    $student = new School();
    //$attendance = new AttendanceController;

    $data = [
        "school" => "Excellent"
    ];
    //$class = "primary 2";
    $student->createSchool($data);
    //$attendance->updateAttendanceRecord($data);*/
    //$date = date_create_from_format("m-d-Y", "03-08-2020")->format("Y-M-D");
    //echo $date;
?>