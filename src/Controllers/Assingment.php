<?php
    namespace App\Controllers;

    use App\Controllers\Database;
    use Ransey\Uuid\Uuid;

    class Assingment extends Database{
        private $title;
        private $assignmentId;
        private $subject;
        private $deadline;
        private $class;
        private $teacherId;
        private $status;
        private $class;
        private $schoolId;


        public function createAssignment($assignmentData){
            $this->assignmentId = Uuid::uuid6()->toString();
            $this->schoolId = 
            $sql = "INSERT INTO assingment ()"
        }

        public function fetchAssingment($teacherId){

        }
    }
?>