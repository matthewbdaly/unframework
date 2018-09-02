<?php declare(strict_types = 1);

namespace Tests\Unit\Doctrine\Entities;

use Tests\TestCase;
use Mockery as m;
use App\Doctrine\Entities\User;

class UserTest extends TestCase
{
    public function testSetAndGet()
    {
        $user = new User;
        $this->assertEquals('', $user->getName());
        $user->setName('Bob');
        $this->assertEquals('Bob', $user->getName());
        $this->assertNull($user->getId());
    }
}
