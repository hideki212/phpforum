<?php
function loginform()
{
    echo '<form action="/validatelogin.php" method="post">
        <p>Username:</p><input type="text" name="username" id="username">
        <p>Password:</p><input type="text" name="password" id="password">
        <input type="submit" value="Login">
        <button type="button" onclick="location.href=\"/register.html">Register</button>
        </form>';
}
function welcomemessage()
{
    echo nl2br("Welcome " . $_SESSION['username'] . "!\nLooking Good Today</p>");
}
function logout()
{
    echo '<form action="/logout.php" method="GET">
        <input type="submit" value="logout"></form>';
}
?>