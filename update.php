<?php
include("config.php");
if(isset($_GET['id'])){
$id = $_GET['id'];
$student = $conn->query("SELECT * FROM students WHERE id='$id'");
$data = $student->fetchAll(); // 2D Associtive Array
$name = $data[0]['name'];
$age = $data[0]['age'];
$email = $data[0]['email'];




echo "<form action='' method='get'>
<input type='text' name='name' placeholder='Enter Name' value=".$name.">
<br> <br>
<input type='text' name='age' placeholder='Enter Age' value=".$age.">
<br> <br>
<input type='text' name='email' placeholder='Enter email' value=".$email.">
<br> <br>
<button type='submit' name='update' value=".$id.">Update</button>

</form>";
}
?>

<?php

if(isset($_GET['update'])){
    $uniq = $_GET['update'];
    $name = $_GET['name'];
    $age = $_GET['age'];
    $email = $_GET['email'];

    $conn->query("UPDATE students SET name='$name', age='$age', email='$email' WHERE id='$uniq'");
    header("Location:read.php");
    
}

?>