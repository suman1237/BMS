<?php
if (isset($_GET['remove_success']) && $_GET['remove_success'] == 1) {
    echo "<script>alert('Product removed!')</script>";
    echo "<script>window.location.assign('cart.php')</script>";
}
if (isset($_GET['order_success']) && $_GET['order_success'] == 1) {
    echo "<script>alert('Order successfully placed through Cash On Delivery!')</script>";
    echo "<script>window.location.assign('cart.php')</script>";
}
if (isset($_GET['order_success']) && $_GET['order_success'] == 2) {
    echo "<script>alert('Order successfully placed through Online Card Payment!')</script>";
    echo "<script>window.location.assign('cart.php')</script>";
}
if (isset($_GET['order_success']) && $_GET['order_success'] == 3) {
    echo "<script>alert('Order successfully placed through Khalti!')</script>";
    echo "<script>window.location.assign('cart.php')</script>";
}
if (isset($_GET['order_cancel']) && $_GET['order_cancel'] == 1) {
    echo "<script>alert('Khalti payment is expired!')</script>";
    echo "<script>window.location.assign('cart.php')</script>";
}
if (isset($_GET['order_cancel']) && $_GET['order_cancel'] == 2) {
    echo "<script>alert('Khalti payment is cancelled!')</script>";
    echo "<script>window.location.assign('cart.php')</script>";
}

session_start();
if (!empty($_SESSION['cart'])) {
    $printCount = count($_SESSION['cart']);
} else {
    $printCount = 0;
}
if (!empty($_SESSION['user_users_id']) && !empty($_SESSION['user_users_username'])) {
    $printUsername = $_SESSION['user_users_username'];
} else {
    $printUsername = "None";
}

global $total_amount;
global $delivery;
?>
<!doctype html>
<html lang="en">

<head> <?php require ('_header.php') ?> </head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <?php require ('_navbar.php') ?>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <!-- <div class="dashboard-wrapper"> -->
        <div class="container-fluid dashboard-content">

            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Cart</h2>
                        <p class="pageheader-text"></p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Your cart</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mx-5">

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <form id="cart" method="post" action="insert_orders.php">
                                        <!-- <form method="post" action="payment_khalti.php"> -->
                                        <tbody>
                                            <?php
                                            if ($printCount == 0) {
                                                ?>
                                                <tr>
                                                    <td colspan="6" align="center">Your cart is empty!</td>
                                                </tr>
                                            <?php } else { ?>
                                                <?php
                                                $total_amount = 0;
                                                require_once ('config.php');
                                                for ($i = 0; $i < count($_SESSION['cart']); $i++) {
                                                    // $select = "SELECT * FROM bakery_product where product_id = 15";
                                                    $select = "SELECT * FROM bakery_product where product_id = {$_SESSION['cart'][$i]}";
                                                    $query = mysqli_query($conn, $select);
                                                    $j = $i;
                                                    while ($res = mysqli_fetch_assoc($query)) {
                                                        $total_amount = $total_amount + $res['product_price'];
                                                        ?>
                                                        <tr>
                                                            <td><?php echo ++$j; ?></td>

                                                            <input type="hidden" name="hidden_product_id[]"
                                                                value="<?php echo $res['product_id']; ?>">

                                                            <td><?php echo $res['product_name']; ?>
                                                                <input type="hidden" name="hidden_product_name[]"
                                                                    value="<?php echo $res['product_name']; ?>">
                                                            </td>

                                                            <td>Rs. <?php echo $res['product_price'] * 1; ?><input type="hidden"
                                                                    name="hidden_product_price[]"
                                                                    value="<?php echo $res['product_price']; ?>"></td>

                                                            <td><input class="form-control" type="number" min="1" max="30" step="1"
                                                                    value="1" name="ordered_quantity[]" onchange="prodTotal(this)">
                                                            </td>
                                                            <td><span>Rs. <?php echo $res['product_price'] * 1; ?></span><input
                                                                    type="hidden" name="hidden_product_total[]"
                                                                    value="<?php echo $res['product_price']; ?>"></td>
                                                            <td align="center"><a
                                                                    href="remove_product.php?val_i=<?php echo $i; ?>"><i
                                                                        class="fas fa-trash-alt"></i></a>
                                                            </td>
                                                        </tr>
                                                    <?php  } ?>
                                                <?php }  ?>
                                            <?php } ?>
                                            <!-- <tr>
                                                <td colspan="4" align="right">Delivery Charge:</td>
                                                <td colspan="2"><span>Rs. 50
                                                </td>
                                            </tr> -->
                                            <tr>
                                                <td colspan="4" align="right">Total Amount:</td>
                                                <td colspan="2" id="total_amount"><span>Rs.
                                                        <?php if ($printCount == 0) {
                                                            echo 0;
                                                        } else {
                                                            // $total_amount = $total_amount + $delivery;
                                                            echo $total_amount;
                                                        } ?></span><input type="hidden" id="total_amount_"
                                                        name="hidden_total_amount" value="<?php echo $total_amount; ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="0">
                                                    Delivery Date:
                                                    <input class="form-control rounded" type="date" name="delivery_date"
                                                        id="date" required=""><br>
                                                </td>
                                                <td colspan="0">
                                                    Delivery Address:
                                                    <input class="form-control rounded" type="address"
                                                        name="delivery_address"
                                                        placeholder="Tole-wardNumber, Municipality" required=""
                                                        id="delivery_address">
                                                    <span id="error-message" style="color: red; display: none;">Invalid
                                                        Address format! Please use:- <br> WardName-wardNumber,
                                                        Municipality</span>
                                                    <br>
                                                </td>
                                                <td colspan="4">
                                                    Payment Method:
                                                    <div class="mt-2">
                                                        <label>
                                                            <input type="radio" name="payment_method"
                                                                value="Cash on Delivery" id="cod" checked>
                                                            Cash on Delivery
                                                        </label>
                                                        <br>
                                                        <label>
                                                            <input type="radio" name="payment_method" value="Khalti"
                                                                id="khalti">
                                                            Khalti
                                                        </label>
                                                        <br>
                                                        <label>
                                                            <input type="radio" name="payment_method"
                                                                value="Online Card" id="online">
                                                            Online Card
                                                        </label>
                                                    </div>

                                                    <div id="onlinePaymentFields" style="display: none;">
                                                        <div class="card-pay rounded mt-1" style="width: 500px;">
                                                            <div class="card-body">
                                                                <h3>Online Card Details</h3>
                                                                <div class="form-group-au-pay">
                                                                    <label for="cardNumber">Card Holder Name:</label>
                                                                    <input class="form-control-pay" type="text"
                                                                        id="cardHolderName" name="cardHolderName"
                                                                        placeholder="Enter cardholder name">
                                                                </div>
                                                                <div class="form-group-au-pay">
                                                                    <label for="cardNumber">Card Number:</label>
                                                                    <input class="form-control-pay" type="text"
                                                                        id="cardNumber" name="cardNumber" maxlength="19"
                                                                        placeholder="XXXX XXXX XXXX XXXX">
                                                                </div>
                                                                <div class="form-group-au-pay">
                                                                    <label for="expiryDate">Expiry Date:</label>
                                                                    <input class="form-control-pay" type="month"
                                                                        id="expiryDate" name="expiryDate">
                                                                </div>
                                                                <div class="form-group-au-pay">
                                                                    <label for="cvv">CVV:</label>
                                                                    <input class="form-control-pay" type="password"
                                                                        id="cvv" name="cvv" maxlength="3"
                                                                        oninput="validateNumericInput()"
                                                                        placeholder="XXX">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="6" align="right">
                                                    <button class="btn btn-danger rounded"
                                                        onclick="clear_cart()">Clear</button>
                                                    <button class="btn btn-dark rounded" type="submit"
                                                        onclick="check()">Check Out</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </form>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->


    <div class="footer-cart">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    Copyright © 2024. All rights reserved.</a>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="text-md-right footer-links d-none d-sm-block">
                        <a href="https://www.facebook.com/DarpanBakery" target="_blank">Support Us</a>
                        <a href="about.php">About</a>
                        <a href="contact.php">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>

<!-- Optional JavaScript -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.bundle.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/main-js.js"></script>
<script type="text/javascript" src="js/owl.carousel.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function add_cart(product_id) {
        $.ajax({
            url: 'fetch_cart.php',
            data: 'id=' + product_id,
            method: 'get',
            dataType: 'json',
            success: function (cart) {
                console.log(cart);
                $('.badge').html(cart.length);
            }
        });
    }
    function prodTotal(quantity) {
        var price = $(quantity).parent().prev().find('input').val();
        var total = quantity.value * price;
        $(quantity).parent().next().find('input').val(total);
        $(quantity).parent().next().find('span').html("Rs. " + total);
        var total_amount = 0;
        $('input[name="hidden_product_total[]"]').each(function () {
            total_amount += parseInt($(this).val());
        });
        $('#total_amount').find('span').html("Rs. " + total_amount);
        $('#total_amount').find('input').val(total_amount);
    }
    function clear_cart() {
        var flag = confirm("Do you want to clear cart?");
        if (flag) {
            window.location.href = "clear_cart.php";
        }
    }

    document.addEventListener("DOMContentLoaded", function () {
        const form = document.getElementById('cart');
        const addressInput = document.getElementById('delivery_address');
        const errorMessage = document.getElementById('error-message');

        form.addEventListener('submit', function (event) {
            const addressValue = addressInput.value;
            const pattern = /^[A-Za-z\s]+-\d+,\s[A-Za-z\s]+$/;

            if (!pattern.test(addressValue)) {
                errorMessage.style.display = 'inline';
                event.preventDefault();
            } else {
                errorMessage.style.display = 'none';
            }
        });
    });

    document.addEventListener("DOMContentLoaded", function () {
        const form = document.getElementById('cart');
        const total_amount_ = document.getElementById('total_amount_');

        form.addEventListener('submit', function (event) {
            const totalValue = total_amount_.value;
            if (totalValue < 100) {
                alert("The total amount must be at least Rs 100.");
                event.preventDefault();
            }
        });
    });

    function check() {

        var res = confirm('Are you sure?\nThere is no refund policy!');
        if (res == false) {
            event.preventDefault();
            alert('Order cancelled.')
        }

    }

    // Function to handle payment method selection
    function handlePaymentSelection() {
        const onlinePaymentFields = document.getElementById('onlinePaymentFields');
        const onlinePaymentRadio = document.getElementById('online');
        const codRadio = document.getElementById('cod');
        const khaltiRadio = document.getElementById('khalti');

        const cardHolderName = document.getElementById('cardHolderName');
        const cardNumber = document.getElementById('cardNumber');
        const expiryDate = document.getElementById('expiryDate');
        const cvv = document.getElementById('cvv');

        // Show or hide online payment fields based on the selected payment method
        if (onlinePaymentRadio.checked) {
            onlinePaymentFields.style.display = 'block';
            cardHolderName.setAttribute('required', '');
            cardNumber.setAttribute('required', '');
            expiryDate.setAttribute('required', '');
            cvv.setAttribute('required', '');
        }
        if (khaltiRadio.checked) {
            onlinePaymentFields.style.display = 'none';
            cardHolderName.removeAttribute('required');
            cardNumber.removeAttribute('required');
            expiryDate.removeAttribute('required');
            cvv.removeAttribute('required');
        }
        if (codRadio.checked) {
            onlinePaymentFields.style.display = 'none';
            cardHolderName.removeAttribute('required');
            cardNumber.removeAttribute('required');
            expiryDate.removeAttribute('required');
            cvv.removeAttribute('required');
        }
    }

    // Add event listeners to handle payment method selection when the page loads
    window.onload = function () {
        const codRadio = document.getElementById('cod');
        const khaltiRadio = document.getElementById('khalti');
        const onlineRadio = document.getElementById('online');
        codRadio.addEventListener('change', handlePaymentSelection);
        khaltiRadio.addEventListener('change', handlePaymentSelection);
        onlineRadio.addEventListener('change', handlePaymentSelection);
        // Initialize visibility based on the default selected radio button
        handlePaymentSelection();
    };


    document.addEventListener('DOMContentLoaded', function () {
        var dateInput = document.getElementById('date');
        var today = new Date().toISOString().split('T')[0];
        dateInput.setAttribute('min', today);
    });

    // Disable current and previous months
    var currentDate = new Date();
    var nextMonth = currentDate.getMonth() + 2; // JavaScript months are 0-11
    var year = currentDate.getFullYear();
    if (nextMonth > 11) {
        nextMonth = 0;
        year += 1;
    }
    var formattedDate = new Date(year, nextMonth, 1).toISOString().slice(0, 7);
    // Set the min attribute of the input to the first day of the next month
    document.getElementById("expiryDate").setAttribute("min", formattedDate);


    document.addEventListener('DOMContentLoaded', function () {
        const cardHolderNameField = document.getElementById('cardHolderName');

        cardHolderNameField.addEventListener('keydown', function (e) {
            // Allow control keys: backspace, delete, tab, escape, enter, arrow keys, etc.
            const controlKeys = [
                'Backspace', 'Delete', 'Tab', 'Escape', 'Enter',
                'ArrowLeft', 'ArrowRight', 'ArrowUp', 'ArrowDown',
                'Home', 'End', 'Shift', 'Control', 'Alt'
            ];

            if (controlKeys.includes(e.key) ||
                (e.key === 'a' && e.ctrlKey === true) || // Allow Ctrl+A
                (e.key === 'c' && e.ctrlKey === true) || // Allow Ctrl+C
                (e.key === 'v' && e.ctrlKey === true) || // Allow Ctrl+V
                (e.key === 'x' && e.ctrlKey === true) // Allow Ctrl+X
            ) {
                return;
            }

            // Allow only alphabets and spaces
            if (!/^[a-zA-Z\s]$/.test(e.key)) {
                e.preventDefault();
            }
        });
    });



    document.querySelectorAll('input[type="number"]').forEach(function (input) {
        input.addEventListener('keydown', function (e) {
            // Prevent minus sign from being entered
            if (e.key === '-' || e.key === 'Subtract') {
                e.preventDefault();
            }
        });
    });
    document.querySelectorAll('input[type="password"]').forEach(function (input) {
        input.addEventListener('keydown', function (e) {
            // Prevent minus sign from being entered
            if (e.key === '-' || e.key === 'Subtract') {
                e.preventDefault();
            }
        });
    });


    // document.querySelectorAll('input[type="number"]').forEach(function (input) {
    //     input.addEventListener('input', function () {
    //         if (this.value.length > 16) {
    //             this.value = this.value.slice(0, 16);
    //         }
    //     });
    // });

    document.getElementById('cvv').addEventListener('input', function (event) {
        // Use a regular expression to remove non-numeric characters
        this.value = this.value.replace(/\D/g, '');
    });


    document.addEventListener('DOMContentLoaded', function () {
        const inputField = document.getElementById('cardNumber');

        inputField.addEventListener('input', function (event) {
            let value = event.target.value.replace(/\D/g, ''); // Remove all non-digit characters
            let formattedValue = '';

            for (let i = 0; i < value.length; i++) {
                if (i > 0 && i % 4 === 0) {
                    formattedValue += ' ';
                }
                formattedValue += value[i];
            }

            // Preserve the cursor position
            const cursorPosition = event.target.selectionStart;
            const numSpacesBeforeCursor = (event.target.value.slice(0, cursorPosition).match(/ /g) || []).length;
            event.target.value = formattedValue;
            const numSpacesAfterCursor = (formattedValue.slice(0, cursorPosition).match(/ /g) || []).length;
            const newCursorPosition = cursorPosition + (numSpacesAfterCursor - numSpacesBeforeCursor);
            event.target.setSelectionRange(newCursorPosition, newCursorPosition);
        });

        inputField.addEventListener('keydown', function (event) {
            const key = event.key;
            if (!/[0-9]/.test(key) && key !== 'Backspace' && key !== 'Delete' && key !== 'ArrowLeft' && key !== 'ArrowRight' && key !== 'Tab') {
                event.preventDefault();
            }
        });
    });





</script>