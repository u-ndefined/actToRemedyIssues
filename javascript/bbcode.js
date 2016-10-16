var textareaSelected = null;

function selectTextarea(textareaID){
	textareaSelected = textareaID;
}



function insertTag(startTag, endTag, tagType) {

	var field  = document.getElementById(textareaSelected); 

	var scroll = field.scrollTop;

	field.focus();



	/* === Partie 1 : on récupère la sélection === */

	if (window.ActiveXObject) {

		var textRange = document.selection.createRange();            

		var currentSelection = textRange.text;

	} else {

		var startSelection   = field.value.substring(0, field.selectionStart);

		var currentSelection = field.value.substring(field.selectionStart, field.selectionEnd);

		var endSelection     = field.value.substring(field.selectionEnd);               

	}



	/* === Partie 2 : on analyse le tagType === */

	if (tagType) {

		switch (tagType) {

			case "link":

			endTag = "</link>";

        if (currentSelection) { // Il y a une sélection

        	if (currentSelection.indexOf("http://") == 0 || currentSelection.indexOf("https://") == 0 || currentSelection.indexOf("ftp://") == 0 || currentSelection.indexOf("www.") == 0) {

                        // La sélection semble être un lien. On demande alors le libellé

                        var label = prompt("Quel est le libellé du lien ?") || "";

                        startTag = "<link url=\"" + currentSelection + "\">";

                        currentSelection = label;

                    } else {

                        // La sélection n'est pas un lien, donc c'est le libelle. On demande alors l'URL

                        var URL = prompt("Quelle est l'url ?");

                        startTag = "<link url=\"" + URL + "\">";

                    }

        } else { // Pas de sélection, donc on demande l'URL et le libelle

        var URL = prompt("Quelle est l'url ?") || "";

        var label = prompt("Quel est le libellé du lien ?") || "";

        startTag = "<link url=\"" + URL + "\">";

        currentSelection = label;                     

    }

    break;

    

}

}



/* === Partie 3 : on insère le tout === */

if (window.ActiveXObject) {

	textRange.text = startTag + currentSelection + endTag;

	textRange.moveStart("character", -endTag.length - currentSelection.length);

	textRange.moveEnd("character", -endTag.length);

	textRange.select();     

} else {

	field.value = startSelection + startTag + currentSelection + endTag + endSelection;

	field.focus();

	field.setSelectionRange(startSelection.length + startTag.length, startSelection.length + startTag.length + currentSelection.length);

} 


field.scrollTop = scroll;     

}