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

    $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'select_key';
    $flexFormPath = 'EXT:cf_phpinclude/Configuration/FlexForms/' . $pluginName . 'Plugin.xml';
    if (file_exists(\TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName($flexFormPath))) {
        $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
            $pluginSignature,
            'FILE:' . $flexFormPath
        );
    }
}
