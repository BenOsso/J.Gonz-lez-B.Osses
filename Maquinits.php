<?php

session_start();

if (!isset($_SESSION['usuario'])){
    echo '
       <script> alert("DEBES INICIAR SESIÓN");
               
       </script>
    ';
    header("location: index.php");
    die();
    session_destroy();
}

$saldus = $_SESSION['saldo'];

echo "<script>
        localStorage.clear();
        sessionStorage.clear();
        sessionStorage.setItem('saldo',$saldus);
     </script>";

?>



<!DOCTYPE html>
<head>
	<title>Casino Torneo de Cell - Maquinitas</title>
<style>
@import url('https://fonts.googleapis.com/css?family=Roboto');
@import url('https://fonts.googleapis.com/css?family=Roboto+Mono');
a{
	color: #283593;
	text-decoration: none;
}
h3{
	margin-top: 12px;
}
*{
	margin:0px;
}
body{
	background-color: #424242;
	font-family: 'Roboto', sans-serif;
}
main{
	border-radius: 5px;
	background-color: #EF5350;
	margin-top: 30px;
	padding-top: 20px;
	padding-bottom: 20px;
	padding-left: 15px;
	padding-right: 15px;
	margin-left: calc((100% - 580px) / 2);
	width: 550px;
}
section#status{
	margin-bottom: 25px;
	padding-top: 25px;
	padding-bottom: 25px;
	border-radius: 5px;
	text-align: center;
	background-color: #37474F;
	color: #FFFFFF;
	font-size: 25px;
	font-family: 'Roboto Mono', monospace;
}
section#Slots{
	border-radius: 15px;
	background-color: #FAFAFA;
}
section#Gira{
	margin-top: 25px;
	padding-top: 25px;
	padding-bottom: 25px;
	border-radius: 5px;
	text-align: center;
	background-color: #AB47BC;
	color: #FFFFFF;
	font-size: 25px;
}
section#Gira:hover{
	background-color: #BA68C8;
}
section#options{
	margin-top: 20px;
	padding-top: 5px;
	border-radius: 5px;
	background-color: #C62828;
	color: #FFFFFF;
}
.option{
	padding-left: 5px;
}
section#info{
	background-color: #616161;
	padding-left: 12px;
	padding-bottom: 12px;
	border-radius: 5px;
	overflow: hidden;
	animation-duration: 1s;
	color: #BDBDBD;
	margin-top: 50px;
	margin-left: 30%;
	margin-right: 30%;
	display: none;
}
#slot1, #slot2, #slot3{
	display: inline-block;
	margin-top: 5px;
	margin-left: 15px;
	margin-right: 15px;
	background-size: 150px;
	width: 150px;
	height: 150px;
}
.a1{
	background-image: url("res/tiles/seven.png");
}
.a2{
	background-image: url("res/tiles/cherries.png");
}
.a3{
	background-image: url("res/tiles/club.png");
}
.a4{
	background-image: url("res/tiles/diamond.png");
}
.a5{
	background-image: url("res/tiles/heart.png");
}
.a6{
	background-image: url("res/tiles/spade.png");
}
.a7{
	background-image: url("res/tiles/joker.png");
}
</style>
</head>
<html>
<body onload="toggleAudio()">
<main>
	<section><?php echo $_SESSION['usuario']?></section>
	<section id="SaldoUs">Saldo:$<?php echo $_SESSION['saldo']?></section>
	<section id="status">BIENVENIDO!</section>
	<section id="Slots">
		<div id="slot1" class="a1"></div>
		<div id="slot2" class="a1"></div>
		<div id="slot3" class="a1"></div>
	</section>

	<section id="Apos">Apuesta:0</section>
	<button onclick="apostarAgrega(500)">$500</button>
	<button onclick="apostarAgrega(1000)">$1000</button>
	<button onclick="apostarAgrega(2000)">$2000</button>
	<button onclick="apostarAgrega(5000)">$5000</button>
	<button onclick="apostarAgrega(10000)">$10000</button>
	<button onclick="apostarAgrega(50000)">$50000</button>
	<button onclick="apostarAgrega(100000)">$100000</button>



	<section onclick="doSlot()" id="Gira">JUEGUE!</section>
	
	<section id="options">
		<img src="res/icons/audioOn.png" id="audio" class="option" onclick="toggleAudio()" />
	</section>
	<br>
	<br>
	<br>
	<br>
	<a href="indexUser.php">Volver al menu anterior</a>
</main>


<script>
var doing = false;
var spin = [new Audio("res/sounds/spin.mp3"),new Audio("res/sounds/spin.mp3"),new Audio("res/sounds/spin.mp3"),new Audio("res/sounds/spin.mp3"),new Audio("res/sounds/spin.mp3"),new Audio("res/sounds/spin.mp3"),new Audio("res/sounds/spin.mp3")];
var coin = [new Audio("res/sounds/coin.mp3"),new Audio("res/sounds/coin.mp3"),new Audio("res/sounds/coin.mp3")]
var win = new Audio("res/sounds/win.mp3");
var lose = new Audio("res/sounds/lose.mp3");
var audio = false;
let status = document.getElementById("status")
var info = true;

var Apuesta = 0;

function apostarAgrega(numbero){

	if (numbero>sessionStorage.getItem('saldo') || Apuesta>sessionStorage.getItem('saldo') || Apuesta+numbero>sessionStorage.getItem('saldo') ){
		alert("No te alcanza.")
	}else{
	Apuesta+=numbero;
	document.getElementById('Apos').innerText = "Apuesta:"+Apuesta;
	}
}

function doSlot(){

	if (Apuesta<=0){
		alert("Debes apostar antes de jugar!")
	}else{


		if (sessionStorage.getItem('saldo')<Apuesta){
			alert("No te alcanza")
		}else{

	if (doing){return null;}
	doing = true;
	var numChanges = randomInt(1,4)*7
	var numeberSlot1 = numChanges+randomInt(1,7)
	var numeberSlot2 = numChanges+2*7+randomInt(1,7)
	var numeberSlot3 = numChanges+4*7+randomInt(1,7)

	var i1 = 0;
	var i2 = 0;
	var i3 = 0;
	var sound = 0
	status.innerHTML = "JUGANDO..."
	slot1 = setInterval(spin1, 50);
	slot2 = setInterval(spin2, 50);
	slot3 = setInterval(spin3, 50);
	function spin1(){
		i1++;
		if (i1>=numeberSlot1){
			coin[0].play()
			clearInterval(slot1);
			return null;
		}
		slotTile = document.getElementById("slot1");
		if (slotTile.className=="a7"){
			slotTile.className = "a0";
		}
		slotTile.className = "a"+(parseInt(slotTile.className.substring(1))+1)
	}
	function spin2(){
		i2++;
		if (i2>=numeberSlot2){
			coin[1].play()
			clearInterval(slot2);
			return null;
		}
		slotTile = document.getElementById("slot2");
		if (slotTile.className=="a7"){
			slotTile.className = "a0";
		}
		slotTile.className = "a"+(parseInt(slotTile.className.substring(1))+1)
	}
	function spin3(){
		i3++;
		if (i3>=numeberSlot3){
			coin[2].play()
			clearInterval(slot3);
			testWin();
			return null;
		}
		slotTile = document.getElementById("slot3");
		if (slotTile.className=="a7"){
			slotTile.className = "a0";
		}
		sound++;
		if (sound==spin.length){
			sound=0;
		}
		spin[sound].play();
		slotTile.className = "a"+(parseInt(slotTile.className.substring(1))+1)
	}
    }
    }
}

function testWin(){
	var slot1 = document.getElementById("slot1").className
	var slot2 = document.getElementById("slot2").className
	var slot3 = document.getElementById("slot3").className

	if (((slot1 == slot2 && slot2 == slot3) ||
		(slot1 == slot2 && slot3 == "a7") ||
		(slot1 == slot3 && slot2 == "a7") ||
		(slot2 == slot3 && slot1 == "a7") ||
		(slot1 == slot2 && slot1 == "a7") ||
		(slot1 == slot3 && slot1 == "a7") ||
		(slot2 == slot3 && slot2 == "a7") ) && !(slot1 == slot2 && slot2 == slot3 && slot1=="a7")){
		status.innerHTML = "GANASTE!";

		sessionStorage.setItem('saldo',sessionStorage.getItem('saldo')+Apuesta);
		document.getElementById('SaldoUs').innerText = "Saldo:"+sessionStorage.getItem('saldo');
		actualizarSaldo(Apuesta,0);
		win.play();
	}else{
		status.innerHTML = "PERDISTE!"
		sessionStorage.setItem('saldo',sessionStorage.getItem('saldo')-Apuesta);
		document.getElementById('SaldoUs').innerText = "Saldo:"+sessionStorage.getItem('saldo');
		actualizarSaldo(Apuesta,1);
		lose.play();
	}
	doing = false;
}

function toggleAudio(){
	if (!audio){
		audio = !audio;
		for (var x of spin){
			x.volume = 0.5;
		}
		for (var x of coin){
			x.volume = 0.5;
		}
		win.volume = 1.0;
		lose.volume = 1.0;
	}else{
		audio = !audio;
		for (var x of spin){
			x.volume = 0;
		}
		for (var x of coin){
			x.volume = 0;
		}
		win.volume = 0;
		lose.volume = 0;
	}
	document.getElementById("audio").src = "res/icons/audio"+(audio?"On":"Off")+".png";
}

function randomInt(min, max){
	return Math.floor((Math.random() * (max-min+1)) + min);
}

function actualizarSaldo(cantidad,GanaPierde){
    fetch('php/actualizarsaldo.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `cantidad_fichas=${cantidad}&gana_pierde=${GanaPierde}`,
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(data.message);
        } else {
            alert('Error: ' + data.message);
        }
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}
</script>
</body>
</html>