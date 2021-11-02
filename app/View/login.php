<?php require_once 'layout/header.php' ?>

<div class="d-flex  justify-content-center text-center">
    <form class="col-6">
        <h1 class="h3 mb-5 fw-normal">Please sign in</h1>

        <div class="form-floating  mb-4  ">
            <input type="email" class="form-control " id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
        </div>

        <div class="form-floating  mb-4 ">
            <input type="password" class="form-control " id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
        <span class=" ">
            <button class=" btn btn-lg btn-primary" type="submit">Sign in</button>
            <a class=" btn btn-lg btn-danger" href="/register">Register</a>
        </span>
    </form>
</div>

<?php require_once 'layout/footer.php' ?>