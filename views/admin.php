<?php include "templates/header.php"; ?>

<h1>Add accommodations</h1>
<form action="/admin" method="POST">
    <label for="name">Name</label>
    <input type="text" name="name" id="name">
    <label for="description">Description</label>
    <input type="text" name="description" id="description">
    <label for="location">Location</label>
    <input type="text" name="location" id="location">
    <label for="image">Image</label>
    <input type="text" name="image" id="image">
    <input type="submit" value="Add">
</form>

<?php include "templates/footer.php"; ?>