<?php require_once 'layout/Home/header.php' ?>


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
        <div style="display: flex; justify-content:space-between;">
            <span>
                <a href="/like?product_id=<?= $product['id'] ?>" class="btn btn-danger">like</a>
                <small><?= $likeCount ?></small>
            </span>
            <span>
                <label for="score">score</label>
                <small><?= $score ?>/5 </small>
                <form action="/add-score" method="POST">
                    <input type="range" name="value" id="score" min="0" max="5">
                    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                    <button type="submit">send</button>
                </form>

            </span>
            <span>
                <form action="/add-bookmark" method="POST">
                    <label for="bookmark"> bookmark</label>
                    <input type="checkbox" id="bookmark">
                    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                    <button type="submit" id="bookmark_btn" style="display:none;"></button>
                </form>
            </span>
            <span>
                <a href="/add-to-cart?product_id=<?= $product['id'] ?>" class="btn btn-success">add to cart</a>
            </span>
        </div>
    </div>
    <hr>
    <div class="comments border py-5 px-2">
        <form action="/comment" method="POST">
            <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
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
        <?php require_once 'partials/comments.php' ?>
    </div>
</div>
<?php require_once 'layout/Home/footer.php' ?>

<input type="hidden" value="<?= isset($message) ? $message : '' ?>" id="message">

<script>
    let BookmarkInput = document.querySelector('#bookmark');
    let BookmarkBtn = document.querySelector('#bookmark_btn');
    let replaysRadio = document.querySelectorAll('.replay');
    let mainReplayBtn = document.querySelector('#replay');

    BookmarkInput.addEventListener('click' , ()=>BookmarkBtn.click())


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
            text: SweetAlertMessage,
        })
    }
</script>