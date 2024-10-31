/*
Random Post Slider + Social Share By Dean Adjie Minwarie
Author URI: http://www.finderonly.net/
Contribution script - > Go to Top Function by Neoease
Author: mg12
Update: 2008/05/05
Author URI: http://www.neoease.com/
*/
/*Go to top by mg12*/
(function() {
function goTop(a, t) {
	a = a || 0.2;
	t = t || 16;
	var x1 = 0;
	var y1 = 0;
	var x2 = 0;
	var y2 = 0;
	var x3 = 0;
	var y3 = 0;
	if (document.documentElement) {
		x1 = document.documentElement.scrollLeft || 0;
		y1 = document.documentElement.scrollTop || 0;
	}
	if (document.body) {
		x2 = document.body.scrollLeft || 0;
		y2 = document.body.scrollTop || 0;
	}
	var x3 = window.scrollX || 0;
	var y3 = window.scrollY || 0;
	var x = Math.max(x1, Math.max(x2, x3));
	var y = Math.max(y1, Math.max(y2, y3));
	var speed = 1 + a;
	window.scrollTo(Math.floor(x / speed), Math.floor(y / speed));
	if(x > 0 || y > 0) {
		var f = "MGJS.goTop(" + a + ", " + t + ")";
		window.setTimeout(f, t);
	}
}
window['MGJS'] = {};
window['MGJS']['goTop'] = goTop;
})();

/*Slider*/
function G(id){return document.getElementById(id);}
var Slider=(function(){
	var speed = 11;
	var space = 11;
	var slideWidth = 413;
	var moveLock = false;
	var moveTimer;
	var dist = 0;
	var slideTimer=null;
	var isScroll = false;
	var holder1 = G("holder1");
	var slidePic = G("gscroll");
	G("holder2").innerHTML = holder1.innerHTML;
	slidePic.scrollLeft = holder1.scrollWidth;
	
function slidePlay(){
	clearInterval(slideTimer);
	slideTimer = setInterval(function(){slideDown();slideStopDown();},3000);
}
function slideStop(){
	clearInterval(slideTimer);
}
function slideUp(){
	if(moveLock) return;
	clearInterval(slideTimer);
	moveLock = true;
	moveTimer = setInterval(function(){scrollUp();},speed);
}
function slideStopUp(){
	if(isScroll);
	clearInterval(moveTimer);
	if(slidePic.scrollLeft % slideWidth != 0){
		dist = -(slidePic.scrollLeft % slideWidth);
		setDist();
	}else{
		moveLock = false;
	}
	slidePlay();
}
function scrollUp(){
	if(slidePic.scrollLeft <= 0){slidePic.scrollLeft = holder1.offsetWidth}
	slidePic.scrollLeft -= space;
}
function slideDown(){
	clearInterval(moveTimer);
	if(moveLock) return;
	clearInterval(slideTimer);
	moveLock = true;
	scrollDown();
	moveTimer = setInterval(function(){scrollDown();},speed);
}
function slideStopDown(){
	if(isScroll);
	clearInterval(moveTimer);
	if(slidePic.scrollLeft % slideWidth != 0 ){
		dist = slideWidth - slidePic.scrollLeft % slideWidth;
		setDist();
	}else{
		moveLock = false;
	}
	slidePlay();
}
function scrollDown(){
	if(slidePic.scrollLeft >= holder1.scrollWidth){slidePic.scrollLeft = 0;}
	slidePic.scrollLeft += space ;
}
function setDist(){
	if(dist == 0){
	moveLock = false;
	isScroll = false;
	return;
}
var num;
var tempSpeed = speed,tempDist = space;
if(Math.abs(dist)<slideWidth/5){
	tempDist =  Math.round(Math.abs(dist/5));
	if(tempDist<1){tempDist=1};
}
if(dist < 0){
	if(dist < -tempDist){
		dist += tempDist;
		num = tempDist;
	}else{
		num = -dist;
		dist = 0;
	}
	slidePic.scrollLeft -= num;
	setTimeout(function(){setDist();},tempSpeed);
}else{
	if(dist > tempDist){
		dist -= tempDist;
		num = tempDist;
	}else{
		num = dist;
		dist = 0;
	}
slidePic.scrollLeft += num;
setTimeout(function(){setDist();},tempSpeed);
}
}
function init() {
var p=G('gscroll');
var x=G('recommend');
var l = G('slide_left'), r = G('slide_right');

x.onmouseover=function(){};
x.onmouseout=function(){};

p.onmouseover=function(){Slider.stop();};
p.onmouseout=function(){Slider.play();};

l.onmousedown = function(){Slider.up();}
r.onmousedown = function(){Slider.down();}
l.onmouseup = l.onmouseout = function(){Slider.stopUp();}
r.onmouseup = r.onmouseout = function(){Slider.stopDown();}
slidePlay();
}
return {
init:init,
play:slidePlay,
stop:slideStop,
up:slideUp,
stopUp:slideStopUp,
down:slideDown,
stopDown:slideStopDown
}
})();
Slider.init();

