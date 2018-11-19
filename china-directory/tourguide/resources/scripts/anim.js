
var asyncAnimQueue = [];

setInterval(function(){
	if(asyncAnimQueue.length > 0) {
		asyncAnimQueue[0].anim();
		asyncAnimQueue.shift();
	}
}, 50);



var fallIn = function(id, fromX, toX){
	this.anim = function() {
		var top = fromX;
		var target = document.getElementById(id);
		if(!target) return;
		target.style.top = fromX + 'px';
		var tp = setInterval(function(){
			if( top < toX ) {
				target.style.top = top + 'px';
				top += 3;
			} else {
				clearInterval(tp);
			}
		}, 5);
	};
};

/* // SAMPLE

var test1 = new fallIn('spanCounts1', -20, 30);
var test2 = new fallIn('spanCounts2', -20, 30);
var test3 = new fallIn('spanCounts3', -20, 30);

asyncAnimQueue.push(test1);
asyncAnimQueue.push(test2);
asyncAnimQueue.push(test3);

};
*/