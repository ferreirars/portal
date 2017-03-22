var file = location.search.split("=")
//alert(file[1])
document.write("<tt><script src='" + file[1] + "'></script></tt>")
if(file.length==1)
{
	alert("Cannot find a quiz data file!\n\nThere will be some JS errors to follow!\n\nPlease link to this file as shown in install.html.");

}
