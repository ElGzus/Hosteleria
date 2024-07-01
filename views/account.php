<?php include "templates/header.php"; ?>

<h1>Welcome, <?php print $_SESSION["username"]; ?></h1>
<h2>My accomodations</h2>

<article>
    <?php while($record = $statement->fetch(PDO::FETCH_ASSOC)): ?>
        <section>
          <p><?php print $record["name"]; ?></p>
          <p><?php print $record["description"]; ?></p>
          <p><?php print $record["location"]; ?></p>
          <img src="<?php print $record["image"]; ?>" alt="Accommodation pic">

          <form action="" method="POST">
            <input type="hidden" name="delete_id" value="<?php print $record["id"]; ?>">
            <input type="submit" value="Delete">
          </form>
        </section>
    <?php endwhile; ?>
</article>

<h2>Add accommodation</h2>
<form action="/account" method="POST">
      <select name="accommodation_id">
            <?php
                $statement = $this->accommodation->readAll();
                while($record = $statement->fetch(PDO::FETCH_ASSOC)):
            ?>
                <option value="<?php print $record["id"]; ?>">"<?php print $record["name"]; ?>"</option>
            <?php endwhile; ?>
      </select>
      <input type="submit" value="Add">
</form>

<?php include "templates/footer.php"; ?>