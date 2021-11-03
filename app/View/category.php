<?php require_once 'layout/Admin/header.php' ?>

<div class="container">
    <div class="border backgroundWhite p-5">

        <div class="row border-bottom pb-3" style="display: flex; justify-content:space-between;">
            <div>
                <h2 class="text-info "> User List</h2>
            </div>

            <div>
                <a class="btn btn-info text-white" href="/add-category"> add category</a>
            </div>
        </div>
        <br />
        <br />
        <div>
            <?php if ($AllData == null) { ?>
                <h1>without data</h1>

            <?php } else { ?>

                <table class="table table-striped border">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">title</th>
                            <th scope="col"> </th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $counter = 1;
                        foreach ($AllData as $key => $value) {
                        ?>
                            <tr>
                                <th scope="row"><?= $counter ?></th>
                                <td>
                                    <?= $value['title'] ?>
                                </td>
                                
                                <td>
                                    <div style="display:flex; justify-content:end;">
                                        <a href="/delete-user?id=<?= $value['id'] ?>" class="btn btn-danger text-white">delete</a>
                                        <a href="/edit-user?id=<?= $value['id'] ?>" class="btn btn-info text-white mx-2">edit</a>
                                    </div>
                                </td>
                            </tr>

                        <?php
                            $counter++;
                        }
                        ?>

                    </tbody>
                </table>

            <?php } ?>
        </div>
    </div>
</div>

<?php require_once 'layout/Admin/footer.php' ?>