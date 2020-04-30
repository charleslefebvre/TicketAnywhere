<p id="title">Register</p>
<?php
    if(isset($_SESSION['error'])){
        $message = $_SESSION['error'];
        echo "<h6 class='error'>$message</h6>";
        unset($_SESSION['error']);
    }
 ?>
<form id="register-form" method="post" action="LOGIC/register.logic.php">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>First name</label>
            <input name="f_name" type="text" class="form-control" placeholder="Enter first name">
        </div>
        <div class="form-group col-md-6">
        <label>Last name</label>
            <input name="l_name" type="text" class="form-control" placeholder="Enter last name">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Email</label>
            <input name="email" type="email" class="form-control" placeholder="Enter email">
        </div>
        <div class="form-group col-md-6">
            <label>Address</label>
            <input name="address" class="form-control" placeholder="Enter address">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>City</label>
            <input name="city" class="form-control" placeholder="City">
        </div>
        <div class="form-group col-md-6">
            <label>Zip code</label>
            <input name="zip" class="form-control" placeholder="Enter Zip code">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Password</label>
            <input id="pw" name="pw" type="password" class="form-control" placeholder="Enter password">
        </div>
        <div class="form-group col-md-6">
        <label>Confirmation</label>
            <input name="cpw" type="password" class="form-control" placeholder="Enter confirmation">
        </div>
    </div>       
    <button type="button" class="btn submit">Register</button>
</form>


