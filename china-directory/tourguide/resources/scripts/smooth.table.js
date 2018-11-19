/* sets the class of the tr containing the checked checkbox to selected */
function set_tr_class(element, selected) {
    if (selected) {
        element.attr("class", "selected " + element.attr("class"))
    } else {
        var css = element.attr("class");
        var position = css.indexOf('selected');

        element.attr("class", css.substring(position + 9));
    }
}

j(document).ready(function () {
    /* checks all the checkboxes within a table */
    j("table input[class=checkall]").live("click", function (event) {
        var checked = j(this).attr("checked");

        j("table input[type=checkbox]").each(function () {
            this.checked = checked;

            if (checked) {
                set_tr_class(j(this).parent().parent(), true);
            } else {
                set_tr_class(j(this).parent().parent(), false);
            }
        });
    });

    /* sets the class of the table tr when a checkbox within the table is checked */
    j("table input[type=checkbox]").live("click", function (event) {
        if (j(this).attr("checked")) {
            set_tr_class(j(this).parent().parent(), true);
        } else {
            set_tr_class(j(this).parent().parent(), false);
        }
    });
});