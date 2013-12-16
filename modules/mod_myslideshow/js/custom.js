$(document).ready(function() {
$(".contentnav a:first").addClass("active");
var contentwidth = $(".contentholder").width();
var totalcontent = $(".content").size();
var allcontentwidth = contentwidth * totalcontent;
$(".contentslider").css({'width' : allcontentwidth});
rotate = function(){
var slideid = $active.attr("rel") - 1;
var slidedistance = slideid * contentwidth;
$(".contentnav a").removeClass('active');
$active.addClass('active');
$(".contentslider").animate({
        left: -slidedistance}, 1500 );};
 rotation = function(){
play = setInterval(function(){
$active = $('.contentnav a.active').next();
if ( $active.length === 0) {
$active = $('.contentnav a:first');
}
rotate();
}, 5000);};
rotation();
$(".contentnav a").click(function() {
$active = $(this);
clearInterval(play);
rotate();
rotation();
return false;
});
});