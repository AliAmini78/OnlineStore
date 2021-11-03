<?php require_once 'layout/Admin/header.php' ?>

<form action="/add-category" method="POST">
    <h1 class="h3 mb-3 fw-normal">Register Page</h1>

    <div class="form-floating mb-3 col-5">
        <input type="text" name="title"  class="form-control mb-2" id="title" placeholder="name@example.com">
        <label for="title">title</label>

        <?php if (isset($_SESSION['title'])) { ?>
            <span class="bg-danger text-white rounded p-1"> fill the title </span>
        <?php unset($_SESSION['title']);
        } ?>


    </div>

    <span>
        <button class=" btn btn-lg btn-primary col-1" type="submit">add</button>
        <a class=" btn btn-lg btn-danger" href="/category">list</a>
    </span>

</form>

<?php require_once 'layout/Admin/footer.php' ?>
