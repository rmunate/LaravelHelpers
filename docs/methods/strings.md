---
title: String Helper Methods
editLink: true
outline: deep
---

# String Helper Methods

The `Str` class provides various static methods for checking the characteristics of strings. Below is the documentation for each available method.

### `isAlphanumeric`

Checks if a string contains only alphanumeric characters (letters and numbers).

#### Parameters

- `string $string`: The string to check.

#### Returns

- `bool`: `True` if the string is alphanumeric, `false` otherwise.

#### Example

```php
use App\Helpers\Str;

$result = Str::isAlphanumeric('abc123'); // True
$result = Str::isAlphanumeric('abc 123'); // False
```

### `isAlpha`

Checks if a string contains only alphabetic characters (letters).

#### Parameters

- `string $string`: The string to check.

#### Returns

- `bool`: `True` if the string is alphabetic, `false` otherwise.

#### Example

```php
use App\Helpers\Str;

$result = Str::isAlpha('abc'); // True
$result = Str::isAlpha('abc123'); // False
```

### `isControl`

Checks if a string contains control characters.

#### Parameters

- `string $string`: The string to check.

#### Returns

- `bool`: `True` if the string contains control characters, `false` otherwise.

#### Example

```php
use App\Helpers\Str;

$result = Str::isControl("\n\r"); // True
$result = Str::isControl('abc'); // False
```

### `isDigit`

Checks if a string contains only numeric characters (digits).

#### Parameters

- `string $string`: The string to check.

#### Returns

- `bool`: `True` if the string contains only numeric characters, `false` otherwise.

#### Example

```php
use App\Helpers\Str;

$result = Str::isDigit('12345'); // True
$result = Str::isDigit('123a45'); // False
```

### `isGraph`

Checks if a string contains only printable characters excluding spaces.

#### Parameters

- `string $string`: The string to check.

#### Returns

- `bool`: `True` if the string contains only printable characters excluding spaces, `false` otherwise.

#### Example

```php
use App\Helpers\Str;

$result = Str::isGraph('abc123!@#'); // True
$result = Str::isGraph('abc 123'); // False
```

### `isLower`

Checks if a string contains only lowercase alphabetic characters.

#### Parameters

- `string $string`: The string to check.

#### Returns

- `bool`: `True` if the string contains only lowercase characters, `false` otherwise.

#### Example

```php
use App\Helpers\Str;

$result = Str::isLower('abc'); // True
$result = Str::isLower('Abc'); // False
```

### `isPrint`

Checks if a string contains only printable characters.

#### Parameters

- `string $string`: The string to check.

#### Returns

- `bool`: `True` if the string contains only printable characters, `false` otherwise.

#### Example

```php
use App\Helpers\Str;

$result = Str::isPrint('abc123'); // True
$result = Str::isPrint("abc\n123"); // False
```

### `isPunct`

Checks if a string contains only printable characters that are neither spaces nor alphanumeric.

#### Parameters

- `string $string`: The string to check.

#### Returns

- `bool`: `True` if the string contains only punctuation characters, `false` otherwise.

#### Example

```php
use App\Helpers\Str;

$result = Str::isPunct('!@#'); // True
$result = Str::isPunct('abc!'); // False
```

### `isSpace`

Checks if a string contains only whitespace characters.

#### Parameters

- `string $string`: The string to check.

#### Returns

- `bool`: `True` if the string contains only whitespace characters, `false` otherwise.

#### Example

```php
use App\Helpers\Str;

$result = Str::isSpace(' '); // True
$result = Str::isSpace('abc'); // False
```

### `isUpper`

Checks if a string contains only uppercase alphabetic characters.

#### Parameters

- `string $string`: The string to check.

#### Returns

- `bool`: `True` if the string contains only uppercase characters, `false` otherwise.

#### Example

```php
use App\Helpers\Str;

$result = Str::isUpper('ABC'); // True
$result = Str::isUpper('Abc'); // False
```

### `isHex`

Checks if a string contains only hexadecimal characters (digits 0-9 and letters A-F/a-f).

#### Parameters

- `string $string`: The string to check.

#### Returns

- `bool`: `True` if the string contains only hexadecimal characters, `false` otherwise.

#### Example

```php
use App\Helpers\Str;

$result = Str::isHex('1a2b3c'); // True
$result = Str::isHex('1g2h3i'); // False
```