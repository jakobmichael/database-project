<?php
$rootPath = $_SERVER['DOCUMENT_ROOT'];

$servername = "localhost";
$username = "library_system";
$password = "library";
$databaseName = "bibliothek";

$dbConnection = mysqli_connect($servername, $username, $password, $databaseName);

?>
<html>

<head>
    <meta charset="utf-8" />
    <title>B&uuml;chereisystem</title>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/registration.css">
</head>
<header>
    <a href="index.php">
        <img alt="book-icon" src="/assets/images/book.png" width="25px" id="book-icon">
    </a>
    <p>B&uuml;chereisystem </p>
    <a href="<?php $_SERVER['PHP_SELF']; ?>"><img alt="book-icon" src="/assets/images/refresh.png" width="20px" id="book-icon"></a>
</header>

<body class="page-container">
    <div class="form-container">
        <?php
        include($rootPath . "/includes/createUserForm.php");
        ?>
    </div>
    <div class="form-container">
        <?php
        include($rootPath . "/includes/addBook.php");
        ?>
    </div>
</body>

</html>