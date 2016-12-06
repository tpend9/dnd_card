<?php
$title = 'home';
include("extra/header.php");

?>
    
    <div class='container jumbotron'>
        <h1>Welcome to Debatable, DND character sheets</h1>
        <p>This is easy to use, fast to create, available anytime DND character sheet.   It will only take less than a minute to create a personal, DND character sheet.</p>
    </div>
    
    <div class="row">
        <div class="col-sm-2"></div>
        <form class="col-sm-4 new" action="new_user_func.php" method="post">
            <h3>New Acount</h3>
            <input type="text" class="form-control" id="player_name" name="player_name" placeholder="player Name" />
            <br />
            <input type="email" class="form-control" id="new_user_email" name="user_email" placeholder="Email" />
            <br/>
            <input type="text" class="form-control" id="new_user_username" name="user_username" placeholder='Username' />
            <br/>
            <input type='password' class="form-control" id="new_user_password" name="user_password" placeholder='Password' />
            <br />
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
        <form class="col-sm-4 login" action="login_func.php" method="post">
            <h3>Login</h3>
            <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Username" />
            <br />
            <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Password" />
            <br />
            <button class="btn btn-primary" type="submit">Login</button>
        </form>
        <div class="col-sm-2"></div>
    </div>
</body>
</html>
