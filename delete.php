<?php
$mainId=$_GET['id'];

echo $mainId;

$servername = "localhost";
$username = "root";
$password23 = "";
$dbname = "myDB";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password23);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // sql to delete a record
  $sql = "DELETE FROM admin WHERE id=$mainId";

  // use exec() because no results are returned
  $conn->exec($sql);

  if($sql->TRUE){
    echo "
    <script>
  alert('deleted Data sucessfully');
  window.location.href='index.php';
    </script>
    ";
  }else{
    
  }

} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>