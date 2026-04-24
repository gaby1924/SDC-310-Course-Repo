<?php
    //Connect to Database
    $hostname = "localhost";
    $username = "ecpi_user";
    $password = "Password1";
    $dbname = "sdc310_wk3pa";
    $conn = mysqli_connect($hostname, $username, $password, $dbname);

    //Est. variables to support add/edit/delete
    $userNo = -1;
    $FullName = "";
    $Birthdate = "";
    $FavoriteColor = "";
    $FavoritePlace = "";
    $Nickname = "";

    //Variables to determine the type of operation
    $add = false;
    $edit = false;
    $update = false;
    $delete = false;

    if (isset($_POST['user_no'])) {
        $userNo = $_POST['user_no'];
        $add = isset($_POST['add']);
        $edit = isset($_POST['edit']);
        $update = isset($_POST['update']);
        $delete = isset($_POST['delete']);
    }

    if ($add) {
        //Need to add a new user
        $FullName = $_POST['fname'];
        $Birthdate = $_POST['bday'];
        $FavoriteColor = $_POST['fav_color'];
        $FavoritePlace = $_POST['fav_place'];
        $Nickname = $_POST['nickname'];

        $addQuery = "INSERT INTO 
            personal_info (FullName, Birthdate, FavoriteColor, FavoritePlace, Nickname)
            VALUES ('$FullName', '$Birthdate', '$FavoriteColor', '$FavoritePlace', '$Nickname')";
        mysqli_query($conn, $addQuery);

        //Clear the fields
        $userNo = -1;
        $FullName = "";
        $Birthdate = "";
        $FavoriteColor = "";
        $FavoritePlace = "";
        $Nickname = "";
    }

    else if ($edit) {
        //Get the user info
        $selQuery = "SELECT * FROM personal_info WHERE UserNo = $userNo";
        $result = mysqli_query($conn, $selQuery);
        $userInfo = mysqli_fetch_assoc($result);

        //Fill in the values to allow for editing
        $FullName = $userInfo['FullName'];
        $Birthdate = $userInfo['Birthdate'];
        $FavoriteColor = $userInfo['FavoriteColor'];
        $FavoritePlace = $userInfo['FavoritePlace'];
        $Nickname = $userInfo['Nickname'];
    }

    else if ($update) {
        //Updated values submitted
        $FullName = $_POST['fname'];
        $Birthdate = $_POST['bday'];
        $FavoriteColor = $_POST['fav_color'];
        $FavoritePlace = $_POST['fav_place'];
        $Nickname = $_POST['nickname'];

        $updQuery = "UPDATE personal_info SET 
            FullName = '$FullName', 
            Birthdate = '$Birthdate', 
            FavoriteColor = '$FavoriteColor', 
            FavoritePlace = '$FavoritePlace', 
            Nickname = '$Nickname'
            WHERE UserNo = $userNo";
        mysqli_query($conn, $updQuery);

        //Clear the fields
        $userNo = -1;
        $FullName = "";
        $Birthdate = "";
        $FavoriteColor = "";
        $FavoritePlace = "";
        $Nickname = "";
    }

    else if ($delete) {
        //Need to delete the selected user
        $delQuery = "DELETE FROM personal_info WHERE UserNo = $userNo";
        mysqli_query($conn, $delQuery);
        $userNo = -1;
    }

    //Query for all users
    $query = "SELECT * FROM personal_info";
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
        <title>Week 3 GP - Gaby Malaka</title>
    </head>

    <body>
        <h2>Current Users</h2>
        <table>
            <tr style="font-size:large;">
                <th>User #</th>
                <th>Full Name</th>
                <th>Birthdate</th>
                <th>Favorite Color</th>
                <th>Favorite Place</th>
                <th>Nickname</th>
                <th></th>
            </tr>

            <?php while ($row = mysqli_fetch_array($result)): ?>
                <tr>
                <td><?php echo $row["UserNo"];?></td>
                    <td><?php echo $row["FullName"];?></td>
                    <td><?php echo $row["Birthdate"];?></td>
                    <td><?php echo $row["FavoriteColor"];?></td>
                    <td><?php echo $row["FavoritePlace"];?></td>
                    <td><?php echo $row["Nickname"];?></td>
                    <td>
                        <form method='POST'>
                            <input type="submit" value="Edit" name="edit">
                            <input type="hidden"
                                value="<?php echo $row["UserNo"]; ?>"
                                name="user_no">
                        </form>
                    </td>
                    <td>
                        <form method='POST'>
                            <input type="hidden"
                                value="<?php echo $row["UserNo"]; ?>"
                                name="user_no">
                            <input type='submit' value="Delete" name="delete">
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
        <form method='POST'>
            <input type="hidden" value="<?php echo $userNo; ?>" name="user_no">
            <h3>Enter your full name: <input type="text" name="fname"
                value="<?php echo $FullName; ?>"></h3>
            <h3>Enter your birthdate: <input type="text" name="bday"
                value="<?php echo $Birthdate; ?>"></h3>
            <h3>Enter your favorite color: <input type="text" name="fav_color"
                value="<?php echo $FavoriteColor; ?>"></h3>
            <h3>Enter your favorite place: <input type="text" name="fav_place"
                value="<?php echo $FavoritePlace; ?>"></h3>
            <h3>Enter your nickname: <input type="text" name="nickname"
                value="<?php echo $Nickname; ?>"></h3>
            <?php if (!$edit): ?>
                <input type="submit" value="Add User" name="add">
            <?php else: ?>
                <input type="submit" value="Update User" name="update">
            <?php endif; ?>
        </form>
    </body>
</html>
