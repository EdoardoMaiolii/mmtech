<div class="navbar-collapse collapse mr-auto ml-3">
    <a href="index.php"><img alt="Logo" id="logo" src="<?php echo MOCKUP_DIR."Logo.png"; ?>"/></a>
</div>
<div class="navbar-brand mx-auto w-75">
    <form id="searchBar-form" action="search.php" method="GET">
        <input class="w-75" type="text" id="searchbar" name="searchbar" placeholder="Search.." <?php echo isset($templateParams['search']) ? "value=".$templateParams['search']." " : " " ?>/>
        <input type ="submit" id="searchBtn" name="searchBtn" hidden="hidden"/>
    </form>
</div>
<div class="navbar-nav ml-auto">
    <a class="navbar-collapse collapse" href="login.php"><img alt="Login" id="loginBtn" src="<?php echo MOCKUP_DIR."loginButton.png"; ?>" /></a>
</div>