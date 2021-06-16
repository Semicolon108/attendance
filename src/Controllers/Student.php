<?php
    namespace App\Controllers;

    use App\Controllers\Database;
    use App\Controllers\AttendanceController;
    use Ramsey\Uuid\Uuid;

    class Student extends Database{
        private $name;
        private $studentId;
        private $attendance;
        private $class;

        public function createStudent($data){
            $this->name = $data['name'];
            $this->studentId = Uuid::uuid6()->toString();
            $this->attendance = [
                "monday" => [],
                "tuesday" => [],
                "wednesday" => [],
                "thursday" => [],
                "friday" => []
            ];
            $this->class = $data['class'];

            $sql = "INSERT INTO students (name,student_id,attendance,class) VALUE (?,?,?,?)";
            $prepStmt = $this->connectDB()->prepare($sql);
            $exec = $prepStmt->execute([$this->name,$this->studentId,json_encode($this->attendance),$this->class]);
            if($exec){
                echo "Inserted successfully";
            }
        }
    }
?>