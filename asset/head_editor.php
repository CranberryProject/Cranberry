
<!-- CSS for Editor -->
<link rel="stylesheet" type="text/css" href="/asset/vendor/codemirror/codemirror.css">
<link rel="stylesheet" type="text/css" href="/asset/css/style_editor.css">

<!-- JavaScript for Editor -->
<script type="text/javascript" src="/asset/vendor/codemirror/codemirror.js"></script>
<script type="text/javascript" src="/asset/vendor/codemirror/mode/markdown.js"></script>
<script type="text/javascript" src="/asset/vendor/vue.js"></script>
<script type="text/javascript" src="/asset/vendor/marked.js"></script>
<script>
window.onload = function () {
    new Vue({
        el: '#editor',
        data: {
            input: '<?= EDITOR_MESSAGE; ?>',
        },
        filters: {
            marked: marked,
        },
    });

    var editor = CodeMirror.fromTextArea(document.getElementById('input'), {
        mode: "markdown",
        lineNumbers: true,
        indentUnit: 4
    });
};
</script>