<?php
session_start();
unset($_SESSION['cart']);
header("Location: cart.php?khalti=1");
?>