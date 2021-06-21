<?php
    namespace App\Controllers;

    use App\Controllers\Database;
    use Ramsey\Uuid\Uuid;
    use PDO;

    class Assingment extends Database{
        private $title;
        private $assignmentId;
        private $subject;
        private $deadline;
        private $class;
        private $teacherId;
        private $status;
        private $schoolId;


        public function createAssignment($data){
            $this->assignmentId = Uuid::uuid6()->toString();
            $this->schoolId = $data['school_id'];
            $this->title = $data['title'];
            $this->subject = $data['subject'];
            $this->deadline = date_create_from_format("Y-m-d", $data['deadline'])->format("d / m / Y");
            $this->class = $data['class'];
            $this->teacherId = $data['teachers_id'];
            $this->status = $data['status'];
            $sql = "INSERT INTO assingment (title,class,subject,status,school_id,teacher_id,assignment_id,deadline)
                    VALUE (?,?,?,?,?,?,?,?)";
            $prepStmt = $this->connectDB()->prepare($sql);
            $exec = $prepStmt->execute([$this->title,$this->class,$this->subject,$this->status,$this->schoolId,
                    $this->teacherId,$this->assignmentId,$this->deadline]);

            if($exec){
                echo "success";
            }
        }

        public function fetchAssingment($teacherId){
            $sql = "SELECT * FROM assingment WHERE teacher_id = ? ORDER BY created_at DESC";
            $prepStmt = $this->connectDB()->prepare($sql);
            $exec = $prepStmt->execute([$teacherId]);
            $res = $prepStmt->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }
    }
?>