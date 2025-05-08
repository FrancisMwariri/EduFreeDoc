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
include 'functions/Uploads_Available_Units.inc.php';
include 'functions/Files_Upload.inc.php';

ob_start();
?>
<div class="flex justify-center w-full ">
    <div class="w-full max-w-md p-1 flex items-center">
        <form action="functions/Files_Upload.inc.php" method="post" enctype="multipart/form-data" class="space-y-5 bg-[#608BC1] rounded-xl shadow-md justify-center items-center">
            <div class="p-1">
                <h5 class="text-[1.1rem] font-bold text-black text-center font-times">Upload Documents</h5>
            </div>

            <div class="pb-2 mx-1 text-center">
                <label for="UnitName" class="block text-[1rem] font-times font-semibold text-black mb-2">Select Unit</label>
                <select name="UnitCode" id="" class="text-black w-full border rounded px-1 py-0.5 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                    <option disabled selected>Select a unit</option>
                    <?php
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $UnitName = $row["UnitName"];
                            $UnitCode = $row["UnitCode"];
                    ?>
                            <option value="<?= $UnitCode ?>"><?= $UnitName ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="p-2 text-center">
                <label for="file" class="block text-[1rem] font-semibold mb-2 font-times text-black">Select File(s)</label>
                <input type="file" name="file[]" id="file" class="w-full border border-gray-300 rounded px-1 py-0.5 focus:outline-none focus:ring-2 focus:ring-blue-400" multiple>
            </div>

            <div class="text-center p-2">
                <button name="Upload" type="submit" class="font-bold font-times text-[1rem]  bg-black rounded-full text-white hover:bg-orange-400 hover:text-black duration-200 ease-in-out px-4 py-1.5  w-full">Upload <i class="fa-solid fa-cloud-arrow-up"></i></i></button>
            </div>
        </form>
    </div>
</div>
<?php
$Admin_content = ob_get_clean();

include 'includes/admin.inc.php';
