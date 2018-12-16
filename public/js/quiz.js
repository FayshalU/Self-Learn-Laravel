$(".answer").hide();

$(document).ready(function(){

  var score = 0;

  // console.log("ready");

  $("#chapter").hide();
  $(".answer").hide();
  $("#score").hide();
  $("#sharebtn").hide();

  $("#submitbtn").on('click', function (){

      score = 0;
      console.log("inside");

      for (var i = 0; i < 20; i++) {

        if ($('input[name="'+i+'"]').length) {
          // console.log("found");
          var data = $('input[name='+i+']:checked').val();
          console.log(data);
          var answer = $('span.'+i)[0];
          console.log(answer.innerHTML);
          if(data == answer.innerHTML){
            console.log("matched");
            score++;
          }

        }
        else {
          break;
        }
      }

      console.log(score);

      $("#score").text("You scored "+score+"!");
      $("#score").show();
      $("#sharebtn").show();
      $("#submitbtn").hide();
      $(".answer").show();

      var chapter = $("#chapter").html();

      $.ajax({
         url:"student/quizResult/{id}",
         type: 'GET',
         data: { id: chapter+"|"+score },
         success:function(data) {
            console.log("Success");
            console.log(data);
         }
      });

    });

    $("#sharebtn").on('click', function (){

        console.log("share");

        var chapter = $("#chapter").html();
        console.log(chapter);

         // Ex : baseUrl=baseUrl+"?searchString=testing";
        window.location.href="student/share/"+chapter+"|"+score;


      });

      $("#showbtn").on('click', function (){

          $(".answer").show();


        });

});
