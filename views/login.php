<?php include "templates/header.php"; ?>

<article class="flex justify-center items-center">
    <section class="flex justify-between items-center min-h-80 w-1/2 px-4">
        <h1 class="text-4xl text-yellow-800 text-center font-bold p-8">User log in</h1>
        
        <form method="POST" action="" class="w-1/2">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="w-full p-2 mb-2 block w-full outline-yellow-500 rounded-md ring ring-yellow-500 ring-inset">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="w-full p-2 mb-2 block w-full outline-yellow-500 rounded-md ring ring-yellow-500 ring-inset">
            <input type="submit" value="Log in" class="w-full p-2 mt-4 block w-full rounded-md bg-yellow-600 text-white">
        </form>
    </section>
</article>