/*
	Copyright Robert Nyman, http://www.robertnyman.com
	Free to use if this text is included
*/
// ---
function $(strId){
	return document.getElementById(strId);
}
// ---
function getElementsByClassName(oElm, strTagName, strClassName){
	var arrElements = (strTagName == "*" && oElm.all)? oElm.all : oElm.getElementsByTagName(strTagName);
	var arrReturnElements = new Array();
	strClassName = strClassName.replace(/\-/g, "\\-");
	var oRegExp = new RegExp("(^|\\s)" + strClassName + "(\\s|$)");
	var oElement;
	for(var i=0; i<arrElements.length; i++){
		oElement = arrElements[i];		
		if(oRegExp.test(oElement.className)){
			arrReturnElements.push(oElement);
		}	
	}
	return (arrReturnElements)
}
// ---
function addClassName(oElm, strClassName){
	var strCurrentClass = oElm.className;
	if(!new RegExp(strClassName, "i").test(strCurrentClass)){
		oElm.className = strCurrentClass + ((strCurrentClass.length > 0)? " " : "") + strClassName;
	}
}
// ---
function removeClassName(oElm, strClassName){
	var oClassToRemove = new RegExp((strClassName + "\s?"), "i");
	oElm.className = oElm.className.replace(oClassToRemove, "").replace(/^\s?|\s?$/g, "");
}
// ---