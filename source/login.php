<?php
include "./include/login_process.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./css/style.css">
    <title>Failflix</title>
</head>

<body>

    <div class="flex flex-col h-screen justify-between">
        <header>
            <nav class="color-class border-gray-200 fixed w-full top-0 left-0 z-50 bg-gray-900">
                <div class="container mx-auto p-4">
                    <div class="flex flex-wrap justify-between items-center">
                        <a href="./index.php" class="flex items-center space-x-3 rtl:space-x-reverse">
                            <img src="./images/cochon.jpg" class="h-8" />
                            <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">FailFlix</span>
                        </a>
                    </div>
                </div>
            </nav>
        </header>

        <main class="mb-auto h-10">
            <form class="max-w-sm mx-auto my-5" method="post" action="login.php">
                <div class="mb-5">
                    <label for="username" class="block mb-1 text-sm font-medium text-white">Username</label>
                    <input id="username" name="username" value="<?php echo $savedUsername; ?>" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
                </div>
                <div class="mb-5">
                    <label for="password" class="block mb-1 text-sm font-medium text-white">Password</label>
                    <input type="password" id="password" name="password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
                </div>
                <div class="flex items-start mb-5">
                    <div class="flex items-center h-5">
                        <input id="terms" type="checkbox" name="newsletter" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" />
                    </div>
                    <label for="terms" class="ms-2 text-sm font-medium text-gray-300">Remember Me</a></label>
                </div>
                <button type="submit" class="mb-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Log In</button>
                <p class="text-white">No account? Register <a href="register.php" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">here</a></p>
            </form>

        </main>


        <footer class="shadow bg-gray-900">
            <div class="container mx-auto p-4 md:py-8">
                <div class="flex flex-col sm:flex-row justify-between items-center">
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
                    <div class="text-sm text-gray-500 dark:text-gray-400">
                        © 2024 <a href="#" class="hover:underline">Failflix-corp</a>. All Rights Reserved.
                    </div>
                </div>
            </div>
        </footer>

    </div>

</body>

</html>