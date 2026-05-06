<?php
    //Connect to Database
    $hostname = "localhost";
    $username = "ecpi_user";
    $password = "Password1";
    $dbname = "sdc310_midterm";
    $conn = mysqli_connect($hostname, $username, $password, $dbname);

    //Est. variables to support add/edit/delete
    $AddressNo = -1;
    $FirstName = "";
    $LastName = "";
    $Street = "";
    $City = "";
    $StateIn = "";
    $ZipCode = "";

    //Variables to determine the type of operation
    $add = false;
    $edit = false;
    $update = false;
    $delete = false;

    if (isset($_POST['AddressNo'])) {
        $AddressNo = $_POST['AddressNo'];
        $add = isset($_POST['add']);
        $edit = isset($_POST['edit']);
        $update = isset($_POST['update']);
        $delete = isset($_POST['delete']);
    }

    if ($add) {
        //Need to add a new user
        $AddressNo = $_POST['AddressNo'];
        $FirstName = $_POST['FirstName'];
        $LastName = $_POST['LastName'];
        $Street = $_POST['Street'];
        $City = $_POST['City'];
        $StateIn = $_POST['StateIn'];
        $ZipCode = $_POST['ZipCode'];

        $addQuery = "INSERT INTO 
            userinfo (AddressNo, FirstName, LastName, Street, City, StateIn, ZipCode)
            VALUES ('$AddressNo', '$FirstName', '$LastName', '$Street', '$City', '$StateIn', '$ZipCode')";
        mysqli_query($conn, $addQuery);

        //Clear the fields
        $AddressNo = -1;
        $FirstName = "";
        $LastName = "";
        $Street = "";
        $City = "";
        $StateIn = "";
        $ZipCode = "";
    }

    else if ($edit) {
        //Get the user info
        $selQuery = "SELECT * FROM userinfo WHERE AddressNo = $AddressNo";
        $result = mysqli_query($conn, $selQuery);
        $userInfo = mysqli_fetch_assoc($result);

        //Fill in the values to allow for editing
        $FirstName = $userInfo['FirstName'];
        $LastName = $userInfo['LastName'];
        $Street = $userInfo['Street'];
        $City = $userInfo['City'];
        $StateIn = $userInfo['StateIn'];
        $ZipCode = $userInfo['ZipCode'];
    }

    else if ($update) {
        //Updated values submitted
        $FirstName = $_POST['FirstName'];
        $LastName = $_POST['LastName'];
        $Street = $_POST['Street'];
        $City = $_POST['City'];
        $StateIn = $_POST['StateIn'];
        $ZipCode = $_POST['ZipCode'];
        $updQuery = "UPDATE userinfo SET 
            FirstName = '$FirstName', 
            LastName = '$LastName', 
            Street = '$Street', 
            City = '$City', 
            StateIn = '$StateIn', 
            ZipCode = '$ZipCode'
            WHERE AddressNo = $AddressNo";
        mysqli_query($conn, $updQuery);

        //Clear the fields
        $AddressNo = -1;
        $FirstName = "";
        $LastName = "";
        $Street = "";
        $City = "";
        $StateIn = "";
        $ZipCode = "";
    }

    else if ($delete) {
        //Need to delete the selected user
        $delQuery = "DELETE FROM userinfo WHERE AddressNo = $AddressNo";
        mysqli_query($conn, $delQuery);
        $AddressNo = -1;
    }

    //Query for all users
    $query = "SELECT * FROM userinfo";
    $result = mysqli_query($conn, $query);
?>
<style>
    table {
        border-spacing: 5px;
    }

    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    th, td {
        padding: 15px;
        text-align: center;
    }

    th {
        background-color: lightskyblue;
    }

    tr:nth-child(even) {
        background-color: whitesmoke;
    }

    tr:nth-child(odd) {
        background-color: lightgray;
    }
</style>
<html>
    <head>
        <title>Week 3 Midterm - Gaby Malaka</title>
    </head>

    <body>
        <h2>Current Users</h2>
        <table>
            <tr style="font-size:large;">
                <th>Address #</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Street</th>
                <th>City</th>
                <th>State</th>
                <th>Zip Code</th>
                <th></th>
            </tr>

            <?php while ($row = mysqli_fetch_array($result)): ?>
                <tr>
                <td><?php echo $row["AddressNo"];?></td>
                    <td><?php echo $row["FirstName"];?></td>
                    <td><?php echo $row["LastName"];?></td>
                    <td><?php echo $row["Street"];?></td>
                    <td><?php echo $row["City"];?></td>
                    <td><?php echo $row["StateIn"];?></td>
                    <td><?php echo $row["ZipCode"];?></td>
                    <td>
                        <form method='POST'>
                            <input type="submit" value="Edit" name="edit">
                            <input type="hidden"
                                value="<?php echo $row["AddressNo"]; ?>"
                                name="AddressNo">
                        </form>
                    </td>
                    <td>
                        <form method='POST'>
                            <input type="hidden"
                                value="<?php echo $row["AddressNo"]; ?>"
                                name="AddressNo">
                            <input type='submit' value="Delete" name="delete">
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
        <form method='POST'>
            <input type="hidden" value="<?php echo $AddressNo; ?>" name="AddressNo">
            <h3>Enter your first name: <input type="text" name="FirstName"
                value="<?php echo $FirstName; ?>"></h3>
            <h3>Enter your last name: <input type="text" name="LastName"
                value="<?php echo $LastName; ?>"></h3>
            <h3>Enter your street: <input type="text" name="Street"
                value="<?php echo $Street; ?>"></h3>
            <h3>Enter your city: <input type="text" name="City"
                value="<?php echo $City; ?>"></h3>
            <h3>Enter your state: <input type="text" name="StateIn"
                value="<?php echo $StateIn; ?>"></h3>
            <h3>Enter your zip code: <input type="text" name="ZipCode"
                value="<?php echo $ZipCode; ?>"></h3>
            <?php if (!$edit): ?>
                <input type="submit" value="Add User" name="add">
            <?php else: ?>
                <input type="submit" value="Update User" name="update">
            <?php endif; ?>
        </form>
    </body>
</html>