<?php
session_start();
include ("conn.php");
include ("addRoleDAO.php");
?>
<html>
<head>
    <title> Home </title>
    <link href="styles.css" rel="stylesheet">
    <script src="jquery-3.2.1.min.js" type="text/javascript"></script>
    <script>
        function main() {
            var btnSave = document.getElementById("btnSave");
            btnSave.onclick = function () {
                var roleObj = new Object();
                roleObj.roleName = document.getElementById("txtName").value;
                roleObj.roleDesc = document.getElementById("txtDesc").value;

                if (roleObj.roleName == "")
                    alert("Enter Role!");
                else if (roleObj.roleDesc == "")
                    alert("Enter role's description");
            }
        }

        $("#btnClear").click(function(){
            $('roleForm')[0].reset();
        });
    </script>
</head>

<body onload="main();">

<?php
if($_SESSION["isAdmin"]==1)
    include("adminMenu.php");
?>
<div>
    <form class="container1" method="post" action="roleManagement.php" name="roleForm" style="float:left;">
        <h1>Role Management</h1>
        <span>Role Name: </span> <input type="text" name="txtName" id="txtName"><br>
        <span>Description: </span> <input type="text" name="txtDesc" id="txtDesc"><br>
        <input type="submit" id="btnSave" name="btnSave" value="Save">
        <input type="reset" id="btnClear" name="btnClear" value="Clear">
    </form>

    <form method="post" action="showRoles.php">
        <div style="float:left;margin-left:20px;">
            <input type="submit" name="btnShow" value="Show Records" >
        </div>
    </form>
</div>

</body>
</html>