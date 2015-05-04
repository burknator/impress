'use strict';

+function($) {
    if (document.getElementById('content-input') != null) {
        $('#content-title').on('keydown keyup', function() {
            $('#content-slug').val(this.value);
        });

        var ta = document.getElementById('content-input');

        var myCodeMirror = CodeMirror.fromTextArea(ta, {
            mode: 'markdown'
        });

        var md = window.markdownit();
        var preview = document.getElementById('content-preview');
        myCodeMirror.on('change', function(instance) {
            preview.innerHTML = md.render(instance.getValue());
        });
    }
}(jQuery);