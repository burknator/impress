'use strict';

+function($) {
        console.log('tes');
    if (document.getElementById('content-input') != null) {
        var ta = document.getElementById('content-input');

        var myCodeMirror = CodeMirror(function(elt) {
            ta.parentNode.replaceChild(elt, ta);
        }, {
            value: ta.value,
            mode: 'markdown'
        });

        var converter = new Showdown.converter();
        var preview = document.getElementById('content-preview');
        myCodeMirror.on('change', function(instance) {
            preview.innerHTML = converter.makeHtml(instance.getValue());
        });
    }
}(jQuery);