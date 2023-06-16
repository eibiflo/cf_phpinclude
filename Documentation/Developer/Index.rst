..  include:: /Includes.rst.txt
..  highlight:: php

..  _developer:

================
Developer corner
================

  In the `Public` folder, create the ``cf_phpinclude`` folder.

  Within the ``cf_phpinclude`` folder, you can create file(s) or folder structure. The files will be included in the frontend if the path is set in the Plugin Flexform field: "Script URL".

  In the Included PHP file, you can utilize the full functionality of a TYPO3 ActionController, including namespaces, use statements, etc.


Example
------------

File: cf_phpinclude/MyFolder/ExampleFile.php
Include Path in Backend: MyFolder/ExampleFile.php

.. code-block:: php

    <?php

    use TYPO3\CMS\Core\Utility\GeneralUtility;


    function generateMenu($id)
    {
        $PageRepository = GeneralUtility::makeInstance(\TYPO3\CMS\Core\Domain\Repository\PageRepository::class);
        $subPage = $PageRepository->getMenu($id);
        return $subPage;
    }

    generateMenu(1);



File: cf_phpinclude/titleToSlugUpdater.php
Include Path in Backend: titleToSlugUpdater.php

..  code-block:: php

    <?php

    function setPageSlug($uid) {

        /*
        tablename => name of the table with the slug field
        slug_field_name => name of the corresponding slug field
         */

        $tablename = "pages";
        $slug_field_name = "slug";

        $fieldConfig = $GLOBALS['TCA'][$tablename]['columns'][$slug_field_name]['config'];
        $slugHelper = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\DataHandling\SlugHelper::class, $tablename, $slug_field_name, $fieldConfig);

        $connection = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Database\ConnectionPool::class)->getConnectionForTable($tablename);
        $queryBuilder = $connection->createQueryBuilder();

        $queryBuilder->getRestrictions()->removeAll()->add(\TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Database\Query\Restriction\DeletedRestriction::class));
        $statement = $queryBuilder->select('*')->from($tablename)->where(
            $queryBuilder->expr()->eq('uid', $uid)
        )->execute();

        $record = $statement->fetch();

        $slug = $slugHelper->generate($record, $record['pid']);

        // Update
        $queryBuilder = $connection->createQueryBuilder();
        $queryBuilder->update($tablename)->where(
            $queryBuilder->expr()->eq('uid', $uid)
        )->set($slug_field_name, $slug)->execute();

        //var_dump($slug);
        return $slug;
    }




    $queryBuilder = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Database\ConnectionPool::class)->getQueryBuilderForTable('pages');
    $statement = $queryBuilder
        ->select('uid', 'slug')
        ->from('pages')
        ->execute();
    while ($row = $statement->fetch()) {
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($row);
        setPageSlug($row["uid"]);
    }
