<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Failflix</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
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

        <main>
            <div class="flex justify-center">
                <h1 class="text-4xl text-center text-white text-extrabold">
                    Disconnected,<br>
                    <p class="text-white">Return to <a href="index.php" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">website</a></p>
                </h1>
            </div>
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