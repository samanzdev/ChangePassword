<?php

function ValiateFrom($old_password, $new_password, $new_confrim_password)
{
    if (empty($old_password) || empty($new_password) || empty($new_confrim_password)) {
        header("Location:index.php?change-password=empty");
        exit();
    }
    if ($new_password != $new_confrim_password) {
        header("Location:index.php?confrim-password");
        exit();
    }
    header("Location:index.php?change-password-successful");
    exit();
}

if (isset($_POST['submit'])) {
    ValiateFrom($_POST['old_password'], $_POST['new_password'], $_POST['new_confrim_password']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/tailwind.js"></script>
    <script src="js/main.js"></script>
    <title>Change Password</title>
</head>

<body class="antialiased text-slate-500 dark:text-slate-400 bg-white dark:bg-slate-900">
    <div class="w-full max-w-xs m-auto mt-8">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Generate Password
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" type="text">
            </div>
            <div class="flex items-center justify-between">
                <button id="button" onclick="generatePassword()" class="btn1 bg-slate-900 hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-400 focus:ring-offset-2 focus:ring-offset-slate-50 text-white font-semibold h-12 px-6 rounded-lg w-full flex items-center justify-center sm:w-auto dark:highlight-white/20 dark:hover:bg-dark-400" type="button">
                    Generate
                </button>
                <button id="button" onclick="copyPassword()" class="btn2 bg-slate-900 hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-400 focus:ring-offset-2 focus:ring-offset-slate-50 text-white font-semibold h-12 px-6 rounded-lg w-full flex items-center justify-center sm:w-auto dark:highlight-white/20 dark:hover:bg-dark-400" type="button">
                    Copy
                </button>
            </div>
        </div>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <?php
            $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if (strpos($fullUrl, "change-password=empty") == true) {
                echo '<p class="text-red-500 font-bold text-2xl">all fields required.</p><a class="text-red-500 font-bold" href="index.php">Go back!</a><br>';
                exit();
            }
            if (strpos($fullUrl, "confrim-password")) {
                echo '<p class="text-red-500 font-bold text-2xl">no match password.</p><a class="text-red-500 font-bold" href="index.php">Go back!</a><br>';
                exit();
            }
            if (strpos($fullUrl, "change-password-successful")) {
                echo '<p class="text-green-500 font-bold text-1xl">change password successful.</p><a class="text-green-500 font-bold" href="index.php">Go back!</a>';
                exit();
            }
            ?>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="old_password">
                    Old Password <span class="text-red-500">*</span>
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" type="text" name="old_password">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="new_password">
                    New Password <span class="text-red-500">*</span>
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" type="text" name="new_password">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="old_confrim_password">
                    New Confrim Password <span class="text-red-500">*</span>
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" type="text" name="new_confrim_password">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" name="submit" class="bg-slate-900 hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-400 focus:ring-offset-2 focus:ring-offset-slate-50 text-white font-semibold h-12 px-6 rounded-lg w-full flex items-center justify-center sm:w-auto dark:bg-sky-500 dark:highlight-white/20 dark:hover:bg-sky-400" type="button">
                    Submit
                </button>
            </div>
        </form>
    </div>
</body>

</html>