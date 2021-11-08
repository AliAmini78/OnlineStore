<?php require_once 'layout/Home/header.php' ?>

<?php

?>

<div class="content">
    <div class="post">

        <div class="w-100" style="height: 640px;">
            <img class="w-100 h-100" src="<?= $product['pic'] ?>" alt="#">
        </div>
        <h1>title :<?= $product['title'] ?> </h1>

        <div>
            <p>
                <?= $product['description'] ?>
            </p>
        </div>
        <span class="btn-group">
            <a href="" class="btn btn-danger">like</a>
            <a href="" class="btn btn-success">bookmark</a>
        </span>
    </div>
    <hr>
    <div class="comments border py-5 px-2">
        <form action="/comment" method="POST">
            <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
            <div>
                <label for="comment"> your comment : </label>
            </div>
            <textarea name="content" id="comment" class="w-100 p-3 " style="height: 100px;"></textarea>
            <input type="hidden" name="parent_comment" value="0" id="replay">
            <span>
                <button class="btn btn-info text-white">send</button>
            </span>
        </form>
        <h3>comments</h3>
        <?php
            if (!isset($comments[0])) {
                 echo '<h4>the comments are empty</h4>';
            }else{
        foreach ($comments[0] as $item) { ?>
            <div class="card p-2 mb-3">
                <div>
                    <h4><?= $item['full_name'] ?></h4>
                </div>
                <p>
                    <?= $item['content'] ?>
                </p>
                <div>
                    <label for="#">replay : </label>
                    <input type="radio" name="replay" value="<?= $item['id'] ?>" class="replay">
                </div>
            </div>
            <?php
            if (isset($comments[$item['id']])) {
                $level = $item['id'];
                $stop = false;
                while ($stop == false) {
                    foreach ($comments[$level] as $key => $value) {
                               

            ?>
                        <div class="card p-2 mb-3 bg-danger ">
                            <div>
                                <h4><?= $value['full_name'] ?></h4>
                            </div>
                            <p>
                                <?= $value['content'] ?>
                            </p>
                            <div>
                                <label for="#">replay : </label>
                                <input type="radio" name="replay" value="<?= $value['id'] ?>" class="replay">
                            </div>
                        </div>

        <?php
                        if ($key === array_key_last($comments[$level])) {
                            $level = $value['id'];
                                if (!isset($comments[$level])) {
                                    $stop = true;
                                }
                        }
                    }
                }
            }
        }  }?>
    </div>
</div>
<?php require_once 'layout/Home/footer.php' ?>

<input type="hidden" value="<?= isset($message) ? $message : '' ?>" id="message">

<script>
    let replaysRadio = document.querySelectorAll('.replay');
    let mainReplayBtn = document.querySelector('#replay');
    replaysRadio.forEach(item => {
        console.log('as');
        item.addEventListener('click', () => {
            mainReplayBtn.value = item.value;
        })
    })
    let link = document.querySelector('#contact');

    var SweetAlertMessage = document.querySelector('#message').value;

    if (SweetAlertMessage.trim() !== '') {
        Swal.fire({
            icon: 'success',
            title: 'yeah',
            text: SweetAlertMessage,
            //footer: '<a href="">Why do I have this issue?</a>'
        })
    }
</script>