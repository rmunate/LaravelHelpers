---
title: String Character Checks
---

# String Character Checks

The generated [Str class](/usage/default-classes) exposes Laravel's string helpers and the following checks. Each method accepts a string and returns `true` only if it is nonempty and **every character** matches the condition.

| Method | Characters allowed | Example returning `true` | Example returning `false` |
| --- | --- | --- | --- |
| `isAlphanumeric` | Letters and digits | `'abc123'` | `'abc 123'` |
| `isAlpha` | Letters | `'abc'` | `'abc1'` |
| `isControl` | Control characters | `"\n\r"` | `"a\n"` |
| `isDigit` | Decimal digits | `'123'` | `'-123'` |
| `isGraph` | Visible, printable characters | `'abc!23'` | `'abc 23'` |
| `isLower` | Lowercase letters | `'abc'` | `'Abc'` |
| `isPrint` | Printable characters, including spaces | `'abc 23'` | `"abc\n23"` |
| `isPunct` | Printable characters other than spaces, letters, or digits | `'!@#'` | `'a!'` |
| `isSpace` | Whitespace | `" \t"` | `'a '` |
| `isUpper` | Uppercase letters | `'ABC'` | `'ABc'` |
| `isHex` | Hexadecimal digits (`0–9`, `A–F`, `a–f`) | `'1a2B'` | `'1g2B'` |

```php
use App\Helpers\Str;

Str::isDigit('123'); // true
Str::isDigit('');    // false
```

These are PHP [`ctype`](https://www.php.net/manual/en/book.ctype.php) checks. They use the process's character type locale and do not validate Unicode character categories in UTF-8 strings.
