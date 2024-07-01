<?php include "templates/header.php"; ?>

<h1 class="text-4xl text-yellow-800 text-center font-bold p-8">User sign up</h1>

<section class="flex justify-center items-center">
    <form method="POST" action="/register" class="flex flex-col bg-blend-soft-light text-yellow-800">
        <label for="username" class="font-semibold">Username</label>
        <input type="text" name="username" id="username" class="p-2 mb-2 block w-full outline-yellow-500 rounded-md ring ring-yellow-500 ring-inset">

        <label for="password" class="font-semibold">Password</label>
        <input type="password" name="password" id="password" class="p-2 mb-2 block w-full outline-yellow-500 rounded-md ring ring-yellow-500 ring-inset">

        <label for="email" class="font-semibold">Email</label>
        <input type="email" name="email" id="email" class="p-2 mb-2 block w-full outline-yellow-500 rounded-md ring ring-yellow-500 ring-inset">

        <label for="role" class="font-semibold">Role</label>
        <input type="text" name="role" id="role" class="p-2 mb-2 block w-full outline-yellow-500 rounded-md ring ring-yellow-500 ring-inset">

        <input type="submit" value="Sign up" class="p-2 mt-4 block w-full rounded-md bg-yellow-600 text-white">
    </form>
</section>

<?php include "templates/footer.php"; ?>