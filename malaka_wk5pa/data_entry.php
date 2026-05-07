<!-----------------
Gaby Malaka
5.6.26
SDC 310 WK 5 GP 2
------------------>
<?php
session_start();

//initialize session/cookie defaults
if (!isset($_SESSION['dob'])) {
    $_SESSION['dob'] = "No entry";
}
if (!isset($_COOKIE['user'])) {
    setcookie("user", "No entry", time() + 3600, "/");
}

//store values when form is submitted
if (isset($_POST['user'])) {
    setcookie("user", $_POST['user'], time() + 3600, "/");
}
if (isset($_POST['dob'])) {
    $_SESSION['dob'] = $_POST['dob'];
}
?>
<html>
<head>
    <title>Gaby Malaka WK 5 PA</title>
</head>
<body>
    <h2>Store Name & DOB in the Session & Cookie</h2>
    <form method="POST">
        <h3>Name:
            <input type="text" name="user"
                value="<?php echo isset($_COOKIE['user']) ? $_COOKIE['user'] : ''; ?>"/>
        </h3>

        <h3>Date of Birth:
            <input type="date" name="dob"
                value="<?php echo $_SESSION['dob']; ?>"/>
        </h3>

        <input type="submit" value="Submit"/>
    </form>
</body>
</html>