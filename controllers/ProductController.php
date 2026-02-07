<?php
// CORRECCIÓN: Usamos __DIR__ para generar rutas absolutas y evitar errores de "Archivo no encontrado"
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Product.php';

class ProductController {
    private $db;
    private $product;

    public function __construct() {
        // Ahora PHP encontrará la clase Database sin problemas
        $database = new Database();
        $this->db = $database->getConnection();
        $this->product = new Product($this->db);
    }

    public function index() {
        $stmt = $this->product->read();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // También corregimos la ruta de la vista por seguridad
        require __DIR__ . '/../views/products/index.php';
    }

    public function create() {
        require __DIR__ . '/../views/products/create.php';
    }

    public function store() {
        if ($_POST) {
            // Validaciones
            $errors = [];
            // Verificamos si los campos existen antes de validarlos para evitar "Undefined index"
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
            $precio = isset($_POST['precio']) ? $_POST['precio'] : 0;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : 0;

            if (strlen($nombre) < 3) $errors[] = "El nombre debe tener al menos 3 caracteres.";
            if ($precio <= 0) $errors[] = "El precio debe ser mayor a 0.";
            if ($stock < 0) $errors[] = "El stock no puede ser negativo.";

            if (empty($errors)) {
                $this->product->nombre = $nombre;
                $this->product->descripcion = $_POST['descripcion'];
                $this->product->precio = $precio;
                $this->product->stock = $stock;

                if ($this->product->create()) {
                    header("Location: index.php?controller=product&action=index");
                    exit(); // Buena práctica: detener el script después de redireccionar
                }
            } else {
                // Pasamos los errores a la vista
                require __DIR__ . '/../views/products/create.php';
            }
        }
    }

    public function edit() {
        if (isset($_GET['id'])) {
            $this->product->id = $_GET['id'];
            $currentProduct = $this->product->show();
            require __DIR__ . '/../views/products/edit.php';
        }
    }

    public function update() {
        if ($_POST) {
            $this->product->id = $_POST['id'];
            $this->product->nombre = $_POST['nombre'];
            $this->product->descripcion = $_POST['descripcion'];
            $this->product->precio = $_POST['precio'];
            $this->product->stock = $_POST['stock'];

            if ($this->product->update()) {
                header("Location: index.php?controller=product&action=index");
                exit();
            }
        }
    }

    public function delete() {
        if (isset($_GET['id'])) {
            $this->product->id = $_GET['id'];
            if ($this->product->delete()) {
                header("Location: index.php?controller=product&action=index");
                exit();
            }
        }
    }
}
?>