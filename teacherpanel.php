<?php
  include_once "./vendor/autoload.php";
  use App\Controllers\Teachers;
  use App\Controllers\AttendanceController;
  $teacher = new Teachers();
  $attendance = new AttendanceController;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    
</head>
<body>
<nav class="navbar navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24">
    </a>
  </div>
</nav>
<div class="container bg-light mt-5 h-auto">
    <div class="row col-6">
    <div class="col-6">
      <select class="form-select form-select-lg my-5" aria-label=".form-select-lg example">
        <option selected>Select Week</option>
        <option value="1">Week 1</option>
        <option value="2">Week 2</option>
        <option value="3">Week 3</option>
        <option value="4">Week 4</option>
        <option value="5">Week 5</option>
        <option value="6">Week 6</option>
        <option value="7">Week 7</option>
        <option value="8">Week 8</option>
        <option value="9">Week 9</option>

      </select>
    </div>
    <div class="col-6">
      <!--select class="form-select form-select-lg my-5" aria-label=".form-select-lg example">
        <option selected>Select Day</option>
        <option value="1">Monday</option>
        <option value="2">Tuesday</option>
        <option value="3">Wednesday</option>
        <option value="4">Thursday</option>
        <option value="5">Friday</option>
      </select-->
      <?php
        $date = $attendance->selectAttendanceDate();
        print_r($date);
      ?>
    </div>
    </div>
    <table class="table table-dark table-hover">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col" class="text-center">Attendance</th>
    </tr>
  </thead>
  <tbody>
        <?php
            //$class = $_SESSION['teacher'];

            $class = $_SESSION['teacher']['assinged_class'];
            $students = $teacher->selectClassStudents($class);
           
            $attendanceRecord = $attendance->fetchAttendanceRecord($class);
            
            $index  = 0;
            foreach($students as $student):
            //print_r($students);
        ?>
                <tr>
                    <th scope="row">1</th>
                    <td><?= $student['name'];?></td>
                    <td>
                        <div class="col-6 mx-auto row">
                        <div class="col-6 d-block h-auto attendance-val">
                          <label for="present">Present</label>
                          <input type="radio" class="marker" name="<?="attendance_".$student['student_id'];?>" value="present" <?= ((!empty($attendanceRecord[$index]) && $attendanceRecord[$index]['attendance'] == 'present')? 'checked =checked': '')?>>
                        </div>
                        <div class="col-6 d-block h-auto attendance-val">
                          <label for="absent" class="text-center">Absent</label>
                          <input type="radio" class="marker" name="<?="attendance_".$student['student_id'];?>" value="absent"  <?= ((!empty($attendanceRecord[$index]) && $attendanceRecord[$index]['attendance'] == 'absent')? 'checked =checked': '')?>>
                        </div>
                        
                        </div>
                    </td>
                </tr>
        <?php
        $index++;
            endforeach;
        ?>
  </tbody>
    </table>
    <button class="btn btn-outline-success" id="attendance">Submit attendance</button>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
  $(".marker").click(function() {
    let id = $(this).attr("name").split("_").pop();
    let value = $(this).val();
    const data = new FormData();
    data.append("student_id",id);
    data.append("attendance",value);
    data.append("mark",true);
    $.ajax({
      url: "requestHandler.php",
      method: "POST",
      data: data,
      cache: false,
      contentType: false,
      processData: false,
      success: (response) => {
        console.log(response);
      }
    })
    
   /* data.forEach((data) => {
      console.log($(`#${data}`).attr("name"));
    })*/
    //console.log(data);
  })
</script>
</html>