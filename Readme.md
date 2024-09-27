# Proyecto de Gestión en PHP

## ANTES DE COMENZAR RECUERDE IMPORTAR LA BASE DE DATOS QUE SE ENCUENTRA EN LA CARPETA database EN EL phpMyadmin PARA EL FUNCIONAMIENTO ADECUADO DEL PROYECTO :)

Este proyecto consiste en un sistema de gestión básico desarrollado en **PHP** utilizando el paradigma de **Programación Orientada a Objetos (POO)**. El sistema gestiona diferentes entidades como **Personas**, **Clientes**, **Vendedores**, **Empresas**, **Productos**, y **Facturas**. A continuación, se detalla la arquitectura y las decisiones clave tomadas durante el desarrollo.

## Decisiones Técnicas

### 1. Uso de PDO sobre MySQLi

Para la conexión a la base de datos se decidió usar **PDO (PHP Data Objects)** en lugar de **MySQLi** por varias razones importantes:

- **Compatibilidad con múltiples bases de datos**: PDO soporta no solo MySQL, sino también otros sistemas como PostgreSQL, SQLite, etc. Esto hace que la aplicación sea más flexible a futuros cambios en el sistema de gestión de bases de datos.
- **Seguridad**: PDO permite el uso de **sentencias preparadas**, lo que previene vulnerabilidades como las **inyecciones SQL**, algo crucial al manejar datos sensibles.
- **Simplicidad y Mantenibilidad**: Aunque PDO puede parecer más verboso que MySQLi, permite escribir código más limpio y fácil de mantener.

Ejemplo de una consulta usando PDO:

```php
public function consultar()
{
    $sql = "SELECT * FROM Persona";
    $stmt = $this->pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

```

El manejo de rutas en el sistema se hace de manera manual utilizando un único archivo index.php, que actúa como enrutador principal. Las rutas determinan qué controlador se va a cargar en función de los parámetros enviados a través de la URL.

```php
$action = $_REQUEST['action'] ?? 'index';
$controller = $_REQUEST['page'] ?? '';

switch ($controller) {
    case 'persona':
        require_once './controller/PersonaController.php';
        break;
    case 'cliente':
        require_once './controller/ClienteController.php';
        break;
    // Otros controladores...
    default:
        echo "<h1>Bienvenido al sistema de gestión</h1>";
        echo "<a href='index.php?page=persona'>Gestionar Personas</a><br>";
        // Otros enlaces...
        break;
}
```

La estructura del proyecto utiliza varios conceptos de POO en PHP:

- **Herencia**:  La clase base Persona es heredada por otras clases como Cliente y Vendedor. Esto permite reutilizar código y evitar duplicación.
- **Clases Abstractas**:  La clase Persona es abstracta y no puede ser instanciada directamente. Esto asegura que solo se puedan crear objetos de clases derivadas como Cliente o Vendedor.
- **Polimorfismo**:Cada subclase puede implementar su propia versión del método mostrarInformacion(), haciendo que el comportamiento varíe dependiendo del tipo de persona.

### 2.Uso de Herramientas de IA y Consultas Web
Durante el desarrollo del proyecto, utilicé herramientas de Inteligencia Artificial (IA) como **ChatGPT** y **GitHub Copilot** para obtener sugerencias de código y resolver problemas comunes. Esto me permitió mejorar la eficiencia y aprender buenas prácticas en tiempo real.

### 3.HTML Y CSS
Se implementaron vistas HTML sencillas junto con CSS para mejorar la apariencia del sistema de gestión. Aunque el foco del proyecto está en PHP, es importante que el sistema sea accesible y fácil de usar.
