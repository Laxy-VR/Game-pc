<?php
require_once('db/connection.php');

// Check if the user is logged in and the user's ID is set in the session
if (isset($_SESSION['userid'])) {
    // Retrieve the user's U_ID from the session
    $userId = $_SESSION['userid'];

    // Prepare the SQL query to retrieve all the necessary component information
    $query = "SELECT cpu.C_img AS C_img, cpu.C_name AS C_name, cpu.C_price AS C_price, 
                     cpu_cooler.CC_img AS CC_img, cpu_cooler.CC_name AS CC_name, cpu_cooler.CC_price AS CC_price, 
                     gpu.G_img AS G_img, gpu.G_name AS G_name, gpu.G_price AS G_price, 
                     motherboard.MB_img AS MB_img, motherboard.MB_name AS MB_name, motherboard.MB_price AS MB_price,
                     pc_case.CS_img AS CS_img, pc_case.CS_name AS CS_name, pc_case.CS_price AS CS_price,
                     psu.P_img AS P_img, psu.P_name AS P_name, psu.P_price AS P_price,
                     ram.R_img AS R_img, ram.R_name AS R_name, ram.R_price AS R_price,
                     storage.S_img AS S_img, storage.S_name AS S_name, storage.S_price AS S_price, SUM(C_price + CC_price + G_price + MB_price + CS_price + S_price + R_price + P_price) AS TOTAL, np.NP_ID AS pc_id
                     
              FROM newpc np
              LEFT JOIN cpu ON np.C_ID = cpu.C_ID
              LEFT JOIN cpu_cooler ON np.CC_ID = cpu_cooler.CC_ID
              LEFT JOIN gpu ON np.G_ID = gpu.G_ID
              LEFT JOIN motherboard ON np.MB_ID = motherboard.MB_ID
              LEFT JOIN pc_case ON np.CS_ID = pc_case.CS_ID
              LEFT JOIN psu ON np.P_ID = psu.P_ID
              LEFT JOIN ram ON np.R_ID = ram.R_ID
              LEFT JOIN storage ON np.S_ID = storage.S_ID
              WHERE np.U_ID = :userId";

    $stmt = $conn->prepare($query);
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->execute();

    // Check if any rows were returned
    if ($stmt->rowCount() > 0) {
        // Loop through the results if multiple rows could be returned
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Display the retrieved information in the HTML table
            echo '<div class="center-table">
                <table class="vertical-pc-table">
                    <tr>
                        <th>Select</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                    </tr>
                    <tr>
                        <td>
                            <form action="index.php?page=User_CPU" method="POST">
                                <input type="hidden" name="part" value="CPU">
                                <button type="submit" name="select">Select CPU</button>
                            </form>
                        </td>
                        <td><img class="image" src="' . $row['C_img'] . '" alt="CPU Image"></td>
                        <td>' . $row['C_name'] . '</td>
                        <td>$' . $row['C_price'] . '</td>
                    </tr>
                    <tr>
                        <td>
                            <form action="index.php?page=User_GPU" method="POST">
                                <input type="hidden" name="part" value="GPU">
                                <button type="submit" name="select">Select GPU</button>
                            </form>
                        </td>
                        <td><img class="image" src="' . $row['G_img'] . '" alt="GPU Image"></td>
                        <td>' . $row['G_name'] . '</td>
                        <td>$' . $row['G_price'] . '</td>
                    </tr>
                    <tr>
                        <td>
                            <form action="index.php?page=User_CC" method="POST">
                                <input type="hidden" name="part" value="CC">
                                <button type="submit" name="select">Select CPU Cooler</button>
                            </form>
                        </td>
                        <td><img class="image" src="' . $row['CC_img'] . '" alt="CPU Cooler Image"></td>
                        <td>' . $row['CC_name'] . '</td>
                        <td>$' . $row['CC_price'] . '</td>
                    </tr>
                    <tr>
                        <td>
                            <form action="index.php?page=User_MB" method="POST">
                                <input type="hidden" name="part" value="MB">
                                <button type="submit" name="select">Select Motherboard</button>
                            </form>
                        </td>
                        <td><img class="image" src="' . $row['MB_img'] . '" alt="Motherboard Image"></td>
                        <td>' . $row['MB_name'] . '</td>
                        <td>$' . $row['MB_price'] . '</td>
                    </tr>
                    <tr>
                        <td>
                            <form action="index.php?page=User_CS" method="POST">
                                <input type="hidden" name="part" value="CS">
                                <button type="submit" name="select">Select Case</button>
                            </form>
                        </td>
                        <td><img class="image" src="' . $row['CS_img'] . '" alt="Case Image"></td>
                        <td>' . $row['CS_name'] . '</td>
                        <td>$' . $row['CS_price'] . '</td>
                    </tr>
                    <tr>
                        <td>
                            <form action="index.php?page=User_PSU" method="POST">
                                <input type="hidden" name="part" value="PSU">
                                <button type="submit" name="select">Select PSU</button>
                            </form>
                        </td>
                        <td><img class="image" src="' . $row['P_img'] . '" alt="PSU Image"></td>
                        <td>' . $row['P_name'] . '</td>
                        <td>$' . $row['P_price'] . '</td>
                    </tr>
                    <tr>
                        <td>
                            <form action="index.php?page=User_RAM" method="POST">
                                <input type="hidden" name="part" value="RAM">
                                <button type="submit" name="select">Select RAM</button>
                            </form>
                        </td>
                        <td><img class="image" src="' . $row['R_img'] . '" alt="RAM Image"></td>
                        <td>' . $row['R_name'] . '</td>
                        <td>$' . $row['R_price'] . '</td>
                    </tr>
                    <tr>
                        <td>
                            <form action="index.php?page=User_Storage" method="POST">
                                <input type="hidden" name="part" value="Storage">
                                <button type="submit" name="select">Select Storage</button>
                            </form>
                        </td>
                        <td><img class="image" src="' . $row['S_img'] . '" alt="Storage Image"></td>
                        <td>' . $row['S_name'] . '</td>
                        <td>$' . $row['S_price'] . '</td>
                    </tr>
                </table>
                <h1>'. $row['TOTAL'].'</h1>
            </div>';
            ?>
            <button type="button" onclick="location.href=' ./index.php?page=orderconfirmation&np_id=<?= $row['pc_id']?>';">Finish</button>
    <?php
        }
    } else {
        echo "No data found in the database for the specified user.";
    }
} else {
    // If the user is not logged in or user_id is not set in the session
    echo "Please log in to view this information.";
}
?>

