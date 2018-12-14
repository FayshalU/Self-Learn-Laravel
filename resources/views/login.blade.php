<html>
    <head>
        <link href="build/css/styleLogin.css" rel="stylesheet"/>
        <script src="build/js/jquery-3.3.1.js"></script>
        <script src="build/js/loginAnimation.js"></script>
        <title>Self-Learn</title>
    </head>
    <body>
        <div id="box">
            <div id="main"></div>

            <div id="loginform">
                <h1>LOGIN</h1>
                <form method="post" action="/login" onsubmit="return checkLogInfo()">
                  {{@csrf_field()}}
                  <input type="text" name="userid" id="logid" placeholder="User ID"/><br>
                  <input type="password" name="password" id="logpass" placeholder="Password"/><br>

                  <!-- //error check login -->
                   <h4 style="text-align: center;color: #ff0000;font-weight: 200;" id="empty">UserID or Password Can't be Empty</h4><br>
                  <!--<%
                    if (error.id == 1) { %>
                      <h4 style="text-align: center;color: #ff0000;font-weight: 200;">UserID or Password Can't be Empty</h4><br/>
                    <% }
                    else if (error.id == 2) { %>
                      <h4 style="text-align: center;color: #ff0000;font-weight: 200;">UserID and Password does not match</h4><br>
                    <% }
                  %> -->

                  <h4 style="text-align: center;color: #ff0000;font-weight: 200;">{{session('logmsg')}}</h4><br>
                  <button type="submit">LOGIN</button>
                  <!-- <input type="submit" value="LOGIN" /> -->
                </form>
            </div>

            <div id="signupform">
                <h1>SIGN UP</h1>
                <form method="post" action="/register" onsubmit="return checkRegInfo()">
                  {{@csrf_field()}}
                  <input type="text" name="name" id="name" placeholder="Full Name*"/><br>

                  <!-- //name error -->
                  <h4 id="h1" style="text-align: center;color: #ff0000;font-weight: 200;"></h4>
                  <input type="text" name="userid" id="userid" placeholder="User ID*"/><br>


                  <!-- //id error -->

                  <h4 id="h2" style="text-align: center;color: #ff0000;font-weight: 200;"></h4>

                  <input type="email" name="email" id="email" placeholder="Email*"/><br>


                  <!-- //email error -->
                  <h4 id="h3" style="text-align: center;color: #ff0000;font-weight: 200;"></h4>

                  <input type="password" name="password" id="password" placeholder="Password*"/><br>


                  <!-- //password error -->
                  <h4 id="h4" style="text-align: center;color: #ff0000;font-weight: 200;"></h4>

                  <select name="type" id="type">
                    <option value="type">Type*</option>
                    <option value="student">Student</option>
                    <option value="instructor">Instructor</option>
                  </select>

                  <!-- //Type error -->
                  <h4 id="h5" style="text-align: center;color: #ff0000;font-weight: 200;"></h4>

                  <h4 style="text-align: center;color: #ff0000;font-weight: 200;">{{session('regmsg')}}</h4>
                  <button type="submit">SIGN UP</button>
                </form>
            </div>

            <div id="login_msg">Have an account?</div>
            <div id="signup_msg">Don't have an account?</div>

            <button id="login_btn" onclick="window.location.href='{{route('login.index')}}'">LOGIN</button>
            <button id="signup_btn" onclick="register()">SIGN UP</button>

        </div>


        <!-- change button -->
        <?php
            if($error->status == 2){ ?>
              <script>
                $(document).ready(function(){
                  $("#signup_btn").click();
                });
              </script>

        <?php } ?>

        <script>
          function register() {
            <?php
                if($_SERVER['REQUEST_URI'] != "/register"){ ?>
                    window.location.href="{{route('register.index')}}";

            <?php } ?>
          }
        </script>

        <script type="text/javascript" src="js/login.js"></script>

    </body>
</html>
