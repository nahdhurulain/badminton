<style>
    
    .container  {
    width: 420px;
    padding: 100px;
    position: relative;
    border : 5px solid;
    background-color: rgb(122, 190, 230);
    margin: 0 auto;
    text-align:center;
    
.form {
    margin: 50px auto;
    width: 300px;
    padding: 30px 25px;
    background: white;
    text align:center;
}
h1.login-title {
    color: #666;
    margin: 0px auto 25px;
    font-size: 25px;
    font-weight: 300;
    text-align: center;
}
.login-input {
    font-size: 15px;
    border: 1px solid #ccc;
    padding: 10px;
    margin-bottom: 25px;
    height: 25px;
    width: calc(100% - 23px);
}
.login-input:focus {
    border-color:#6e8095;
    outline: none;
}
.login-button {
    color: #fff;
    background: #55a1ff;
    border: 0;
    outline: 0;
    width: 100%;
    height: 50px;
    font-size: 16px;
    text-align: center;
    cursor: pointer;
}
.link {
    color: #666;
    font-size: 15px;
    text-align: center;
    margin-bottom: 0px;
}
.link a {
    color: #666;
}
h3 {
    font-weight: normal;
    text-align: center;
}
</style>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css" />
<body>
<div  class="form">
<p><a href="view.php">Dashboard</a> 
| <a href="insert.php">Insert New Booking</a> 
| <a href="logout.php">Logout</a></p>
<h1>Update Record</h1>
<?php
require('dbconnect.php');

if (isset($_GET['operation'])) {
try {
        $query = "UPDATE booking SET courtNo = '$courtNo', username = '$username',date = '$date', start = '$start', finish = '$finish'
         WHERE id = '$id'";
        $result   = mysqli_query($con, $query);
        $conn->exec($query);
        echo "<script> alert('Update Success')</script>";
        echo "<script> window.location.replace('mainpage.php?matric=".$matric."&name=".$name."') </script>;";
      } 
      catch(PDOException $e) {
        echo "<script> alert('Update Error')</script>";
      }
    }else{
?>
<div class = "container" > 
<div class ="center">
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<h1 class="login-title">EDIT BOOKING</h1>
<br><label for="courtNo">Court Number :</label><br>
<br><input type="text" name="courtNo" value="<?php echo $row ['courtNo'];?>" placeholder="Court Number"   required ></br>
<br><label for="username">Enter Name:</label><br>
<br><input type="text" name="username" value="<?php echo $row['username'];?>" placeholder="Enter Name"  required ></br>
<br><label for="date">DATE:</label><br>
<br><input type="text" name="date" value="<?php echo $row ['date'] ;?>" placeholder="Date"  required ></br>
<br><label for="start">TIME START:</label><br>
<br><input type="text" name="start" value="<?php echo $row ['start'] ;?>"  placeholder="Time Start" required ></br>
<br><label for="finish">TIME FINISH:</label><br>
<br><input type="text" name="finish" value="<?php echo $row['finish'];?>"  placeholder="Time Finish" required ></br>
<input name="submit" type="submit" value="Submit" /></p>
</form>
<div>
<div>
<?php
 }
?>

</body>
</html>
