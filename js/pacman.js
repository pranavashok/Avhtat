var x=100,y=100;
var pac, foo;
var maxx, maxy;
var dx=1, dy=0;
var flag=1;
var speed=8;
var score=0;

function init(){
	pac = pacman;
	foo = food;	
	maxx = 600;
	maxy = 384;
	foo.style.left = maxx/2 + 'px';
	foo.style.top = maxy/2 + 'px';
	pac.style.left ='100px';
	pac.style.top ='100px';
	mainLoop();
}

function keyHandler(event){
	event.preventDefault();
	if(event.keyCode==37){
		dx=-1;
		dy=0;
		removeClass(pac, 'right');removeClass(pac, 'up');removeClass(pac, 'down');removeClass(pac, 'left');
		addClass(pac, 'left');
	}else if(event.keyCode==38){
		dx=0;
		dy=-1;
		removeClass(pac, 'right');removeClass(pac, 'up');removeClass(pac, 'down');removeClass(pac, 'left');
		addClass(pac, 'up');
	}else if(event.keyCode==39){
		dx=1;
		dy=0;
		removeClass(pac, 'right');removeClass(pac, 'up');removeClass(pac, 'down');removeClass(pac, 'left');
		addClass(pac, 'right');
	}else if(event.keyCode==40){
		dx=0;
		dy=1;
		removeClass(pac, 'right');removeClass(pac, 'up');removeClass(pac, 'down');removeClass(pac, 'left');
		addClass(pac, 'down');
	}else if(event.keyCode==27){
		flag=0;
	}else if(event.keyCode==113){
		alert('yes');
		oe_overlay.style.display='block';
		flag=1;
		mainLoop();
	}
}
function newFood(){
	foo.style.top = Math.floor(Math.random()*maxy);
	foo.style.left = Math.floor(Math.random()*maxx);
}
function updateCords(){
	collDetect();
	x+=dx*speed;
	y+=dy*speed;
	if (x>maxx)
		x=0;
	else if(x+24<0)
		x=maxx;
	if (y>maxy)
		y=0;
	else if(y<=-24)
		y=maxy;
}

function hasClass(ele,cls) {
	return ele.className.match(new RegExp('(\\s|^)'+cls+'(\\s|$)'));
}

function addClass(ele,cls) {
	if (!this.hasClass(ele,cls)) ele.className += ""+cls;
}

function removeClass(ele,cls) {
	if (hasClass(ele,cls)) {
		var reg = new RegExp('(\\s|^)'+cls+'(\\s|$)');
		ele.className=ele.className.replace(reg,'');
	}
}

function isxinrange() {
  if(((pac.offsetLeft+24) > foo.offsetLeft)&&(pac.offsetLeft < (foo.offsetLeft+10))) {
    //alert("x is in range");
    return true;
  }
}

function isyinrange() {
  if((pac.offsetTop+24 > foo.offsetTop)&&(pac.offsetTop < foo.offsetTop+10)) {
    //alert("y is in range");
    return true;
  }
}

function collDetect(){
	if(isxinrange() && isyinrange()) {
	//if ((pac.offsetLeft >=(foo.offsetLeft-20)) && (pac.offsetLeft <= (foo.offsetLeft+30))){
		score+=10;
		newFood();
		//alert('hi');
	}
}
function mainLoop(){
	updateCords();
	pac.style.left= x+'px';
	pac.style.top = y+'px';
	//scoreboard.innerHTML = '('+pac.offsetLeft+', '+pac.offsetTop+') - ('+foo.offsetLeft+', '+ foo.offsetTop+')';
	scoreboard.innerHTML = 'Score : ' + score;
	if(flag)
		setTimeout('mainLoop()',40);
}
