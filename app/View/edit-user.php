<?php require_once 'layout/Admin/header.php' ?>

<form action="/edit-user" method="POST">
    <h1 class="h3 mb-3 fw-normal">Register Page</h1>
    <input type="hidden" name="id" value="<?= $data['id']?>">
    <div class="form-floating mb-3 col-5">
        <input type="text" name="full_name" value="<?= $data['full_name']?>" class="form-control mb-2" id="FullName" placeholder="name@example.com">
        <label for="FullName">Full name</label>


        <?php if (isset($_SESSION['full_name'])) { ?>
            <span class="bg-danger text-white rounded p-1"> fill the full name</span>
        <?php unset($_SESSION['full_name']);
        } ?>


    </div>

    <div class="form-floating mb-3 col-5">
        <input type="text" name="phone_number" value="<?= $data['phone_number'] ?>" class="form-control mb-2" id="PhoneNumber" placeholder="name@example.com">
        <label for="PhoneNumber">phone number</label>
        <?php if (isset($_SESSION['phone_number'])) { ?>
            <span class="bg-danger text-white rounded p-1">fill the phone number</span>
        <?php unset($_SESSION['phone_number']);
        } ?>
    </div>

    <div class="mb-3 col-5">
        <label for="address" class="form-label ">Address : </label>
        <textarea name="address" class="form-control mb-2" id="address" rows="3"><?= $data['address'] ?></textarea>
        <?php if (isset($_SESSION['address'])) { ?>
            <span class="bg-danger text-white rounded p-1">fill the address</span>
        <?php unset($_SESSION['address']);
        } ?>
    </div>


    <span>
        <button class=" btn btn-lg btn-primary col-1" type="submit">edit</button>
        <a class=" btn btn-lg btn-danger" href="/user-list">list</a>
    </span>

</form>

<?php require_once 'layout/Admin/footer.php' ?>
