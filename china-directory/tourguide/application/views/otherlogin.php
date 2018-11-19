<?php
//die();
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="shortcut icon" type="image/png" href="<?php echo base_url();?>images/fav.png"/>
 <style> 
   
  html, body {
  border: 0;
  padding: 0;
  margin: 0;
  height: 100%;
}

body {
  background: #52c9e7;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 16px;
}

form {
  background: white;
  width: 40%;
  box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.7);
  font-family: lato;
  position: relative;
  color: #333;
  border-radius: 10px;
}
form header {
  background: #FF3838;
  padding: 30px 20px;
  color: white;
  font-size: 1.2em;
  font-weight: 600;
  border-radius: 10px 10px 0 0;
  font-family: myriad pro;

}
form label {
  margin-left: 20px;
  display: inline-block;
  margin-top: 30px;
  margin-bottom: 5px;
  position: relative;
}
form label span {
  color: #FF3838;
  font-size: 2em;
  position: absolute;
  left: 2.3em;
  top: -10px;
}
form input[type="text"],form input[type="password"] {
  display: block;
  width: 93%;
  margin-left: 20px;
  padding: 5px 20px;
  font-size: 1em;
  border-radius: 3px;
  outline: none;
  border: 1px solid #ccc;
}
form .help {
  margin-left: 20px;
  font-size: 0.8em;
  color: #777;
}
form #button {
  position: relative;
  margin-top: 30px;
  margin-bottom: 30px;
  left: 50%;
  transform: translate(-50%, 0);
  font-family: inherit;
  color: white;
  background: #FF3838;
  outline: none;
  border: none;
  padding: 5px 15px;
  font-size: 1.3em;
  font-weight: 400;
  border-radius: 3px;
  box-shadow: 0px 0px 10px rgba(51, 51, 51, 0.4);
  cursor: pointer;
  transition: all 0.15s ease-in-out;
}
form #button:hover {
  background: #52c9e7;
}

 
 * {
    margin: 0;
    padding: 0;
  	-moz-box-sizing: border-box;
		-o-box-sizing: border-box;
		-webkit-box-sizing: border-box;
		box-sizing: border-box;
	}

	body {
		width: 100%;
		height: 100%;
		font-family: "helvetica neue", helvetica, arial, sans-serif;
		font-size: 13px;
		text-align: center;
		background: #333 url('http://subtlepatterns.subtlepatterns.netdna-cdn.com/patterns/low_contrast_linen.png');
	}

	ul {
		margin: 30px auto;
		text-align: center;
	}

	li {
		list-style: none;
		position: relative;
		display: inline-block;
		width: 150px;
		height: 150px;
	}

	@-moz-keyframes rotate {
		0% {transform: rotate(0deg);}
		100% {transform: rotate(-360deg);}
	}

	@-webkit-keyframes rotate {
		0% {transform: rotate(0deg);}
		100% {transform: rotate(-360deg);}
	}

	@-o-keyframes rotate {
		0% {transform: rotate(0deg);}
		100% {transform: rotate(-360deg);}
	}

	@keyframes rotate {
		0% {transform: rotate(0deg);}
		100% {transform: rotate(-360deg);}
	}

	.round {
		display: block;
		position: absolute;
		left: 0;
		top: 0;
		width: 100%;
		height: 100%;
		padding-top: 30px;		
		text-decoration: none;		
		text-align: center;
		font-size: 25px;		
		letter-spacing: -.065em;
		font-family: "Hammersmith One", sans-serif;		
		-webkit-transition: all .25s ease-in-out;
		-o-transition: all .25s ease-in-out;
		-moz-transition: all .25s ease-in-out;
		transition: all .25s ease-in-out;
		box-shadow: 2px 2px 7px rgba(0,0,0,.2);
		border-radius: 300px;
		z-index: 1;
		border-width: 4px;
		border-style: solid;
	}

	.round:hover {
		width: 130%;
		height: 130%;
		left: -15%;
		top: -15%;
		font-size: 33px;
		padding-top: 38px;
		-webkit-box-shadow: 5px 5px 10px rgba(0,0,0,.3);
		-o-box-shadow: 5px 5px 10px rgba(0,0,0,.3);
		-moz-box-shadow: 5px 5px 10px rgba(0,0,0,.3);
		box-shadow: 5px 5px 10px rgba(0,0,0,.3);
		z-index: 2;
		border-size: 10px;
		-webkit-transform: rotate(-360deg);
		-moz-transform: rotate(-360deg);
		-o-transform: rotate(-360deg);
		transform: rotate(-360deg);
	}

	a.red {
		background-color: rgba(239,57,50,1);
		color: rgba(133,32,28,1);
		border-color: rgba(133,32,28,.2);
	}

	a.red:hover {
		color: rgba(239,57,50,1);
	}

	a.green {
		background-color: #673493;
		color: rgba(0,63,71,1);
		border-color: #673493;
	}

	a.green:hover {
		color: #673493;
	}

	a.yellow {
		background-color: rgba(252,227,1,1);
		color: rgba(153,38,0,1);
		border-color: rgba(153,38,0,.2);
	}

	a.yellow:hover {
		color: rgba(252,227,1,1);
	}

	a.blue {
		background-color:  #009fc9;
		color: rgba(133,32,28,1);
		border-color:  #009fc9;
	}

	a.blue:hover {
		color:  #009fc9;
	}

	a.brown {
		background-color:  #78b649;
		color: rgba(133,32,28,1);
		border-color: #78b649;
	}

	a.brown:hover {
		color: #78b649;
	}

	.round span.round {
		display: block;
		opacity: 0;
		-webkit-transition: all .5s ease-in-out;
		-moz-transition: all .5s ease-in-out;
		-o-transition: all .5s ease-in-out;
		transition: all .5s ease-in-out;
		font-size: 1px;
		border: none;
		padding: 40% 20% 0 20%;
		color: #fff;
	}

	.round span:hover {
		opacity: .85;
		font-size: 16px;
		-webkit-text-shadow: 0 1px 1px rgba(0,0,0,.5);
		-moz-text-shadow: 0 1px 1px rgba(0,0,0,.5);
		-o-text-shadow: 0 1px 1px rgba(0,0,0,.5);
		text-shadow: 0 1px 1px rgba(0,0,0,.5);	
	}

	.green span {
		background: #673493;		
	}

	.red span {
		background: rgba(133,32,28,.7);		
	}

	.yellow span {
		background: rgba(161,145,0,.7);	

	}

	.blue span {
		background: #009fc9;	

	}

	.brown span {
		background: #78b649;	

	}
   </style>

   
 </head>
 <body>
   
   <ul>
		<li><a href="<?php echo base_url(); ?>Login/g12Login" class="round green">G12<span class="round"><h3>Login</h3></span></a></li>
		<li><a href="<?php echo base_url(); ?>Login/ushersLogin" class="round red">Backtracking<span class="round"><h3>Login</h3></span></a></li>
		<li><a href="<?php echo base_url(); ?>Login/multimediaLogin" class="round yellow">Multimedia<span class="round"><h3>Login</h3></span></a></li>
		<li><a href="<?php echo base_url(); ?>Login/peplogin" class="round blue">PEP<span class="round"><h3>Login</h3></span></a></li>
		<li><a href="<?php echo base_url(); ?>Login/sollogin" class="round brown">SOL<span class="round"><h3>Login</h3></span></a></li>
  </ul>
 </body>
</html>