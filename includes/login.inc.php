<?php
if (isset($_GET['error'])) {
    if ($_GET['error'] == 'wronglogin') { ?>
<div class="alert">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    Error! Please try again.
</div>
<?php
    }
}
?>
<div class="container1">
<div class="containerlogin">
    <h2>Login</h2>
    <form action="php/login.php" method="POST">
        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" name="email" required>
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" name="password" required>
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="loginuser">Login</button>
        </div>
<a href="index.php?page=register">Don't have an account? Sign up here!</a>
    </form>
</div>
</div>
<?php