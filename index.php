<?php
    include_once "./vendor/autoload.php";

    use App\Controllers\Student;
    use App\Controllers\AttendanceController;
    $student = new Student();
    $attendance = new AttendanceController;

    /*$data = [
        "name" => "Malik",
        "class" => "primary 1"
    ];
    $student->createStudent($data);*/
    $attendance->fetchAttendanceRecord("primary 1","1ebce490-27c4-6488-aa10-247703ae1c78");
?>