<?php require_once 'layout/Home/header.php' ?>

<?php
//dd(__DIR__)
?>
<div class="content">
    <div class="row">
        <?php foreach ($products as $item) { ?>
            <?php
            //dd($item['pic'])
            ?>
            <div class="col-4 mb-4">
                <div class="card" style="height: 400px;">
                    <img class="card-img-top" style="height: 200px;object-fit:cover;" src="<?=$item['pic']?>" alt="Card image cap">
                    <div class="card-body">
                        <div class="card-title">
                            <label for="Name"> <?= $item['title'] ?></label>
                            <strong class=" "> <?= $item['price'] ?></strong>
                        </div>
                        <div class="card-text mb-4" style="max-height: 80px; overflow:hidden;">
                            <?= $item['description'] ?>

                        </div>
                        <div style="display: flex; justify-content:space-between;">
                            <a href="" class="btn btn-primary">like</a>
                            <a href="/single-page?id=<?=$item['id']?>" class="btn btn-danger"> more</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>


<?php require_once 'layout/Home/footer.php' ?>