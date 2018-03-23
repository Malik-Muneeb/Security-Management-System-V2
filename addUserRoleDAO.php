<?php
if(isset($_POST["btnSave"])) {
    $roleId=$_POST["cmbRole"];
    $userId=$_POST["cmbUser"];
    if($roleId==0 && $userId==0)
        $error="Please Select All Information";
    else {
        $sql="Insert into user_role VALUES (NULL,$userId,$roleId)";
        if (mysqli_query($conn, $sql) === TRUE) {
            ?>
            <script>
                alert("Record is added successfully.");
                var role = document.getElementById("cmbRole");
                role.options[role.selectedIndex].text = "--Select--";
                var user = document.getElementById("cmbUser");
                user.options[user.selectedIndex].text = "--Select--";

            </script>
            <?php
        } else {
            ?><script>alert("Some Problem has occurred");</script><?php
        }
    }
}

?>
