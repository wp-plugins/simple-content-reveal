(function() {
    tinymce.create('tinymce.plugins.contentreveal', {
        init : function(ed, url) {
            ed.addButton('ContentReveal', {
                title : 'Content Reveal',
                onclick : function() {
                     ed.selection.setContent('[reveal heading="%image% Click here to show/hide contents"]' + ed.selection.getContent() + '[/reveal]'); 
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('ContentReveal', tinymce.plugins.contentreveal);
})();