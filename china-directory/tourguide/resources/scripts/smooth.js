/* path to the stylesheets for the color picker */
var style_path = "resources/css/colors";
var xyz = jQuery.noConflict();

xyz(document).ready(function () {
	/* messages fade away when dismiss is clicked */
	xyz(".message > .dismiss > a").live("click", function (event) {
		var value = xyz(this).attr("href");
		var id = value.substring(value.indexOf('#') + 1);

		xyz("#" + id).fadeOut('slow', function () { });

		return false;
	});

	/* color picker */
	xyz("#colors-switcher > a").click(function () {
		var style = xyz("#color");

		style.attr("href", "" + style_path + "/" + xyz(this).attr("title").toLowerCase() + ".css");

		return false;
	});

	xyz("#menu h6 a").click(function () {
		var link = xyz(this);
		var value = link.attr("href");
		var id = value.substring(value.indexOf('#') + 1);

		var heading = xyz("#h-menu-" + id);
		var list = xyz("#menu-" + id);

		if (list.attr("class") == "closed") {
			heading.attr("class", "selected");
			list.attr("class", "opened");
		} else {
			heading.attr("class", "");
			list.attr("class", "closed");
		}
	});

	xyz("#menu li a[class~=collapsible]").click(function () {
		var element = xyz(this);

		if (element.attr("class") == "collapsible plus") {
			element.attr("class", "collapsible minus");
		} else {
			element.attr("class", "collapsible plus");
		}

		var list = element.next();

		if (list.attr("class") == "collapsed") {
			list.attr("class", "expanded");
		} else {
			list.attr("class", "collapsed");
		}
	});
});