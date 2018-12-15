$(document).ready(function(){
  console.log("ready");

});

function checkComment(){

    $("h4").hide();

    var data = $("#message").val();

    console.log(data);

    if(data == ""){
        $("#empty").text("Message can't be empty");
        $("#empty").show();
        return false;
    }

    else{
        $("#empty").text("");
        $("#empty").hide();
        return true;
    }
}
