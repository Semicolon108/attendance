<?php
   include_once "./vendor/autoload.php";

    use App\Controllers\School;
    use App\Controllers\AttendanceController;
    use App\Controllers\Teachers;
    $student = new Teachers();
    //$attendance = new AttendanceController;

    $data = [
        "name" => "Mr Gbenga",
        "email" => "gbenga@teacher.com",
        "class" => "primary 6",
        "password" => "teachergbenga",
        "school_id" => "1ebd1259-97fb-6d22-85ed-247703ae1c78",
        "to_teach" => ['verbal reasoning','Integerated science'],
        "class_to_teach" => ['primary 1',"primary 3","primary 4"]
    ];
    //$class = "primary 2";
    //$student->createTeacher($data);
    //$attendance->updateAttendanceRecord($data);*/
    $date = date_create_from_format("Y-m-d", "2020-03-08")->format("d / m / Y");
    echo $date;
?>