<?php require_once 'layout/Home/header.php' ?>

<div class="d-flex  justify-content-center text-center">
    <form class="col-6" action="/login" method="POST">
        <h1 class="h3 mb-5 fw-normal">Please sign in</h1>

        <div class="form-floating  mb-4  ">
            <input type="email" name="email" class="form-control mb-3" id="email" placeholder="name@example.com">
            <label for="email">Email address</label>

            <?php if (isset($_SESSION['email'])) { ?>
                <span class="bg-danger text-white rounded p-1"> fill the email</span>
            <?php unset($_SESSION['email']);
            } ?>

        </div>

        <div class="form-floating  mb-4 ">
            <input type="password" name="password" class="form-control mb-3" id="password" placeholder="Password">
            <label for="password">Password</label>

            <?php if (isset($password)) { ?>
                <span class="bg-danger text-white rounded p-1">fill the password</span>
            <?php } ?>

        </div>
        <span class=" ">
            <button class=" btn btn-lg btn-primary" type="submit">Sign in</button>
            <a class=" btn btn-lg btn-danger" href="/register">Register</a>
        </span>
    </form>
</div>

<?php require_once 'layout/Home/footer.php' ?>


<input type="hidden" value="<?= isset($message)?$message:''?>" id="message">

<script>
    let link = document.querySelector('#contact');

    var SweetAlertMessage = document.querySelector('#message').value;
    if (SweetAlertMessage.trim() !== '') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: SweetAlertMessage,
            //footer: '<a href="">Why do I have this issue?</a>'
        })
    }
</script>