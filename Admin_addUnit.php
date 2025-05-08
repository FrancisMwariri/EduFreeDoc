<?php

$title = "EduFreeDocs -Administrator_Upload";

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
include 'functions/admin_addUnit.inc.php';
$UnitName = $UnitCode = $UnitLec = "";
$UnitName_err = $UnitCode_err = $UnitLec_err = "";
if (isset($_SESSION['UnitName_err'])) {
    $UnitName_err = $_SESSION['UnitName_err'];
}
if (isset($_SESSION['UnitCode_err'])) {
    $UnitCode_err = $_SESSION['UnitCode_err'];
}
if (isset($_SESSION['UnitLec_err'])) {
    $UnitLec_err = $_SESSION['UnitLec_err'];
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

        <form action="functions/admin_addUnit.inc.php" method="post" class="flex flex-col justify-center text-center bg-[#608BC1] rounded-md items-center">
            <div style="border-bottom: 1px solid white;" class="flex text-center justify-center w-[100%]">
                <h6 class="text-black font-bold font-times">
                    Register Unit
                </h6>
                <hr>
            </div>
            <div class="m-2 flex flex-col">
                <label class="text-black font-bold text-[0.8rem]" for="Unit Name">Unit Name</label>
                <input style="background-color: #F2EFE7;" class="text-black w-full px-3 py-0.8 border rounded-md  focus:ring focus:ring-orange-300 outline-none text-sm" type="text" name="UnitName" id="">
                <span class="text-sm text-red-600"><?= $UnitName_err ?></span>
            </div>
            <div class="m-2 flex flex-col">
                <label class="text-black font-bold text-[0.8rem]" for=" Unit Code">Enter Code</label>
                <input style="background-color: #F2EFE7;" class=" text-black w-full px-3 py-0.8 border rounded-md  focus:ring focus:ring-orange-300 outline-none text-sm" type="text" name="UnitCode" id="">
                <span class="text-sm text-red-600"><?= $UnitCode_err ?></span>
            </div>
            <div class="m-2 flex flex-col">
                <label class="text-black font-bold text-[0.8rem]" for="Lecturer Name">Lecturer Name</label>
                <input style="background-color: #F2EFE7;" class="text-black w-full px-3 py-0.8 border rounded-md  focus:ring focus:ring-orange-300 outline-none text-sm" type="text" name="UnitLec" id="">
                <span class="text-sm text-red-600"><?= $UnitLec_err ?></span>
            </div>
            <div class="m-3 flex flex-col">
                <button name="AddUnit" style="padding-top:4px;padding-bottom:4px;" type="submit" class="font-bold font-times text-[0.8rem]  bg-black rounded-full text-white hover:bg-orange-400 hover:text-black duration-200 ease-in-out px-4 py-1.5  w-full">Add Unit <i class="fa-solid fa-paper-plane"></i></button>
            </div>
        </form>
    </div>
</div>
<?php
$Admin_content = ob_get_clean();
unset($_SESSION['UnitName_err']);
unset($_SESSION['UnitCode_err']);
unset($_SESSION['UnitLec_err']);
include 'includes/admin.inc.php';