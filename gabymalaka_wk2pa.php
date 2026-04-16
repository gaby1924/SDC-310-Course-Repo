<html>

<head>
    <title>Week 2 Performance Assessment - Gaby Malaka</title>
</head>

<body>
    <form method='POST'>
        <h3>Enter your name: <input type="text" name="name"></h3>
        <h3>Enter your date of birth: <input type="text" name="dob"></h3>
        <h3>Enter your favorite color: <input type="text" name="fav_color"></h3>
        <h3>Enter your favorite place to visit: <input type="text" name="fav_place"></h3>
        <h3>Enter your nickname: <input type="text" name="nickname"></h3>
        <input type="submit" value="Submit">
    </form>
    <?php
        //---Declare and clear variables for display---//
        $name = "";
        $dob = "";
        $fav_color = "";
        $fav_place = "";
        $nickname = "";

        //---Retrieves values from query string and stores them in local variables---
        //---as long as the query string exists (which it doesn't on first load of a page)---//
        if (isset($_POST['name']))
            $name = $_POST['name'];
        if (isset($_POST['dob']))
            $dob = $_POST['dob'];
        if (isset($_POST['fav_color']))
            $fav_color = $_POST['fav_color'];
        if (isset($_POST['fav_place']))
            $fav_place = $_POST['fav_place'];
        if (isset($_POST['nickname']))
            $nickname = $_POST['nickname'];

        var_dump($name);
        var_dump($dob);

        //---Displays the vaules entered as long as there's a value---//
        if (!empty($name)) {
            echo "<h3>Your name is: $name</h3>";
        } else {
            echo "<h3>You didn't enter a name.</h3>";
        }
        
        if (!empty($fav_color)) {
            echo "<h3>Your favorite color is: $fav_color</h3>";
        } else {
            echo "<h3>You didn't enter a favorite color.</h3>";
        }

        if (!empty($fav_place)) {
            echo "<h3>Your favorite place to visit is: $fav_place</h3>";
        } else {
            echo "<h3>You didn't enter a favorite place.</h3>";
        }

        if (!empty($nickname)) {
            echo "<h3>Your nickname is: $nickname</h3>";
        } else {
            echo "<h3>You didn't enter a nickname.</h3>";
        }
        ?>
</body>

</html> 
