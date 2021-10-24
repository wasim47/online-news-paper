var app = angular.module('wasimApp',[]);
	app.controller('myCont',function($scope,$interval){
		$scope.theTime = new Date().toLocaleTimeString();
		  $interval(function () {
			  $scope.theTime = new Date().toLocaleTimeString();
		  }, 1000);
	});
	
$(document).ready(function() {
  $(".regular").slick({
	dots: false,
	infinite: true,
	slidesToShow: 5,
	slidesToScroll: 1
  });
  
  
  
   /*$("#entertainment").lightSlider({
   });*/
  
  $("#commonslider").lightSlider({
   });
  
  //Movies
  $("#theatreatres").lightSlider({
   });
  
   $("#recentrealease").lightSlider({
   });
   
    $("#upcomming").lightSlider({
   });
	
	$("#popularmovies").lightSlider({
   });
	
	//Education
	$("#homeslider").lightSlider({
		 item: 2,
   });
	
	//Education
	$("#education").lightSlider({
		 item: 4,
   });
	
	$("#audioclass").lightSlider({
		 item: 4,
   });
	
	//Drama
	$("#theatre_person").lightSlider({
		 item: 4,
   });
	
	$("#popular_drama").lightSlider({
		 item: 5,
   });
	
	$("#popular_serial").lightSlider({
		 item: 5,
   });
	$("#theatre_info").lightSlider({
		 item: 4,
   });
	
	//Music
	 $("#upcomming_track").lightSlider({ 
     });
	 $("#upcomming_album").lightSlider({ 
     });
	 $("#audio_track").lightSlider({ 
			item: 4,
     });
	 $("#signerlist").lightSlider({ 
     });
});
	
function  rollBanner(divId,intervalTime)  {

    var divId = document.getElementById(divId); 
    var pTag =  divId.getElementsByTagName("p")[0];

    var imgTag =  divId.getElementsByTagName("img"); 

    var textTag = divId.getElementsByTagName("a"); 

    var pWidth = pTag.offsetWidth; 

    var speed = 1; 

    pTag.style.left = 0 + "px";

    var bannerArray = new Array(); 

    bannerArray[0] = pTag.innerHTML; 

 

    if (textTag.length != 0) 

    {

        if (pWidth > divId.offsetWidth) 

        {

            pTag.style.left = pTag.offsetLeft; 

            pTag.innerHTML=pTag.innerHTML+bannerArray[0]; 

 

            var rollInterval = setInterval(

            function()

            {

                pTag.onmouseover = function() {

                    speed=0;

                };

                pTag.onmouseout = function() {

                    speed=1;

                };

 

                pTag.style.left =  parseInt(pTag.style.left)-speed + "px";

                if (parseInt(pTag.style.left) % pWidth==0)

                {

                    pTag.innerHTML=pTag.innerHTML+bannerArray[0]; 

                }

            }

            ,intervalTime);

 

        }

    }

 

}