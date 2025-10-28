<?php
use TYPO3\CMS\Core\Information\Typo3Version;
use \TYPO3\CMS\Core\Utility\GeneralUtility;
defined('TYPO3') || die();


$versionInformation = GeneralUtility::makeInstance(\TYPO3\CMS\Core\Information\Typo3Version::class);


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

    //Old Registration for TYPO3 versions <= 12
    if($versionInformation->getMajorVersion() <= 12){
        $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'select_key';
        $flexFormPath = 'EXT:cf_phpinclude/Configuration/FlexForms/' . $pluginName . 'Plugin.xml';
        if (file_exists(GeneralUtility::getFileAbsFileName($flexFormPath))) {
            $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
            \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
                $pluginSignature,
                'FILE:' . $flexFormPath
            );
        }
    }else{
        //New Registration for TYPO3 versions >= 13
        $flexFormPath = 'EXT:cf_phpinclude/Configuration/FlexForms/' . $pluginName . 'Plugin.xml';
        if (file_exists(GeneralUtility::getFileAbsFileName($flexFormPath))) {
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

}