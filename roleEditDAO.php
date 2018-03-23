<?php
$sql = "SELECT * FROM roles WHERE roleid='".$editId."'";
$result = mysqli_query($conn, $sql);
$recordsFound = mysqli_num_rows($result);
if($row = mysqli_fetch_assoc($result)) {
    $roleId=$row["roleid"];
    $name=$row["name"];
    $description=$row["description"];
    $createdOn=$row["createdon"];
    $createdBy=$row["createdby"];
}

?>