<?php

$title = "Login - EduFreeDocs";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include 'functions/login.inc.php';
if (isset($_SESSION['username_err'])) {
    $username_err = $_SESSION['username_err'];
} else {
    $username_err = "";
}
if (isset($_SESSION['password_err'])) {
    $password_err = $_SESSION['password_err'];
} else {
    $password_err = "";
}
ob_start();
?>
<div style="background-color: #EDE8DC; height:100vh" class="flex flex-col justify-center items-center ">
    <form action="functions/login.inc.php" method="post" class="flex flex-col justify-center items-center bg-white p-4 rounded-lg shadow-md w-[90%] sm:w-[350px]">
        <div class="flex flex-col items-center">
            <img style="width: 80px;height:80px;" class=" rounded-full" src="storage/images/logo.jpeg" alt="Website Logo">
            <h4 class="font-bold font-times text-black text-xl mt-3">Login</h4>
        </div>

        <div class="flex flex-col text-center w-full">
            <div class="mt-2">
                <label class="font-bold block text-left text-1xl font-times">Enter Your Username</label>
                <input name="username" style="padding-top:4px;padding-bottom:4px;" type="text" class="w-full px-3 py-1.5 border rounded-md  focus:ring focus:ring-orange-300 outline-none " placeholder="Francis ...">
                <span style="color: red ;width:fit-content;" class="text-red-600 text-[15px]"><?= $username_err ?></span>
            </div>

            <div class="mt-2">
                <label class="font-bold block text-left text-1xl font-times">Enter Your Password</label>
                <input name="password" style="padding-top:4px;padding-bottom:4px;" type="password" class="w-full px-3 py-1.5 border rounded-md  focus:ring focus:ring-orange-300 outline-none ">
                <span style="color: red;width:fit-content;" class="text-red-600 text-[15px]"><?= $password_err ?></span>
            </div>

            <div class="mt-3">
                <button name="login" style="padding-top:4px;padding-bottom:4px;" class="bg-black rounded-full text-white hover:bg-orange-400 hover:text-black duration-200 ease-in-out px-4 py-1.5 text-lg font-bold w-full">Login</button>
            </div>

            <div class="mt-2 flex justify-between">
                <!-- <a href="#">forgot password</a> -->
                <a href="Register.php" class="text-sm text-blue-500 hover:underline">Register</a>
            </div>
        </div>
    </form>
</div>


<?php
unset($_SESSION['username_err']);
unset($_SESSION['password_err']);
$content = ob_get_clean();

include 'includes/app.inc.php';
