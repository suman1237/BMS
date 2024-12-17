<?php
session_start();
include 'Class/Cart.php';
require_once('config.php');
$cart = new Cart();
$id = $_GET['id'];
$cart->addToCart($id);
