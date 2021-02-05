<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Insert New Record</title>
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
</head>
<p><a href="view.php">Dashboard</a> 
| <a href="insert.php">Insert New Booking</a> 
| <a href="logout.php">Logout</a></p>
<body>
<?php
require('dbconnect.php');
session_start();
$result = "";

    if (isset($_REQUEST['courtNo'])) {
        $courtNo = stripslashes($_REQUEST['courtNo']);
        //escapes special characters in a string
        $courtNo = mysqli_real_escape_string($con, $courtNo);
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($con, $username);
        $date    = stripslashes($_REQUEST['date']);
        $date    = mysqli_real_escape_string($con, $date);
        $start = stripslashes($_REQUEST['start']);
        $start = mysqli_real_escape_string($con, $start);
        $finish = stripslashes($_REQUEST['finish']);
        $finish= mysqli_real_escape_string($con, $finish);
        $query    = "INSERT into `booking` (courtNo, username,date,start,finish)
        VALUES ('$courtNo', '$username', '$date', '$start','$finish')";
$result   = mysqli_query($con, $query);
if ($result){
echo "<div class='form'>
          <h3>New record Insert successfully.</h3><br/>
          <p class='link'>Click here to <a href='view.php'>View Record</a></p>
          </div>";
} else {
echo "<div class='form'>
     <h3>Required fields are missing.</h3><br/>
     <p class='link'>Click here to <a href='insert.php'>Insert New Record</a> again.</p>
     </div>";
}
} else {

?>
<div class = "container" > 
<div class ="center">
<form name="form" method="post" action="" > 
<input type="hidden" name="new" value="1" />
<h1 class="login-title">INSERT NEW RECORD</h1>
<br><label for="courtNo">Court Number :</label><br>
<br><input type="text" name="courtNo"  required /></br>
<br><label for="username">Enter Name:</label><br>
<br><input type="text" name="username"  required /><br>
<br><label for="date">DATE:</label><br>
<br><input type="text" name="date" required /><br>
<br><label for="start">TIME START:</label><br>
<br><input type="text" name="start" placeholder="Time Start" required /><br>
<br><label for="finish">TIME FINISH:</label><br>
<br><input type="text" name="finish" placeholder="Time Finish" required /><br>
<p><input name="submit" type="submit" value="Submit" /></p>
</form>
</div>
</div>
<?php
    }
?>
</body>
</html>
