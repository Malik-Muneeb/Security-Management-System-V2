<?php
session_start();
require('conn.php');
$login=""; $password=""; $name="";
$email=""; $error="";
?>
<html>
<head>
<title> Home </title>
<link href="styles.css" rel="stylesheet">
</head>
<script>
function main() {
    var btnSave=document.getElementById("btnSave");
    btnSave.onclick=function() {
        var userObj = new Object();
        userObj.login = document.getElementById("txtLogin").value;
        userObj.password = document.getElementById("txtPassword").value;
        userObj.name = document.getElementById("txtName").value;
        userObj.email = document.getElementById("txtEmail").value;
        var countries = document.getElementById("cmbCountries");
        userObj.country = countries.options[countries.selectedIndex].text;

        if (userObj.login == "") {
            alert("Enter Login!");
            return false;
        }
        else if (userObj.password == "" || userObj.password.length < 8){
            alert("Enter password and size of password must greater than 8");
            return false;
        }
        else if (userObj.name == ""){
            alert("Enter Name!");
            return false;
        }
        else if (userObj.email == ""){
            alert("Enter Email")
            return false;
        }
        else if (userObj.country == "--Select--"){
            alert("Select Country!");
            return false;
        }
        return true;
    }
}
</script>
<?php
include ("userAddDAO.php");
?>
<body onload="main();">
<?php
if($_SESSION["isAdmin"]==1)
    include("adminMenu.php");
?>

<div>
	<form class="container1" method="POST" name="userForm" style="float:left;">
        <h1>Users</h1>
        <span>Login: </span> <input type="text" id="txtLogin" name="txtLogin" value="<?php echo ($login);?>"><br>
        <span>Password: </span> <input type="password" id="txtPassword" name="txtPassword" value="<?php echo ($password);?>" ><br>
        <span>Name: </span> <input type="text" id="txtName" name="txtName" value="<?php echo ($name);?>"><br>
        <span>Email: </span> <input type="email" id="txtEmail" name="txtEmail" value="<?php echo ($email);?>"><br>
        <span>Country: </span> <select name="cmbCountries" id="cmbCountries">
            <option value="0">--Select--</option>
            <option value="1">Pakistan</option>
            <option value="2">India</option>
            <option value="3">China</option>
        </select><br>
        <br><input type="checkbox" name="isAdmin" style="margin-left: -130px;" >
        <Span style="margin-left: -130px;"><b>Is He/She Admin?</b></b></Span><br>
        <span id="errorSpan" style="color:red"><?php echo($error); ?></span>
        <input type="submit" id="btnSave" name="btnSave" value="Save">
        <input type="button" id="btnClear" name="btnClear" value="Clear">
	</form>
    </div>
   
</body>
</html>