/* 
Kriesi (http://themeforest.net/user/Kriesi)
http://www.kriesi.at/archives/create-a-multilevel-dropdown-menu-with-css-and-improve-it-via-jquery 
*/

function quick() {
    j("#quick ul ").css({ display: "none" });
    j("#quick li").hover(function () {
	j(this).find('ul:first').css({visibility: "visible",display: "none"}).show(400);
    }, function () {
        j(this).find('ul:first').css({ visibility: "hidden" });
    });
}

j(document).ready(function () {
    quick();
});