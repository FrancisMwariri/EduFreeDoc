<?php

$title = "EduFreeDocs -Administrator Dashboard";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['userType'])) {
    if ($_SESSION['userType'] != 'administrator') {
        header("Location: Home.php");
        exit();
    }
} else {
    header("Location: Home.php");
}

include 'includes/header.inc.php';
include 'functions/admin_details.inc.php';
include 'functions/Course_details.inc.php';
ob_start();
?>

<div style="width: 100%; height:100%;" class="flex flex-col mx-[2px] ">
    <!-- Admin Details -->
    <div class=" flex justify-center text-center">
        <h5 class="font-times font-bold">
            Admin Details
        </h5>
    </div>
    <div style=" width:100%; background-color:#717b9a;" class="flex flex-col md:flex-row  text-center md:justify-between mx-auto mb-[10px] bg-[#717b9a] rounded-md ease-in-out duration-500 hover:scale-95 shadow-sm">
        <div class="m-[5px] md:p-[15px] rounded-xl ">
            <H6 class="font-times font-bold">User Type</H6>
            <p class="text-[0.8rem]"><?= $userType ?></p>
            <hr class="md:hidden">
        </div>
        <div class="m-[5px] md:p-[15px] rounded-xl">
            <H6 class="font-times font-bold">Admin Name</H6>
            <p class="text-[0.8rem] "><?= $name ?></p>
            <hr class="md:hidden">
        </div>

        <div class="m-[5px] md:p-[15px] rounded-xl">
            <H6 class="font-times font-bold">Admin Course</H6>
            <p class="text-[0.8rem]"><?= $Course ?></p>
            <hr class="md:hidden">
        </div>
        <div class="m-[5px] md:p-[15px] rounded-xl">
            <H6 class="font-times font-bold">Admin Email</H6>
            <p class="text-[0.8rem]"><?= $email ?></p>

        </div>
    </div>
    <!-- Course Details -->
    <div class=" flex justify-center text-center">
        <h5 class="font-times font-bold">
            Course Details
        </h5>
    </div>
    <div style=" width:100%; background-color:#717b9a;" class="flex flex-col md:flex-row  text-center md:justify-between mx-auto bg-[#717b9a] rounded-md ease-in-out duration-500 hover:scale-95 shadow-sm">
        <div class=" md:p-[15px] rounded-xl">
            <H6 class="font-times font-bold">Number of Registered Units</H6>
            <p><?= $NoUnits ?></p>
            <hr class="md:hidden">
        </div>
        <div class=" md:p-[15px] rounded-xl">
            <H6 class="font-times font-bold">Number Registered Members</H6>
            <p><?= $NoUsers ?></p>
            <hr class="md:hidden">
        </div>
        <div class=" md:p-[15px] rounded-xl">
            <H6 class="font-times font-bold">Number Of Uploaded Documents</H6>
            <p><?= $doc_count ?></p>
            <hr class="md:hidden">
        </div>

    </div>
</div>


<?php
$Admin_content = ob_get_clean();

include 'includes/admin.inc.php';
