# Estándar creación y uso de ayudantes dentro de (Laravel PHP Framework) | v1.x

![Logotipo](https://github.com/rmunate/PHP2JS/assets/91748598/447112ed-7993-4808-bfb8-fd85da3c0010)

[**----Documentation In English----**](README.md)
## Tabla de Contenido
- [Introducción](#introducción)
- [Instalación](#instalación)
- [Uso](#uso)
- [Llamada a Ayudantes](#llamada-a-ayudantes)
- [Crear una Nueva Categoría](#crear-una-nueva-categoría)
- [Creador](#creador)
- [Licencia](#licencia)

## Introducción
Este es un estándar para la creación y uso de ayudantes (Helpers) dentro de Laravel. Proporciona una forma simple y elegante de ejecutar métodos personalizados desde cualquier clase o vista de tu aplicación.

Orientaremos el uso de Helpers en objetos por categorías.

Durante muchos años he usado Laravel, creo que es el marco de trabajo que mejor vida le da a PHP. Sin embargo, dentro de este marco no se ha estandarizado la creación de los Helpers (Ayudantes), así que decidí crear un estándar e implementarlo en los diferentes sistemas y empresas para los cuales he trabajado.

**¡Ahora lo tienes como librería!**

Es hora de estandarizar cómo crearlos y usarlos.

## Instalación
Para instalar la dependencia a través de Composer, ejecuta el siguiente comando:

```shell
composer require rmunate/laravel_helpers
```

Esto descargará la última versión disponible del paquete.

## Uso
Después de instalar la dependencia en tu proyecto, puedes generar la estructura inicial de los ayudantes ejecutando el siguiente comando:

```shell
php artisan generate:helpers
```

Esto creará una carpeta llamada `Helpers` dentro de `App/`, donde encontrarás clases estándar sugeridas para la creación de tus propios ayudantes.

La estructura de la carpeta `Helpers` será similar a la siguiente:

```css
app/
└── Helpers/
    └── General.php
    └── Strings.php
    └── Arrays.php
    //...
```

Cada clase representa una categoría de ayudantes.
Las clases no traerán métodos, aquí empezarás a definir los que tu aplicación requiera.

Puedes organizar tus ayudantes en diferentes categorías, creando clases dedicadas a cada una de ellas. Por ejemplo, si deseas crear funciones relacionadas con cadenas de texto, puedes utilizar la clase `Strings`.

## Llamada a Ayudantes
Para llamar a los ayudantes desde cualquier lugar de tu aplicación, utiliza la siguiente sintaxis:

- Controladores o Clases:
  ```php
  use Helper;
  
  Helper::categoriaNombreMetodo();
  ```

- Vistas o Componentes:
  ```php
  {{ Helper::categoriaNombreMetodo() }}
  ```

También puedes importar y utilizar directamente la clase de la categoría que requieras, para esto utilizaremos el método `instance()`. Por ejemplo:

```php
use App\Helpers\Strings;

Strings::instance()->nombreMetodo();
```

## Crear una Nueva Categoría
Si deseas crear una nueva categoría de ayudantes, ejecuta el siguiente comando:

```shell
php artisan create:helper NombreCategoria
```
Reemplaza `NombreCategoria` con el nombre deseado para la nueva categoría.

## Creador
- 🇨🇴 Raúl Mauricio Uñate Castro
- Correo electrónico: raulmauriciounate@gmail.com

## Licencia
Este proyecto se encuentra bajo la [Licencia MIT](https://choosealicense.com/licenses/mit/).