<?php
$sql = "SELECT * FROM role_permission WHERE id='".$editId."'";
$result = mysqli_query($conn, $sql);
$recordsFound = mysqli_num_rows($result);
if($row = mysqli_fetch_assoc($result)) {
    $roleId=$row["roleid"];
    $perId=$row["permissionid"];
    $sql = "SELECT * FROM roles WHERE roleid=$roleId";
    $result1 = mysqli_query($conn, $sql);
    $row1 = mysqli_fetch_assoc($result1);
    $roleName=$row1["name"];
    $sql = "SELECT * FROM permissions WHERE permissionid=$perId";
    $result1 = mysqli_query($conn, $sql);
    $row1 = mysqli_fetch_assoc($result1);
    $perName=$row1["name"];
}

?>