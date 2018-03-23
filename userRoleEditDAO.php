<?php
$sql = "SELECT * FROM user_role WHERE id='".$editId."'";
$result = mysqli_query($conn, $sql);
$recordsFound = mysqli_num_rows($result);
if($row = mysqli_fetch_assoc($result)) {
    $roleId=$row["roleid"];
    $userId=$row["userid"];
    $sql = "SELECT * FROM roles WHERE roleid=$roleId";
    $result1 = mysqli_query($conn, $sql);
    $row1 = mysqli_fetch_assoc($result1);
    $roleName=$row1["name"];
    $sql = "SELECT * FROM users WHERE userid=$userId";
    $result1 = mysqli_query($conn, $sql);
    $row1 = mysqli_fetch_assoc($result1);
    $userName=$row1["name"];
}

?>