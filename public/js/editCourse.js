$(document).ready(function(){
  console.log("ready");



});

function checkName(){

    var data = $("#coursename").val();
    if(!isValid){
      return;
    }
    else if(data == ""){
        $("#h1").text("Name can't be empty");
        $("#h1").show();
        isValid = false;
    }

    else{
        $("#h1").text("");
        $("#h1").hide();
        isValid = true;
    }
}

function checkDesc(){

    var data = $("#desc").val();
    if(!isValid){
      return;
    }
    else if(data == ""){
        $("#h2").text("Description can't be empty");
        $("#h2").show();
        isValid = false;
    }
    else{
        $("#h2").text("");
        $("#h2").hide();
        isValid = true;
    }
}

function checkInfo() {

  isValid = true;

  $("h4").hide();

  checkName();
  checkDesc();

  if(!isValid){
    return false;
  }

  return true;
}

function checkNameNew(){

    var data = $("#chapterNameNew").val();
    if(!isValid){
      return;
    }
    else if(data == ""){
        $("#h5").text("Chapter name can't be empty");
        $("#h5").show();
        isValid = false;
    }

    else{
        $("#h5").text("");
        $("#h5").hide();
        isValid = true;
    }
}

function checkContentNew(){

    var data = $("#contentNew").val();
    if(!isValid){
      return;
    }
    else if(data == ""){
        $("#h6").text("Content can't be empty");
        $("#h6").show();
        isValid = false;
    }
    else{
        $("#h6").text("");
        $("#h6").hide();
        isValid = true;
    }
}

function addChapter() {

  isValid = true;

  $("h4").hide();

  checkNameNew();
  checkContentNew();

  if(!isValid){
    return false;
  }

  return true;
}

function checkChapterName(){

    var data = $("#chapterName").val();
    if(!isValid){
      return;
    }
    else if(data == ""){
        $("#h3").text("Chapter name can't be empty");
        $("#h3").show();
        isValid = false;
    }

    else{
        $("#h3").text("");
        $("#h3").hide();
        isValid = true;
    }
}

function checkContent(){

    var data = $("#content").val();
    if(!isValid){
      return;
    }
    else if(data == ""){
        $("#h4").text("Content can't be empty");
        $("#h4").show();
        isValid = false;
    }
    else{
        $("#h4").text("");
        $("#h4").hide();
        isValid = true;
    }
}

function checkChapter(){

  isValid = true;

  $("h4").hide();

  //checkChapterName();
  //checkContent();

  if(!isValid){
    return false;
  }

  return true;
}
