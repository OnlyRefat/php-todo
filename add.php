<?php
require('app/init.php');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$name = $_POST['name'];
$sql = "INSERT INTO items (id, name) VALUES (null, '$name')";
// echo "$result";
// $items = array();
// if ($result->num_rows > 0) {
//     while($row = $result->fetch_assoc()) {
//     	array_push($items, $row["name"] );
//     }
// } else {
//     echo "0 results";
// }

if ($conn->query($sql) === TRUE) {
	header('Location: http://refat.dev/php/todo/index.php');
    // echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
// print_r($items);
?>
