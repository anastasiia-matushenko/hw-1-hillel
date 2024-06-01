<?php

namespace Overload;

use Exceptions\InvalidMethodCallException;

class User
{

    public function __construct(private string $name, private int $age, private string $email)
    {
    }

    private function setName(string $name): void
    {
        $this->name = $name;
    }

    private function setAge(int $age): void
    {
        $this->age = $age;
    }

    private function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @throws InvalidMethodCallException
     */
    public function __call(string $name, array $arguments)
    {
        var_dump(method_exists($this, $name));
        if (!method_exists($this, $name)) {
            throw new InvalidMethodCallException(User::class, $name);
        }
        call_user_func_array([$this, $name], $arguments);
    }

    public function getAll(): array
    {
        return ['name' => $this->name, 'age' => $this->age, 'email' => $this->email];
    }
}