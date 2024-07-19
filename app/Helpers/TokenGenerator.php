<?php

namespace App\Helpers;

use DateTimeImmutable;
use Lcobucci\JWT\Configuration;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Signer\Key\InMemory;

class TokenGenerator
{
    public static function generateToken(string $subject)
    {
        $config = Configuration::forSymmetricSigner(
            new Sha256(),
            InMemory::base64Encoded(env('JWT_SECRET')) // Usando a chave secreta do arquivo .env
        );

        $now = new DateTimeImmutable();

        $token = $config->builder()
            ->issuedBy(env('APP_URL'))                  // Emissor (URL da sua aplicação)
            ->permittedFor(env('APP_URL'))              // Audiência (URL da sua aplicação)
            ->issuedAt($now)                            // Hora de emissão
            ->canOnlyBeUsedAfter($now)                  // Tempo antes do qual o token não pode ser aceito
            ->expiresAt($now->modify('+10 minutes'))    // Tempo de expiração
            ->withClaim('uid', $subject)                // Reivindicação personalizada (ID do usuário, e-mail, etc.)
            ->getToken($config->signer(), $config->signingKey());

        return $token->toString();
    }
}
