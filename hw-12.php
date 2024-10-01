<?php

class Contact
{
    public $name;
    public $surname;
    public $email;
    public $phone;
    public $address;
}

class ContactBuilder {
    private Contact $contact;

    public function __construct()
    {
        $this->reset();
    }

    public function name($name): ContactBuilder
    {
        $this->contact->name = $name;
        return $this;
    }

    public function surname($surname): ContactBuilder
    {
        $this->contact->surname = $surname;
        return $this;
    }

    public function email($email): ContactBuilder
    {
        $this->contact->email = $email;
        return $this;
    }

    public function phone($phone): ContactBuilder
    {
        $this->contact->phone = $phone;
        return $this;
    }

    public function address($address): ContactBuilder
    {
        $this->contact->address = $address;
        return $this;
    }

    public function build(): string
    {
        $contact = $this->contact;
        $this->reset();
        return "Contact info: {$contact->name}, {$contact->surname}, {$contact->email}, {$contact->phone}, {$contact->address}";
    }

    private function reset(): void
    {
        $this->contact = new Contact();
    }
}

$contact = new ContactBuilder();
$contactInfo = $contact->phone('000-555-000')
    ->name("John")
    ->surname("Surname")
    ->email("john@email.com")
    ->address("Some address")
    ->build();
echo $contactInfo;