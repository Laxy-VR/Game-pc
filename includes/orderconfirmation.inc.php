<?php
require_once 'db/connection.php';

$np_id = $_GET['np_id'];
$id = $_SESSION['userid'];

$queryUserAddress = "SELECT * FROM Users WHERE U_Id = :id";
$stmtUserAddress = $conn->prepare($queryUserAddress);
$stmtUserAddress->bindParam(':id', $id);

$queryNewPC = "SELECT * FROM newpc WHERE NP_ID = :np_id"; // Add this query to select from the "newpc" table
$stmtNewPC = $conn->prepare($queryNewPC); // Prepare the statement

if ($stmtUserAddress->execute()) {
    $result = $stmtUserAddress->fetch();

    if ($result) {
        $streetname = $result['streetname'];
        $housenr = $result['housenumber'];
        $city = $result['city'];
        $postalCode = $result['zipcode'];
    }

    // Now, execute the query for the "newpc" table
    $stmtNewPC->bindParam(':np_id', $np_id);
    if ($stmtNewPC->execute()) {
        $newPCResult = $stmtNewPC->fetch();
        if ($newPCResult) {
            $price = $newPCResult['NP_price'];
        }
    }
}
?>

            <h3>Order confirmation:</h3>
            <div class="form-container">
                <div class="total-amount">
                    <p>Total: €<?php echo number_format($price, 2); ?></p>
                </div>
                <form action="php/orderconfirmation.php" method="POST">

                    <h4>Delivery Method:</h4>
                    <div class="custom-radio-group">
                        <div class="custom-radio-label">
                            <input type="radio" name="delivery_method" value="home_delivery" id="home_delivery">
                            <label for="home_delivery">Deliver to Home Address
                                <br>
                                <br>
                                <p></p>
                                <p>Street Name: <?php echo $streetname; ?></p>
                                <p>House Number: <?php echo $housenr; ?></p>
                                <p>City: <?php echo $city; ?></p>
                                <p>Postal Code: <?php echo $postalCode; ?></p>
                            </label>
                        </div>
                        <div class="custom-radio-label">
                            <input type="radio" name="delivery_method" value="pick_up_point" id="pick_up_point">
                            <label for="pick_up_point">Pick Up Point</label>
                        </div>
                    </div>
                    <div class="custom-terms-acceptance">
                        <input type="checkbox" name="terms_accept" value="Y" id="terms_accept">
                        <label for="terms_accept">I accept the general terms and conditions</label>
                    </div>


                    <input type="hidden" name="U_ID" value="<?= $id ?>">
                    <input type="hidden" name="Id" value="<?= $np_id ?>">
                    <input type="submit" value="Order PC">
                </form>
            </div>
