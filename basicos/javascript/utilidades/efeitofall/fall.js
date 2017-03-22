// Fall v1.7a  By Maxx Blade - http://www.maxxblade.co.uk
var fallg=new Array();

/////////////  Only Edit these lines  ////////////////
var no=13, speed=30, slider=30, fallmax=8, wind=0;
fallg[0]=new Array("snowflake.gif",25,28,1);
fallg[1]=new Array("snowflake2.gif",25,28,1);
fallg[2]=new Array("snowflake3.gif",25,28,1);

//////////////////////////////////////////////////////////////////
// Don't Edit Below Here Unless You Know What You're Doing ?;o) //
//////////////////////////////////////////////////////////////////
var o=new Array(), tog=1;
var ns4 = (document.layers) ? true : false;
var ie4 = (document.all) ? true : false;
var ns6 = (document.getElementById&&!document.all) ? true : false;
if(ie4)	falllayer="document.all['gf'+i].style";
if(ns4) falllayer="document.layers['gf'+i]";
if(ns6) falllayer="document.getElementById('gf'+i).style";
function winWid(){ return (ns4||ns6) ? window.innerWidth : document.body.clientWidth; }
function winHei(){ return (ns4||ns6) ? window.innerHeight : document.body.clientHeight; }
function winOfy(){ return (ns4||ns6) ? window.pageYOffset : document.body.scrollTop; }
function togFall(){
	if (tog==1){
		clearTimeout(dofall);
		for (i = 0; i < no; i++) { with(eval(falllayer)){ top = 0; left = -500; } }
		tog=0;
	}else{
		tog=1;
		fall();
	}
}
function newobj(q,t){
	x=parseInt(Math.random()*fallg.length);
	spin = parseInt(Math.random()*slider);
	spin = (Math.random()>0.5) ? spin : -spin;
	o[q] = new Array(parseInt(Math.random()*(winWid()-slider)),-30,spin,0.02+Math.random()/10,parseInt(1+Math.random()*fallmax),fallg[x][1],fallg[x][2],fallg[x][0],fallg[x][3],0);
	if(t==1){
		if(ns4){ document.write('<layer name="gf'+q+'" left="0" top="0" visibility="show"><img src="'+o[q][7]+'" border="0"></layer>'); }
		if(ie4||ns6){ document.write('<img src="'+o[q][7]+'" border="0" id="gf'+q+'" style="POSITION: absolute; Z-INDEX: -'+q+'; VISIBILITY: visible; TOP: 0px; LEFT: 0px;">'); }
	}
	if(t==0 && !ns4){
	tem=(ie4)?document.all['gf'+q]:document.getElementById('gf'+q);
	tem.src=o[q][7];
	}
}
function fall(){
	for (i = 0; i < no; i++) {
		if((o[i][1]>winHei()-o[i][6]-10)||(o[i][0]>winWid()-slider-o[i][5])){ newobj(i,0); }
		o[i][1] += o[i][4];
		o[i][0]+=wind;
		o[i][9] += o[i][3];
		sizexy=(o[i][8]==1)?Math.sin(o[i][9]):1;
		lay=(ie4)?sizexy:parseInt(sizexy+1);
		with(eval(falllayer)){
			top = o[i][1]+winOfy();
			left = o[i][0]+o[i][2]*Math.cos(o[i][9]);
			if(!ns4){
				zIndex=lay;
				width=parseInt(((o[i][5]/4)*3)+((o[i][5]/4)*sizexy));
				height=parseInt(((o[i][6]/4)*3)+((o[i][6]/4)*sizexy));
			}
		}
	}
	dofall = setTimeout("fall()", speed);
}
for (i = 0; i < no; i++){ newobj(i,1); }
dofall = setTimeout("fall()", 100);
