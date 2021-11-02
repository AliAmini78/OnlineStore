<?php require_once 'layout/header.php' ?>

<div class="d-flex  justify-content-center text-center">
    <form class="col-6">
        <h1 class="h3 mb-5 fw-normal">Please sign in</h1>

        <div class="form-floating  mb-4  ">
            <input type="email" class="form-control " id="email" placeholder="name@example.com">
            <label for="email">Email address</label>
        </div>

        <div class="form-floating  mb-4 ">
            <input type="password" class="form-control " id="password" placeholder="Password">
            <label for="password">Password</label>
        </div>
        <span class=" ">
            <button class=" btn btn-lg btn-primary" type="submit">Sign in</button>
            <a class=" btn btn-lg btn-danger" href="/register">Register</a>
        </span>
    </form>
</div>

<?php require_once 'layout/footer.php' ?>