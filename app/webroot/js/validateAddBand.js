function checkForJs(){
	//Show javascript-enabled button, hide direct-to-server button
	document.getElementById("registerBandJs").style.display="inline";
	document.getElementById("registerBandPhp").style.display="none";
	//document.getElementById("bandNameError").innerHTML="Testing";
	//document.getElementById("genreError").innerHTML=document.getElementById("genre_id").selectedIndex;
	}


window.onload=checkForJs;

function resetMessages(){
        document.getElementById("bandNameError").innerHTML="";
	document.getElementById("genreError").innerHTML="";
}

function registerBand(){
   
	var valid = 1;

        resetMessages();
	
	//Band Name
	var bandNameJs = document.getElementById("band_name").value;

	if (bandNameJs.length > 0){
		valid = 0;
		document.getElementById("bandNameError").innerHTML="You must enter a Band Name";
		}	

	//Genre
	if(document.getElementById("genre_id").selectedIndex === 0){
		valid = 0;
		document.getElementById("genreError").innerHTML="You must select a Genre";
		}
	
	
	//Facebook
	var facebookPattern = /^[A-Za-z0-9]+$/;
	var facebookJs = document.getElementById("facebook").value;

	if (facebookJs.length > 0 && !(facebookPattern.test(facebookJs))){
		value = 0;
		document.getElementById("facebookError").innerHTML="Invalid url";
		}

	//Twitter
        
	var twitterPattern = /^[A-Za-z]+$/;
        var twitterJs = document.getElementById("twitter").value;

        if (twitterJs.length > 0 && !(twitterPattern.test(twitterJs))){
                valid = 0;
                document.getElementById("twitterError").innerHTML="Invalid url";
                }
        

	if (valid == 1){
		document.getElementById("registerBandForm").submit();
		}
}
