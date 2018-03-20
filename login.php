<?php require('conn.php');
$error="";?>
<html>
<head>
<title> Login </title>
<link rel="stylesheet" type="text/css" href="styles.css">
    <script src="jquery-3.2.1.min.js" type="text/javascript"></script>
</head>
<script>
function main() {
    var btn=document.getElementById('btnLogin');
    btn.onclick = function() {
        var login=document.getElementById('txtLogin').value;
        var password=document.getElementById('txtPassword').value;
        if(login=="")
            alert("Enter Login Name first!!!");
        else if(password=="")
            alert("Enter Password!!!");
    }
}
</script>

<?php

    if(isset($_POST["btnLogin"]))
    {
        $login=$_POST["txtLogin"];
        $password=$_POST["txtPassword"];
        $sql="SELECT * FROM users WHERE login='".$login."' And password='".$password."' ";
        $result = mysqli_query($conn, $sql);
        $recordsFound = mysqli_num_rows($result);
        if ($recordsFound > 0) {
            //Step-4: Iterate row by row
            while($row = mysqli_fetch_assoc($result)) {  //ye associative array ki trhan ha

                $id = $row["login"];
                $name = $row["password"];
                $userid=$row["isadmin"];
                //Step-5: Display values
                echo "login: $id, password:$name, $userid";
            }
        }
        else
        {
            $error="Invalid login or Password";
        }
    }

?>

<body class="bodyContainer" onload="main();">
    <h1 style="background-color:#006600;color:white;float;margin-right:1050px">Security Manager</h1>
    <div class="container" style="float:left;">
        <h1>Admin Login</h1>
            <form method="post" action="login.php">
                Login: <input id="txtLogin" name="txtLogin" /> <br>
                Password: <input id="txtPassword" name="txtPassword" type="password" /> <br>
                <span id="errorSpan" style="color:red"><?php echo ($error);?></span>
                <input type="submit" name="btnLogin" id="btnLogin" value="Login" />
                <input class ="cancelbtn" type="reset" value="cancel" />
            </form>
    </div>
</body>
</html>