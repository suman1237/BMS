<?php

class Cart
{
    public function addToCart($id)
    {
        if (empty($_SESSION['cart'])) {
            $_SESSION['cart'][] = $id;
        } else {
            if (!in_array($id, $_SESSION['cart'])) {
                $_SESSION['cart'][] = $id;
            }
        }
        echo json_encode($_SESSION['cart']);
    }
    public function clearCart()
    {
        $i = $_GET['val_i'];
        session_start();
        unset($_SESSION['cart'][$i]);
        $_SESSION['cart'] = array_values($_SESSION['cart']);
        header("Location: cart.php?remove_success=1");
    }

}
?>