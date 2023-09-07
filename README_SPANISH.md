# Estándar para la Creación y Uso de Ayudantes en Laravel PHP Framework | v2.x

⚙️ Esta librería es compatible con versiones de Laravel 8.0 y superiores ⚙️

[![Laravel 8.0+](https://img.shields.io/badge/Laravel-8.0%2B-orange.svg)](https://laravel.com)
[![Laravel 9.0+](https://img.shields.io/badge/Laravel-9.0%2B-orange.svg)](https://laravel.com)
[![Laravel 10.0+](https://img.shields.io/badge/Laravel-10.0%2B-orange.svg)](https://laravel.com)

![Logo-laravel_helpers](https://github.com/alejandrodiazpinilla/LaravelHelpers/assets/51100789/196c643d-a5f7-4c23-be17-275610608fef)

📖 [**DOCUMENTATION IN ENGLISH**](README.md) 📖

## Tabla de Contenidos

- [Introducción](#introducción)
- [Instalación](#instalación)
- [Uso](#uso)
  - [Cargar Categorias Por Defecto](#cargar-categorias-por-defecto)
  - [Crear una Nueva Categoría](#crear-una-nueva-categoría)
  - [Estandar Creación Nuevo Helper](#estandar-creación-nuevo-helper)
  - [Llamada De Ayudantes](#llamada-de-ayudantes)
  - [Invocar los Metodos ya Disponibles en Laravel](#invocar-los-métodos-ya-disponibles-en-laravel)
- [Nuevos Ayudantes Por Categoria](#nuevos-ayudantes-por-categoria)
- [¿Cómo Contribuir?](#cómo-contribuir)
- [Creador](#creador)
- [Licencia](#licencia)

## Introducción

Durante muchos años he usado Laravel, creo que es el marco de trabajo que mejor vida le da a PHP. Sin embargo, dentro de este marco no se ha estandarizado la creación de los Helpers (Ayudantes), así que decidí crear un estándar e implementarlo en los diferentes sistemas y empresas para los cuales he trabajado, a hoy muchos colegas han decidido apoyar esta iniciativa y crear un paquete que se vuelva una caracteristica de gran poder en Laravel.

Nuestra solución ofrece una manera simple, eficiente y elegante de ejecutar los métodos personalizados de tu aplicación desde cualquier clase o vista, lo que hace que el desarrollo sea mucho mas sencillo. Mejora tu proyecto Laravel manteniendo la elegancia y la limpieza de tu codigo con este paquete.

Hemos orientado todo el uso de Helpers a clases y lo mas importante, hemos centralizado los ayudantes ya existentes en Laravel a traves de las categorias de este paquete, incluimos las funcionalidades nativas de Laravel accecibles a traves de clases como lo son `Str::` y `Arr::` los demas ayudantes que no se acceden con clases sino como funciones, se deberán seguir usando de la forma como lo presenta la documentacion oficial de Laravel.

Es hora de estandarizar cómo crear y usar ayudantes en nuestros proyectos.

## Instalación

Para instalar la dependencia a través de **composer**, ejecuta el siguiente comando:

```shell
composer require rmunate/laravel_helpers
```

Esto descargará la última versión disponible del paquete.
Desde la version +2.0 se inicio con la consolidacion de diversas nuevas soluciones que a la fecha no estan incluidas en el codigo fuente del marco. Tambien puedes aportar tus Helpers, de acuerdo al apartado de como aportar.

## Uso

### Cargar Categorias Por Defecto

Después de instalar la dependencia en tu proyecto, puedes generar la estructura inicial de los ayudantes ejecutando el siguiente comando:

```shell
php artisan generate:helpers
```

Esto creará una carpeta llamada `Helpers` dentro de la carpeta `app\`, donde encontrarás clases estándar sugeridas para la creación de tus propios ayudantes.
La estructura de la carpeta `Helpers` será la siguiente:

```css
app/
└── Helpers/
    └── DateTime.php
    └── File.php
    └── General.php
    └── Html.php
    └── Security.php
    └── Strings.php
    //...
```

Cada clase representa una categoría de ayudantes.
Estas clases traeran por defecto la importacion de dos `traits`, los cuales permitiran usar los helpers ya existentes en el marco de Laravel, asi como los nuevos ayudantes que ofrezcamos como paquete.
En estas clases, podrás iniciar a definir los metodos que serán propios de tu aplicacion, luego podras invocar su uso de una manera muy simple.

### Crear Una Nueva Categoria

Si deseas crear una nueva categoría de ayudantes, ejecuta el siguiente comando:

```shell
php artisan create:helper NombreCategoria
```

Reemplaza `NombreCategoria` con el nombre deseado para la nueva categoría. Este nombre no podrá contener números, acentos o caracteres especiales.
Esto creará un nuevo archivo en la ruta `App\Helpers\NombreCategoria.php` donde podras empezar a definir los metodos que desees.

### Estandar Creación Nuevo Helper
A continuacion crearemos un ayudante de ejemplo para que puedas tener un mejor entendimiento del estandar que manejaremos en las creaciones de tus propias soluciones.
- Los metodos deben ser `public`.
- No se sugiere definir metodos `static`
- No se sugiere definir metodos `protected`
- No se sugiere definir constantes o propiedades dentro de la clase ya que los metodos seran de uso independiente.
- El nombre del metodo siempre debe ir con la primer palabra en minuscula y desde la segunda iniciar con mayuscula sin caracteres especiales.

```php
class DateTime extends BaseHelpers
{
    use NativeHelpersDateTime, AdditionalHelpersDateTime;
    
    /**
     * Este ejemplo de Helper, servirá para saber si una fecha dada es perteneciente al dia Lunes.
     *
     * @param string $fecha
     * @return bool
     */
    public function esLunes($fecha)
    {
      return date('N', strtotime($fecha)) == 1;
    }
}
```

### Llamada De Ayudantes

Para llamar a los ayudantes desde cualquier lugar de tu aplicación, utiliza la siguiente sintaxis:

**Controladores o Clases:**
```php
/**
 * Sintaxis:
 * Primer Palabra => nombre completo de la clase en minuscula
 * Desde La Segunda Palabra => nombre del metodo iniciando cada palabra en mayuscula
 */
Helper::categoriaNombreMetodo();

/**
 * Por ejemplo, para invocar el metodo de ejemplo de este manual:
 */
Helper::datetimeEsLunes('2023-08-28');

```

**Vistas o Componentes:**
```php
{{ Helper::categoriaNombreMetodo() }}
// {{ Helper::datetimeEsLunes('2023-08-28') }}
```

También puedes importar y utilizar directamente la clase de la categoría que requieras, para esto utilizaremos el metodo `helpers()` o `helper()`. Por ejemplo:

```php
use App\Helpers\DateTime;

DateTime::helpers()->esLunes('2023-08-28');
// DateTime::helper()->esLunes('2023-08-28');
```

### Invocar los metodos ya disponibles en Laravel
Si requieres emplear cualquiera de las soluciones actualmente vigentes en la documentacion oficial de laravel (https://laravel.com/docs/10.x/helpers), podras hacerlo de la siguiente forma:

*Ten presente que solo se tiene acceso a los metodos que se invocan a traves de clases Str:: y Arr::*

**Ejemplo Uso Ayudantes De Arreglos** 

Ejemplo uso `Arr::exists();`

```php
$array = ['name' => 'John Doe', 'age' => 17];

/* Forma nativa de laravel */
Arr::exists($array, 'name');

/* Metodo a traves de la clase de Helpers */
Arrays::helpers()->exists($array, 'name');

/* Metodo suministrado para estandarizar el llamado desde cualquier lugar */
Helper::arraysExists($array, 'name');

```

**Ejemplo Uso Ayudantes De Strings** 

Ejemplo uso `Str::uuid();`

```php
/* Forma nativa de laravel */
Str::uuid();

/* Metodo a traves de la clase de Helpers */
Strings::helpers()->uuid();

/* Metodo suministrado para estandarizar el llamado desde cualquier lugar */
Helper::stringsUuid();
```

### Nuevos Ayudantes Por Categoria

Estaremos progresivamente agregando soluciones para tus proyectos...

## ¿Como Contribuir?
Tu contribucion es muy importante en este paquete, el proceso de contribucion es simple. Puedes crear un `fork` de este proyecto con total confianza, luego cuando ya tengas la bifurcacion en tu perfil, podras empezar a aportar los nuevos metodos que consideres utiles en los `traits` que se encuentran dentro de la ruta `src/Predefined/Additional/` recuerda siempre comentariar de acuerdo al estandar phpDoc cada uno de los metodos que sugieras, luego aplica un Pull Request a la rama principal de este repositorio.
Estaremos comentando tus aportes y aceptando esas soluciones que esten correctamente construidas.
Por ultimo en el Readme, debes crear dentro de `Nuevos Ayudantes Por Categoria` el fragmento de uso de esa solucion.
Tu apoyo es invaluable. ✨

## Creador

- 🇨🇴 Raúl Mauricio Uñate Castro
- Correo electrónico: raulmauriciounate@gmail.com

## Licencia

Este proyecto se encuentra bajo la [Licencia MIT](https://choosealicense.com/licenses/mit/).

🌟 ¡Apoya Mis Proyectos! 🚀

¡Realiza las contribuciones que veas necesarias, el código es totalmente tuyo. Juntos podemos hacer cosas asombrosas y mejorar el mundo del desarrollo. Tu apoyo es invaluable. ✨

Si tienes ideas, sugerencias o simplemente deseas colaborar, ¡estamos abiertos a todo! ¡Únete a nuestra comunidad y forma parte de nuestro viaje hacia el éxito! 🌐👩‍💻👨‍💻
