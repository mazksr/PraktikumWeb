let botSums = 0;
let mySums = 0;

let botASCards = 0;
let myASCards = 0;

let cards;
let isCanHit = true;

const startGameButton = document.getElementById("btn-start-game");
const takeCardButton = document.getElementById("btn-take");
const holdCardsButton = document.getElementById("btn-hold");

const mySumsElement = document.getElementsByClassName("my-sums")[0];
const myCardsElement = document.getElementsByClassName("my-cards")[0];
const myMoney = document.getElementById("my-money");
const inputMoney = document.getElementById("bet-input");

const botSumsElement = document.getElementsByClassName("bot-sums")[0];
const botCardsElement = document.getElementsByClassName("bot-cards")[0];

const resultElement = document.getElementById("result");

const betForm = document.getElementById("bet-form");
const betInput = document.getElementById("bet-input");

window.onload = () => {
  buildUserCards();
  shuffleCards();
  takeCardButton.setAttribute("disabled", true);
  holdCardsButton.setAttribute("disabled", true);
  if ((betInput.value > parseInt(myMoney.textContent) || betInput.value == "") && startGameButton.textContent === "START GAME") {
    startGameButton.setAttribute("disabled", true);
  } else {
    startGameButton.removeAttribute("disabled");
  }

  betInput.addEventListener("input", function () {
    // Check if the input is empty or less than balance
    if ((betInput.value > parseInt(myMoney.textContent) || betInput.value == "") && startGameButton.textContent === "START GAME") {
      startGameButton.setAttribute("disabled", true);
    } else {
      startGameButton.removeAttribute("disabled");
    }
  });
};

function buildUserCards() {
  let cardTypes = ["H", "B", "S", "K"];
  let cardValues = [
    "A",
    "2",
    "3",
    "4",
    "5",
    "6",
    "7",
    "8",
    "9",
    "10",
    "K",
    "Q",
    "J",
  ];
  cards = [];

  for (let i = 0; i < cardTypes.length; i++) {
    for (let j = 0; j < cardValues.length; j++) {
      cards.push(cardValues[j] + "-" + cardTypes[i]);
    }
  }
}

function shuffleCards() {
  for (let i = 0; i < cards.length; i++) {
    let randomNum = Math.floor(Math.random() * cards.length);
    let temp = cards[i];
    cards[i] = cards[randomNum];
    cards[randomNum] = temp;
  }
}

startGameButton.addEventListener("click", function () {
  if (startGameButton.textContent === "TRY AGAIN" && myMoney.textContent > 0) {
    botSums = 0;
    mySums = 0;
    botASCards = 0;
    myASCards = 0;
    isCanHit = true;
    resultElement.textContent = "";
    // betForm.reset();

    const allCardsImage = document.querySelectorAll("img");
    for (let i = 0; i < allCardsImage.length; i++) {
      allCardsImage[i].remove();
    }

    let cardImg = document.createElement("img");
    cardImg.src = "/images/cards/BACK.png";
    cardImg.className = "hidden-card";
    botCardsElement.append(cardImg);

    buildUserCards();
    shuffleCards();
  } else if (startGameButton.textContent === "TRY AGAIN" && myMoney.textContent <= 0) {
    location.reload();
  }

  takeCardButton.disabled = false;
  holdCardsButton.disabled = false;
  startGameButton.textContent = "TRY AGAIN";
  startGameButton.setAttribute("disabled", true);

  for (let i = 0; i < 2; i++) {
    let cardImg = document.createElement("img");
    let card = cards.pop();
    cardImg.src = `/images/cards/${card}.png`;
    mySums += getValueOfCard(card);
    myASCards += checkASCard(card);
    mySumsElement.textContent = mySums;
    myCardsElement.append(cardImg);
  }
});

takeCardButton.addEventListener("click", function () {
  if (!isCanHit) return;
  let cardImg = document.createElement("img");
  let card = cards.pop();
  cardImg.src = `/images/cards/${card}.png`;
  mySums += getValueOfCard(card);
  myASCards += checkASCard(card);
  mySumsElement.textContent = mySums;
  myCardsElement.append(cardImg);

  if (reduceASCardValue(mySums, myASCards) > 21) isCanHit = false;

  if (mySums > 21) {
    takeCardButton.disabled = true;
    holdCardsButton.disabled = true;
    startGameButton.disabled = false;
    resultElement.textContent = "KALAH";
    myMoney.textContent -= inputMoney.value;

    if ((betInput.value > parseInt(myMoney.textContent) || betInput.value == "") && startGameButton.textContent === "START GAME") {
      startGameButton.setAttribute("disabled", true);
    } else {
      startGameButton.removeAttribute("disabled");
    }
    betInput.addEventListener("input", function () {
    if ((betInput.value > parseInt(myMoney.textContent) || betInput.value == "")) {
      (startGameButton.disabled = true);
    } else {
      startGameButton.disabled = false;
    }
  })}
  if (mySums == 21) {
    message = "MENANG";
    myMoney.textContent = inputMoney.value * 2 * 3;

    resultElement.textContent = message;
    startGameButton.disabled = false;
    takeCardButton.disabled = true;
    holdCardsButton.disabled = true;
    
    if ((betInput.value > parseInt(myMoney.textContent) || betInput.value == "") && startGameButton.textContent === "START GAME") {
      startGameButton.setAttribute("disabled", true);
    } else {
      startGameButton.removeAttribute("disabled");
    }
    betInput.addEventListener("input", function () {
    if ((betInput.value > parseInt(myMoney.textContent) || betInput.value == "")) {
      startGameButton.disabled = true;
    } else {
      startGameButton.disabled = false;
    }
  })}
});

holdCardsButton.addEventListener("click", function () {
  setTimeout(() => {
    document.getElementsByClassName("hidden-card")[0].remove();
  }, 1000);

  takeCardButton.disabled = true;
  const addBotCards = () => {
    setTimeout(() => {
      let cardImg = document.createElement("img");
      let card = cards.pop();
      cardImg.src = `/images/cards/${card}.png`;
      botSums += getValueOfCard(card);
      botASCards += checkASCard(card);
      botCardsElement.append(cardImg);
      botSumsElement.textContent = botSums;

      if (botSums < 18) {
        addBotCards();
      } else {
        botSums = reduceASCardValue(botSums, botASCards);
        mySums = reduceASCardValue(mySums, myASCards);
        isCanHit = false;

        let message = "";
        if (mySums == 21) {
          message = "MENANG";
          myMoney.textContent = inputMoney.value * 2 * 3;
          if ((betInput.value > parseInt(myMoney.textContent) || betInput.value == "") && startGameButton.textContent === "START GAME") {
            startGameButton.setAttribute("disabled", true);
          } else {
            startGameButton.removeAttribute("disabled");
          }
          betInput.addEventListener("input", function () {
          if ((betInput.value > parseInt(myMoney.textContent) || betInput.value == "")) {
            startGameButton.disabled = true;
          } else {
            startGameButton.disabled = false;
          }
        })}
          else if (mySums > 21 || mySums % 22 < botSums % 22) {
          message = "KALAH";
          myMoney.textContent -= inputMoney.value;
          
          if ((betInput.value > parseInt(myMoney.textContent) || betInput.value == "") && startGameButton.textContent === "START GAME") {
            startGameButton.setAttribute("disabled", true);
          } else {
            startGameButton.removeAttribute("disabled");
          }
          betInput.addEventListener("input", function () {
          if ((betInput.value > parseInt(myMoney.textContent) || betInput.value == "")) {
            startGameButton.disabled = true;
          } else {
            startGameButton.disabled = false;
          }
        })} else if (botSums > 21 || mySums % 22 > botSums % 22) {
          message = "MENANG";
          myMoney.textContent = inputMoney.value * 2 * 3;
          
          if ((betInput.value > parseInt(myMoney.textContent) || betInput.value == "") && startGameButton.textContent === "START GAME") {
            startGameButton.setAttribute("disabled", true);
          } else {
            startGameButton.removeAttribute("disabled");
          }
          betInput.addEventListener("input", function () {
          if ((betInput.value > parseInt(myMoney.textContent) || betInput.value == "")) {
            startGameButton.disabled = true;
          } else {
            startGameButton.disabled = false;
          }
        })} else if (mySums === botSums) {
          message = "SERI";
          if ((betInput.value > parseInt(myMoney.textContent) || betInput.value == "") && startGameButton.textContent === "START GAME") {
            startGameButton.setAttribute("disabled", true);
          } else {
            startGameButton.removeAttribute("disabled");
          }
          betInput.addEventListener("input", function () {
          if ((betInput.value > parseInt(myMoney.textContent) || betInput.value == "") && startGameButton.textContent === "START GAME") {
            startGameButton.setAttribute("disabled", true);
          } else {
            startGameButton.removeAttribute("disabled");
          }
        })}
        resultElement.textContent = message;
        startGameButton.disabled = false;
        takeCardButton.disabled = true;
        holdCardsButton.disabled = true;
      }
    }, 1000);
  };

  addBotCards();
});

function getValueOfCard(card) {
  let cardDetail = card.split("-");
  let value = cardDetail[0];

  if (isNaN(value)) {
    // Kartu AS
    if (value == "A") {
      if (mySums + 11 <= 21) {
        return 11;
      } else if (mySums + 11 > 21){
        return 1;}
      if (mySums + 11 <= 21) {
        return 11;
      } else if (mySums + 11 > 21){
        return 1;}
    }
    // Kartu K, Q, J
    else return 10;
  }

  return parseInt(value);
}

function checkASCard(card) {
  if (card[0] == "A") return 1;
  else return 0;
}

function reduceASCardValue(sums, asCards) {
  while (sums > 21 && asCards > 0) {
    sums -= 10;
    asCards -= 1;
  }
  return sums;
}
