<div>
    <form class="container1" method="post" action="rolePermissionManagement.php?edit=<?php echo $editId;?>" name="rolePerForm" style="float:left;">
        <h1>Role-Permissions Management</h1>

        <span>Role: </span><select name="cmbRole" id="cmbRole">
            <option value="0">--Select--</option>
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
        </select><br>
        <span>Permission: </span> <select name="cmbPer" id="cmbPer">
            <option value="0">--Select--</option>
            <?php
            $sql = "SELECT * FROM permissions";
            $result = mysqli_query($conn, $sql);
            $recordsFound = mysqli_num_rows($result);
            if ($recordsFound > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $perId=$row["permissionid"];
                    $name=$row["name"];
                    echo "<option value='".$perId."'>$name</option>";
                }
            }
            ?>
        </select><br><br>
        <input type="submit" id="btnSave" name="btnSave" value="Save">
        <input type="reset" id="btnClear" name="btnClear" value="Clear">
    </form>

    <form method="post" action="showRolePer.php">
        <div style="float:left;margin-left:20px;">
            <input type="submit" name="btnShow" value="Show Roles-Permission" >
        </div>
    </form>
</div>
