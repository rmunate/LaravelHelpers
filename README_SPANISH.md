# Estándar creación y uso de ayudantes dentro de (Laravel PHP Framework) | v1.1.0
**Es hora de estandarizar como crearlos y usarlos.**

[**----Documentation In English----**](README.md)

![Logotipo](https://github.com/rmunate/PHP2JS/assets/91748598/447112ed-7993-4808-bfb8-fd85da3c0010)

## Creación y uso estándar de ayudantes en el marco de Laravel a través de clases, una forma simple, eficiente y elegante de ejecutar los métodos propios de tu aplicación desde cualquier clase o vista.

- Llama a los ayudantes en las vistas, componentes y clases de tu aplicación sin necesidad de instanciar la clase Helper.
- Organiza tus ayudantes en clases dedicadas a la gestión de sus funciones, míralo como categorías, tendrás todos los Helpers organizados de acuerdo a su uso.
- Instancia de forma estática sin necesidad de crear un objeto para llamar cualquier ayudante.
- Crea las categorías que requiera tu aplicación y personaliza las funciones.
- Si lo deseas, puedes acceder directamente a la clase que contiene tus métodos desde los controladores con un metodo incluido en esta libreria.
- Administra un estándar en el proceso de creación y uso de ayudantes dentro de tu aplicación.

## _Instalación a través de Composer_

```shell
composer requiere rmunate/laravel_helpers
```


## Maneras de Usarlo
Cuando hayas instalado la dependencia dentro de tu proyecto, puedes iniciar la estructura de tus ayudantes a través del comando:

```shell
php artisan generate:helpers
```

Esto creará dentro de tu proyecto una carpeta dentro de `App/` con el nombre `Helpers`, donde encontrarás las clases estándar sugeridas para la creación de los Helpers propios de tú aplicación, lo ideal es que crees los Helpers dependiendo de la categoría de uso .

```css
app/
└── Helpers/
    └── General.php
    └── Strings.php
    └── Arrays.php
    //..

```
Ejemplo, Si vas a crear una función que ajuste cadenas de texto de acuerdo con alguna característica que requiera la aplicación que estas desarrollando, deberías crear el método dentro de la clase `Strings`.

Los métodos que crees dentro de la clase que decidas usar, siempre deben tener su nombre de método comenzando con la primera palabra en 'minúsculas' y desde la segunda en 'mayúsculas'. `(camelCase)`

```php
<?php

namespace App\Helpers;

use Rmunate\LaravelHelpers\BaseHelpers;

class Strings extends BaseHelpers
{
    public function myMethod() {
        // Your Code…
    }
}
```
Ahora que has definido los métodos, puedes llamarlos desde cualquier lugar de tú aplicación con la siguiente sintaxis, colocarás la palabra `Helper` seguida de la llamada estática `::` y luego pondrás el nombre de la categoría de ayuda en minúsculas, para este ejemplo `strings` y finalmente el nombre del método en `“PascalCase”`.

Ejemplo de uso del método `myMethod` .

Controladores o Clases:

```php

//Strings es la clase, así que pondremos todo su nombre en mionuscula.
//Luego desde la segunda Palabra empezaremos con mayúscula.
Helper::stringsMyMethod();
```
Vistas o componentes:

```php
{{ Helper::stringsMyMethod() }}
```

De la misma manera, dado que el lugar donde escribes los ayudantes es una clase, puede llamar directamente a la clase que necesitas extendiendola o importando su uso, para este propósito se incluye el método `instance()`, puedes usarlo de la siguiente forma:

```php
//Importas el uso de la clase.
use App\Helpers\Strings;

//A traves de este llamo estatico puedes llamar los metodos directamente.
Strings::instance()->myMethod();
```
¿Quieres una categoría que no está en las clases provistas?, ¡Fácil! Simplemente ejecute el siguiente comando para crear la nueva categoría:

```shell
# replace "Category" with the name you require
php artisan create:helper Category
```
Una forma más eficiente, clara, limpia y elegante de crear y gestionar tus propias funciones.

## Creador
- 🇨🇴Raúl Mauricio Uñate Castro. (raulmauriciounate@gmail.com)

[![Licencia MIT](https://img.shields.io/badge/License-MIT-green.svg)](https://choosealicense.com/licenses/mit/)
