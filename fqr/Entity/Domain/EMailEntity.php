<?php
declare(strict_types=1);
namespace FQr\Entity\Domain;

use FQr\Entity\Domain\Exception\EMailException;

class EMailEntity
{
    private $email;

    public const REGEX_EMAIL  = '/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';
    private $regex;
    public function __construct(string $email, string $regex = self::REGEX_EMAIL)
    {
        if (empty($email)) {
            throw new EMailException('El EMail debe no puede ser nulo');
        }

        if(!$this->is_valid($email, $regex)){
            throw new EMailException('El EMail tiene un formato incorrecto');
        }

        $this->email = $email;
    }
    private function is_valid(string $str, string $regex):bool
    {
        $matches = null;
        return (1 === preg_match($regex, $str, $matches));
    }
    public function getEMail()
    {
        return $this->email;
    }
}
