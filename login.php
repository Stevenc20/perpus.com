<?php
include('models/konek.php');
include('view/func.php');
include('models/proses.php');


include('lte/css/css-login.php');
include('lte/css/info-css.php');
?>
<div class="container">
    <div class="frame">
        <div class="nav">
            <ul class="links">
                <li class="signin-active"><a class="btn">Login</a></li>
                
            </ul>
        </div>
        <div ng-app ng-init="checked = false">
            <form class="form-signin" method="post"> 
              <label>Email</label><input class="form-styling" type="email" name="email"/> 
              <label>Password</label> <input class="form-styling" type="password" name="password"/> <input type="checkbox" id="checkbox" /> 
              <label><span class="ui"></span>Keep me signed in</label>
                  <button type="submit" class="btn-animate" name="login">Login to your account</button>
            </form>
           
            <div class="success"> <svg width="270" height="270" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 60 60" id="check" ng-class="checked ? 'checked' : ''">
                    <path fill="#ffffff" d="M40.61,23.03L26.67,36.97L13.495,23.788c-1.146-1.147-1.359-2.936-0.504-4.314 c3.894-6.28,11.169-10.243,19.283-9.348c9.258,1.021,16.694,8.542,17.622,17.81c1.232,12.295-8.683,22.607-20.849,22.042 c-9.9-0.46-18.128-8.344-18.972-18.218c-0.292-3.416,0.276-6.673,1.51-9.578" />
                    <div class="successtext">
                        <p> New User registered, Kindly check your email for confirmation.</p>
                    </div>
            </div>
        </div>
        

<?php
include('lte/js/js-login.php');
?>