// simple forum tweaks 

// clean up message strip
$(".sfmessagestrip br").remove();
$(".sfmessagestrip .sflogincell").attr("width","*");
$(".sfmessagestrip td[align='center']").attr("align","right");

// remove breakes from smiley selection
$(".sfpostsavetable br").remove();

// login strip
$(".sfloginstrip .sflogincell br").remove();
$(".sfheading .sfadditemcell br").remove();

$("#sfloginform br").remove();
$("#sfloginform #loginform").append("<div id='logindiv' style='text-align: center;'></div>");
$("#sfloginform #loginform #submit").appendTo("#sfloginform #logindiv");