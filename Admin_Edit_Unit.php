<?php

$title = "EduFreeDocs -Administrator_Edit_Unit_Details";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['userType'])) {
    if ($_SESSION['userType'] != 'administrator') {
        header("Location: Home.php");
        exit();
    }
}

$UnitCode = $_GET['UnitCode'];

$_SESSION['Unit_To_Edit'] = $UnitCode;

include 'includes/header.inc.php';
include 'functions/admin_edit_unit.inc.php';
$New_UnitName = $New_UnitCode = $New_UnitLec = "";
$New_UnitName_err = $New_UnitCode_err = $New_UnitLec_err = "";
if (isset($_SESSION['New_UnitName_err'])) {
    $New_UnitName_err = $_SESSION['New_UnitName_err'];
}
if (isset($_SESSION['New_UnitCode_err'])) {
    $New_UnitCode_err = $_SESSION['New_UnitCode_err'];
}
if (isset($_SESSION['New_UnitLec_err'])) {
    $New_UnitLec_err = $_SESSION['New_UnitLec_err'];
}
ob_start();
?>
<div class="flex w-[100%] h-[80vh] text-center justify-center items-center">
    <div class="m-1">
        <?php
        if (isset($_SESSION['Success_Message'])) {
        ?>
            <div style="width: fit-content;" class=" mx-auto flex justify-between text-center" role="alert">
                <p style="color:greenyellow" class="text-[0.7rem] font-bold"> <?= $_SESSION['Success_Message'] ?></p>
                <a class="text-[0.7rem]" href="Adminstrator_Dashboard.php">Redirect back to my Dashboard</a>
            </div>
        <?php
            unset($_SESSION['Success_Message']);
        }
        ?>

        <form action="functions/admin_edit_unit.inc.php" method="post" class="flex flex-col justify-center text-center bg-[#608BC1] rounded-md items-center">
            <div style="border-bottom: 1px solid white;" class="flex text-center justify-center w-[100%]">
                <h6 class="text-black font-bold font-times">
                    Edit Unit Details
                </h6>
                <hr>
            </div>
            <div class="m-2 flex flex-col">
                <label class="text-black font-bold text-[0.8rem]" for="Unit Name">Unit Name</label>
                <input value="<?= $UnitName ?>" style="background-color: #F2EFE7;" class="text-black w-full px-3 py-0.8 border rounded-md  focus:ring focus:ring-orange-300 outline-none text-sm" type="text" name="New_UnitName" id="">
                <span class="text-sm text-red-600"><?= $New_UnitName_err ?></span>
            </div>
            <div class="m-2 flex flex-col">
                <label class="text-black font-bold text-[0.8rem]" for=" Unit Code">Enter Code</label>
                <input value="<?= $UnitCode_db ?>" style="background-color: #F2EFE7;" class=" text-black w-full px-3 py-0.8 border rounded-md  focus:ring focus:ring-orange-300 outline-none text-sm" type="text" name="New_UnitCode" id="">
                <span class="text-sm text-red-600"><?= $New_UnitCode_err ?></span>
            </div>
            <div class="m-2 flex flex-col">
                <label class="text-black font-bold text-[0.8rem]" for="Lecturer Name">Lecturer Name</label>
                <input value="<?= $UnitLec ?>" style="background-color: #F2EFE7;" class="text-black w-full px-3 py-0.8 border rounded-md  focus:ring focus:ring-orange-300 outline-none text-sm" type="text" name="New_UnitLec" id="">
                <span class="text-sm text-red-600"> <?= $New_UnitLec_err ?></span>
            </div>
            <div class="m-3 flex flex-col">
                <button name="SubmitEditUnit" style="padding-top:4px;padding-bottom:4px;" type="submit" class="font-bold font-times text-[0.8rem]  bg-black rounded-full text-white hover:bg-orange-400 hover:text-black duration-200 ease-in-out px-4 py-1.5  w-full">Submit Edit <i class="fa-solid fa-paper-plane"></i></button>
            </div>
        </form>
    </div>
</div>
<?php
$Admin_content = ob_get_clean();
unset($_SESSION['New_UnitName_err']);
unset($_SESSION['New_UnitCode_err']);
unset($_SESSION['New_UnitLec_err']);
include 'includes/admin.inc.php';
