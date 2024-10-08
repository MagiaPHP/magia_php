module("wysihtml5.dom.contains", {
    setup: function () {
        this.container = document.createElement("div");
        this.textnode = document.createTextNode("TEST");
        document.body.appendChild(this.container);
        this.container.appendChild(this.textnode);
    },

    teardown: function () {
        this.container.parentNode.removeChild(this.container);
    }
});


test("Basic test", function () {
    ok(wysihtml5.dom.contains(document.documentElement, document.body));
    ok(wysihtml5.dom.contains(document.body, this.container));
    ok(wysihtml5.dom.contains(this.container, this.textnode));
    ok(!wysihtml5.dom.contains(this.container, document.body));
    ok(!wysihtml5.dom.contains(document.body, document.body));
});
