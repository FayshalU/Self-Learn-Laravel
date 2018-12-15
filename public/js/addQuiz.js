$(document).ready(function(){
  console.log("ready");

  // for (var i = 1; i <= 20; i++) {
  //   $("#chapter"+i).hide();
  // }
  //
  // $("#chapter").on('change', function (){
  //
  //     var chapter = parseInt($("#chapter").val());
  //     console.log(chapter);
  //
  //     for (var i = 1; i <= 20; i++) {
  //       $("#chapter"+i).hide();
  //     }
  //
  //     for (var i = 1; i <= chapter; i++) {
  //       $("#chapter"+i).show();
  //     }
  //
  //
  //   });



});

function checkQuestion(){

    var data = $("#question").val();
    if(!isValid){
      return;
    }
    else if(data == ""){
        $("#h1").text("Question can't be empty");
        $("#h1").show();
        isValid = false;
    }

    else{
        $("#h1").text("");
        $("#h1").hide();
        isValid = true;
    }
}

function checkOP1(){

    var data = $("#op1").val();
    if(!isValid){
      return;
    }
    else if(data == ""){
        $("#h2").text("Option-1 can't be empty");
        $("#h2").show();
        isValid = false;
    }
    else{
        $("#h2").text("");
        $("#h2").hide();
        isValid = true;
    }
}

function checkOP2(){

    var data = $("#op2").val();
    if(!isValid){
      return;
    }
    else if(data == ""){
        $("#h3").text("Option-2 can't be empty");
        $("#h3").show();
        isValid = false;
    }
    else{
        $("#h3").text("");
        $("#h3").hide();
        isValid = true;
    }
}

function checkOP3(){

    //var re = /^[A-Z a-z0-9]+$/;

    var data = $("#op3").val();
    if(!isValid){
      return;
    }
    else if(data == ""){
        $("#h4").text("Option-3 can't be empty");
        $("#h4").show();
        isValid = false;
    }

    else{
        $("#h4").text("");
        $("#h4").hide();
        isValid = true;
    }
}

function checkOP4(){

    var data = $("#op4").val();
    if(!isValid){
      return;
    }
    else if(data == ""){
        $("#h5").text("Option-4 can't be empty");
        $("#h5").show();
        isValid = false;
    }
    else{
        $("#h5").text("");
        $("#h5").hide();
        isValid = true;
    }
}

function checkAnswer(){

    var data = $("#answer").val();
    if(!isValid){
      return;
    }
    else if(data == ""){
        $("#h6").text("Answer can't be empty");
        $("#h6").show();
        isValid = false;
    }
    else{
        $("#h6").text("");
        $("#h6").hide();
        isValid = true;
    }
}

function checkInfo() {

  isValid = true;

  $("h4").hide();

  checkQuestion();
  checkOP1();
  checkOP2();
  checkOP3();
  checkOP4();
  checkAnswer();

  if(!isValid){
    return false;
  }

  return true;
}
