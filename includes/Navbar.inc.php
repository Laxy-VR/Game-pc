<?php
if (isset($_SESSION['role'])) {
    $isAdmin = ($_SESSION['role'] == 'admin');
} else {
    $isAdmin = false;
if (isset($_SESSION['role'])) {
    $isUser = ($_SESSION['role'] == 'user');
}
}
?>

<header>
    <nav>
        <ul>
            <li><a href="index.php?page=Home">Home</a></li>
            <?php if ($isAdmin) { ?>
                <li><a href="index.php?page=caseslist">Caseslist</a></li>
                <li><a href="index.php?page=CPUlist">CPU-list</a></li>
                <li><a href="index.php?page=CClist">CPU Cooler-list</a></li>
                <li><a href="index.php?page=GPUlist">GPU-list</a></li>
                <li><a href="index.php?page=PSUlist">PSU-list</a></li>
                <li><a href="index.php?page=MBlist">Motherboard-list</a></li>
                <li><a href="index.php?page=RAM_list">RAM-list</a></li>
                <li><a href="index.php?page=storagelist">Storage-list</a></li>
            <?php } ?>
            <?php if ($isAdmin) { ?>
                <li><a href="php/logout.php">Logout</a></li>
            <?php } else if ($isUser) { ?>
                <li><a href="index.php?page=ordernewpc">Order PC</a></li>
                <li><a href="index.php?page=orderbasket">Basket</a></li>
                <li><a href="index.php?page=orderhistory">Order history</a></li>
                <li><a href="php/logout.php">Logout</a></li>
            <?php } else{?>
            <li><a href="index.php?page=login">Login</a></li>
            <?php } ?>
        </ul>
    </nav>
</header>
