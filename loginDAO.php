<?php

if (isset($_POST["btnLogin"])) {
    $login = $_POST["txtLogin"];
    $password = $_POST["txtPassword"];
    if ($login == "" && $password = "")
        $error = "You missed login or Password";
    else {
        $sql = "SELECT * FROM users WHERE login='" . $login . "' And password='" . $password . "' ";
        $result = mysqli_query($conn, $sql);
        $recordsFound = mysqli_num_rows($result);
        if ($recordsFound > 0) {
            $row = mysqli_fetch_assoc($result);
            $isAdmin = $row["isadmin"];
            $_SESSION["user"]=$row["name"];
            $_SESSION["isAdmin"]=$isAdmin;
            if($userid==1)
                header("Location: home.php");
            else
                header("Location: home.php");
        } else {
            $error = "Invalid login or Password";
            $_SESSION["user"]=null;
        }
    }
}
?>