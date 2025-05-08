<?php

$title = 'Documents - EduFreeDocs';

session_start();
$UnitCode = $_GET['UnitCode'];
$Course = $_GET['course'];
include 'functions/documents.inc.php';
include 'includes/header.inc.php';


ob_start();
?>
<div class="flex flex-col w-[98%] md:w-[95%] mx-auto  " style="background-image: url('storage/images/viewsBackground.jpg');
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        min-height:100vh;
        ">
    <hr>
    <div class="bg-white mx-auto rounded-full md:w-[80%] px-3 flex text-1xl text-center  text-black font-bold font-times justify-between">
        <div class="flex items-center">Available Documents</div>
        <div style="margin:4px 4px 4px 4px " class="md:px-3 align-middle flex items-center"><a href="view.php?course=<?= $Course ?>" class="bg-black px-3 flex items-center md:px-3 py-2 rounded-full align-middle text-orange-400">Back</a></div>
    </div>
    <hr>
    <div class=" container-fluid col-md-12 table-responsive" style="display: flex; flex-direction: row;flex-wrap: wrap; justify-content: center;">
        <?php
        while ($row = mysqli_fetch_assoc($results)) {
            $UnitName = $row['UnitName'];
            $DocName = $row['DocName'];
            $DocLocation = $row['DocLocation'];
        ?>
            <div class="card " style="width: 15rem; margin: 10px;">
                <div class="card-header" style="padding: 2px">
                    <h6 class="fw-bold" style="text-align: center;font-family: 'Times New Roman'">
                        <?= $UnitName ?>
                    </h6>

                </div>
                <div class="card-body" style="padding: 2px">
                    <P class="fw-bold m-2" style="text-align:center; font-family: 'Times New Roman', Times, serif">
                        <?= $DocName ?>
                    </P>
                </div>
                <a href="<?= $DocLocation ?>" class="btn btn-primary text-align-center d-flex " style="flex-direction:column;padding: 3px;font-size: 0.9rem;margin-left: 7px;margin-right: 7px;font-family: 'Arial Black'" download>Download</a>
            </div>
        <?php
        }
        ?>
    </div>
    <script>
        document.querySelectorAll(".download").forEach(button => {
            button.addEventListener('click', function() {
                <?php
                echo "Downloaded";
                ?>
            });
        });
    </script>
    <?php
    $content = ob_get_clean();
    include 'includes/app.inc.php';
