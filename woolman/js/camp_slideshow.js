var ssSlides = ['/sierra-friends', "Sierra Friends Camp: more fun than, well, just about anything. Don't believe us? Click here!",
								'/sierra-friends/trips', "Ready to have the time of your life in some of the most beautiful places on earth? Click to learn about Sierra Friends Camp trips.",
								'/staff', "Our counselors are pretty much superheroes. Click to find out about all the amazing things they do.",
								'/sierra-friends/questions', "Got questions about what it's like to be a Sierra Friends Camper? We've got answers!",
								'/teen-leadership', "Announcing Teen Leadership Camp: fantastic adventures and learning for 15-16 year-olds. Learn more about it here.",
								'/staff/cit', "Our Counselor-In-Training program gives opportunities for fun and growth for ages 17+. Check it out here.",
								'/parents', "To learn more about our transformative programs, browse the parents' resources section. Click for dates, rates, FAQs packing list and more.",
								'/gallery', "See more wild camp pics: check out our photo gallery!"];
var ssPlace = 0;
var ssEnd = ssSlides.length/2;

function changeSlide(){
	if( ++ssPlace == ssEnd ){
		ssPlace = 0;
	}
	$('#camp-slideshow-image, #camp-slideshow-description').animate({opacity:0},'fast', function() {
    $('#camp-slideshow-image').css('background-position','0 '+(-300*ssPlace)+'px');
    $('#camp-slideshow-link').attr('href',ssSlides[ssPlace*2]);
    $('#camp-slideshow-description').html(ssSlides[ssPlace*2+1]);
    $('#camp-slideshow-image, #camp-slideshow-description').animate({opacity:1},150);
});
}
$(document).ready(function (){
	window.setInterval( changeSlide, 30000 );
});
