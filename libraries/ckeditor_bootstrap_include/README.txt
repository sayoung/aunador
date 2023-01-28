CKEditor Bootstrap Include module lets you to configure and use Bootstrap in CKEditor in Drupal 8.

INSTALLATION
------------
1. Download and place CKEditor add-on from http://js.plus into "libraries" folder (create if not exists).
2. Install this module using Drupal administration panel (Administration -> Extend).

CONFIGURATION
-------------
1. Go to "Administration -> Configuration -> Content authoring -> Text formats and editors"
   (admin/config/content/formats) page.
2. Click "Configure" for any test format using CKEditor as the text editor.
3. Place any add-ons you need to CKEditor toolbar.
4. To change some userOptions please see vertical tab of this module on this page.
5. Scroll down and click "Save configuration".
6. Go to node create/edit page, choose the text format with CKEditor Bootstrap Include plugins.

NOTE: some tags that used by add-ons are filtered with standard CKEditor filters.
You can easily turn the filters off by turning off the checkbox "Limit allowed HTML tags and correct faulty HTML"
in the text format userOptions (right after the vertical tabs).