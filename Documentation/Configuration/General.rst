..  include:: /Includes.rst.txt
..  index:: Configuration
..  _configuration-general:

=====================
General configuration
=====================

Include TypoScript template
===========================

It is necessary to include at least the basic TypoScript provided by this
extension.

Go module :guilabel:`Web > Template` and chose your root page. It should
already contain a TypoScript template record. Switch to view
:guilabel:`Info/Modify` and click on :guilabel:`Edit the whole template record`.


Switch to tab :guilabel:`Includes` and add the following templates from the list
to the right: :guilabel:`cf_phpinclude (cf_phpinclude)`.

Read more about possible configurations via TypoScript in the
:ref:`Reference <typoscript>` section.

Further reading
===============

*  :ref:`Global extension configuration <extensionConfiguration>`
*  :ref:`TypoScript <typoscript>`, mainly configuration for the frontend
*  :ref:`TsConfig <tsconfig>`, configuration for the backend
*  :ref:`Routing <routing>` for human readable URLs
*  :ref:`Templating <quickTemplating>` customize the templates