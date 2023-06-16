<?php

declare(strict_types=1);

namespace CodingFreaks\CfPhpinclude\Controller;

use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Core\Environment;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/**
 * This file is part of the "cf_phpinclude" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2023 Florian Eibisbegrer <cookiemanager@coding-freaks.com>, CodingFreaks
 */

/**
 * PhpFrontendController
 */
class PhpFrontendController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * action list
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction(): \Psr\Http\Message\ResponseInterface
    {
        $extensionConfiguration = GeneralUtility::makeInstance(ExtensionConfiguration::class)->get('cf_phpinclude');
        $includeDirectory = $extensionConfiguration["includeDirectory"];
        $include_file = $this->settings["script_url"];
        $script_params = $this->settings["script_params"];
        if ($script_params != "") {
            $splitted_params = explode("\n", $script_params);
            for ($i = 0; $i < count($splitted_params); $i++) {
                $line = $splitted_params[$i];
                $line = str_replace("\r", "", $line);
                $line_arr = explode("=", $line);
                if (count($line_arr) > 1) {
                    $tmp = $line_arr[0];
                    ${$tmp} = $line_arr[1];
                    $GLOBALS['cf_include'][$tmp] = $line_arr[1];
                }
            }
        }
        $GLOBALS['cf_include']['php_file'] = $include_file;
        $absPath = Environment::getPublicPath() . $includeDirectory . "/" . $include_file;
        if (file_exists($absPath) && !empty($include_file)) {
            ob_start();
            require $absPath;
            $content_from_include = ob_get_contents();
            ob_end_clean();
        } else {
            $content_from_include = "<b>cf_phpinclude ERROR: File ({$absPath}) not found or include path Empty</b>";
        }
        return $this->htmlResponse($content_from_include);
    }
}
