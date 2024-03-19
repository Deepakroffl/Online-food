<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Game discount</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animsition.min.css" rel="stylesheet">
  <link href="css/animate.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet"> </head>
    
  <style>
    body {
  text-align: center;
  /* background-color: #011F3F; */
  background-image: url(./images/pattern.png);
}

#level-title {
  font-family: 'Press Start 2P', cursive;
  font-size: 3rem;
  margin:  5%;
  color: #FEF2BF;
}

.container {
  display: block;
  width: 50%;
  margin: auto;

}

.btn {
  margin: 25px;
  display: inline-block;
  height: 200px;
  width: 200px;
  border: 10px solid black;
  border-radius: 20%;
}

.game-over {
  background-color: red;
  opacity: 0.8;
}

.red {
  background-color: red;
  background-image: url("./Simon image/Noodle.jpg");
  background-repeat: no-repeat;
  background-size: 200px 200px;
}


.green {
  background-color: green;
  background-image: url("./Simon image/Dosai.webp");
  background-repeat: no-repeat;
  background-size: 200px 200px;
}

.blue {
  background-color: blue;
  background-image: url("./Simon image/Biriyani.avif");
  background-repeat: no-repeat;
  background-size: 200px 200px;
}

.yellow {
  background-color: yellow;
  background-image: url("./Simon image/Parota.jpg");
  background-repeat: no-repeat;
  background-size: 200px 200px;
}

.pressed {
  box-shadow: 0 0 20px white;
  background-color: grey;
}
  </style>
</head>

<body background="./images/pattern.png">
  <div class="w-100"></div>
<header id="header" class="header-scroll top-header headrom">
            <nav class="navbar navbar-dark">
                <div class="container">
                    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                    <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/icn.png" alt=""> </a>
                    <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                        <ul class="nav navbar-nav">
                            <li class="nav-item"> <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
                            <li class="nav-item"> <a class="nav-link active" href="restaurants.php">Restaurants <span class="sr-only"></span></a> </li>
                            <li class="nav-item"> <a class="nav-link active" href="Simon.php" onclick="">Game discount<span class="sr-only"></span></a> </li>
                            <li class="nav-item"> <a class="nav-link active" href="coupen.php" onclick="">Coupen registration<span class="sr-only"></span></a> </li>
							 
                        </ul>
						 
                    </div>
                </div>
            </nav>

        </header>
        <br>
  <h1 id="level-title">Press A Key to Start</h1>
  <div class="container">
    <div lass="row">

      <div type="button" id="green" class="btn green">

      </div>

      <div type="button" id="red" class="btn red">

      </div>
    </div>

    <div class="row">

      <div type="button" id="yellow" class="btn yellow">

      </div>
      <div type="button" id="blue" class="btn blue">

      </div>

    </div>
    
    <button type="button" id="coupencode" style="background-color: white;color :black;height:50px;width:40%;font-weight:900">Generate code</button>
  
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
  
    
var buttonColours = ["red", "blue", "green", "yellow"];

var gamePattern = [];
var userClickedPattern = [];

var started = false;
var level = 0;

$(document).keypress(function() {
  if (!started) {
    $("#level-title").text("Level " + level);
    nextSequence();
    started = true;
  }
});

$(".btn").click(function() {

  var userChosenColour = $(this).attr("id");
  userClickedPattern.push(userChosenColour);

  playSound(userChosenColour);
  animatePress(userChosenColour);

  checkAnswer(userClickedPattern.length-1);
});

function checkAnswer(currentLevel) {

    if (gamePattern[currentLevel] === userClickedPattern[currentLevel]) {
      if (userClickedPattern.length === gamePattern.length){
        setTimeout(function () {
          nextSequence();
        }, 1000);
      }
    } else {
      playSound("wrong");
      $("body").addClass("game-over");
      $("#level-title").text("Game Over, Now grap your code");
      var randomnumber = Math.floor(Math.random() * 90) + 20;
      $("#coupencode").click(function coupen() {
        var finalcoupen = "your coupen code is : " +"aY"+ randomnumber +"Kc" + randomnumber;
      alert(finalcoupen)
    });

      setTimeout(function () {
        $("body").removeClass("game-over");
      }, 200);

      startOver();
    }
}


function nextSequence() {
  userClickedPattern = [];
  level++;
  $("#level-title").text("Level " + level);
  var randomNumber = Math.floor(Math.random() * 4);
  var randomChosenColour = buttonColours[randomNumber];
  gamePattern.push(randomChosenColour);

  $("#" + randomChosenColour).fadeIn(100).fadeOut(100).fadeIn(100);
  playSound(randomChosenColour);
}
function animatePress(currentColor) {
  $("#" + currentColor).addClass("pressed");
  setTimeout(function () {
    $("#" + currentColor).removeClass("pressed");
  }, 100);
}
function playSound(name) {
  var audio = new Audio("sounds/" + name + ".mp3");
  audio.play();
}
function startOver() {
  level = 0;
  gamePattern = [];
  started = false;
}
</script>
</body>
</html>

