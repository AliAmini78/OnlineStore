<?php require_once 'layout/Home/header.php' ?>

<div class="border backgroundWhite p-5">

    <div class="row border-bottom pb-3" style="display: flex; justify-content:space-between;">

        <div>
            <h2 class="text-info "> User List</h2>
        </div>
    </div>
    <br />
    <br />
    <div>
        <table class="table table-striped border">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">product name </th>
                    <th scope="col"> count </th>
                    <th scope="col"> link </th>
                    <th scope="col">sum </th>

                </tr>
            </thead>
            <tbody>
                <?php
                if (count($cartData) == 0) {
                    echo "<h3> there is no item to show</h3>";
                } else {
                    $counter = 1;
                    foreach ($cartData as $key => $value) {
                ?>
                        <tr>
                            <th scope="row"><?= $counter ?></th>
                            <td>
                                <?= $value['name'] ?>
                            </td>
                            <td>
                                <p>
                                    <?= $value['sum'] ?>
                                </p>
                            </td>
                            <td>
                                <a href="/single-page?id=<?=$key ?>"> more</a>
                            </td>
                            <td>
                                <div style="display:flex; justify-content:end;">
                                    <a href="/add-to-cart?product_id=<?=$key?>" class="btn btn-danger text-white">+</a>
                                    <?= $value['count'] ?>
                                    <a href="/remove-to-cart?product_id=<?=$key?>" class="btn btn-info text-white mx-2">-</a>
                                </div>
                            </td>
                        </tr>

                <?php
                        $counter++;
                    }
                }
                ?>

            </tbody>
        </table>

    </div>
</div>

<?php require_once 'layout/Home/footer.php' ?>


<input type="hidden" value="<?= isset($_SESSION['Message']) ? $_SESSION['Message'] : '' ?>" id="message">

<script>
    let link = document.querySelector('#contact');

    var SweetAlertMessage = document.querySelector('#message').value;
    if (SweetAlertMessage.trim() !== '') {
        Swal.fire({
            icon: 'success',
            // title: 'yeah',
            text: SweetAlertMessage,
            //footer: '<a href="">Why do I have this issue?</a>'
        })
    }
</script>

<?php $_SESSION['Message'] = '' ?>