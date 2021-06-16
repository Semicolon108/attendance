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
        <input type="" class="btn btn-outline-dark btn-sm my-5" value="Week 1" >
    </div>
    <div class="col-6">
        <input type="" class="btn btn-outline-dark btn-sm my-5" value="Monday" >
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
            include_once "./vendor/autoload.php";
            use App\Controllers\Teachers;
            //$class = $_SESSION['teacher'];
            $teacher = new Teachers();

            $class = $_SESSION['teacher']['assinged_class'];
            $students = $teacher->selectClassStudents($class);
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
                          <input type="radio" name="<?="attendance-".$student['student_id'];?>" value="present">
                        </div>
                        <div class="col-6 d-block h-auto attendance-val">
                          <label for="absent" class="text-center">Absent</label>
                          <input type="radio" name="<?="attendance-".$student['student_id'];?>" value="absent">
                        </div>
                        
                        </div>
                    </td>
                </tr>
        <?php
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
  $("#attendance").click(() => {
    let data = $(".attendance-val").children("input").get();
    
   /* data.forEach((data) => {
      console.log($(`#${data}`).attr("name"));
    })*/
    console.log(data);
  })
</script>
</html>