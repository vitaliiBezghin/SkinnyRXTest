<?php

namespace App\DTO;

use Illuminate\Support\Collection;

class SubmissionDTO
{
    public function __construct(
        public string $name,
        public string $email,
        public string $message,
    )
    {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'],
            email: $data['email'],
            message: $data['message']
        );
    }
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
        ];
    }

    public function toCollection(): Collection
    {
        return collect($this->toArray());
    }
}
