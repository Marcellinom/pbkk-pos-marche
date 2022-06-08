<?php

namespace App\Modules\IAM\Core\Application\Service\CreateMitra;

class CreateMitraRequest
{
    private string $name;
    private string $email;
    private string $address;
    private string $phone;
    private string $username;
    private string $password;
    private string $inventory_id;

    /**
     * @param string $name
     * @param string $email
     * @param string $address
     * @param string $phone
     * @param string $username
     * @param string $password
     * @param string $inventory_id
     */
    public function __construct(string $name, string $email, string $address, string $phone, string $username, string $password, string $inventory_id)
    {
        $this->name = $name;
        $this->email = $email;
        $this->address = $address;
        $this->phone = $phone;
        $this->username = $username;
        $this->password = $password;
        $this->inventory_id = $inventory_id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getInventoryId(): string
    {
        return $this->inventory_id;
    }
}
