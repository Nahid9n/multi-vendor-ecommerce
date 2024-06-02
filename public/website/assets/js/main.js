/*--------------------------
product count down
---------------------------- */
function increaseCount(a, b) {
        var input = b.previousElementSibling;
        var value = parseInt(input.value, 10);
        value = isNaN(value)? 0 : value;
        value ++;
        input.value = value;
      }
      function decreaseCount(a, b) {
        var input = b.nextElementSibling;
        var value = parseInt(input.value, 10);
        if (value > 1) {
          value = isNaN(value)? 0 : value;
          value --;
          input.value = value;
        }
      }
/*--------------------------
timer start
---------------------------- */
  	function makeTimer() {

	//		var endTime = new Date("29 April 2018 9:56:00 GMT+01:00");
		var endTime = new Date("01 April 2025 9:56:00 GMT+01:00");
			endTime = (Date.parse(endTime) / 1000);

			var now = new Date();
			now = (Date.parse(now) / 1000);

			var timeLeft = endTime - now;

			var days = Math.floor(timeLeft / 86400);
			var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
			var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
			var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));

			if (hours < "10") { hours = "0" + hours; }
			if (minutes < "10") { minutes = "0" + minutes; }
			if (seconds < "10") { seconds = "0" + seconds; }

			$("#days").html(days + "<span style='color:#fff; font-weight:400;'><br/> Days</span>");
			$("#hours").html(hours + "<span style='color:#fff; font-weight:400;'><br/>Hour</span>");
			$("#minutes").html(minutes + "<span style='color:#fff; font-weight:400; '><br/>Min</span>");
			$("#seconds").html(seconds + "<span style='color:#fff; font-weight:400; '><br/>Sec</span>");

	}

	setInterval(function() { makeTimer(); }, 1000);
 /*--------------------------
timer end
---------------------------- */
	/*--------------------------
topp selling slider part-1 start
---------------------------- */
	$(document).ready(function() {
  //     $("#content-slider").lightSlider({
  //         loop:true,
  //         keyPress:true,
  //         item:4,
  //         slideMove:1,
  //   			auto:true,
  //   			pauseOnHover:true,
  //   			speed:600,

  //   			responsive : [
  //     {
  //       breakpoint:992,
  //       settings: {
  //         item:3,
  //         slideMove:1
  //       }
  //     },
  //     {
  //       breakpoint:768,
  //       settings: {
  //         item:2,
  //         slideMove:1
  //       }
  //     },

  //     {
  //       breakpoint:500,
  //       settings: {
  //         item:1,
  //         slideMove:1
  //       }
  //     }
  //   ]

  // });

});

/*--------------------------
topp selling slider part-1 end
---------------------------- */
/*--------------------------
topp selling slider part-2 start
---------------------------- */
	$(document).ready(function() {
  //     $("#contentt-slider").lightSlider({
  //         loop:true,
  //         keyPress:true,
  //         item:4,
  //         slideMove:1,
  //   			auto:true,
  //   			pauseOnHover:true,
  //   			speed:600,

  //   			responsive : [
  //     {
  //       breakpoint:992,
  //       settings: {
  //         item:3,
  //         slideMove:1
  //       }
  //     },
  //     {
  //       breakpoint:768,
  //       settings: {
  //         item:2,
  //         slideMove:1
  //       }
  //     },
  //     {
  //       breakpoint:500,
  //       settings: {
  //         item:1,
  //         slideMove:1
  //       }
  //     }
  //   ]
  // });

});

/*--------------------------
topp selling slider part-2 end
---------------------------- */
/*--------------------------
topp selling slider part-3 start
---------------------------- */
	$(document).ready(function() {
  //     $("#contenttt-slider").lightSlider({
  //         loop:true,
  //         keyPress:true,
  //         item:4,
  //         slideMove:1,
  //   			auto:true,
  //   			pauseOnHover:true,
  //   			speed:600,

  //   			responsive : [
  //     {
  //       breakpoint:992,
  //       settings: {
  //         item:3,
  //         slideMove:1
  //       }
  //     },
  //     {
  //       breakpoint:768,
  //       settings: {
  //         item:2,
  //         slideMove:1
  //       }
  //     },
  //     {
  //       breakpoint:500,
  //       settings: {
  //         item:1,
  //         slideMove:1
  //       }
  //     }
  //   ]
  // });

});

/*--------------------------
topp selling slider part-3 end
---------------------------- */
(function ($) {
 "use strict";

// $('#my-menu').mmenu();

$(".vm-menu").on('click', function(){
	$(".vm-dropdown").slideToggle();
});

$(".minicart-icon").on('click', function(){
	$(".cart-dropdown").slideToggle();
});

// When the user clicks anywhere outside of the modal, close it
$(document).on("click", function(event) {
  if (!$(event.target).closest('.minicart-icon').length) {
    $(".cart-dropdown").slideUp();
  }
});


if ($(window).width() < 992) {
	$(".vm-dropdown li").on('click', function() {
		$(this).toggleClass('open');
	});
}
/*---------------------
  menu-stick
--------------------- */
var s = $(".sticker");
var pos = s.position();
$(window).on('scroll',function() {
	var windowpos = $(window).scrollTop();
	if (windowpos > pos.top) {
	s.addClass("stick");
	} else {
		s.removeClass("stick");
	}
});

/*--------------------------
 sidebar-range
---------------------------- */
const rangeInput = document.querySelectorAll(".pro_range_input input"),
priceInput = document.querySelectorAll(".pro_price_input input"),
range = document.querySelector(".pro_range_slider .pro_progress");
let priceGap = 1000;

priceInput.forEach(input =>{
    input.addEventListener("input", e =>{
        let minPrice = parseInt(priceInput[0].value),
        maxPrice = parseInt(priceInput[1].value);

        if((maxPrice - minPrice >= priceGap) && maxPrice <= rangeInput[1].max){
            if(e.target.className === "pro_input_min"){
                rangeInput[0].value = minPrice;
                range.style.left = ((minPrice / rangeInput[0].max) * 100) + "%";
            }else{
                rangeInput[1].value = maxPrice;
                range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
            }
        }
    });
});

rangeInput.forEach(input =>{
    input.addEventListener("input", e =>{
        let minVal = parseInt(rangeInput[0].value),
        maxVal = parseInt(rangeInput[1].value);

        if((maxVal - minVal) < priceGap){
            if(e.target.className === "pro_range_min"){
                rangeInput[0].value = maxVal - priceGap
            }else{
                rangeInput[1].value = minVal + priceGap;
            }
        }else{
            priceInput[0].value = minVal;
            priceInput[1].value = maxVal;
            range.style.left = ((minVal / rangeInput[0].max) * 100) + "%";
            range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
        }
    });
});

/*--------------------------
product image variations
---------------------------- */
  var bgimg = document.getElementById('bgimg');
  var sm_imge = document.getElementsByClassName('sm_imge');

    // sm_imge[0].onclick = function(){
    //   bgimg.src = sm_imge[0].src;
    // }
    // sm_imge[1].onclick = function(){
    //   bgimg.src = sm_imge[1].src;
    // }
    // sm_imge[2].onclick = function(){
    //   bgimg.src = sm_imge[2].src;
    // }
    // sm_imge[3].onclick = function(){
    //   bgimg.src = sm_imge[3].src;
    // }
    // sm_imge[4].onclick = function(){
    //   bgimg.src = sm_imge[4].src;
    // }
    // sm_imge[5].onclick = function(){
    //   bgimg.src = sm_imge[5].src;
    // }
    // sm_imge[6].onclick = function(){
    //   bgimg.src = sm_imge[6].src;
    // }

/*--------------------------
product color variations
---------------------------- */

/*--------------------------
 product count down
---------------------------- */

/*--------------------------
 scrollUp
---------------------------- */
// $.scrollUp({
// 	scrollText: '<i class="fa fa-angle-up"></i>',
// 	easingType: 'linear',
// 	scrollSpeed: 900,
// 	animation: 'slide'
// });










})(jQuery);

