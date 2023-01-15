..  include:: /Includes.rst.txt

..  _installation:

============
Installation
============

In a :ref:`composer-based TYPO3 installation <t3start:install>` you can install
the extension EXT:CfPhpInclude via composer:

.. code-block:: bash

   composer require codingfreaks/cf-phpinclude

In TYPO3 installations above version 11.5 the extension will be automatically
installed. You do not have to activate it manually.


Set Include Folder
--------------------------

Open your TYPO3 backend with :ref:`system maintainer <t3start:system-maintainer>`
permissions.

In the module menu to the left navigate to :guilabel:`Admin Tools > Settings`,
then click on :guilabel:`Configure extensions` and create all.

In Modal open :guilabel:`cf_phpinclude` now you can set  the default PHP Include Folder in Public Directory of the Typo3 Installation.

Create Include Folder
----------------

Create the "includeDirectory" Folder from the Extension Settings in :guilabel:`Admin Tools > Settings`, :guilabel:`Configure extensions`, :guilabel:`cf_phpinclude` in your Public Directory of the Typo3 Installation
As Example: :guilabel:`/var/www/typo3/public/cf_phpinclude`

Don't forget to set the Read/Write permission to your Webserver user.