<?php
if(isset($_POST["btnSave"])) {
    $roleId=$_POST["cmbRole"];
    $perId=$_POST["cmbPer"];
    if($roleId==0 && $perId==0)
        $error="Please Select All Information";
    else {
        $sql="Insert into role_permission VALUES (NULL,$roleId,$perId)";
        if (mysqli_query($conn, $sql) === TRUE) {
            ?>
            <script>
            var role = document.getElementById("cmbRole");
            role.options[role.selectedIndex].text = "--Select--";
            var per = document.getElementById("cmbPer");
            per.options[per.selectedIndex].text = "--Select--";
            alert("Record is added successfully.");
            </script>
            <?php
        } else {
            ?><script>alert("Some Problem has occurred");</script><?php
        }
    }
}

?>
