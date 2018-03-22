<?php

$sql = "SELECT * FROM users WHERE userid='".$editId."'";
$result = mysqli_query($conn, $sql);
$recordsFound = mysqli_num_rows($result);
if($row = mysqli_fetch_assoc($result)) {
    $userId=$row["userid"];
    $login=$row["login"];
    $password=$row["password"];
    $name=$row["name"];
    $email=$row["email"];
    $countryId=$row["countryid"];
    $createdOn=$row["createdon"];
    $createdBy=$row["createdby"];
    $isAdmin=$row["isadmin"];
}

?>