<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'CfPhpinclude',
        'Phpfrontend',
        [
            \CodingFreaks\CfPhpinclude\Controller\PhpFrontendController::class => 'list'
        ],
        // non-cacheable actions
        [
            \CodingFreaks\CfPhpinclude\Controller\PhpFrontendController::class => 'list'
        ]
    );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    phpfrontend {
                        iconIdentifier = cf_phpinclude-plugin-phpfrontend
                        title = LLL:EXT:cf_phpinclude/Resources/Private/Language/locallang_db.xlf:tx_cf_phpinclude_phpfrontend.name
                        description = LLL:EXT:cf_phpinclude/Resources/Private/Language/locallang_db.xlf:tx_cf_phpinclude_phpfrontend.description
                        tt_content_defValues {
                            CType = list
                            list_type = cfphpinclude_phpfrontend
                        }
                    }
                }
                show = *
            }
       }'
    );
})();
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder