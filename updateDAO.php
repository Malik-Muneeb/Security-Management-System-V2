<?php

if(isset($_POST["btnSave"])) {
    $updateId=$_GET["edit"];
    $login=$_POST["txtLogin"];
    $password=$_POST["txtPassword"];
    $name=$_POST["txtName"];
    $email=$_POST["txtEmail"];
    $country=$_POST["cmbCountries"];
    if(isset($_POST["isAdmin"]))
        $isAdmin=1;
    else
        $isAdmin=0;
    $sql = "UPDATE users set login='".$login."', password='".$password."', name='".$name."',".
             "email='".$email."', countryid='".$countryId."', createdon='".$createdOn."', ".
            "createdby='".$createdBy."', isadmin=$isAdmin where userid=$updateId";
    if (mysqli_query($conn, $sql)) {
        ?><script>alert("Record updated successfully");</script><?php
        $login="";
        $password="";
        $name="";
        $email="";
        $countryId=0;
        $isAdmin=0;
    } else {
        ?><script>alert("Error updating record");</script><?php
    }
}
?>