$(document).ready(function(){

$("btn1").click(function(){

$("p").fadeOut();

});

$("btn2").click(function(){

$("p").fadeIn();

});

});







function showTable() {



//$("#myAustin").fadeOut();



// Set the area where items are displayed to null

//

document.getElementById('myAustin').innerHTML = ''; 



// Create an XMLHttpRequest object. This is used for ajax

var xhttp; 

xhttp = new XMLHttpRequest();



// Store a function to be called automatically each

// time the readyState property changes

// 4: request finished and response is ready

// 200: Status is 'OK'

// This will handle the response back from the PHP code

xhttp.onreadystatechange = function() { 

if (xhttp.readyState == 4 && xhttp.status == 200) { 

document.getElementById('myAustin').innerHTML = xhttp.responseText; 

// $("#myAustin").fadeIn();

} 

}; 



// Get a handle to the 'choices' listbox

var e = document.getElementById('choices');



// Fetch the option selected and build a URL to call with GET

// name value pair for the option selected

var item = e.options[e.selectedIndex].value;

var urlStr = 'asg9.php?myAustin=';

urlStr = urlStr.concat(item);



// Using Ajax, post the GET request

xhttp.open('GET', urlStr, true);

xhttp.send(); 

} 
