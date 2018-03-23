<div>
    <form class="container1" method="post" action="userRoleManagement.php?edit=<?php echo $editId;?>" name="userRoleForm" style="float:left;">
        <h1>User-Role Management</h1>
        <span>User: </span> <select name="cmbUser" id="cmbUser">
            <option value="<?php echo $userId;?>"><?php echo $userName?></option>
            <?php
            $sql = "SELECT * FROM users";
            $result = mysqli_query($conn, $sql);
            $recordsFound = mysqli_num_rows($result);
            if ($recordsFound > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $userId=$row["userid"];
                    $name=$row["name"];
                    echo "<option value='".$userId."'>$name</option>";
                }
            }
            ?>
        </select><br>
        <span>Role: </span> <select name="cmbRole" id="cmbRole">
            <option value="<?php echo $roleId;?>"><?php echo $roleName?></option>
            <?php
            $sql = "SELECT * FROM roles";
            $result = mysqli_query($conn, $sql);
            $recordsFound = mysqli_num_rows($result);
            if ($recordsFound > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $roleId=$row["roleid"];
                    $name=$row["name"];
                    echo "<option value='".$roleId."'>$name</option>";
                }
            }
            ?>
        </select><br><br>
        <input type="submit" id="btnSave" name="btnSave" value="Save">
        <input type="reset" id="btnClear" name="btnClear" value="Clear">
    </form>

    <form method="post" action="showUserRole.php">
        <div style="float:left;margin-left:20px;">
            <input type="submit" name="btnShow" value="Show User-Roles" >
        </div>
    </form>
</div>
