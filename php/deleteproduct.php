<?php
require_once '../db/connection.php';
session_start();
$id = $_GET["id"];
$productcategory = $_GET["category"];
$no = 'No';
//echo "<pre>", print_r($_GET), "</pre>";
if (isset($productcategory)) {
    if ($productcategory == 'case') {
        $sql = 'UPDATE pc_case SET CS_active = :false WHERE CS_ID = :id';
        $sth = $conn->prepare($sql);
        $sth->bindParam(':id', $id);
        $sth->bindParam(':false', $no);
        $sth->execute();
        header('Location: ../?page=caseslist');
    }

    if ($productcategory == 'gpu') {
        $sql = 'UPDATE gpu SET G_active = :false WHERE G_ID = :id';
        $sth = $conn->prepare($sql);
        $sth->bindParam(':id', $id);
        $sth->bindParam(':false', $no);
        $sth->execute();
        header('Location: ../?page=GPUlist');
    }

    if ($productcategory == 'cpu') {
        $sql = 'UPDATE cpu SET C_active = :false WHERE C_ID = :id';
        $sth = $conn->prepare($sql);
        $sth->bindParam(':id', $id);
        $sth->bindParam(':false', $no);
        $sth->execute();
        header('Location: ../?page=CPUlist');
    }

    if ($productcategory == 'cpu_cooler') {
        $sql = 'UPDATE cpu_cooler SET CC_active = :false WHERE CC_ID = :id';
        $sth = $conn->prepare($sql);
        $sth->bindParam(':id', $id);
        $sth->bindParam(':false', $no);
        $sth->execute();
        header('Location: ../?page=CClist');
    }

    if ($productcategory == 'motherboard') {
        $sql = 'UPDATE motherboard SET MB_active = :false WHERE MB_ID = :id';
        $sth = $conn->prepare($sql);
        $sth->bindParam(':id', $id);
        $sth->bindParam(':false', $no);
        $sth->execute();
        header('Location: ../?page=MBlist');
    }

    if ($productcategory == 'psu') {
        $sql = 'UPDATE psu SET P_active = :false WHERE P_ID = :id';
        $sth = $conn->prepare($sql);
        $sth->bindParam(':id', $id);
        $sth->bindParam(':false', $no);
        $sth->execute();
        header('Location: ../?page=PSUlist');
    }

    if ($productcategory == 'ram') {
        $sql = 'UPDATE ram SET R_active = :false WHERE R_ID = :id';
        $sth = $conn->prepare($sql);
        $sth->bindParam(':id', $id);
        $sth->bindParam(':false', $no);
        $sth->execute();
        header('Location: ../?page=RAM_list');
    }

    if ($productcategory == 'storage') {
        $sql = 'UPDATE storage SET S_active = :false WHERE S_ID = :id';
        $sth = $conn->prepare($sql);
        $sth->bindParam(':id', $id);
        $sth->bindParam(':false', $no);
        $sth->execute();
        header('Location: ../?page=Storagelist');
    }
} else {
    echo 'Error, kies in de navbar waar u heen wilt';
}
