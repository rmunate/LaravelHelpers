<?php

namespace Rmunate\LaravelHelpers\Predefined\Additional;

trait AdditionalHelpersStrings
{
    /**
     * Chequear posibles caracteres alfanuméricos.
     *
     * @param string $string
     *
     * @return bool
     */
    public function isAlphanumeric(string $string)
    {
        return ctype_alnum($string);
    }

    /**
     * Chequear posibles caracteres alfabéticos.
     *
     * @param string $string
     *
     * @return bool
     */
    public function isAlpha(string $string)
    {
        return ctype_alpha($string);
    }

    /**
     * Chequear posibles caracteres de control.
     *
     * @param string $string
     *
     * @return bool
     */
    public function isControl(string $string)
    {
        return ctype_cntrl($string);
    }

    /**
     * Chequear posibles caracteres numéricos.
     *
     * @param string $string
     *
     * @return bool
     */
    public function isDigit(string $string)
    {
        return ctype_digit($string);
    }

    /**
     * Chequear posibles caracteres imprimibles, con excepción de los espacios.
     *
     * @param string $string
     *
     * @return bool
     */
    public function isGraph(string $string)
    {
        return ctype_graph($string);
    }

    /**
     * Chequear posibles caracteres en minúscula.
     *
     * @param string $string
     *
     * @return bool
     */
    public function isLower(string $string)
    {
        return ctype_lower($string);
    }

    /**
     * Chequear posibles caracteres imprimibles.
     *
     * @param string $string
     *
     * @return bool
     */
    public function isPrint(string $string)
    {
        return ctype_print($string);
    }

    /**
     * Chequear posibles caracteres imprimibles que no son ni espacios en blanco ni caracteres alfanuméricos.
     *
     * @param string $string
     *
     * @return bool
     */
    public function isPunct(string $string)
    {
        return ctype_punct($string);
    }

    /**
     * Chequear posibles caracteres de espacio en blanco.
     *
     * @param string $string
     *
     * @return bool
     */
    public function isSpace(string $string)
    {
        return ctype_space($string);
    }

    /**
     * Chequear posibles caracteres de espacio en blanco.
     *
     * @param string $string
     *
     * @return bool
     */
    public function isUpper(string $string)
    {
        return ctype_upper($string);
    }

    /**
     * Chequear posibles caracteres de espacio en blanco.
     *
     * @param string $string
     *
     * @return bool
     */
    public function isHex(string $string)
    {
        return ctype_xdigit($string);
    }
}
