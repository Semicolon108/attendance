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
            $this->studentId = $data['id'];
            $this->week = $data['week'];
            $this->day = $data['day'];
            $this->attendace;

        }
        public function fetchAttendanceRecord($class,$studentId){
            $sql = "SELECT attendance FROM students WHERE class = ? AND student_id = ?";
            $prepStmt = $this->connectDB()->prepare($sql);
            $execute = $prepStmt->execute([$class,$studentId]);
            $res = $prepStmt->fetch(PDO::FETCH_ASSOC);
            $res = json_encode($res);
            print_r(json_decode($res, true));
        }
    }
?>