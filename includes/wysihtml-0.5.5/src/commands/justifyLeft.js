(function (wysihtml5) {

    var nodeOptions = {
        className: "wysiwyg-text-align-left",
        classRegExp: /wysiwyg-text-align-[0-9a-z]+/g,
        toggle: true
    };

    wysihtml5.commands.justifyLeft = {
        exec: function (composer, command) {
            return wysihtml5.commands.formatBlock.exec(composer, "formatBlock", nodeOptions);
        },

        state: function (composer, command) {
            return wysihtml5.commands.formatBlock.state(composer, "formatBlock", nodeOptions);
        }
    };
})(wysihtml5);
