<?php
  include_once "./vendor/autoload.php";
  use App\Controllers\Teachers;
  use App\Controllers\AttendanceController;
  use App\Controllers\Assingment;
  $teacher = new Teachers();
  $assingment = new Assingment;
  $attendance = new AttendanceController;
  $teachingClass = explode(",",$_SESSION['teacher']['class_to_teach']);
  $teachingSubject = explode(",",$_SESSION['teacher']['subjects']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="./side/bootstrap-side-modals.css">
    <script>
    const popQuestionPanel = (id) => {
    $("#right_modal").modal("show");
  }
    </script>
</head>
<body>
<nav class="navbar navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24">
    </a>
  </div>
</nav>
<div class="container bg-light mt-5 h-100 border ">
<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Create assingment
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Title</label>
    <input type="text" class="form-control" id="title" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Subject</label>
      <select class="form-select" aria-label="Default select example" id="subject">
        <option selected>Open this select menu</option>
        <?php
          foreach($teachingSubject as $subject):
        ?>
            <option value="<?=$subject?>"><?=$subject?></option>
        <?php
          endforeach;
        ?>
      </select>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Class</label>
      <select class="form-select" aria-label="Default select example"  id="class">
        <option selected>Open this select menu</option>
        <?php
          foreach($teachingClass as $class):
        ?>
            <option value="<?=$class?>"><?=$class?></option>
        <?php
          endforeach;
        ?>
      </select>
  </div>
  <div class="mb-3">
    <label for="deadline" class="form-label">Deadline</label>
    <input type="hidden" class="form-control" id="schoolId" value="<?=$_SESSION['teacher']['school_id']?>">
    <input type="hidden" class="form-control" id="teacherId" value="<?=$_SESSION['teacher']['teachers_id']?>">
    <input type="date" class="form-control" id="deadline">
  </div>
  <button type="submit" id="draft" class="btn btn-primary">Draft</button>
</form>
      </div>
      <!--div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div-->
    </div>
  </div>
</div>
<!--?php
  $assingment->fetchAssingment($_SESSION['teacher']['teachers_id']);
?-->
<table class="table table-success table-striped">
<thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Class</th>
      <th scope="col">Subject</th>
      <th scope="col">Status</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php
      $assignmentList = $assingment->fetchAssingment($_SESSION['teacher']['teachers_id']);
      $index = 0;
      foreach($assignmentList as $listItem) :
    ?>
    <tr>
      <th scope="row">1</th>
      <td><?=$listItem['title']?></td>
      <td><?= $listItem['class']?></td>
      <td><?= $listItem['subject']?></td>
      <td><?= $listItem['status']?></td>
      <td>
        <div class="row h-100">
          <div class="col-4 d-flex justify-content-center">
            <a href=""><img src="https://img.icons8.com/offices/18/000000/edit.png"/> </a>
          </div>
          <div class="col-4 d-flex justify-content-center">
            <a href=""><img src="https://img.icons8.com/plumpy/18/000000/trash.png"/></a>
          </div>
          <div class="col-4 d-flex justify-content-center">
            <a href="#" id="<?= 'setQuestions-'.$index?>" onclick="popQuestionPanel(this.id);"><img src="https://img.icons8.com/ultraviolet/18/000000/ok.png"/></a>
          </div>
        </div>
      </td>
    </tr>
    <?php
        $index++;
      endforeach;
    ?>
    <!--tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr-->
  </tbody>
</table>
</div>
<div class="modal modal-right fade" id="right_modal" tabindex="-1" role="dialog" aria-labelledby="right_modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Right Modal Title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
        <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
        <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
      </div>
      <div class="modal-footer modal-footer-fixed">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
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
  })
  $("#draft").click((e) => {
    e.preventDefault();
    let data = new FormData();
    let keys = ["title","class","subject","deadline","school_id","teachers_id",];
    let values = [$("#title").val(),$("#class").val(),$("#subject").val(),$("#deadline").val(),$("#schoolId").val(),$("#teacherId").val()]
    
    for(let key in keys){
      data.append(keys[key],values[key]);
    }
    data.append("status","draft");
    data.append("draft-assignment",true);
    $.ajax({
      url: "requestHandler.php",
      method: "POST",
      data: data,
      cache: false,
      contentType: false,
      processData: false,
      success: (res) => {
        console.log(res);
      }
    })
  })
  $("#setQuestions").click(() => {
    $(".modal-right").modal("show");
  })
</script>
</html>