<?php
$title = "View - EduFeeDocs";
session_start();
$username = "";
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    $username = '';
}

include 'includes/header.inc.php';

$Course = $_GET['course'];
ob_start();
?>


<div class="h-[100%]" style="background-image: url('storage/images/viewsBackground.jpg');
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        height:100%;
        ">
    <div style="border:4px solid black;border-top:none; max-width: fit-content; border-radius: 0 0 20px 20px;"
        class="mx-auto max-w-fit text-orange-400 bg-white flex flex-row text-center justify-center items-center my-4">
        <h6 style="padding-left: 7px; padding-right: 7px;" class="text-1xl font-bold font-serif">
            Welcome back <span><?= $username ?></span> Hope you have a productive session!
        </h6>
    </div>
    <?php
    if (isset($_SESSION['No_docs_err'])) {
    ?>
        <div id="NoDocs" style="max-width: fit-content; margin:5px; background-color:orange; padding-right:7px;padding-left:7px;" class=" mx-auto  flex flex-col m-3 alert-warning rounded-md" role="alert">
            <i class="text-black fa-solid fa-xmark flex text-right justify-end"></i>
            <p class="text-black font-bold font-times px-5"> <?= $_SESSION['No_docs_err'] ?></p>
        </div>
    <?php

    }
    ?>

    <div class="w-[90%]  mx-auto p-[2rem]" style="display: flex; flex-wrap: wrap; justify-content: center;">
        <?php
        include 'functions/view.inc.php';

        ?>
        <script>
            const NoDocs = document.querySelector('#NoDocs');
            const faXmark = document.querySelector('.fa-xmark');

            faXmark.addEventListener('click', () => {
                NoDocs.classList.toggle('hidden');
                <?php
                unset($_SESSION['No_docs_err']);
                ?>
            });
        </script>
    </div>
</div>
<?php
$content = ob_get_clean();

include 'includes/app.inc.php';
?>