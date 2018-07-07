<?php declare(strict_types = 1);

namespace App\Doctrine\Entities;

/**
 * @Entity
 * @Table(name="user")
 */
class User
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private $id;

    /**
     * @Column(type="string",length=200)
     */
    private $name = '';

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
}
