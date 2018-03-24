<html>
<head>
    <title> User-Role </title>
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
    $sql="DELETE FROM user_role WHERE id=$deleteId";
    if(mysqli_query($conn,$sql)){
        ?><script>alert("Record deleted successfully");</script><?php
    } else {
        ?><script>alert("Error deleting record");</script><?php
    }
}
if(isset($_POST["btnShow"]) || isset($_GET["delete"])) {
    $sql = "SELECT * FROM user_role";
    $result = mysqli_query($conn, $sql);
    $recordsFound = mysqli_num_rows($result);
    if ($recordsFound > 0) {
        ?>
        <table id="myTable">
            <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Role</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
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
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $userName; ?></td>
                    <td><?php echo $roleName; ?></td>
                    <td><a id="deleteRecord" onclick="return deleteMsg()" href="showUserRole.php?delete=<?php echo $row["id"];?>"> Delete</a></td>
                    <td><a href="userRoleManagement.php?edit=<?php echo $row["id"];?>"> Edit</a></td>
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
