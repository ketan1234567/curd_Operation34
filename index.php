<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 5 Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  
 <script>

function myFunction(deleteid) {
    // Add your delete functionality here
   // alert(deleteid);


    // Creating Our XMLHttpRequest object 
    let xhr = new XMLHttpRequest();
 
    // Making our connection  
    let url = 'delete.php?id='+deleteid;
    xhr.open("GET", url, true);
 
    // function execute after request is successful 
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            location.reload();
        }
    }
    // Sending our request 
    xhr.send();

  }

  </script>
</head>
<body>

<div class="container-fluid p-5 bg-primary text-white text-center">
  <h1>My First Bootstrap Page</h1>
  <p>Resize this responsive page to see the effect!</p> 
</div>
  
<div class="container mt-5">
  <div class="row">
      <div class="col-sm-4">
            <form action="index.php" method="post">
                <div class="mb-3 mt-3 ">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>
                <div class="mb-3">
                  <label for="pwd">Password:</label>
                  <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
                </div>
                <div class="form-check mb-3">
                  <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="remember"> Remember me
                  </label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
          </form>
      </div>
      <div class="col-sm-4">
      <table class="table table-bordered">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>

    <?php
$servername = "localhost";
$username = "root";
$password23 = "";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password23, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, email, password FROM admin";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
     $deleteid=$row["id"];
        echo "
      
        <tr>
        <td>".$row["id"]."</td>
        <td>". $row["email"]. "</td>
        <td>" . $row["password"] . "</td>
        <td> <a href='update_add.php?id=".$row['id']."'>  <button type='button' class='btn btn-warning'>edit</button></td> 
        <td> <button type='button' class='btn btn-danger' onclick='myFunction(`$deleteid`)'>delete</button></td>
      </tr>
        ";

        
    }
} else {
    echo "0 results";
}

$conn->close();
?>

      
    </tbody>
  </table>
      </div>
</div>


</body>
</html>
<?php
$servername = "localhost";
$username = "root";
$password23 = "";
$dbname = "myDB";

$email= $_POST['email'];
$password= $_POST['password'];



// Create connection
$conn = new mysqli($servername, $username, $password23, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



  $sql="INSERT INTO admin (email,password)
VALUES
('$email','$password')";

if ($conn->query($sql) === TRUE) {
  
  echo '<script>
  alert("Data Inserted Successfully");
  </script>';
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();






?>
