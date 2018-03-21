<?php
session_start();
if(isset($_SESSION["user"])==false)
    header("location: login.php");

?>
<html>
<head>
<title> Home </title>
<link href="styles.css" rel="stylesheet">
<head>

<body>
<?php
if($_SESSION["isAdmin"]==1) {
    include("adminMenu.php");?>
    <div>
        <h1>Welcome <?php echo ($_SESSION["user"]); ?></h1>
    </div>
<?php
}
else {
include("userMenu.php");?>
<div>
    <h1>Welcome <?php echo ($_SESSION["user"]); ?></h1>
</div>
<?php
}
?>


   
</body>
</html>