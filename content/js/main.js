function showContent(link, id) {
	var cont = document.getElementById(id);
	
	var http = createRequestObject();
	if( http ) {
		http.open('get', link);
		http.onreadystatechange = function () {
			if(http.readyState == 4) {
				if(id)
					cont.innerHTML = http.responseText;
				else
					return http.responseText;
			}
		}
		http.send(null);    
	}
};

function createRequestObject() {
	try { return new XMLHttpRequest() }
	catch(e) {
		try { return new ActiveXObject('Msxml2.XMLHTTP') }
		catch(e) {
			try { return new ActiveXObject('Microsoft.XMLHTTP') }
			catch(e) { return null; }
		}
	}
};