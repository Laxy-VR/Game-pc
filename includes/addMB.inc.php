<h1>Add New Motherboard</h1>
<div class="form-container">
    <form action="php/addMB.php" method="POST" enctype="multipart/form-data">
        <label for="MB_name">Name:</label>
        <input type="text" id="MB_name" name="MB_name" required><br><br>

        <label for="MB_price">Price:</label>
        <input type="number" id="MB_price" name="MB_price" step="0.01" required><br><br>

        <label for="MB_Manufacturer">Manufacturer:</label>
        <input type="text" id="MB_Manufacturer" name="MB_Manufacturer" required><br><br>

        <label for="MB_PartNumber">Part Number:</label>
        <input type="text" id="MB_PartNumber" name="MB_PartNumber" required><br><br>

        <label for="MB_SocketCPU">Socket CPU:</label>
        <input type="text" id="MB_SocketCPU" name="MB_SocketCPU"><br><br>

        <label for="MB_FormFactor">Form Factor:</label>
        <input type="text" id="MB_FormFactor" name="MB_FormFactor"><br><br>

        <label for="MB_Chipset">Chipset:</label>
        <input type="text" id="MB_Chipset" name="MB_Chipset"><br><br>

        <label for="MB_MemoryMax">Maximum Memory:</label>
        <input type="text" id="MB_MemoryMax" name="MB_MemoryMax"><br><br>

        <label for="MB_MemoryType">Memory Type:</label>
        <input type="text" id="MB_MemoryType" name="MB_MemoryType"><br><br>

        <label for="MB_MemorySlots">Memory Slots:</label>
        <input type="number" id="MB_MemorySlots" name="MB_MemorySlots"><br><br>

        <label for="MB_MemorySpeed">Memory Speed:</label>
        <input type="text" id="MB_MemorySpeed" name="MB_MemorySpeed"><br><br>

        <label for="MB_Color">Color:</label>
        <input type="text" id="MB_Color" name="MB_Color"><br><br>

        <label for="MB_img">Image:</label>
        <input type="text" id="MB_img" name="MB_img"><br><br>

<!--        <label for="MB_active">Active:</label>-->
<!--        <fieldset id="MB_active">-->
<!--            <input type="radio" id="active_yes" name="MB_active" value="Yes">-->
<!--            <label for="active_yes">Yes</label>-->
<!---->
<!--            <input type="radio" id="active_no" name="MB_active" value="No">-->
<!--            <label for="active_no">No</label>-->
<!--        </fieldset>-->

        <input type="submit" value="Add Motherboard">
    </form>
</div>