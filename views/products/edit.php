<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Editar Producto</h1>
    <form action="index.php?controller=product&action=update" method="POST">
        <input type="hidden" name="id" value="<?= $currentProduct['id'] ?>">
        
        <label>Nombre:</label><br>
        <input type="text" name="nombre" value="<?= $currentProduct['nombre'] ?>" required><br>
        
        <label>Descripción:</label><br>
        <textarea name="descripcion"><?= $currentProduct['descripcion'] ?></textarea><br>
        
        <label>Precio:</label><br>
        <input type="number" step="0.01" name="precio" value="<?= $currentProduct['precio'] ?>" required><br>
        
        <label>Stock:</label><br>
        <input type="number" name="stock" value="<?= $currentProduct['stock'] ?>" required><br><br>
        
        <input type="submit" value="Actualizar">
        <a href="index.php?controller=product&action=index">Cancelar</a>
    </form>
</body>
</html>