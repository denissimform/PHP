<?php
session_start();

// $_SESSION['name'] = 'Denis';
// setcookie("name", "Denis", time() + 6000);
// if (isset($_COOKIE['name'])) {
//     echo "Cookie set name: " . $_COOKIE['name'];
// } else {
//     echo "Cookie name is not set!";
// }
echo $_SESSION['name'];
echo "Cookie set name: " . $_COOKIE['name'];
