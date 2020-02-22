// Copyright (c) 2015, Fujana Solutions - Moritz Maleck. All rights reserved.
// For licensing, see LICENSE.md

CKEDITOR.plugins.add( 'cleanuploader', {
    init: function( editor ) {
       // editor.config.filebrowserBrowseUrl = '/ckeditor/plugins/cleanuploader/start.php';
          editor.config.filebrowserBrowseUrl = 'kcfinder/browse.php';

    }
});
