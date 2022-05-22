<?php
declare(strict_types=1);
namespace FQr\Log\Applications\Contracts;

interface ILogHttpServerError{
    public function execute(
        string $code
    );
}