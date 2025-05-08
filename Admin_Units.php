<?php

$title = "EduFreeDocs -Administrator_Add_Unit";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['userType'])) {
    if ($_SESSION['userType'] != 'administrator') {
        header("Location: Home.php");
        exit();
    }
}

include 'includes/header.inc.php';
include 'functions/admin_units.inc.php';

ob_start();
?>
<div class="flex flex-col w-[100%] text-center p-[5px] relative">
    <div class="">
        <h4 class="font-times font-bold text-[17px]">Registered Units</h4>
    </div>
    <?php

    if (isset($_SESSION['Unit_Delete'])) {
    ?>
        <div id="Success_Delete" class="bg-green-500 rounded-sm">
            <i class="text-white font-bold fa-solid fa-xmark flex justify-end pt-2 pe-2 cursor-pointer"></i>
            <p class="font-times flex text-center justify-center ">
                <?= $_SESSION['Unit_Delete'] ?>
            </p>
        </div>
    <?php
    }
    ?>
    <?php

    if (isset($_SESSION['Unit_Details_Updated'])) {
    ?>
        <div id="Success_Delete_Unit" class="bg-green-500 rounded-sm">
            <i class="text-white font-bold fa-solid fa-xmark flex justify-end pt-2 pe-2 cursor-pointer"></i>
            <p class="font-times flex text-center justify-center ">
                <?= $_SESSION['Unit_Details_Updated'] ?>
            </p>
        </div>
    <?php
    }
    ?>

    <?php
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $UnitName = $row['UnitName'];
            $UnitCode = $row['UnitCode'];
            $UnitLec = $row['UnitLec'];


            // Count documents for this UnitCode
            $count_sql = "SELECT COUNT(*) AS doc_count FROM libraries WHERE UnitCode = ?";
            $count_stmt = mysqli_prepare($con, $count_sql);
            mysqli_stmt_bind_param($count_stmt, "s", $UnitCode);
            mysqli_stmt_execute($count_stmt);
            $count_result = mysqli_stmt_get_result($count_stmt);
            $count_row = mysqli_fetch_assoc($count_result);
            $doc_count = $count_row['doc_count'];


    ?>
            <div class="flex flex-col md:flex-row items-center justify-around rounded-xl bg-[#55679C] my-[7px] ease-in-out duration-500 hover:scale-95 shadow-sm">
                <div class="flex flex-col ">
                    <p class="font-bold font-times text-[17px]">Unit Name</p>
                    <p class="text-[#c6c4b9] text-[0.9rem]"><?= $UnitName ?></p>
                </div>
                <hr class="md:hidden w-full">
                <div class="flex flex-col p-0 m-0">
                    <p class="font-bold font-times text-[17px]">Unit Code</p>
                    <p class="text-[#c6c4b9] text-[0.9rem]"><?= $UnitCode ?></p>
                </div>
                <hr class="md:hidden w-full">
                <div class="flex flex-col ">
                    <p class="font-bold font-times text-[17px]">Unit Lec</p>
                    <p class="text-[#c6c4b9] text-[0.9rem]"><?= $UnitLec ?></p>
                </div>
                <hr class="md:hidden w-full">
                <div class="flex flex-col ">
                    <p class="font-bold font-times text-[17px]">Available Docs</p>
                    <p class="text-[#c6c4b9] text-[0.9rem]"><?= $doc_count ?></p>
                </div>
                <hr class="md:hidden w-full">
                <div class="flex flex-col pb-2">
                    <p class="font-bold font-times text-[17px]">Action</p>
                    <div class="flex felx-row px-[2px] justify-center text-center">
                        <a href="functions/delete_Unit.inc.php?UnitCode=<?= $UnitCode ?>" class="text-black bg-red-400 rounded-l-md font-bold font-times px-3 py-1  hover:bg-red-600 ease-in-out duration-200 hover:scale-105">Delete Unit</a>
                        <a href="Admin_Edit_Unit.php?UnitCode=<?= $UnitCode ?>" class="text-black bg-green-300 rounded-r-md font-bold font-times px-3 py-1  hover:bg-green-600 ease-in-out duration-200 hover:scale-105">Edit Unit</a>
                    </div>
                </div>
            </div>
    <?php
            mysqli_stmt_close($count_stmt);
        }
    }
    ?>
</div>
<script>
    const Success_Delete = document.querySelector('#Success_Delete');
    const faXmark = document.querySelector('.fa-xmark');

    faXmark.addEventListener('click', () => {
        Success_Delete.classList.toggle('hidden');
        <?php
        unset($_SESSION['Unit_Delete']);
        ?>
    });
    faXmark.addEventListener('click', () => {
        Success_Delete_Unit.classList.toggle('hidden');
        <?php
        unset($_SESSION['Unit_Details_Updated']);
        ?>
    });
</script>
<?php
$Admin_content = ob_get_clean();

include 'includes/admin.inc.php';
