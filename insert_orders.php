<?php
require_once ('config.php');
session_start();
if (isset($_SESSION['cart']) && $_SESSION['cart'] !== null) {
    if (isset($_SESSION['user_users_id']) && $_SESSION['user_users_username'] !== null) {

        $username = $_SESSION['user_users_username'];
        $users_id = $_SESSION['user_users_id'];

        $_SESSION['hidden_product_id'] = $_POST['hidden_product_id'];
        $_SESSION['hidden_product_name'] = $_POST['hidden_product_name'];
        $_SESSION['hidden_product_price'] = $_POST['hidden_product_price'];
        $_SESSION['ordered_quantity'] = $_POST['ordered_quantity'];
        $_SESSION['hidden_product_total'] = $_POST['hidden_product_total'];
        $_SESSION['hidden_total_amount'] = $_POST['hidden_total_amount'];
        $_SESSION['delivery_date'] = $_POST['delivery_date'];
        $_SESSION['delivery_address'] = $_POST['delivery_address'];
        $_SESSION['payment_method'] = $_POST['payment_method'];


        $product_ids = $_POST['hidden_product_id'];
        $product_names = $_POST['hidden_product_name'];
        $prices = $_POST['hidden_product_price'];
        $quantities = $_POST['ordered_quantity'];
        $total_p = $_POST['hidden_product_total'];
        $total_amount = $_POST['hidden_total_amount'];
        $delivery_date = $_POST['delivery_date'];
        $delivery_address = $_POST['delivery_address'];
        $payment_method = $_POST['payment_method'];

        $all_quantities_available = true;

        // Check stock availability
        for ($i = 0; $i < count($product_ids); $i++) {
            $product_id = $product_ids[$i];
            $ordered_quantity = $quantities[$i];
            $query = "SELECT product_quantity FROM bakery_product WHERE product_id = '$product_id'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);

            if ($row['product_quantity'] < $ordered_quantity) {
                $all_quantities_available = false;
                break;
            }
        }

        if ($all_quantities_available) {

            if ($payment_method == "Khalti") {

                $email = $_SESSION['user_users_email'];

                // Check if the total parameter is set in the URL
                if (isset($_POST['hidden_total_amount'])) {

                    $total_ = round(($total_amount/1.1),2);
                    $total = intval($total_ * 100);


                    echo "Total: $total";
                    echo "<br>";

                    // $a=63636;
                } else {
                    echo "Total not provided in the URL.";
                }

                // Ensure $total is defined and within the expected range
                if (isset($total)) {
                    $curl = curl_init();
                    curl_setopt_array(
                        $curl,
                        array(
                            CURLOPT_URL => 'https://a.khalti.com/api/v2/epayment/initiate/',
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => '',
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 0,
                            CURLOPT_FOLLOWLOCATION => true,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => 'POST',
                            CURLOPT_POSTFIELDS => json_encode(
                                array(
                                    "return_url" => "http://localhost/BMS/payment_response.php",
                                    "website_url" => "https://index.php",
                                    "amount" => $total, // pass $total directly as an integer
                                    "purchase_order_id" => "Order",
                                    "purchase_order_name" => "Darpan Bakery",
                                    "customer_info" => array(
                                        "name" => $username,
                                        "email" => $email,
                                        "phone" => "9800000001"
                                    )
                                )
                            ),
                            CURLOPT_HTTPHEADER => array(
                                'Authorization: key live_secret_key_68791341fdd94846a146f0457ff7b455',
                                'Content-Type: application/json',
                            ),
                        )
                    );

                    $response = curl_exec($curl);

                    curl_close($curl);
                    // echo $response;


                    echo "<pre>";
                    print_r($response);
                    echo "</pre>";

                    // Decode the JSON response
                    $responseData = json_decode($response, true);

                    // Check if payment_url exists in the response
                    if (isset($responseData['payment_url'])) {
                        // Redirect the user to the payment URL
                        header("Location: " . $responseData['payment_url']);
                        exit; // Make sure to exit to prevent further execution
                    } else {
                        echo "Error: Payment URL not found in the response.";
                    }
                } 
                else {
                    echo "Error: Invalid or missing total amount.";
                }
            } else {
                $insert_orders = "INSERT INTO bakery_orders (users_id, delivery_date, delivery_address, payment_method, total_amount) 
                              VALUES ('$users_id', '$delivery_date', '$delivery_address', '$payment_method', '$total_amount')";
                mysqli_query($conn, $insert_orders);
                $orders_id = mysqli_insert_id($conn);

                for ($i = 0; $i < count($product_ids); $i++) {
                    $product_id = $product_ids[$i];
                    $product_name = $product_names[$i];
                    $ordered_quantity = $quantities[$i];

                    // Insert order details
                    $insert_orders_detail = "INSERT INTO bakery_orders_detail (orders_id, product_name, ordered_quantity) 
                                         VALUES ('$orders_id', '$product_name', '$ordered_quantity')";
                    mysqli_query($conn, $insert_orders_detail);

                    // Update product quantity
                    $update_quantity = "UPDATE bakery_product 
                                    SET product_quantity = product_quantity - $ordered_quantity 
                                    WHERE product_id = '$product_id'";
                    mysqli_query($conn, $update_quantity);
                }

                unset($_SESSION['cart']);

                unset($_SESSION['hidden_product_id']);
                unset($_SESSION['hidden_product_name']);
                unset($_SESSION['hidden_product_price']);
                unset($_SESSION['ordered_quantity']);
                unset($_SESSION['hidden_product_total']);
                unset($_SESSION['hidden_total_amount']);
                unset($_SESSION['delivery_date']);
                unset($_SESSION['delivery_address']);
                unset($_SESSION['payment_method']);

                if ($payment_method == "Cash on Delivery") {
                    header("Location: cart.php?order_success=1");
                } else {
                    header("Location: cart.php?order_success=2");
                }
            }


        } else {
            echo "<script>
                  alert('Ordered quantity is more than the stock for the product!');
                  location.assign('cart.php');
                  </script>";
        }
    } else {
        echo "<script>
        alert('Please login!!!');
        location.assign('login_users.php');
        </script>";
    }
} else {
    echo "<script>
    alert('Please select a product!!!');
    location.assign('cart.php');
    </script>";
}
?>