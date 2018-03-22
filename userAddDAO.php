<?php
if(isset($_POST["btnSave"])) {
    $login=$_POST["txtLogin"];
    $password=$_POST["txtPassword"];
    $name=$_POST["txtName"];
    $email=$_POST["txtEmail"];
    $country=$_POST["cmbCountries"];
    if(isset($_POST["isAdmin"]))
        $isAdmin=1;
    else
        $isAdmin=0;
    if($login=="" && $password=="" && $name=="" && $email=="")
        $error="Please Enter All Information";
    else {
        $userId=$_SESSION["userId"];
        $date = date('Y-m-d H:i:s');
        $sql="Insert into users VALUES (NULL,'".$login."','".$password."','".$name."','".$email."',".
            "'".$country."','".$date."',$userId,$isAdmin)";
        if (mysqli_query($conn, $sql) === TRUE) {
            $last_id = mysqli_insert_id($conn);
            $login=""; $password=""; $name="";
            $email=""; $error="";
            ?><script>alert("Record is added successfully.");</script><?php
        } else {
            ?><script>alert("Some Problem has occurred");</script><?php
        }
    }
}

?>
