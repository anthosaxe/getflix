<?php
session_start();
?>
<?php
if (isset($_SESSION['error'])) {
    echo "<p class='error'>{$_SESSION['error']}</p>";
    unset($_SESSION['error']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Failflix</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="body-color">
    <nav class="color-class border-gray-200 fixed w-full top-0 left-0 z-50">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
            <a href="./index.php" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="./images/cochon.jpg" class="h-8" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">FailFlix</span>
            </a>
            <div class="flex items-center space-x-6 rtl:space-x-reverse">
                <a href="login.php" class="border text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Login</a>
            </div>
        </div>
    </nav>
    <form class="max-w-sm mx-auto my-5" action="./include/register_process.php" method="post">
        <div class="mb-5">
            <label for="username" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Your username</label>
            <input id="username" name="username" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="JOJO L CROCO" required />
        </div>
        <div class="mb-5">
            <label for="email" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
            <input type="email" id="email" name="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="jojocroco@australia.au" required />
        </div>
        <div class="mb-5">
            <label for="password" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
            <input type="password" id="password" name="password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
        </div>
        <div class="mb-5">
            <label for="repeat-password" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Repeat password</label>
            <input type="password" id="repeat-password" name="confirm_password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
        </div>
        <div class="flex items-start mb-5">
            <div class="flex items-center h-5">
                <input id="terms" type="checkbox" name="newsletter" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" />
            </div>
            <label for="terms" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">subscribe to newsletter</a></label>
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register new account</button>
        <p>Already have an account? Login <a href="login.php" class="mb-4 font-medium text-blue-600 dark:text-blue-500 hover:underline">here</a></p>
    </form>
    <!-- <form action="./include/register_process.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            <label>
                <input type="checkbox" name="newsletter"> Subscribe to newsletter
            </label>
            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="test_connection.php">Login here</a></p> -->
    </div>
    <footer class="bg-white shadow dark:bg-gray-900">
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8 flex justify-between items-center">
            <div class="flex flex-col sm:flex-row items-start">
                <ul class="flex flex-wrap justify-start mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">About</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">Licensing</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="text-sm text-gray-500 dark:text-gray-400">
                © 2024 <a href="#" class="hover:underline">Failflix-corp</a>. All Rights Reserved.
            </div>
        </div>
    </footer>
</body>

</html>