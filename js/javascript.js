/*
	Tswelopele Day care
	authors: Lindo Mlambo, Livhuwani, Jabulani Shili, Orifha Mbedzi
	Project: JCP 2018 (University of Pretoria)
*/
var imgCount
function ajax(url, callback){
	var xhttp = new XMLHttpRequest()
	xhttp.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			callback(JSON.parse(this.responseText))
		}
	}

	xhttp.open("GET", url, true)
	xhttp.send()
}

function showSlider(imgSrc, imgAlt, imgC){
	var img = document.getElementById("slider-img")
	img.src = imgSrc
	img.setAttribute("alt", imgAlt)
	document.getElementsByClassName("caption")[0].innerHTML = imgAlt
	imgCount = imgC

	// properly center image vertically
	/*
		when you clik an image a modal is activated.
			- contact Lindo mlambolindo6@gmail.com for clarity should this get confusing
	*/
	var contHeight = $(window).height()*0.84 // container height is approximately 80% of the screen height
	var imgHeight = $("img[src='"+imgSrc+"']").attr("init-height") // extract the initial height of the image to properly position in modal
	$(".slide-container img").css("top", ((contHeight - imgHeight) >= 0)?(contHeight - imgHeight)/2:15)
	console.log(contHeight - imgHeight)
}
function nextImg(pos){
	var imgs = document.getElementsByClassName("slider-imgs")
	imgCount = (imgCount+pos)

	if(imgCount > imgs.length - 1){
		imgCount = 0;
	}else if(imgCount < 0){
		imgCount = imgs.length - 1
	}
	var img = document.getElementById("slider-img")
	img.src = imgs[imgCount].src
	document.getElementsByClassName("caption")[0].innerHTML = imgs[imgCount].alt

	// properly center image vertically
	var contHeight = $(".slide-container").height()
	var imgHeight = $(".slide-container img").height()
	$(".slide-container img").css("top", (contHeight - imgHeight)/2)
	
	// console.log(imgCount)
}

// add the fixed class to navbar when width < 480px
function fixNavbar(){
	if($(document).width() <= 767){
		$(".navbar-inverse").addClass("navbar-fixed-top")
	}else{
		// $(".navbar-inverse").removeClass("navbar-fixed-top")
	}
}

/* jquery functions */
$(document).ready(function(){
	// hide/show facebook feed
	$("#facebook-feed .fb-page").slideUp(0)
	sFlag = 0
	$("#show-fb").click(function(){
		if(sFlag == 1){
			$("#facebook-feed .fb-page").slideUp("slow")
			$("#show-fb i").addClass("fa-chevron-circle-up").removeClass("fa-chevron-circle-down")
			sFlag = 0
		}else{
			$("#facebook-feed .fb-page").slideDown("slow")
			$("#show-fb i").addClass("fa-chevron-circle-down").removeClass("fa-chevron-circle-up")
			sFlag = 1
		}
	})


})
