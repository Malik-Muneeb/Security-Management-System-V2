<html>
<head>
    <title> Roles-Permission </title>
    <link href="styles.css" rel="stylesheet">
</head>
</html>
<script>
    function deleteMsg() {
        if(confirm("Do you want to continue ?"))
            return true;
        return false;
    }
</script>

<?php
session_start();
if (isset($_SESSION["user"]) == false)
    header("location: login.php");
include ("conn.php");
if($_SESSION["isAdmin"]==1)
    include("adminMenu.php");
if(isset($_GET["delete"])){
    $deleteId=$_GET["delete"];
    $sql="DELETE FROM role_permission WHERE id=$deleteId";
    if(mysqli_query($conn,$sql)){
        ?><script>alert("Record deleted successfully");</script><?php
    } else {
        ?><script>alert("Error deleting record");</script><?php
    }
}
if(isset($_POST["btnShow"]) || isset($_GET["delete"])) {
    $sql = "SELECT * FROM role_permission";
    $result = mysqli_query($conn, $sql);
    $recordsFound = mysqli_num_rows($result);
    if ($recordsFound > 0) {
        ?>
        <table id="myTable">
            <thead>
            <tr>
                <th>ID</th>
                <th>Role</th>
                <th>Permission</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
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
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $roleName; ?></td>
                    <td><?php echo $perName; ?></td>
                    <td><a id="deleteRecord" onclick="return deleteMsg()" href="showRolePer.php?delete=<?php echo $row["id"];?>"> Delete</a></td>
                    <td><a href="rolePermissionManagement.php?edit=<?php echo $row["id"];?>"> Edit</a></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <?php
    }
    else {
        ?><script>alert("No Records Found")</script><?php
        //header("location: userManagement.php");
    }
}

?>
