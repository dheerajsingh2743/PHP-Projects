<?php 
include("config.php");
echo "<a href='insert.php'>HOME</a>";

// $conn->query("CREATE DATABASE dheeraj");

// $sql = $conn->prepare("CREATE DATABASE dheeraj");
// $sql->execute();

// $conn->query("CREATE TABLE students(
// id INT PRIMARY KEY,
// name VARCHAR(50),
// age INT,
// email VARCHAR(100)

// )");


// $sql = $conn->prepare(
// "CREATE TABLE students(
// id INT PRIMARY KEY,
// name VARCHAR(50),
// age INT,
// email VARCHAR(100)
// )"
// );
// $sql->execute();

// $id = 1;
// $name = "Golu Singh";
// $age = 43;
// $email = "golubabu@gmail.com";
// $id1 = 2;
// $name1 = "Golu Gold";
// $age1 = 23;
// $email1 = "golugold@gmail.com";
// Variable Ko '' Likhna Jaruri Hai
// $sql = $conn->query(
// "INSERT INTO students (id,name,age,email)
// VALUES('$id','$name','$age','$email'),
// (3,'Dheeraj',25,'dheerajsingh@gmail.com'),
// ('$id1','$name1','$age1','$email1')"
// );

// Important
// $id = 4;
// $name ="Original";
// $age = 0;
// $email = "original@gmail.com";
// $sql = $conn->prepare(
// "Insert INTO students (id,name,age,email)
// VALUES(?,?,?,?)"
// );

// $sql->bindParam(1, $id, PDO::PARAM_INT);
// $sql->bindParam(2, $name, PDO::PARAM_STR);
// $sql->bindParam(3, $age, PDO::PARAM_INT);
// $sql->bindParam(4, $email, PDO::PARAM_STR);
// $sql->execute();

// $sql = $conn->prepare(
// "INSERT INTO students (id,name,age,email)
// VALUES(?,?,?,?)"
// );

// $sql->execute([$id,$name,$age,$email]);

// $sql = $conn->prepare("SELECT * FROM students");
// $sql->execute();
// $data = $sql->fetchAll();
// echo "<pre>";
// print_r($data);
// echo "</pre>";


// foreach($data as $da){
//     echo $da['id'];
//     echo $da['name'];
//     echo "</br>";
// }


// while($fet = $sql->fetch()){
//     echo $fet['id'];
//     echo $fet['name'];
//     echo "</br>";
// }

$sql = $conn->prepare("SELECT * FROM students");
$sql->execute();
$data = $sql->fetchAll();
if(count($data)>0){
echo "<table border=1 style='border-collapse'>";
echo "<thead>

<td>"."ID"."</td>";
echo "<td>"."Name"."</td>";
echo "<td>"."Age"."</td>";
echo "<td>"."Email"."</td>";
echo "<td>"."Action"."</td>";
echo "<td>"."Edit"."</td>";

echo "</thead>";


foreach($data as $da){
    echo "<tr>";
    echo "<td>". $da['id']."</td>";
    echo "<td>". $da['name']."</td>";
    echo "<td>". $da['age']."</td>";
    echo "<td>". $da['email']."</td>";
    echo "<td>
    <form action='' method='get'>
    <button name='delt' value='".$da['id']."'> Delete </button>
    </form></td>";
    echo "<td> <a href='update.php?id=".$da['id']."' >
    <button> Edit </button>
    </a></td>";
    echo "</tr>";
}

echo "</table>";
}else{
?>
<h1>NO Record Found</h1>
<a href="insert.php">Insert Data</a>
<?php
}
?>

<?php
if($_GET){
    if(isset($_GET['delt'])){
    $id = $_GET['delt'];
    $sql = $conn->prepare("DELETE FROM students WHERE id=$id");
    $sql->execute();
    header("Location:read.php");
    }
}

?>