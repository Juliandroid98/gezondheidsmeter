function addRowForInput(){
	if(document.getElementById('addRowGebruiker').style.display=='none'){
		document.getElementById('addRowGebruiker').style.display='contents';
	}
	else{
		document.getElementById('addRowGebruiker').style.display='none';
	}
}

function addRowForEdit(ID){
	if(document.getElementById('addRowEdit'+ID).style.display=='none'){
		document.getElementById('addRowEdit'+ID).style.display='contents';
	}
	else{
		document.getElementById('addRowEdit'+ID).style.display='none';
	}
}

/*function bevestigDelete(){
	var a = confirm('wilt u verwijderen?');
	if(a == true){
		alert('verwijderd');
	}
	else{
		alert('nog niet verwijderd');
	}
}*/