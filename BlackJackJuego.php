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
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Casino Torneo de Cell - BlackJack</title>
        <link rel="stylesheet" href="blackjack.css">
        
    </head>

    <body>
        <nav>
            <h2><?php echo $_SESSION['usuario'] ?></h2>
            <h2 id="Saldo">Saldo:$<?php echo $_SESSION['saldo'] ?></h2>
            <button onclick="volverInicio()">Volver al menu anterior</button>
        </nav>

        <h2>Dealer: <span id="dealer-sum"></span></h2>
        <div id="dealer-cards">
            <img id="hidden" src="./cards/BACK.png">
        </div>

        <h2>Tú: <span id="your-sum"></span></h2>
        <div id="your-cards"></div>

        <br>
        <button id="hit">Hit</button>
        <button id="stay">Stay</button>
        <p id="results"></p>
        <br>

        <div>
            <h2>Tu apuesta</h2><input type="number" id="apos" min="0" value="0"><button onclick="Apostar()" id="Sal">Apostar</button>
        </div>
       

    </body>
    <script>
        let dealerSum = 0;
let yourSum = 0;

let dealerAceCount = 0;
let yourAceCount = 0; 

var ApuestaJugador = 0;

var saldoJug = sessionStorage.getItem('saldo');

let hidden;
let deck;

let Ganaste = false;
let canHit = true; //allows the player (you) to draw while yourSum <= 21

window.onload = function() {
    buildDeck();
    shuffleDeck();
    startGame();
}

function buildDeck() {
    let values = ["A", "2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K"];
    let types = ["C", "D", "H", "S"];
    deck = [];

    for (let i = 0; i < types.length; i++) {
        for (let j = 0; j < values.length; j++) {
            deck.push(values[j] + "-" + types[i]); //A-C -> K-C, A-D -> K-D
        }
    }
    // console.log(deck);
}

function shuffleDeck() {
    for (let i = 0; i < deck.length; i++) {
        let j = Math.floor(Math.random() * deck.length); // (0-1) * 52 => (0-51.9999)
        let temp = deck[i];
        deck[i] = deck[j];
        deck[j] = temp;
    }
    console.log(deck);
}

function startGame() {
    hidden = deck.pop();
    dealerSum += getValue(hidden);
    dealerAceCount += checkAce(hidden);
    // console.log(hidden);
    // console.log(dealerSum);
    
        //<img src="./cards/4-C.png">
    let cardImg = document.createElement("img");
    let card = deck.pop();
    cardImg.src = "./cards/" + card + ".png";
    dealerSum += getValue(card);
    dealerAceCount += checkAce(card);
    document.getElementById("dealer-cards").append(cardImg);
    
    console.log(dealerSum);

    for (let i = 0; i < 1; i++) {
        let cardImg = document.createElement("img");
        let card = deck.pop();
        cardImg.src = "./cards/" + card + ".png";
        yourSum += getValue(card);
        yourAceCount += checkAce(card);
        document.getElementById("your-cards").append(cardImg);
    }

    console.log(yourSum);
    document.getElementById("hit").addEventListener("click", hit);
    document.getElementById("stay").addEventListener("click", stay);

    document.getElementById("hit").disabled=true;
    document.getElementById("stay").disabled=true;

}



function hit() {

    let cardImg = document.createElement("img");
    let card = deck.pop();
    cardImg.src = "./cards/" + card + ".png";
    yourSum += getValue(card);
    yourAceCount += checkAce(card);
    document.getElementById("your-cards").append(cardImg);


    if (reduceAce(yourSum, yourAceCount) > 21) { //A, J, 8 -> 1 + 10 + 8
        canHit = false;
        //window.alert("Has perdido!");
        //location.replace(location.href)


        document.getElementById("dealer-sum").innerText = dealerSum;
        document.getElementById("your-sum").innerText = yourSum;
        document.getElementById("results").innerText = "Perdiste!";

        GameOver();

    }else if (reduceAce(yourSum, yourAceCount) > 21 || yourSum == 21){
        stay();
        
    }
}

function Apostar(){
    ApuestaJugador = document.getElementById('apos').value;

    if (ApuestaJugador<=0){
        alert("APUESTA INVALIDA!!!");
        ApuestaJugador = 0;
        document.getElementById('apos').value = 0;
    }else{
        
        if (ApuestaJugador>saldoJug){
            alert("NO TIENES SALDO SUFICIENTE!!");
            document.getElementById('apos').value = 0;
        }else{
            document.getElementById("hit").disabled = false;
            document.getElementById("stay").disabled = false;
            document.getElementById("apos").disabled = true;
            document.getElementById("Sal").disabled = true;

        }
    }

}





function GameOver(){
    document.getElementById('hit').disabled = true;
    document.getElementById('stay').disabled = true;

    if (yourSum > 21) {
        message = "Perdiste!";

        sessionStorage.setItem('saldo',sessionStorage.getItem('saldo')-ApuestaJugador);

        actualizarSaldo(ApuestaJugador,1);
    }
    else if (dealerSum > 21) {
        message = "Ganaste!";


        sessionStorage.setItem('saldo',sessionStorage.getItem('saldo')+ApuestaJugador);

        actualizarSaldo(ApuestaJugador,0);
    }
    //both you and dealer <= 21
    else if (yourSum == dealerSum) {
        message = "Empate!";

    }
    else if (yourSum > dealerSum) {
        message = "Ganaste!";

        sessionStorage.setItem('saldo',sessionStorage.getItem('saldo')+ApuestaJugador);

        actualizarSaldo(ApuestaJugador,0);
    }
    else if (yourSum < dealerSum) {
        message = "Perdiste!";


        sessionStorage.setItem('saldo',sessionStorage.getItem('saldo')-ApuestaJugador);

        actualizarSaldo(ApuestaJugador,1);
    }

    

    setTimeout(function(){
        window.location.href = 'BlackJackJuego.php';
    },3000)
}

function stay() {
    dealerSum = reduceAce(dealerSum, dealerAceCount);
    yourSum = reduceAce(yourSum, yourAceCount);

    canHit = false;
    document.getElementById("hidden").src = "./cards/" + hidden + ".png";

    while (dealerSum < yourSum){
        //<img src="./cards/4-C.png">
        let cardImg = document.createElement("img");
        let card = deck.pop();
        cardImg.src = "./cards/" + card + ".png";
        dealerSum += getValue(card);
        dealerAceCount += checkAce(card);
        document.getElementById("dealer-cards").append(cardImg);
    }

    message = ""

    if (yourSum > 21) {
        message = "Perdiste!";
        
    }
    else if (dealerSum > 21) {
        message = "Ganaste!";
    }
    //both you and dealer <= 21
    else if (yourSum == dealerSum) {
        message = "Empate!";
    }
    else if (yourSum > dealerSum) {
        message = "Ganaste!";
    }
    else if (yourSum < dealerSum) {
        message = "Perdiste!";
    }

    document.getElementById("dealer-sum").innerText = dealerSum;
    document.getElementById("your-sum").innerText = yourSum;
    document.getElementById("results").innerText = message;
    
    GameOver();
   
}

function getValue(card) {
    let data = card.split("-"); // "4-C" -> ["4", "C"]
    let value = data[0];

    if (isNaN(value)) { //A J Q K
        if (value == "A") {
            return 11;
        }
        return 10;
    }
    return parseInt(value);
}

function checkAce(card) {
    if (card[0] == "A") {
        return 1;
    }
    return 0;
}

function reduceAce(playerSum, playerAceCount) {
    while (playerSum > 21 && playerAceCount > 0) {
        playerSum -= 10;
        playerAceCount -= 1;
    }
    return playerSum;
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

function volverInicio(){
    window.location.href = 'indexUser.php';
}


    </script>

</html>