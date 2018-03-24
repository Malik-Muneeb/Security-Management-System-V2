<?php
$sql = "SELECT * FROM users WHERE userid='".$editId."'";
$result = mysqli_query($conn, $sql);
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
    $sql = "SELECT * FROM country WHERE id='".$countryId."'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $countryName=$row["name"];
}

?>