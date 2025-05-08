<?php
$title = "Home - EduFeeDocs";
session_start(); // Start session to check login status
ob_start();
include 'includes/header.inc.php';
?>
<!-- Hero Section -->
<div class="w-[95%] mb-[20px] mx-auto flex relative bg-orange-400 items-center">
    <div id="herosection" class="w-[100%] h-[100%] md:w-[80%] md:h-[80%]"
        style="    background-image: url('storage/images/homepage.jpg');
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        min-height:100vh;"></div>
    <div class="item-center md:flex max-w-[350px] max-h-[300px] p-3 justify-center text-center md:rounded-xl absolute bottom-0 md:right-0 md:top-[30%] md:mr-[40px] align-center md:bg-orange-400 bg-white">
        <div class="">
            <h4 class="text-[25px] font-times font-bold text-black">
                Welcome to EduFeeDocs Your Gateway to Smarter Learning!
            </h4>
            <p class="mt-2 text-[17px] font-times">
                Download lecture notes, access updated timetables, and stay ahead in your studies all in one place!
            </p>
            <?php if (isset($_SESSION['username'])): ?>
                <p class="text-green-900 mt-2 font-bold text-sm">Welcome back, <?= htmlspecialchars($_SESSION['name']) ?>!</p>
                <a href="view.php?course=<?= urlencode($_SESSION['Course']) ?>" class="bg-black text-white hover:bg-orange-300 py-2 px-3 font-serif font-bold rounded-full">Go to your course</a>
            <?php else: ?>
                <a href="Login.php" class="bg-black text-white hover:bg-orange-300 py-2 px-3 font-serif font-bold rounded-full">Get started</a>
            <?php endif; ?>
            <hr>
        </div>
    </div>
</div>

<hr class="mt-5">
<div id="Featured" class="flex justify-center text-center items-center">
    <h4 class="flex justify-center text-center text-2xl font-times font-bold">Featured</h4>
</div>

<!-- Featured Section -->
<div class="w-[95%] md:w-[65%] mt-[10px] mx-auto">
    <div class="w-full shadow-lg space-y-4 rounded-md">
        <div class="border">
            <div class="mb-2">
                <?php include 'functions/course.inc.php'; ?>
            </div>
        </div>
    </div>

    <script>
        function toggleContent(header) {
            const content = header.nextElementSibling;
            content.classList.toggle('hidden');
        }
    </script>
</div>

<hr>
<div id="about" class="relative w-full mt-4">
    <!-- Background section -->
    <div id="aboutsection"
        style="
            background-image: url('storage/images/aboutBackground.jpg');
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    min-height:70vh;
                "
        class="w-full flex justify-center items-center relative ">

        <!-- Content Box -->
        <div style="max-width: 350px; background-color: #DCA06D"
            class="absolute text-center rounded-lg shadow-md flex flex-col justify-center items-center p-4">
            <h2 style="color:#3E3F5B;" class="px-4 text-2xl font-bold font-times">About Us</h2>
            <p style="color:#336D82;" class=" mt-2 text-white text-md font-semibold text-[0.9rem]  md:text-[1rem]">
                EduFeeDocs is your ultimate study companion, offering lecture notes, updated timetables, and essential academic resources.
                Stay organized, excel in your studies, and make learning easier all in one place!
            </p>
            <a style="text-decoration: none;" href="Login.php" class="my-4 bg-orange-400 hover:bg-orange-500 text-white font-bold py-2 px-6 rounded-lg">
                Get Started
            </a>
        </div>
    </div>
</div>

<!-- Footer Section -->
<?php
include 'includes/Footer.inc.php';

$content = ob_get_clean();
include 'includes/app.inc.php';
?>