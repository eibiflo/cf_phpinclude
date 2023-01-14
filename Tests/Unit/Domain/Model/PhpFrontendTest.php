<?php

declare(strict_types=1);

namespace CodingFreaks\CfPhpinclude\Tests\Unit\Domain\Model;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 *
 * @author Florian Eibisbegrer <cookiemanager@coding-freaks.com>
 */
class PhpFrontendTest extends UnitTestCase
{
    /**
     * @var \CodingFreaks\CfPhpinclude\Domain\Model\PhpFrontend|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \CodingFreaks\CfPhpinclude\Domain\Model\PhpFrontend::class,
            ['dummy']
        );
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function dummyTestToNotLeaveThisFileEmpty(): void
    {
        self::markTestIncomplete();
    }
}
