<?php

if(isset($_POST["btnSave"])) {
    $updateId=$_GET["edit"];
    $roleId=$_POST["cmbRole"];
    $perId=$_POST["cmbPer"];
    $sql = "UPDATE role_permission set roleid=$roleId, permissionid=$perId where id=$updateId";
    if (mysqli_query($conn, $sql)) {
        ?><script>alert("Record updated successfully");</script><?php
        $roleName="--Select--"; $perName="--Select--";
        $roleId=0; $perId=0;
    } else {
        ?><script>alert("Error updating record");</script><?php
    }
}
?>