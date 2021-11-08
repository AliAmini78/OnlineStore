


<?php
if (!isset($comments[0])) {
    echo '<h4>the comments are empty</h4>';
} else {
    foreach ($comments[0] as $FatherItem) { ?>
        <div class="card p-2 mb-3 ">
            <div>
                <h4><?= $FatherItem['full_name'] ?></h4>
            </div>
            <p>
                <?= $FatherItem['content'] ?>
            </p>
            <div>
                <label for="#">replay : </label>
                <input type="radio" name="replay" value="<?= $FatherItem['id'] ?>" class="replay">
            </div>
        </div>

<?php
        if(isset($comments[$FatherItem['id']]))
            recursive($comments[$FatherItem['id']] ,$comments);
    }
} ?>


<?php

function recursive($array , $comments)
{
    foreach ($array as $ChildItem) { ?>
        <div class="card p-2 mb-3 bg-danger" style="margin-left: 60px;">
            <div>
                <h4><?= $ChildItem['full_name'] ?></h4>
            </div>
            <p>
                <?= $ChildItem['content'] ?>
            </p>
            <div>
                <label for="#">replay : </label>
                <input type="radio" name="replay" value="<?= $ChildItem['id'] ?>" class="replay">
            </div>
        </div>
<?php
        if(isset($comments[$ChildItem['id']]))
            recursive($comments[$ChildItem['id']],$comments);
    }
}
?>