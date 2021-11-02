<?php require_once 'layout/header.php' ?>

<form>
    <h1 class="h3 mb-3 fw-normal">Register Page</h1>

    <div class="form-floating mb-3 col-5">
        <input type="text" name="full_name" class="form-control mb-2" id="FullName" placeholder="name@example.com">
        <label for="FullName">Full name</label>
        <!-- <span class="bg-danger text-white rounded p-1"></span> -->
    </div>

    <div class="form-floating mb-3 col-5">
        <input type="email" name="email" class="form-control mb-2" id="email" placeholder="name@example.com">
        <label for="email">Email address</label>
        <!-- <span class="bg-danger text-white rounded p-1"></span> -->
    </div>

    <div class="form-floating mb-3 col-5">
        <input type="text" name="phonenumber" class="form-control mb-2" id="PhoneNumber" placeholder="name@example.com">
        <label for="PhoneNumber">phone number</label>
        <!-- <span class="bg-danger text-white rounded p-1"></span> -->
    </div>

    <div class="mb-3 col-5">
        <label for="address" class="form-label ">Address : </label>
        <textarea name="address" class="form-control mb-2" id="address" rows="3"></textarea>
    </div>

    <div class="form-floating mb-3 col-5">
        <input type="password" name="password" class="form-control mb-2" id="password" placeholder="Password">
        <label for="password">Password</label>
        <!-- <span class="bg-danger text-white rounded p-1"></span> -->
    </div>
    <div class="form-floating mb-3 col-5">
        <input type="password" name="confirm_password" class="form-control mb-2" id="ConfirmPassword" placeholder="Password">
        <label for="ConfirmPassword">confirm password</label>
        <!-- <span class="bg-danger text-white rounded p-1"></span> -->
    </div>

    <span>
        <button class=" btn btn-lg btn-primary col-1" type="submit">register</button>
        <a class=" btn btn-lg btn-danger" href="/login">log in page</a>
    </span>

</form>

<?php require_once 'layout/footer.php' ?>