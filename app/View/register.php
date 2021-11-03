<?php require_once 'layout/header.php' ?>


<form action="/register" method="POST">
    <h1 class="h3 mb-3 fw-normal">Register Page</h1>

    <div class="form-floating mb-3 col-5">
        <input type="text" name="full_name" value="<?= isset($full_name) ? $full_name : "" ?>" class="form-control mb-2" id="FullName" placeholder="name@example.com">
        <label for="FullName">Full name</label>


        <?php if(isset($_SESSION['full_name'])) { ?>
        <span class="bg-danger text-white rounded p-1"> fill the full name</span>
        <?php unset($_SESSION['full_name']);  }?>

        
    </div>

    <div class="form-floating mb-3 col-5">
        <input type="email" name="email" value="<?= isset($email) ? $email : "" ?>" class="form-control mb-2" id="email" placeholder="name@example.com">
        <label for="email">Email address</label>
        <?php if(isset($_SESSION['email'])) { ?>
        <span class="bg-danger text-white rounded p-1"> fill the email</span>
        <?php unset($_SESSION['email']); }?>
    </div>

    <div class="form-floating mb-3 col-5">
        <input type="text" name="phone_number" value="<?= isset($phone_number) ? $phone_number : "" ?>" class="form-control mb-2" id="PhoneNumber" placeholder="name@example.com">
        <label for="PhoneNumber">phone number</label>
        <?php if(isset($_SESSION['phone_number'])) { ?>
        <span class="bg-danger text-white rounded p-1">fill the phone number</span> 
        <?php unset($_SESSION['phone_number']); }?>
    </div>

    <div class="mb-3 col-5">
        <label for="address" class="form-label ">Address : </label>
        <textarea name="address" class="form-control mb-2" id="address" rows="3"><?= isset($address) ? $address : "" ?></textarea>
        <?php if(isset($_SESSION['address'])) { ?>
        <span class="bg-danger text-white rounded p-1">fill the address</span> 
        <?php unset($_SESSION['address']); }?>
    </div>

    <div class="form-floating mb-3 col-5">
        <input type="password" name="password" class="form-control mb-2" id="password" placeholder="Password">
        <label for="password">Password</label>
        <?php if(isset($password)) { ?>
        <span class="bg-danger text-white rounded p-1">fill the password</span> 
        <?php }?>
    </div>
    <div class="form-floating mb-3 col-5">
        <input type="password" name="confirm_password" class="form-control mb-2" id="ConfirmPassword" placeholder="Password">
        <label for="ConfirmPassword">confirm password</label>
        <?php if(isset($confirm_password)) { ?>
        <span class="bg-danger text-white rounded p-1">fill the confirm password</span> 
        <?php }?>
    </div>

    <span>
        <button class=" btn btn-lg btn-primary col-1" type="submit">register</button>
        <a class=" btn btn-lg btn-danger" href="/login">log in page</a>
    </span>

</form>

<?php require_once 'layout/footer.php' ?>