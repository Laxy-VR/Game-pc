<?php
require_once 'db/connection.php';
session_start();

$page = $_GET['page'] ?? 'Home';

$isAdmin = (isset($_SESSION['role']) && $_SESSION['role'] === 'admin');
$isUser = (isset($_SESSION['role']) && $_SESSION['role'] === 'user');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GamePC</title>
    <link rel="stylesheet" href="css/Stylesheet.css">
</head>
<body <?php echo ($isAdmin) ? 'class="sidebar-active"' : ''; ?>>
<div class="main-content">
<?php
if ($isAdmin) {
    // Include the admin sidebar
    require_once('includes/adminsidebar.inc.php');
} else {
    // Include the user sidebar
    include 'includes/Navbar.inc.php';
}
?>
    <?php
    include 'includes/'.$page.'.inc.php';
    ?>
</div>
<!--<div class="footer">-->
<!--    <footer>-->
<!--        <p>&copy; 2023 GamePC</p>-->
<!--    </footer>-->
<!--</div>-->
</body>
</html>
