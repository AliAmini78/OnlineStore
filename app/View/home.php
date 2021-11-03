<?php require_once 'layout/Home/header.php' ?>

<h1>hello world</h1>

<?php require_once 'layout/Home/footer.php' ?>


<input type="hidden" value="<?= isset($message)?$message:''?>" id="message">

<script>
    let link = document.querySelector('#contact');

    var SweetAlertMessage = document.querySelector('#message').value;
    if (SweetAlertMessage.trim() !== '') {
        Swal.fire({
            icon: 'success',
            title: 'Oops...',
            text: SweetAlertMessage,
            //footer: '<a href="">Why do I have this issue?</a>'
        })
    }
</script>