<?php
$sql = "SELECT * FROM permissions WHERE permissionid='".$editId."'";
$result = mysqli_query($conn, $sql);
$recordsFound = mysqli_num_rows($result);
if($row = mysqli_fetch_assoc($result)) {
    $perId=$row["permissionid"];
    $name=$row["name"];
    $description=$row["description"];
    $createdOn=$row["createdon"];
    $createdBy=$row["createdby"];
}
?>