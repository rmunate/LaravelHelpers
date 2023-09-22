<?php

namespace Rmunate\LaravelHelpers\Predefined\Additional;

trait AdditionalHelpersStrings
{
    /**
     * Chequear posibles caracteres alfanuméricos 
     * @param string $string
     * 
     * @return bool
     */
    public function isAlphanumeric(string $string)
    {
        return ctype_alnum($text);
    }

    /**
     * Chequear posibles caracteres alfabéticos
     * @param string $string
     * 
     * @return bool
     */
    public function isAlpha(string $string)
    {
        return ctype_alpha($text);
    }

    /**
     * Chequear posibles caracteres de control
     * @param string $string
     * 
     * @return bool
     */
    public function isControl(string $string)
    {
        return ctype_cntrl($text);
    }

    /**
     * Chequear posibles caracteres numéricos
     * @param string $string
     * 
     * @return bool
     */
    public function isDigit(string $string)
    {
        return ctype_digit($text);
    }

    /**
     * Chequear posibles caracteres imprimibles, con excepción de los espacios
     * @param string $string
     * 
     * @return bool
     */
    public function isGraph(string $string)
    {
        return ctype_graph($text);
    }

    /**
     * Chequear posibles caracteres en minúscula
     * @param string $string
     * 
     * @return bool
     */
    public function isLower(string $string)
    {
        return ctype_lower($text);
    }

    /**
     * Chequear posibles caracteres imprimibles
     * @param string $string
     * 
     * @return bool
     */
    public function isPrint(string $string)
    {
        return ctype_print($text);
    }

    /**
     * Chequear posibles caracteres imprimibles que no son ni espacios en blanco ni caracteres alfanuméricos
     * @param string $string
     * 
     * @return bool
     */
    public function isPunct(string $string)
    {
        return ctype_punct($text);
    }
    
    /**
     * Chequear posibles caracteres de espacio en blanco
     * @param string $string
     * 
     * @return bool
     */
    public function isSpace(string $string)
    {
        return ctype_space($text);
    }

    /**
     * Chequear posibles caracteres de espacio en blanco
     * @param string $string
     * 
     * @return bool
     */
    public function isUpper(string $string)
    {
        return ctype_upper($text);
    }

    /**
     * Chequear posibles caracteres de espacio en blanco
     * @param string $string
     * 
     * @return bool
     */
    public function isHex(string $string)
    {
        return ctype_xdigit($text);
    }

}
