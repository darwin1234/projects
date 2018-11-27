var myaccount 			= document.getElementById("myaccount");
var myaccountdropdown	= document.getElementById("myaccountdropdown");
var count =0;
myaccount.addEventListener("click", function(){
	count++;
	if(count == 1){
		myaccountdropdown.style.display="block";
		count=0;
	}else{
		myaccountdropdown.style.display="none";
	}
});