<?php
declare(strict_types=1);
namespace FQr\Log\Applications\Contracts;

interface ILogHttpServer{
    public function execute(
        string $flyerKey,
        string $actionRequest,
        string $message = null
    );
}