/* this function styles inputs with the type file. It basically replaces browse or choose with a custom button */
(function (j) {
    j.fn.file = function (options) {
        var settings = {
            width: 250
        };

        if (options) {
            j.extend(settings, options);
        }

        this.each(function () {
            var self = this;

            var wrapper = j("<a>").attr("class", "ui-input-file");

            var filename = j('<input class="file">').addClass(j(self).attr("class")).css({
                "display": "inline",
                "width": settings.width + "px"
            });

            j(self).before(filename);
            j(self).wrap(wrapper);

            j(self).css({
                "position": "relative",
                "height": settings.image_height + "px",
                "width": settings.width + "px",
                "display": "inline",
                "cursor": "pointer",
                "opacity": "0.0"
            });

            if (j.browser.mozilla) {
                if (/Win/.test(navigator.platform)) {
                    j(self).css("margin-left", "-142px");
                } else {
                    j(self).css("margin-left", "-168px");
                };
            } else {
                j(self).css("margin-left", settings.image_width - settings.width + "px");
            };

            j(self).bind("change", function () {
                filename.val(j(self).val());
            });
        });

        return this;
    };
})(jQuery);

j(document).ready(function () {
    j("input.focus, textarea.focus").focus(function () {
        if (this.value == this.defaultValue) {
            this.value = "";
        }
        else {
            this.select();
        }
    });

    j("input.focus, textarea.focus").blur(function () {
        if (j.trim(this.value) == "") {
            this.value = (this.defaultValue ? this.defaultValue : "");
        }
    });

    /* date picker */
    j(".date").datepicker({
        showOn: 'both',
        buttonImage: 'resources/images/ui/calendar.png',
        buttonImageOnly: true
    });

    /* select styling */
    j("select").selectmenu({
        style: 'dropdown',
        width: 200,
        menuWidth: 200,
        icons: [
		    { find: '.locked', icon: 'ui-icon-locked' },
		    { find: '.unlocked', icon: 'ui-icon-unlocked' },
		    { find: '.folder-open', icon: 'ui-icon-folder-open' }
	    ]
    });

    /* file input styling */
    j("input[type=file]").file({
        image_height: 28,
        image_width: 28,
        width: 250
    });

    /* tinymce (text editor) */
    j("textarea.editor").tinymce({
        script_url: "resources/scripts/tiny_mce/tiny_mce.js",
        mode: "textareas",
        theme: "advanced",
        theme_advanced_buttons1: "newdocument,separator,bold,italic,underline,strikethrough,separator,justifyleft, justifycenter,justifyright,justifyfull,separator,cut,copy,paste,pastetext,pasteword,separator,help",
        theme_advanced_buttons2: "bullist,numlist,separator,outdent,indent,blockquote,separator,undo,redo,separator,link,unlink,anchor,image,cleanup,help,code,separator,forecolor,backcolor",
        theme_advanced_buttons3: "",
        theme_advanced_buttons4: "",
        theme_advanced_toolbar_location: "top",
        theme_advanced_toolbar_align: "left"
    });

    /* button styling */
    j("input:submit, input:reset, button").button();
});