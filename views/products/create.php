<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Producto</title>
</head>
<body>
    <h1>Nuevo Producto</h1>
    
    <?php if(isset($errors) && !empty($errors)): ?>
        <div style="color: red;">
            <?php foreach($errors as $error): echo $error . "<br>"; endforeach; ?>
        </div>
    <?php endif; ?>

    <form action="index.php?controller=product&action=store" method="POST">
        <label>Nombre:</label><br>
        <input type="text" name="nombre" required><br>
        
        <label>Descripción:</label><br>
        <textarea name="descripcion"></textarea><br>
        
        <label>Precio:</label><br>
        <input type="number" step="0.01" name="precio" required><br>
        
        <label>Stock:</label><br>
        <input type="number" name="stock" required><br><br>
        
        <input type="submit" value="Guardar">
        <a href="index.php?controller=product&action=index">Cancelar</a>
    </form>
</body>
</html>