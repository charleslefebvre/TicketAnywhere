<<<<<<< HEAD
<p id="title">Login</p>
<?php
    if(isset($_SESSION['error'])){
        $message = $_SESSION['error'];
        echo "<h6 class='text-danger'>$message</h6>";
        unset($_SESSION['error']);
    }
 ?>
<form method="post" action="LOGIC/login.logic.php">
    <div class="form-group">
        <label>Email address</label>
        <input name="email" type="email" class="form-control long" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input name="pw" type="password" class="form-control long" placeholder="Enter password">
    </div>
    <button type="submit" class="btn submit">Login</button>
</form>

=======
<p id="title">Login</p>
<?php
    if(isset($_SESSION['error'])){
        $message = $_SESSION['error'];
        echo "<h6 class='text-danger'>$message</h6>";
        unset($_SESSION['error']);
    }
 ?>
<form method="post" action="LOGIC/login.logic.php">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Email address</label>
            <input name="email" type="email" class="form-control" placeholder="Enter email">
        </div>
        <div class="form-group col-md-6">
            <label>Password</label>
            <input name="pw" type="password" class="form-control" placeholder="Enter password">
        </div>
    </div>
    <button type="submit" class="btn submit">Login</button>
</form>

>>>>>>> 670ebc6... Update
