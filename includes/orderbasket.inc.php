<?php
// Retrieve U_ID and NP_ID from the URL using $_GET
$U_ID = isset($_GET['U_ID']) ? $_GET['U_ID'] : '';
$NP_ID = isset($_GET['NP_ID']) ? $_GET['NP_ID'] : '';
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Order Pc from Basket</title>
    </head>
    <body>
    <h1>Order New PC</h1>
    <div class="form-container">
        <form action="php/ordernewpc.php" method="POST">
            <input type="hidden" name="U_ID" value="<?= $U_ID ?>">
            <input type="hidden" name="NP_ID" value="<?= $NP_ID ?>">
            <input type="submit" value="Order PC">
        </form>
    </div>
    </body>
    </html>
<?php
