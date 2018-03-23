<?php
if(isset($_POST["btnSave"])) {
    $name=$_POST["txtName"];
    $description=$_POST["txtDesc"];
    if($name=="" && $description=="")
        $error="Please Enter All Information";
    else {
        $userId=$_SESSION["userId"];
        $date = date('Y-m-d H:i:s');
        $sql="Insert into roles VALUES (NULL,'".$name."','".$description."',".
            "'".$date."',$userId)";
        if (mysqli_query($conn, $sql) === TRUE) {
            $last_id = mysqli_insert_id($conn);
            $name=""; $description="";
            ?><script>alert("Record is added successfully.");</script><?php
        } else {
            ?><script>alert("Some Problem has occurred");</script><?php
        }
    }
}

?>
