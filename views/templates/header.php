<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Stars Hotel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <header class="bg-yellow-100 p-4 font-semibold">
        <nav class="container mx-auto flex justify-between items-center text-yellow-400">
            <a href="index.php" class="text-lg">
                🌟 All stars
            </a>
            <ul class="flex">
                <li class="ml-4">
                    <?php if (isset($_SESSION["username"])): ?>
                        <a href="account.php">My Account</a>
                </li>
                <li class="ml-4"><a href="logout.php">Logout</a></li>

                <li class="ml-4">
                    <?php if ($_SESSION["role"] == "admin"): ?>
                        <a href="login.php"">Admin</a>
                    <?php endif; ?>
                </li>

                <?php else: ?>
                    <li class="ml-4"><a href="login.php"">Login</a></li>
                    <li class="ml-4 text-yellow-700"><a href="login.php"">Signup</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>