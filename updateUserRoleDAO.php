<?php

if(isset($_POST["btnSave"])) {
    $updateId=$_GET["edit"];
    $roleId=$_POST["cmbRole"];
    $userId=$_POST["cmbUser"];
    $sql = "UPDATE user_role set userid=$userId, roleid=$roleId where id=$updateId";
    if (mysqli_query($conn, $sql)) {
        ?><script>alert("Record updated successfully");</script><?php
        $roleName="--Select--"; $userName="--Select--";
        $roleId=0; $userId=0;
    } else {
        ?><script>alert("Error updating record");</script><?php
    }
}
?>