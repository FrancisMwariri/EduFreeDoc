<?php

$title = "Register - EduFreeDocs";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include 'functions/register.inc.php';
include 'functions/Course_Registration.inc.php';
$name = $username = $email = $Course = $password = $confirm_password = "";

$name_err = $username_err = $email_err = $Course_err = $password_err = $confirm_password_err = "";
if (isset($_SESSION['name_err'])) {
    $name_err = $_SESSION['name_err'];
}
if (isset($_SESSION['username_err'])) {
    $username_err = $_SESSION['username_err'];
}
if (isset($_SESSION['email_err'])) {
    $email_err = $_SESSION['email_err'];
}
if (isset($_SESSION['Course_err'])) {
    $Course_err = $_SESSION['Course_err'];
}
if (isset($_SESSION['password_err'])) {
    $password_err = $_SESSION['password_err'];
}
if (isset($_SESSION['confirm_password_err'])) {
    $confirm_password_err = $_SESSION['confirm_password_err'];
}

ob_start();
?>
<div style="background-color: #EDE8DC; height:100%;padding-bottom: 20px;padding-top: 20px" class="flex flex-col justify-center items-center ">
    <form action="" method="post" class="flex flex-col justify-center items-center bg-white p-4 rounded-lg shadow-md w-[90%] sm:w-[350px]">
        <div class="flex flex-col items-center">
            <img style="width: 80px;height:80px;" class=" rounded-full" src="storage/images/logo.jpeg" alt="Website Logo">
            <h4 class="font-bold font-times text-black text-xl mt-3">Register</h4>
        </div>

        <div class="flex flex-col text-center w-full">
            <div class="mt-2">
                <label class="font-bold block text-left text-1xl font-times">Enter Your Full Name</label>
                <input name="name" value="<?= $name ?>" style="padding-top:4px;padding-bottom:4px;" type="text" class=" w-full px-4 py-1.5 border rounded-md  focus:ring focus:ring-orange-300 outline-none text-sm" placeholder="Francis ..">
                <span style="color: red" class="text-red-600 text-[15px]"><?= $name_err ?></span>
            </div>

            <div class="mt-2">
                <label class="font-bold block text-left text-1xl font-times">Enter Your Username</label>
                <input name="username" value="<?= $username ?>" style="padding-top:4px;padding-bottom:4px;" type="text" class="w-full px-3 py-1.5 border rounded-md  focus:ring focus:ring-orange-300 outline-none " placeholder="Francis123....">
                <span style="color: red" class="text-red-600 text-[15px]"><?= $username_err ?></span>
            </div>

            <div class="mt-2">
                <label class="font-bold block text-left text-1xl font-times">Enter Your Email</label>
                <input name="email" value="<?= $email ?>" style="padding-top:4px;padding-bottom:4px;" type="email" class="w-full px-3 py-1.5 border rounded-md  focus:ring focus:ring-orange-300 outline-none ">
                <span style="color: red" class="text-red-600 text-[15px]"><?= $email_err ?></span>
            </div>

            <div class="mt-2">
                <label class="font-bold block text-left text-1xl font-times">Choose Your Course</label>
                <select style="padding-top:4px;padding-bottom:4px; color:black;" name="Course" class="text-1xl font-times w-full px-3 py-1.5 border rounded-md  focus:ring focus:ring-orange-300 outline-none ">
                    <option disabled selected>Select Your Course</option>
                    <?php
                    if ($results) {
                        while ($row = mysqli_fetch_assoc($results)) {
                            $Course = $row['Course'];
                    ?>
                            <option class="text-1xl font-times" value="<?= $Course ?>"><?= $Course ?></option>

                    <?php
                        }
                    }

                    ?>
                </select>
                <span style="color: red" class="text-red-600 text-[15px]"><?= $Course_err ?></span>
            </div>

            <div class="mt-2">
                <label class="font-bold block text-left text-1xl font-times">Enter Your Password</label>
                <input name="password" style="padding-top:4px;padding-bottom:4px;" type="password" class="w-full px-3 py-1.5 border rounded-md  focus:ring focus:ring-orange-300 outline-none ">
                <span style="color: red" class="text-red-600 text-[15px]"><?= $password_err ?></span>
            </div>

            <div class="mt-2">
                <label class="font-bold block text-left text-1xl font-times">Confirm Your Password</label>
                <input name="confirm_password" style="padding-top:4px;padding-bottom:4px;" type="password" class="w-full px-3 py-1.5 border rounded-md  focus:ring focus:ring-orange-300 outline-none ">
                <span style="color: red" class="text-red-600 text-[15px]"><?= $confirm_password_err ?></span>
            </div>

            <div class="mt-3">
                <button name="register" style="padding-top:4px;padding-bottom:4px;" class="bg-black rounded-full text-white hover:bg-orange-400 hover:text-black duration-200 ease-in-out px-4 py-1.5 text-lg font-bold w-full">Register</button>
            </div>

            <div class="mt-2 flex justify-between">
                <a href="Login.php" class="text-sm text-blue-500 hover:underline">Login</a>
            </div>
        </div>
    </form>
</div>


<?php
$content = ob_get_clean();
unset($_SESSION['name_err']);
unset($_SESSION['username_err']);
unset($_SESSION['email_err']);
unset($_SESSION['Course_err']);
unset($_SESSION['password_err']);
unset($_SESSION['confirm_password_err']);
include 'includes/app.inc.php';
