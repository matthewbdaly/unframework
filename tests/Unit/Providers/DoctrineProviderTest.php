<?php

namespace Tests\Unit\Providers;

use Tests\TestCase;

class DoctrineProviderTest extends TestCase
{
    public function testCreateDoctrine()
    {
        $manager = $this->container->get('Doctrine\ORM\EntityManager');
        $this->assertInstanceOf('Doctrine\ORM\EntityManager', $manager);
    }
}
