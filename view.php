
<?php
require('dbconnect.php');

?>
<!DOCTYPE html>
<html>
<head>
<style>
body{
    background-color: lightblue;
  }
</style>
<meta charset="utf-8">
<title>VIEW RECORD</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p>
| <a href="insert.php">Insert New Record</a> 
| <a href="logout.php">Logout</a></p>
<h2>BADMINTON COURT INFORMATION</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>ID</strong></th>
<th><strong>COURT NO</strong></th>
<th><strong>NAME</strong></th>
<th><strong>DATE</strong></th>
<th><strong>TIME START</strong></th>
<th><strong>TIME FINISH</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from booking ORDER BY id desc;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["courtNo"]; ?></td>
<td align="center"><?php echo $row["username"]; ?></td>
<td align="center"><?php echo $row["date"]; ?></td>
<td align="center"><?php echo $row["start"]; ?></td>
<td align="center"><?php echo $row["finish"]; ?></td>
<td align="center">
<a href="update.php?id=<?php echo $row["id"]; ?>">Edit</a>
</td>
<td align="center">
<a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</body>
</html>