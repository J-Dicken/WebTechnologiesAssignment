//Async request to get module info JSON
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

updateModDisplay();

function updateModDisplay(){
	fetchJSON('./data/moduleInfo.json', function(data){
		var modSelection = document.getElementById("modulesTaken");
		var modCode = String(modSelection.value);
		var mod = data[modCode];
		var obj = mod.outcomes.split(".");
		var modLink = "https://www.keele.ac.uk/catalogue/current/" + mod.id + ".htm";
		console.log(obj);
		document.getElementById("moduleName").innerHTML = mod.name;
		document.getElementById("moduleCode").innerHTML = mod.id.toUpperCase();
		document.getElementById("lecturer").innerHTML = "Coordinator: " + mod.lecturer;
		document.getElementById("description").innerHTML = mod.description;
		document.getElementById("aims").innerHTML = mod.aims;
		document.getElementById("obj1").innerHTML = obj[0];
		document.getElementById("obj2").innerHTML = obj[1];
		document.getElementById("obj3").innerHTML = obj[2];	
		document.getElementById("modLink").href = modLink;	
	});
}





