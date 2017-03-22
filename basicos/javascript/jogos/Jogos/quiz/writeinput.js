//var file = location.search.split("=")
//alert(file[1])
var file = prompt("Please enter the name of the quiz data file, including extension",".js")
document.write("<tt><script src='" + file + "'></script></tt>")
if(file == null || file == "" || file == "undefined" || file == ".js")
{
	alert("Cannot find a quiz data file!\n\nThere will be some JS errors to follow!\n\nYou must enter a filename!.");

}
