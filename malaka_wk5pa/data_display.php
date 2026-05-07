<!----------
Gaby Malaka
5.6.26
SDC 310 WK PA
------------->
<?php
session_start();
?>
<html>
<head>
    <title>Gaby Malaka WK 5 PA</title>
</head>
<body>
    <h2>Display Stored Name & DOB</h2>
<!--displays name-->
    <p><strong>Name (from cookie):</strong>
        <?php echo isset($_COOKIE['user']) ? $_COOKIE['user'] : 'No entry'; ?>
    </p>
<!--displays DOB-->
    <p><strong>Date of Birth (from session):</strong>
        <?php echo isset($_SESSION['dob']) ? $_SESSION['dob'] : 'No entry'; ?>
    </p>
<!--link to data entry pg.-->
    <br>
    <a href="data_entry.php">Back to data entry page</a>
</body>
</html>