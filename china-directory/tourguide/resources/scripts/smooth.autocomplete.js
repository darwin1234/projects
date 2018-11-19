var j = jQuery.noConflict();
j(document).ready(function () {
    j("input.autocomplete").autocomplete({
        source: ["c++", "java", "php", "coldfusion", "javascript", "asp", "ruby"]
    });
});