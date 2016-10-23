

<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "todo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id ,name FROM items";
$result = $conn->query($sql);
// echo "$result";
$items = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    	array_push($items, $row["name"] );
    }
} else {
    echo "0 results";
}
$conn->close();
print_r($items);
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>To DO</title>
		<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
		<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Shadows+Into+Light" />
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
		<div class="list">
			<h1 class="header">To Do List</h1>
			<?php if(!empty($items)): ?>
				<ul class="items">
					<?php foreach($items as $item): ?>
					<li ><span class="item"><?php echo $item; ?></span></li>
					<?php endforeach; ?>
				</ul>
			<?php else: ?>
					<p>No Items</p>
			<?php endif;?>
			<form class="item-add" action="add.php" method="post">
				<input type="text" name="name" class="input" />
				<input class="submit" type="submit" value="Add" />
			</form>
		<div>

	</body>
</html>