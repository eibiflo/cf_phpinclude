<?php
defined('TYPO3') || die();

$pluginNames = [
    'Phpfrontend',
];
$_LLL_db = 'LLL:EXT:cf_phpinclude/Resources/Private/Language/locallang.xlf:';
foreach ($pluginNames as $pluginName) {
    $pluginSignature = 'cfphpinclude_' . strtolower($pluginName);
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
        'CfPhpinclude',
        $pluginName,
        $_LLL_db . 'tx_cfphpinclude_domain_model_phpfrontend.plugin.' . strtolower(preg_replace('/[A-Z]/', '_$0', lcfirst($pluginName)))
    );

    $flexFormPath = 'EXT:cf_phpinclude/Configuration/FlexForms/' . $pluginName . 'Plugin.xml';
    if (file_exists(\TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName($flexFormPath))) {
        // Eigenen Content-Typ registrieren statt subtypes zu verwenden
        $GLOBALS['TCA']['tt_content']['types'][$pluginSignature] = [
            'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                --palette--;;general,
                pi_flexform,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                --palette--;;hidden,
                --palette--;;access,
            ',
        ];

        // FlexForm dem eigenen Content-Typ zuordnen
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
            "*",
            'FILE:' . $flexFormPath,
            $pluginSignature
        );
    }
}