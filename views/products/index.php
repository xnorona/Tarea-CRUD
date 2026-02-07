<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Productos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Catálogo de Productos</h1>
    <a href="index.php?controller=product&action=create">Nuevo Producto</a>
    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($products as $prod): ?>
            <tr>
                <td><?= $prod['id'] ?></td>
                <td><?= $prod['nombre'] ?></td>
                <td><?= $prod['descripcion'] ?></td>
                <td>$<?= $prod['precio'] ?></td>
                <td><?= $prod['stock'] ?></td>
                <td>
                    <a href="index.php?controller=product&action=edit&id=<?= $prod['id'] ?>">Editar</a>
                    <a href="index.php?controller=product&action=delete&id=<?= $prod['id'] ?>" 
                       onclick="return confirm('¿Estás seguro de eliminar este producto?');">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>