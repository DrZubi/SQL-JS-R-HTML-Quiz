function testing_input()                                    
{ 
    var first_name = document.forms["Quiz_form"]["first_name"];               
    var last_name = document.forms["Quiz_form"]["last_name"];    
    var game_title = document.forms["Quiz_form"]["game_title"];  
    var publisher =  document.forms["Quiz_form"]["publisher"];  
    var date_published = document.forms["Quiz_form"]["date_published"];  
    var purchase_cost = document.forms["Quiz_form"]["purchase_cost"];
	var total_time_played = document.forms["Quiz_form"]["total_time_played"];
	var genre = document.forms["Quiz_form"]["genre"];
	var gameplay = document.forms["Quiz_form"]["gameplay"];
	var console_name = document.forms["Quiz_form"]["console_name"];
	var compatibility = document.forms["Quiz_form"]["compatibility"];
	

	if (first_name.value == "")                            
    { 
        window.alert("Please enter your first name."); 
        first_name.focus(); 
        return false; 
	}	
	
    if (first_name.value == "")                            
    { 
        window.alert("Please enter your first name."); 
        first_name.focus(); 
        return false; 
	}		

    if (last_name.value == "")                               
    { 
        window.alert("Please enter your last name."); 
        last_name.focus(); 
        return false;  
	}
       
    if (game_title.value == "")                                
    { 
        window.alert("Please enter a game title."); 
        game_title.focus(); 
        return false; 
    } 
   
	if(publisher.value.length == 0){
		publisher.value = "NA";
	}
	
	if(date_published.value.length == 0){
		publisher.value == "NA";
	}
	
	if(purchase_cost.value == ""){
		window.alert("Please enter the cost to purchase the game."); 
        purchase_cost.focus(); 
        return false; 
	}
	
	if(genre.value == ""){
		window.alert("Please enter a genre"); 
        genre.focus(); 
        return false; 
	}
	
	if(total_time_played.value == ""){
		window.alert("Please enter the total time you've played the game in hours(you can estimate)."); 
        total_time_played.focus(); 
        return false; 
	}
	
	if(gameplay.value ==""){
		window.alert("Please enter a gameplay"); 
        gameplay.focus(); 
        return false; 
	}
	
	if(console_name.value == ""){
		window.alert("Please enter a console you play the game in"); 
        console.focus(); 
        return false; 
	}
	
	if(compatibility == ""){
		window.alert("Please select a compatibility option."); 
        compatibility.focus(); 
        return false; 
	}
	
}