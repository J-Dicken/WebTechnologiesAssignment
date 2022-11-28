var data;

//AJAX call to get the information from JSON file
function fetchJSON (path, callback) {
	var httpRequest = new XMLHttpRequest();
	httpRequest.onreadystatechange = function() {
		if (httpRequest.readyState === 4) {
			if (httpRequest.status === 200){
				data = JSON.parse(httpRequest.responseText);
				if (callback) callback(data);	
			}
		}
	};
	httpRequest.open('GET', path);
	httpRequest.send();
}

//Function to draw the JSON file to a table after it has been
//loaded through AJAX
function renderHtml(data){
	var dataDiv = document.getElementById('listTable');
	var htmlString = ''; //Initialise variable that will be sent to document
	htmlString += '<table><tr><th>City</th><th>Date</th><th>Weather Description</th></tr>'

	for (keys in data){
		var obj = data[keys];
		//Change date to UK format
		let date = obj.date.split("-");
		let dateStr = date[2] + "-" + date[1] + "-" + date[0];
		//Dynamic link to populate$_GET on display.php
		var link = "display.php?city=" + obj.city + "&date=" + dateStr + "&avgTemp=" + obj.avgTemp + "&minTemp=" + obj.minTemp + "&maxTemp=" + obj.maxTemp + "&windSpeed=" + obj.windSpeed + "&windDir=" + obj.windDir + "&humidity=" + obj.humidity + "&description=" + obj.description; 
		htmlString += '<tr>';
		htmlString += '<td><a href="' + link + '">' + obj.city + '</a></td>';
		htmlString += '<td><a href="' + link + '">' + dateStr + '</a></td>';
		htmlString += '<td><a href="' + link + '">' + obj.description + '</a></td>';
		htmlString += '</tr>';
	}

	htmlString += '</table>';
	dataDiv.insertAdjacentHTML('afterbegin', htmlString);
}

fetchJSON('data/weatherDB.json', function(data){
	renderHtml(data);
})