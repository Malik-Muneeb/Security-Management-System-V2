<?php

if(isset($_POST["btnSave"])) {
    $updateId=$_GET["edit"];
    $name=$_POST["txtName"];
    $description=$_POST["txtDesc"];
    $sql = "UPDATE roles set name='".$name."',description='".$description."'".
    ",createdon='".$createdOn."',createdby='".$createdBy."' where roleid=$updateId";
    if (mysqli_query($conn, $sql)) {
        ?><script>alert("Record updated successfully");</script><?php
        $name="";
        $description="";
    } else {
        ?><script>alert("Error updating record");</script><?php
    }
}
?>