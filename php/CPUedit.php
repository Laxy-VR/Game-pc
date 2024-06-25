<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        require_once '../db/connection.php';

        // Retrieve data from the form
        $C_ID = $_POST['C_ID']; // Get CPU ID
        $C_name = $_POST['C_name'];
        $C_price = $_POST['C_price'];
        $C_Manufacturer = $_POST['C_Manufacturer'];
        $C_PartNumber = $_POST['C_PartNumber'];
        $C_CoreCount = $_POST['C_CoreCount'];
        $C_PerformanceCoreClock = $_POST['C_PerformanceCoreClock'];
        $C_PerformanceBoostClock = $_POST['C_PerformanceBoostClock'];
        $C_TDP = $_POST['C_TDP'];
        $C_Series = $_POST['C_Series'];
        $C_Microarchitecture = $_POST['C_Microarchitecture'];
        $C_CoreFamily = $_POST['C_CoreFamily'];
        $C_Socket = $_POST['C_Socket'];
        $C_IntegratedGraphics = $_POST['C_IntegratedGraphics'];
        $C_MaxSupportedMemory = $_POST['C_MaxSupportedMemory'];
        $C_ECCSupport = $_POST['C_ECCSupport'];
        $C_IncludesCooler = $_POST['C_IncludesCooler'];
        $C_Packaging = $_POST['C_Packaging'];
        $C_PerformanceL1Cache = $_POST['C_PerformanceL1Cache'];
        $C_PerformanceL2Cache = $_POST['C_PerformanceL2Cache'];
        $C_L3Cache = $_POST['C_L3Cache'];
        $C_Lithography = $_POST['C_Lithography'];
        $C_IncludesCPUCooler = $_POST['C_IncludesCPUCooler'];
        $C_SimultaneousMultithreading = $_POST['C_SimultaneousMultithreading'];
        $C_img = $_POST['C_img'];
        $C_active = $_POST['C_active'];

        // Update data in the database
        $query = "UPDATE cpu SET C_name = :C_name, C_price = :C_price, C_Manufacturer = :C_Manufacturer, C_PartNumber = :C_PartNumber, C_CoreCount = :C_CoreCount, C_PerformanceCoreClock = :C_PerformanceCoreClock, C_PerformanceBoostClock = :C_PerformanceBoostClock, C_TDP = :C_TDP, C_Series = :C_Series, C_Microarchitecture = :C_Microarchitecture, C_CoreFamily = :C_CoreFamily, C_Socket = :C_Socket, C_IntegratedGraphics = :C_IntegratedGraphics, C_MaxSupportedMemory = :C_MaxSupportedMemory, C_ECCSupport = :C_ECCSupport, C_IncludesCooler = :C_IncludesCooler, C_Packaging = :C_Packaging, C_PerformanceL1Cache = :C_PerformanceL1Cache, C_PerformanceL2Cache = :C_PerformanceL2Cache, C_L3Cache = :C_L3Cache, C_Lithography = :C_Lithography, C_IncludesCPUCooler = :C_IncludesCPUCooler, C_SimultaneousMultithreading = :C_SimultaneousMultithreading, C_img = :C_img, C_active = :C_active WHERE C_ID = :C_ID";

        $statement = $conn->prepare($query);
        $statement->bindParam(':C_name', $C_name);
        $statement->bindParam(':C_price', $C_price);
        $statement->bindParam(':C_Manufacturer', $C_Manufacturer);
        $statement->bindParam(':C_PartNumber', $C_PartNumber);
        $statement->bindParam(':C_CoreCount', $C_CoreCount);
        $statement->bindParam(':C_PerformanceCoreClock', $C_PerformanceCoreClock);
        $statement->bindParam(':C_PerformanceBoostClock', $C_PerformanceBoostClock);
        $statement->bindParam(':C_TDP', $C_TDP);
        $statement->bindParam(':C_Series', $C_Series);
        $statement->bindParam(':C_Microarchitecture', $C_Microarchitecture);
        $statement->bindParam(':C_CoreFamily', $C_CoreFamily);
        $statement->bindParam(':C_Socket', $C_Socket);
        $statement->bindParam(':C_IntegratedGraphics', $C_IntegratedGraphics);
        $statement->bindParam(':C_MaxSupportedMemory', $C_MaxSupportedMemory);
        $statement->bindParam(':C_ECCSupport', $C_ECCSupport);
        $statement->bindParam(':C_IncludesCooler', $C_IncludesCooler);
        $statement->bindParam(':C_Packaging', $C_Packaging);
        $statement->bindParam(':C_PerformanceL1Cache', $C_PerformanceL1Cache);
        $statement->bindParam(':C_PerformanceL2Cache', $C_PerformanceL2Cache);
        $statement->bindParam(':C_L3Cache', $C_L3Cache);
        $statement->bindParam(':C_Lithography', $C_Lithography);
        $statement->bindParam(':C_IncludesCPUCooler', $C_IncludesCPUCooler);
        $statement->bindParam(':C_SimultaneousMultithreading', $C_SimultaneousMultithreading);
        $statement->bindParam(':C_img', $C_img);
        $statement->bindParam(':C_active', $C_active);
        $statement->bindParam(':C_ID', $C_ID); // Bind CPU ID

        $statement->execute();

        // Redirect to a success page or display a success message
        header("Location: ../index.php?page=CPUlist");
        exit();
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}
?>
