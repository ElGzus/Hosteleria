<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allstar Hostel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php include './views/layouts/navbar.php' ?>
    <main class="container">
        <h1 class="mt-4">Listado de Alojamientos</h1>
        <table class="table table-striped mt-4">
            <thead>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Tipo</th>
                <th>Precio</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                <?php foreach($accommodations as $accommodation){ ?>
                    <tr>
                        <td><?php echo $accommodation['id'] ?></td>
                        <td><?php echo $accommodation['name'] ?></td>
                        <td><?php echo $accommodation['description'] ?></td>
                        <td><?php echo $accommodation['type'] ?></td>
                        <td><?php echo $accommodation['price'] ?></td>
                        <td>
                            <?php if ($accommodation['is_reserved']) { ?>
                                <a href="./index.php?action=unreserve&id=<?php echo $accommodation['id'] ?>" class="btn btn-danger">Eliminar Reservación</a>
                            <?php } else { ?>
                                <a href="./index.php?action=reserve&id=<?php echo $accommodation['id'] ?>" class="btn btn-success">Reservar</a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>
    <?php include './views/layouts/footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
