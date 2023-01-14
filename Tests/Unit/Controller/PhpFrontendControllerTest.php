<?php

declare(strict_types=1);

namespace CodingFreaks\CfPhpinclude\Tests\Unit\Controller;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;
use TYPO3Fluid\Fluid\View\ViewInterface;

/**
 * Test case
 *
 * @author Florian Eibisbegrer <cookiemanager@coding-freaks.com>
 */
class PhpFrontendControllerTest extends UnitTestCase
{
    /**
     * @var \CodingFreaks\CfPhpinclude\Controller\PhpFrontendController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\CodingFreaks\CfPhpinclude\Controller\PhpFrontendController::class))
            ->onlyMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllPhpFrontendsFromRepositoryAndAssignsThemToView(): void
    {
        $allPhpFrontends = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $phpFrontendRepository = $this->getMockBuilder(\CodingFreaks\CfPhpinclude\Domain\Repository\PhpFrontendRepository::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $phpFrontendRepository->expects(self::once())->method('findAll')->will(self::returnValue($allPhpFrontends));
        $this->subject->_set('phpFrontendRepository', $phpFrontendRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('phpFrontends', $allPhpFrontends);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }
}
