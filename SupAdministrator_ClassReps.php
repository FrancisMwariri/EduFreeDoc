<?php

$title = "EduFreeDocs - Suprime Administrator Users";

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
include 'functions/SupAdmin_ClassReps.inc.php';
ob_start();
?>
<div style="width: 80%; height:100%;" class="flex flex-col  mx-auto my-5">
    <?php
    if (isset($_SESSION['Confirm_New_Admin'])) {
    ?>
        <div id="NoDocs" style="max-width: fit-content; margin:5px; background-color:orange; padding-right:7px;padding-left:7px;" class=" mx-auto  flex flex-col m-3 alert-warning rounded-md" role="alert">
            <i class="text-black fa-solid fa-xmark flex text-right justify-end"></i>
            <p class="text-black font-bold font-times px-5"> <?= $_SESSION['Confirm_New_Admin'] ?></p>
        </div>
    <?php

    }
    ?>
    <div class="overflow-x-auto bg-gray-500 shadow-md rounded-lg">
        <table class="min-w-full text-sm text-left text-white border border-gray-300">
            <thead class="bg-gray-100 text-gray-800 uppercase">
                <tr>
                    <th class="px-4 py-2 border">Course</th>
                    <th class="px-4 py-2 border">Name</th>
                    <th class="px-4 py-2 border">Username</th>
                    <th class="px-4 py-2 border">Usertype</th>
                    <th class="px-4 py-2 border">Action</th>
                </tr>
            </thead>
            <tbody class="w-[90%]">
                <?php
                if ($results_get_users) {
                    while ($row_get_users = mysqli_fetch_assoc($results_get_users)) {
                        $userrName = $row_get_users['username'];
                        $Name = $row_get_users['name'];
                        $userType = $row_get_users['userType'];
                        if ($userType === "administrator") {
                            $userType = "ClassRep";
                        } else {
                            $userType = $userType;
                        }
                        $Course = $row_get_users['Course'];
                ?>
                        <tr class=' '>
                            <td class='px-4 py-2 border'><?= htmlspecialchars($Course) ?></td>
                            <td class='px-4 py-2 border'><?= htmlspecialchars($Name) ?></td>
                            <td class='px-4 py-2 border'><?= htmlspecialchars($userrName) ?></td>
                            <td class='px-4 py-2 border'><?= htmlspecialchars($userType) ?></td>
                            <td class='px-4 py-2 border'>
                                <a href="functions/Sub_Admin_Make_Admin.inc.php?UserName=<?= $userrName ?>" type="submit" class="text-black bg-green-300 rounded-md font-bold font-times px-3 py-1  hover:bg-green-600 ease-in-out duration-200 hover:scale-105">Make ClassRep</a>
                            </td>
                        </tr>
                <?php
                    }
                }

                ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    const NoDocs = document.querySelector('#NoDocs');
    const faXmark = document.querySelector('.fa-xmark');

    faXmark.addEventListener('click', () => {
        NoDocs.classList.toggle('hidden');
        <?php
        unset($_SESSION['Confirm_New_Admin']);
        ?>
    });
</script>
<?php
$SupAdmin_content = ob_get_clean();

unset($_SESSION['SchoolName_err']);
include 'includes/SupAdmin.inc.php';
