CKEDITOR.plugins.add( 'alphabutton', {
    icons: 'alpha',
    init: function( editor ) {
        editor.addCommand( 'insertAlpha', {
            exec: function( editor ) {
                var now = new Date();
                editor.insertHtml( '<span class="alpha">&alpha;</span><sup>&reg;</sup>' );
            }
        });
        editor.ui.addButton( 'Alpha', {
            label: 'Insert Alpha',
            command: 'insertAlpha',
            toolbar: 'insert'
        });
    }
});

