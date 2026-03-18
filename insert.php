<?php
include("config.php");

echo "<form action='' method='get'>
<input type='text' name='name' placeholder='Enter Name'>
<br> <br>
<input type='text' name='age' placeholder='Enter Age'>
<br> <br>
<input type='text' name='email' placeholder='Enter email'>
<br> <br>
<button type='submit' name='create' value='created'>ADD</button>
<button name='display' value='displayed'>DISPLAY</button>

</form>";

if($_GET){
if(isset($_GET['create'])){
    $name = $_GET['name'];
    $age = $_GET['age'];
    $email = $_GET['email'];

    $sql = $conn->prepare("INSERT INTO students ('name','age','email')
    VALUES('$name','$age','$email')");
    $sql->execute();
    header("Location:insert.php");
}else if(isset($_GET['display'])){
header("Location:read.php");
exit();
}
}
?>