<script>
    function disableNumbers(input) {
        // Remove any non-numeric characters from the input value
        input.value = input.value.replace(/[^\d{4}\s?\w{2}$]/g, '');

        // You can also display an error message or alert if numeric characters are entered
        // For example, you can check if the input value still contains numeric characters
        if (/\d/.test(input.value)) {
            alert("Numbers are not allowed in this textbox.");
            input.value = input.value.replace(/\d/g, ''); // Remove any remaining numeric characters
        }
    }
</script>

<script>
    function validatePostcode(postcode) {
        // Nederlandse postcode regex-patroon
        const postcodePattern = /^[1-9][0-9]{3} ?(?!sa|sd|ss)[A-Za-z]{2}$/;

        const postcodeError = document.getElementById('postcodeError');
        if (!postcodePattern.test(postcode)) {
            postcodeError.textContent = 'invalid zip code (1234 AB).';
        } else {
            postcodeError.textContent = '';
        }
    }
</script>

<script>
    function allowOnlyNumbers(input) {
        input.value = input.value.replace(/[^0-9]/g, '');
    }
        //     // You can also display an error message or alert if numeric characters are entered
        //     // For example, you can check if the input value still contains numeric characters
        //     if (/\d/.test(input.value)) {
        //         alert("Numbers are not allowed in this textbox.");
        //         input.value = input.value.replace(/\d/g, ''); // Remove any remaining numeric characters
        //     }
        // }
</script>


<h1>Register</h1>
<div class="container">
    <section>
    <h2>Personal Information</h2>
    <form action="php/register.php" method="POST">
        <div class="input-group">
            <label for="name">First name</label>
            <input type="text" name="firstname" oninput="disableNumbers(this)" required>
        </div>
        <div class="input-group">
            <label for="prefix">Prefix (optional)</label>
            <input type="text" name="prefix" oninput="disableNumbers(this)">
        </div>
        <div class="input-group">
            <label for="lastname">Last name</label>
            <input type="text" name="lastname" oninput="disableNumbers(this)" required>
        </div>
        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" name="email" required>
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" name="password" required>
        </div>
        <div class="input-group">
            <label for="confirmpassword">Confirm Password</label>
            <input type="password" name="confirmpassword" required>
        </div>
    </section>
    <section>
        <h2>Delivery</h2>
        <div class="input-group">
            <label for="street">Street name</label>
            <input type="text" name="streetname" oninput="disableNumbers(this)" required>
        </div>
        <div class="input-group">
            <label for="house">House number</label>
            <input type="text" name="housenumber" required>
        </div>
        <div class="input-group">
            <label for="zipcode">Zip code</label>
            <input type="text" name="postcode" oninput="validatePostcode(this)" required>
            <span id="postcodeError" class="error"></span>
        </div>
        <div class="input-group">
            <label for="city">City</label>
            <input type="text" name="city" oninput="disableNumbers(this)" required>
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="register">Register</button>
        </div>
        <a href="index.php?page=login">Already have an account? Sign in here!</a>
        </form>
    </section>
</div>

