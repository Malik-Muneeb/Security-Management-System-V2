<html>
<head>
    <title> Records </title>
    <link href="styles.css" rel="stylesheet">
</head>
</html>

<?php
session_start();
include ("conn.php");
if($_SESSION["isAdmin"]==1)
    include("adminMenu.php");
if(isset($_POST["btnShow"])) {
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);
    $recordsFound = mysqli_num_rows($result);
    if ($recordsFound > 0) {
        ?>
        <table id="myTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $row['userid']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><a href=""> Delete</a></td>
                <td><a href=""> Delete</a></td>
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
