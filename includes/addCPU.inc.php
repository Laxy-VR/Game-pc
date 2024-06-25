<h1>Add New CPU</h1>
<div class="form-container">
    <form action="php/CPU_add.php" method="POST" enctype="multipart/form-data">
        <label for="C_name">Name:</label>
        <input type="text" id="C_name" name="C_name" required><br><br>

        <label for="C_price">Price:</label>
        <input type="number" id="C_price" name="C_price" step="0.01" required><br><br>

        <label for="C_Manufacturer">Manufacturer:</label>
        <input type="text" id="C_Manufacturer" name="C_Manufacturer"><br><br>

        <label for="C_PartNumber">Part Number:</label>
        <input type="text" id="C_PartNumber" name="C_PartNumber"><br><br>

        <label for="C_CoreCount">Core Count:</label>
        <input type="number" id="C_CoreCount" name="C_CoreCount" required><br><br>

        <label for="C_PerformanceCoreClock">Performance Core Clock:</label>
        <input type="text" id="C_PerformanceCoreClock" name="C_PerformanceCoreClock"><br><br>

        <label for="C_PerformanceBoostClock">Performance Boost Clock:</label>
        <input type="text" id="C_PerformanceBoostClock" name="C_PerformanceBoostClock"><br><br>

        <label for="C_TDP">TDP:</label>
        <input type="number" id="C_TDP" name="C_TDP" required><br><br>

        <label for="C_Series">Series:</label>
        <input type="text" id="C_Series" name="C_Series"><br><br>

        <label for="C_Microarchitecture">Microarchitecture:</label>
        <input type="text" id="C_Microarchitecture" name="C_Microarchitecture"><br><br>

        <label for="C_CoreFamily">Core Family:</label>
        <input type="text" id="C_CoreFamily" name="C_CoreFamily"><br><br>

        <label for="C_Socket">Socket:</label>
        <input type="text" id="C_Socket" name="C_Socket"><br><br>

        <label for="C_IntegratedGraphics">Integrated Graphics:</label>
        <input type="text" id="C_IntegratedGraphics" name="C_IntegratedGraphics"><br><br>

        <label for="C_MaxSupportedMemory">Max Supported Memory:</label>
        <input type="text" id="C_MaxSupportedMemory" name="C_MaxSupportedMemory"><br><br>

        <label for="C_ECCSupport">ECC Support:</label>
        <input type="text" id="C_ECCSupport" name="C_ECCSupport"><br><br>

        <label for="C_IncludesCooler">Includes Cooler:</label>
        <input type="text" id="C_IncludesCooler" name="C_IncludesCooler"><br><br>

        <label for="C_Packaging">Packaging:</label>
        <input type="text" id="C_Packaging" name="C_Packaging"><br><br>

        <label for="C_PerformanceL1Cache">Performance L1 Cache:</label>
        <input type="text" id="C_PerformanceL1Cache" name="C_PerformanceL1Cache"><br><br>

        <label for="C_PerformanceL2Cache">Performance L2 Cache:</label>
        <input type="text" id="C_PerformanceL2Cache" name="C_PerformanceL2Cache"><br><br>

        <label for="C_L3Cache">L3 Cache:</label>
        <input type="text" id="C_L3Cache" name="C_L3Cache"><br><br>

        <label for="C_Lithography">Lithography:</label>
        <input type="number" id="C_Lithography" name="C_Lithography" required><br><br>

        <label for="C_IncludesCPUCooler">Includes CPU Cooler:</label>
        <input type="text" id="C_IncludesCPUCooler" name="C_IncludesCPUCooler"><br><br>

        <label for="C_SimultaneousMultithreading">Simultaneous Multithreading:</label>
        <input type="text" id="C_SimultaneousMultithreading" name="C_SimultaneousMultithreading"><br><br>

        <label for="C_active">Active:</label>
        <input type="text" id="C_active" name="C_active" required><br><br>

        <label for="C_img">Image:</label>
        <input type="text" id="C_img" name="C_img"><br><br>

        <input type="submit" value="Add CPU">
    </form>

</div>