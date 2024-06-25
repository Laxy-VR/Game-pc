<?php
$id = $_GET['np_id'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Payment Options</title>
    <link rel="stylesheet" type="text/css" href="payment.css">
</head>
<body>
<h1>Choose a Payment Option</h1>
<form action="php/orderpayment.php" method="post">
    <input type="hidden" name="id" id="ideal" value="<?php echo $id ?>" checked>
    <div class="payment-option">
        <div class="payment-option-inner">
            <input type="radio" name="payment_method" id="ideal" value="ideal" checked>
            <label for="ideal">iDEAL</label>
        </div>
        <div class="ideal-options">
            <label for="dutch_bank">Select Dutch Bank:</label>
            <select name="dutch_bank" id="dutch_bank">
                <option value="abn_amro">ABN AMRO</option>
                <option value="rabobank">Rabobank</option>
                <option value="ing">ING</option>
                <!-- Add more Dutch banks as needed -->
            </select>
        </div>
    </div>

    <div class="payment-option">
        <div class="payment-option-inner">
            <input type="radio" name="payment_method" id="paypal" value="paypal">
            <label for="paypal">PayPal</label>
        </div>
    </div>

    <input type="submit" value="Proceed">
</form>
</body>
</html>
<script>
    // JavaScript to show/hide the Dutch bank selection when iDEAL is chosen
    const paymentOptions = document.querySelectorAll('.payment-option');
    const dutchBankOptions = document.querySelector('.ideal-options');

    paymentOptions.forEach(function(option) {
        option.addEventListener('change', function() {
            if (option.querySelector('input').checked && option.querySelector('input').value === 'ideal') {
                dutchBankOptions.style.display = 'block';
            } else {
                dutchBankOptions.style.display = 'none';
            }
        });
    });
</script>