<?php

$title = "EduFreeDocs - Suprime Administrator Dashboard";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['userType'])) {
    if ($_SESSION['userType'] != 'SupAdministrator') {
        header("Location: Home.php");
        exit();
    }
}

include 'includes/header.inc.php';
include 'functions/SupAdministrator_Details.inc.php';
include 'functions/Admin_System_Details.inc.php';
ob_start();
?>
<div style="width: 100%; height:100%;" class="flex flex-col mx-[3px] ">
    <!-- Sup Admin Details -->
    <div class=" flex justify-center text-center">
        <h5 class="font-times font-bold">
            Suprime Admin Details
        </h5>
    </div>
    <div style=" width:100%; background-color:#717b9a;" class="flex flex-col md:flex-row  text-center md:justify-between mx-auto mb-[10px] bg-[#717b9a] rounded-md ease-in-out duration-500 hover:scale-95 shadow-sm">
        <div class="m-[5px] md:p-[15px] rounded-xl ">
            <H6 class="font-times font-bold">User Type</H6>
            <p class="text-[0.8rem]"><?= $userType_db ?></p>
            <hr class="md:hidden">
        </div>
        <div class="m-[5px] md:p-[15px] rounded-xl">
            <H6 class="font-times font-bold">Admin Name</H6>
            <p class="text-[0.8rem] "><?= $Name_db ?></p>
            <hr class="md:hidden">
        </div>

        <div class="m-[5px] md:p-[15px] rounded-xl">
            <H6 class="font-times font-bold"> Name</H6>
            <p class="text-[0.8rem]"><?= $UserName_db ?></p>
            <hr class="md:hidden">
        </div>
        <div class="m-[5px] md:p-[15px] rounded-xl">
            <H6 class="font-times font-bold"> Email</H6>
            <p class="text-[0.8rem]"><?= $Email ?></p>
        </div>
    </div>
    <!-- System Details -->
    <div class=" flex justify-center text-center">
        <h5 class="font-times font-bold">
            System Details
        </h5>
    </div>
    <div style=" width:100%; background-color:#717b9a;" class="flex flex-col md:flex-row  text-center md:justify-between mx-auto mb-[10px] bg-[#717b9a] rounded-md ease-in-out duration-500 hover:scale-95 shadow-sm">
        <div class="m-[5px] md:p-[15px] rounded-xl ">
            <H6 class="font-times font-bold">Number of Schools</H6>
            <p class="text-[0.8rem]"><?= $Num_Schools ?></p>
            <hr class="md:hidden">
        </div>
        <div class="m-[5px] md:p-[15px] rounded-xl">
            <H6 class="font-times font-bold">Number of Courses</H6>
            <p class="text-[0.8rem] "><?= $Num_Courses ?></p>
            <hr class="md:hidden">
        </div>

        <div class="m-[5px] md:p-[15px] rounded-xl">
            <H6 class="font-times font-bold">Number of Users</H6>
            <p class="text-[0.8rem]"><?= $Num_Students ?></p>
            <hr class="md:hidden">
        </div>
        <div class="m-[5px] md:p-[15px] rounded-xl">
            <H6 class="font-times font-bold">Number of Class Reps</H6>
            <p class="text-[0.8rem]"><?= $Num_Reps ?></p>
            <hr class="md:hidden">
        </div>
        <div class="m-[5px] md:p-[15px] rounded-xl">
            <H6 class="font-times font-bold">Number of Documents</H6>
            <p class="text-[0.8rem]"><?= $Num_Docs ?></p>
        </div>
    </div>
</div>


<?php
$SupAdmin_content = ob_get_clean();

include 'includes/SupAdmin.inc.php';
