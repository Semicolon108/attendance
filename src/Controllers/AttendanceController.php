<?php
    namespace App\Controllers;

    use App\Controllers\Database;
    use PDO;

    class AttendanceController extends Database{
        private $studentId;
        private $week;
        private $day;
        private $attendance;

        public function updateAttendanceRecord($data){
            $this->studentId = $data['student_id'];
            $this->day = $data['day'];
            $this->week = $data['week'];
            $this->attendance = $this->fetchAttendanceRecord($data['class'],$data['student_id']);
            foreach($this->attendance as &$day){
                if(sizeof($day) != $this->week){
                    $day[$this->week - 1] = 1;
                    break;
                }
            }
            $sql = "UPDATE students SET attendance = ? WHERE student_id = ?";
            $prepStmt = $this->connectDB()->prepare($sql);
            $exec = $prepStmt->execute([json_encode($this->attendance),$this->studentId]);
            if($exec){
                echo "update successful";
            }
        }
        public function fetchAttendanceRecord($class,$studentId){
            $sql = "SELECT attendance FROM students WHERE class = ? AND student_id = ?";
            $prepStmt = $this->connectDB()->prepare($sql);
            $execute = $prepStmt->execute([$class,$studentId]);
            $res = $prepStmt->fetch(PDO::FETCH_ASSOC);
            //$res = json_encode($res);
           return json_decode($res['attendance'],true);
        }
        
    }
?>