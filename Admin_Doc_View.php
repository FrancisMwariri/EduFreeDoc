<?php

$title = "EduFreeDocs -Administrator_Documents_View";

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
include 'functions/admin_doc_view.inc.php';
ob_start();
?>
<div class=" w-[95%] md:w-[65%] mt-[10px] mx-auto">
    <div class="w-full shadow-lg rounded-xl space-y-4">
        <div class="flex justify-center">
            <h5 class="text-[1.2rem] font-times font-bold text-center">Documents as per unit</h5>
        </div>
        <?php
        if (isset($_SESSION['Delete_Message'])) {
        ?>
            <div style="background-color: green;" id="Success_Delete" class="bg-green-500 rounded-sm">
                <i class="text-white font-bold fa-solid fa-xmark flex justify-end pt-2 pe-2 cursor-pointer"></i>
                <p class="font-times flex text-center justify-center ">
                    <?= $_SESSION['Delete_Message'] ?>
                </p>
            </div>
        <?php
        }
        ?>
        <div class="border rounded-md">
            <?php
            $sql_UnitName = "SELECT * FROM units WHERE Course = ?";
            $stmt_UnitName = mysqli_prepare($con, $sql_UnitName);
            mysqli_stmt_bind_param($stmt_UnitName, "s", $Course);
            mysqli_stmt_execute($stmt_UnitName);
            $result_UnitName = mysqli_stmt_get_result($stmt_UnitName);

            if ($result_UnitName) {
                while ($row_UnitName = mysqli_fetch_assoc($result_UnitName)) {
                    $UnitName = $row_UnitName['UnitName'];
            ?>
                    <div class="my-[4px]">
                        <div onclick="toggleContent(this)" class="cursor-pointer bg-blue-300 px-2 py-1 text-blue-800 text-[15px] font-bold font-times rounded-t-md">
                            <?= $UnitName ?>
                        </div>

                        <?php
                        $sql_Unit_Docs = "SELECT * FROM libraries WHERE UnitName = ?";
                        $stmt_Unit_Docs = mysqli_prepare($con, $sql_Unit_Docs);
                        mysqli_stmt_bind_param($stmt_Unit_Docs, 's', $UnitName);
                        mysqli_stmt_execute($stmt_Unit_Docs);
                        $results_Unit_Docs = mysqli_stmt_get_result($stmt_Unit_Docs);

                        if ($results_Unit_Docs && mysqli_num_rows($results_Unit_Docs) > 0) {
                            echo '<div class="content pt-[5px] hidden text-white ">';
                            while ($row_Unit_Doc = mysqli_fetch_assoc($results_Unit_Docs)) {
                                $DocName = $row_Unit_Doc['DocName'];

                        ?>
                                <div class="flex justify-between items-center m-[0.5rem] rounded-md border-b-2 border-gray-400 ">
                                    <p class="text-[0.8rem] font-times text-white">
                                        <?= htmlspecialchars($DocName) ?>
                                    </p>
                                    <a href="functions/Admin_doc_delete.inc.php?DocName=<?= $DocName ?>" class="text-[13px] text-white font-times  bg-red-500 px-2 py-1 rounded-md ease-in-out duration-200 hover:bg-red-600">
                                        Delete
                                    </a>
                                </div>

                        <?php
                            }
                            echo '</div>';
                        }
                        ?>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</div>

<script>
    const Success_Delete = document.querySelector('#Success_Delete');
    const faXmark = document.querySelector('.fa-xmark');

    faXmark.addEventListener('click', () => {
        Success_Delete.classList.toggle('hidden');
        <?php
        unset($_SESSION['Delete_Message']);
        ?>
    });


    function toggleContent(header) {
        const allContents = document.querySelectorAll('.content');

        // Hide all sections
        allContents.forEach(content => content.classList.add('hidden'));

        const content = header.nextElementSibling;

        // Show the clicked one if it was hidden
        if (content.classList.contains('hidden')) {
            content.classList.remove('hidden');
        }
    }
</script>

</div>
<?php

$Admin_content = ob_get_clean();

include 'includes/admin.inc.php';
