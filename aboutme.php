<?php
$insert = false;
//Connecting to the database

$servername = "localhost";
$username = "root"; 
$password = "";
$database = "dbpreeti";

// Create a connection

$conn = mysqli_connect($servername, $username, $password, $database);

//Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ".mysqli_connect_error());
}
else{
    //echo "Connection was successful <br>";
}


if ($_SERVER['REQUEST_METHOD'] == 'POST'){

      $name = $_POST["name"];
      $email = $_POST["email"];
      $message = $_POST["msg"];
  
      // Sql query to be executed
      $sql = "INSERT INTO `contactme` (`name`, `email`, `message`) VALUES ('$name', '$email', '$message')";
      $result = mysqli_query($conn, $sql);
  
     
      if($result){ 
        $insert = true;
      }
      else{
        echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
      } 
    }
  
?>
  

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>About me</title>
  </head>
  <body>
    <div class="container" style="text-align: center;"><h1>ABOUT ME</h1></div>
    <div class="container">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto placeat magni eveniet in nihil totam sint ad ducimus exercitationem deleniti? Velit maiores illo, deleniti ad adipisci consectetur ducimus repellendus voluptates animi quis! Provident aliquam quos nesciunt labore. Fugiat dolores facilis voluptatum dolorem consectetur vero suscipit, veniam commodi id exercitationem autem!</p>
    </div>
    <div class="container my-4">
    <?php
    if($insert){
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success!</strong> Your detail has been submitted successfully
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>×</span>
        </button>
        </div>";
    }
    ?>
    <h2>Contact Me</h2>
    <form action="/aboutme/aboutme.php" method="POST">
      <div class="form-group">
        <label for="name">Enter your name</label>
        <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <label for="email">Enter your email</label>
        <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp">
      </div>

      <div class="form-group">
        <label for="msg">Message</label>
        <textarea class="form-control" id="msg" name="msg" rows="3"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>