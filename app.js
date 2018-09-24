/*jshint esversion: 6 */

var onlyForm = document.getElementById('onlyForm');
var result = document.getElementById('result');

onlyForm.addEventListener('submit', function(e) {
	"use strict"; // Avoids error message
	e.preventDefault(); // Prevents page refresh and hides form input from URL
	
	var fData = new FormData(onlyForm);
	
	console.log(fData);
	console.log(fData.get('username'));
	console.log(fData.get('password'));
	
	fetch('login.php', {
		method: 'POST',
		/*
		mode: 'cors',
		cache: 'no-cache',
		credentials: "same-origin",
		headers: {
			"Content-Type": "application/json; charset=utf-8",
		},
		redirect: "follow",
		referrer: "no-referrer",
		*/
		//body: JSON.stringify(fData),
		body: fData
	})
	.then( res => res.json()) // Once we have a response
	.then (newData => { // Data from response ^
		console.log(newData);
		if(newData === 'error') {
			result.innerHTML += "Error";
		}
		else{
			result.innerHTML += " NJIT: "+newData.njitLoginSucceded+" "+"Back-end: "+newData.backendLoginSucceeded;
			//result.innerHTML += newData;
		}
	});
});