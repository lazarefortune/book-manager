<?php
namespace App\Fixtures\Provider;

use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

final class PasswordHasherProvider
{
    public function __construct(
        private readonly UserPasswordHasherInterface $hasher,
    ) {}

    public function passwordHash(string $plain): string
    {
        return $this->hasher->hashPassword(new User(), $plain);
    }
}
