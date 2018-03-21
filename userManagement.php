<?php
session_start();
?>
<html>
<head>
<title> Home </title>
<link href="styles.css" rel="stylesheet">
</head>
<script>
function main() {
    var userObj=new Object();
    userObj.login=document.getElementById("txtLogin").value;
    userObj.password=document.getElementById("txtPassword").value;
    userObj.name=document.getElementById("txtName").value;
    userObj.email=document.getElementById("txtEmail").value;
    var countries = document.getElementById("cmbCountries");
    userObj.country = countries.options[countries.selectedIndex].text;

    if(userObj.login=="")
        alert("Enter Login!");
    else if(userObj.password=="" || userObj.password.length <8)
        alert("Enter password and size of password must greater than 8");
    else if(userObj.name=="")
        alert("Enter Name!");
    else if(userObj.email=="")
        alert("Enter Email")
    else if(userObj.country=="--Select--")
        alert("Select Country!");
    else if(userObj.city=="--Select--")
        alert("Select City!");
}
</script>
<body onload="main();">
<?php
if($_SESSION["isAdmin"]==1)
    include("adminMenu.php");
?>

<div>
	<form class="container1" style="float:left;">
        <h1>Users</h1>
        <span>Login: </span> <input type="text" id="txtLogin" ><br>
        <span>Password: </span> <input type="password" id="txtPassword" ><br>
        <span>Name: </span> <input type="text" id="txtName" ><br>
        <span>Email: </span> <input type="email" id="txtEmail" ><br>
        <span>Country: </span> <select name="cmbCountries" id="cmbCountries">
            <option value="0">--Select--</option>
            <option value="1">Pakistan</option>
            <option value="2">India</option>
            <option value="3">China</option>
        </select><br>
        <input type="button" id="btnSave" value="Save">
        <input type="button" id="btnClear" value="Clear">
	</form>
    </div>
   
</body>
</html>