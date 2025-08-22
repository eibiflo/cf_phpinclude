<?php

declare(strict_types=1);

namespace CodingFreaks\CfPhpinclude\Updates;

use CodingFreaks\CfPhpinclude\Updates\AbstractListTypeToCTypeUpdate;
use TYPO3\CMS\Install\Attribute\UpgradeWizard;

#[UpgradeWizard('pluginListToCTypeUpdateWizard')]
final class PluginListToCTypeUpdateWizard extends AbstractListTypeToCTypeUpdate
{
    public function getTitle(): string
    {
        return 'CodingFreaks: Migrates CookieList plugin to CType Typo3 13 and higher';
    }

    public function getDescription(): string
    {
        return 'Migrates the content elements from list_type to a dedicated CType.';
    }

    protected function getListTypeToCTypeMapping(): array
    {
        return [
            'cfphpinclude_phpfrontend' => 'cfphpinclude_phpfrontend',
        ];
    }
}