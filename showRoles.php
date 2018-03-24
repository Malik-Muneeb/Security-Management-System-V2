<html>
<head>
    <title> Roles </title>
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
    $sql="DELETE FROM roles WHERE roleid=$deleteId";
    if(mysqli_query($conn,$sql)){
        ?><script>alert("Record deleted successfully");</script><?php
    } else {
        ?><script>alert("Error deleting record");</script><?php
    }
}
if(isset($_POST["btnShow"]) || isset($_GET["delete"])) {
    $sql = "SELECT * FROM roles";
    $result = mysqli_query($conn, $sql);
    $recordsFound = mysqli_num_rows($result);
    if ($recordsFound > 0) {
        ?>
        <table id="myTable">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $row['roleid']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><a id="deleteRecord"; onclick="return deleteMsg()"; href="showRoles.php?delete=<?php echo $row["roleid"];?>"> Delete</a></td>
                    <td><a href="roleManagement.php?edit=<?php echo $row["roleid"];?>"> Edit</a></td>
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
