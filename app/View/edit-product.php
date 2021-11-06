<?php require_once 'layout/Admin/header.php' ?>

<h1 class="h3 mb-3 fw-normal">Edit product Page</h1>
<form action="/edit-product" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">
    <div class="form-floating mb-3 col-5">
        <input type="text" name="title" value="<?= $data['title'] ?>" class="form-control mb-2" id="title" placeholder="name@example.com">
        <label for="title">title</label>

        <?php if (isset($_SESSION['title'])) { ?>
            <span class="bg-danger text-white rounded p-1"> fill the title </span>
        <?php unset($_SESSION['title']);
        } ?>
    </div>
    <div class=" mb-3 col-5">
        <label for="description">description</label>
        <textarea name="description" id="description" cols="30" rows="10"><?= $data['description'] ?></textarea>
        <?php if (isset($_SESSION['description'])) { ?>
            <span class="bg-danger text-white rounded p-1"> fill the description </span>
        <?php unset($_SESSION['description']);
        } ?>
    </div>
    <div class=" mb-3 col-5">
        <label for="pic">pic</label>
        <input type="file" name="pic" class=" mb-2" id="pic">

        <?php if (isset($_SESSION['pic'])) { ?>
            <span class="bg-danger text-white rounded p-1"> fill the pic </span>
        <?php unset($_SESSION['pic']);
        } ?>
    </div>
    <div class="form-floating mb-3 col-5">
        <input type="number" name="price" value="<?= $data['price'] ?>" class="form-control mb-2" id="price" placeholder="name@example.com">
        <label for="price">price</label>

        <?php if (isset($_SESSION['price'])) { ?>
            <span class="bg-danger text-white rounded p-1"> fill the title </span>
        <?php unset($_SESSION['price']);
        } ?>
    </div>
    <div class="form-floating mb-3 col-5">
        <input type="number" name="count" value="<?= $data['count'] ?>" class="form-control mb-2" id="count" placeholder="name@example.com">
        <label for="count">count</label>
    </div>
    <div class=" mb-3 col-5">
        <label for="CategoryId"> category </label>
        <select name="category_id" id="CategoryId">
            <?php foreach ($category as $item) { ?>
                <option value="<?= $item['id'] ?>"> <?= $item['title'] ?></option>
            <?php } ?>
        </select>

        <?php if (isset($_SESSION['category_id'])) { ?>
            <span class="bg-danger text-white rounded p-1"> chose the category </span>
        <?php unset($_SESSION['category_id']);
        } ?>
    </div>



    <span>
        <button class=" btn btn-lg btn-primary col-1" type="submit">edit</button>
        <a class=" btn btn-lg btn-danger" href="/product">list</a>
    </span>

</form>

<?php require_once 'layout/Admin/footer.php' ?>