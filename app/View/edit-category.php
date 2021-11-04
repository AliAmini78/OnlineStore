<?php require_once 'layout/Admin/header.php' ?>

<h1 class="h3 mb-3 fw-normal">Edit category Page</h1>
<form action="/edit-category" method="POST">
    <input type="hidden" name="id" value="<?= $data['id']?>">
    <div class="form-floating mb-3 col-5">
        <input type="text" name="title" value="<?= $data['title']?>"  class="form-control mb-2" id="title" placeholder="name@example.com">
        <label for="title">title</label>

        <?php if (isset($_SESSION['title'])) { ?>
            <span class="bg-danger text-white rounded p-1"> fill the title </span>
        <?php unset($_SESSION['title']);
        } ?>


    </div>

    <span>
        <button class=" btn btn-lg btn-primary col-1" type="submit">edit</button>
        <a class=" btn btn-lg btn-danger" href="/category">list</a>
    </span>

</form>

<?php require_once 'layout/Admin/footer.php' ?>
