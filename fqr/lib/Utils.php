<?php

declare(strict_types=1);

namespace lib;

use DateTime;
use Exception;
use Illuminate\Support\Str;
class Utils
{
    private const HOTBED = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
    private const CONTRATO_SEED = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
        // Opciones de contraseña:
    private const HASH = PASSWORD_DEFAULT;
    protected const COST = 14;
    
    function getDateTime()
    {
        return date('Ymd') . date("his");
    }

    /**
     * Permite generar un TOKEN unico de largo 50
     *
     * @return string
     */
    public static function generateTokenId(): string
    {
        return Str::random(50);
    }
    /**
     * Genera un TOKEN DE CONTRATO 
     *
     * @return string
     */
    public static function generateContratoId(): string
    {
        $password = "";
        $j = 0;
        //Reconstruimos la contraseña segun la longitud que se quiera
        for ($i = 0; $i < 40; $i++) {

            //obtenemos un caracter aleatorio escogido de la cadena de caracteres
            if ($j > 4) {
                $password .= '-' . substr(self::CONTRATO_SEED, rand(0, 36), 1);
                $j = 0;
            } else {
                $password .= substr(self::CONTRATO_SEED, rand(0, 36), 1);
            }

            $j++;
        }

        return $password;
    }

    /**
     * Genera ua clave en función del largo
     *
     * @param integer $largo
     * @return void
     */
    function genClave(int $largo): string
    {

        $password = "";
        for ($i = 0; $i < $largo; $i++) {
            $password .= substr(self::HOTBED, rand(0, 62), 1);
        }
        //Mostramos la contraseña generada
        return $password;
    }



    /**
     * encripta la contraseña
     *
     * @param string $password
     * @return string
     */
    function encriptar(string $password): string
    {
        return password_hash($password, self::HASH, ['cost' => self::COST]);
    }


    /**
     * Compara clave ingresada con clave encriptadad
     *
     * @param string $password
     * @param string $passwordHash
     * @return boolean
     */
    function compararClaves(string $password, string $passwordHash): bool
    {
        // Primero comprobamos si se ha empleado una contraseña correcta:
        if (password_verify($password, $passwordHash)) {
            return true; // O hacer lo necesario para indicar que el usuario se ha logeado.
        }
        return false;
    }

    function lastDateOfMonth()
    {
        $L = new DateTime(date(date("Y-m-d H:i:s")));
        return $L->format('Y-m-t');
    }


    public static function getPHPSelf()
    {
        return $_SERVER["PHP_SELF"];
    }
    public static function getHTTPReferer()
    {
        try {
            return $_SERVER['HTTP_REFERER'];
        } catch (Exception $ex) {
            return '';
        }
    }

    public static function getRemoteAddr()
    {
        return $_SERVER["REMOTE_ADDR"];
    }
    public static function getHTTPClientIp()
    {

        if (isset($_SERVER["HTTP_CLIENT_IP"])) {
            return $_SERVER["HTTP_CLIENT_IP"];
        } elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
            return $_SERVER["HTTP_X_FORWARDED_FOR"];
        } elseif (isset($_SERVER["HTTP_X_FORWARDED"])) {
            return $_SERVER["HTTP_X_FORWARDED"];
        } elseif (isset($_SERVER["HTTP_FORWARDED_FOR"])) {
            return $_SERVER["HTTP_FORWARDED_FOR"];
        } elseif (isset($_SERVER["HTTP_FORWARDED"])) {
            return $_SERVER["HTTP_FORWARDED"];
        } else {
            return "USE-REMOTE-ADDR";
        }
    }


    public static function getHTTPUserAgent()
    {
        return  $_SERVER['HTTP_USER_AGENT'];
    }
    public static function getHTTPUserAgentName()
    {
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        if (strpos($user_agent, 'MSIE') !== FALSE)
            return 'Internet explorer';
        elseif (strpos($user_agent, 'Edge') !== FALSE) //Microsoft Edge
            return 'Microsoft Edge';
        elseif (strpos($user_agent, 'Trident') !== FALSE) //IE 11
            return 'Internet explorer';
        elseif (strpos($user_agent, 'Opera Mini') !== FALSE)
            return "Opera Mini";
        elseif (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR') !== FALSE)
            return "Opera";
        elseif (strpos($user_agent, 'Firefox') !== FALSE)
            return 'Mozilla Firefox';
        elseif (strpos($user_agent, 'Chrome') !== FALSE)
            return 'Google Chrome';
        elseif (strpos($user_agent, 'Safari') !== FALSE)
            return "Safari";
        else
            return 'No hemos podido detectar su navegador';
    }
}
