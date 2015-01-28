<?php 
session_start(); 
if (!isset($_SESSION['USERNAME_ADMIN']))
{
    header("location:index.html");
}
if ($_SESSION['LEVEL_ADMIN'] != 'superuser' && $_SESSION['LEVEL_ADMIN'] != 'administrator' ) 
{
    ?>
    <script>alert("Access Denied!");document.location.href="dashboard.php";</script>
    <?php
}
?>

<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>SSH Two Factor Authentication - Admin Login</title>
	
	<!-- Stylesheets -->
	<!-- <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'> -->
	<link rel="stylesheet" href="css/style.css">
	
	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	<!-- jQuery & JS files -->
	<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> -->
	<script src="js/script.js"></script>  
</head>
<body>
<?php
include 'classess/class.user.php';

?>
	<!-- TOP BAR -->
	<div id="top-bar">
		
		<div class="page-full-width cf">

			<ul id="nav" class="fl">
	
				<li class="v-sep"><a href="#" class="round button dark menu-user image-left">Logged in as <strong><?php echo $_SESSION['USERNAME_ADMIN']; ?></strong></a>
					<ul>
                                            <li><a href="changepassword.php">Change Password</a></li>
					</ul> 
				</li>
				<li><a href="logout.php" class="round button dark menu-logoff image-left">Log out</a></li>		
			</ul> <!-- end nav -->
		</div> <!-- end full-width -->	
	
	</div> <!-- end top-bar -->
	
	
	<!-- HEADER -->
	<div id="header-with-tabs">	
		<div class="page-full-width cf">
			<ul id="tabs" class="fl">
				<li><a href="dashboard.php" class="active-tab dashboard-tab">Admin Page SSH Two-Factor Authentication</a></li>
			</ul> <!-- end tabs -->
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 30px height. -->
			<a href="#" id="company-branding-small" class="fr"><img src="images/openssh_logo.png" alt="OpenSSH" /></a>
			
		</div> <!-- end full-width -->	
	</div> <!-- end header -->	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			<div class="side-menu fl">
				
				<h3>Menu</h3>
				<?php
                                include 'menu.php'
                                ?>
			</div> <!-- end side-menu -->			
			<div class="side-content fr">
				<div class="content-module">
					<div class="content-module-heading cf">
						<h3 class="fl">Add Web User</h3>
					</div> <!-- end content-module-heading -->
					<div class="content-module-main cf">
                                            <div class="half-size-column fl">
                                                <div class="content-module-main">
                                                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                                        <table>
                                                            <tr>
                                                                <td>Username</td>
                                                                <td><input type="text" id="simple-input" name="txtUsername" class="round default-width-input"/></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Email</td>
                                                                <td><input type="text" id="simple-input" name="txtEmail" class="round default-width-input"/></td>
                                                            </tr>
                                                            <tr>
                                                                <td>User Level</td>
                                                                <td>
                                                                    <select id="dropdown-actions" name="txtUserlevel">
                                                                        <option value="0">- Select User Level -</option>
                                                                        <option value="superuser">Super User</option>
                                                                        <option value="administrator">Administrator</option>
                                                                        <option value="user">User</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Password</td>
                                                                <td><input type="password" id="simple-input" name="txtPass1" class="round default-width-input"/></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Retype Password</td>
                                                                <td><input type="password" id="simple-input" name="txtPass2" class="round default-width-input"/></td>
                                                            </tr>
                                                        </table>
                                                        <input type="submit" name="btnSubmit" id="btnSubmit" class="button round blue image-right ic-right-arrow text-upper" value="Submit"/>
                                                    </form>
                                                    <br>
                                                    <?php
                                                    // Submit Process
                                                    if (isset($_POST['btnSubmit']))
                                                    {
                                                        $txtUsername = $_POST['txtUsername'];
                                                        $txtEmail = $_POST['txtEmail'];
                                                        $txtUserlevel = $_POST['txtUserlevel'];
                                                        $txtPass1 = $_POST['txtPass1'];
                                                        $txtPass2 = $_POST['txtPass2'];
                                                        $txtcreatedby = $_SESSION['USERNAME_ADMIN'];
                                                        
                                                        if (empty($txtUsername))
                                                        {
                                                            ?> <div class="error-box round">Username is empty.</div> <?php
                                                        }
                                                        elseif(!filter_var($txtEmail, FILTER_VALIDATE_EMAIL)) 
                                                        {
                                                            ?> <div class="error-box round">Invalid Email Format.</div> <?php
                                                        }
                                                        elseif (empty($txtPass1))
                                                        {
                                                            ?> <div class="error-box round">Password is empty.</div> <?php
                                                        }
                                                        elseif (empty($txtPass2))
                                                        {
                                                            ?> <div class="error-box round">Retype password correctly.</div> <?php
                                                        }
                                                        elseif ($txtUserlevel == '0')
                                                        {
                                                            ?> <div class="error-box round">Please select User Level.</div> <?php
                                                        }
                                                        elseif ($txtPass1 != $txtPass2)
                                                        {
                                                            ?> <div class="error-box round">Please retype password correctly.</div> <?php
                                                        }
                                                        else
                                                        {
                                                            $adduser = new USERS();
                                                            $adduser->setUsername($txtUsername);
                                                            $adduser->setPassword($txtPass2);
                                                            $adduser->setLevel($txtUserlevel);
                                                            $adduser->setEmail($txtEmail);
                                                            $adduser->setCreatedBy($txtcreatedby);
                                                            $result = $adduser->getInsertUser();
                                                            if($result)
                                                            {
                                                                ?> <script>alert("Add User is succesfully.");document.location.href="view.webusers.php";</script> <?php
                                                            }
                                                            
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            
					</div> <!-- end content-module-main -->
				</div> <!-- end content-module -->
			</div>
			</div> <!-- end side-content -->
		</div> <!-- end full-width -->
	</div> <!-- end content -->
	<!-- FOOTER -->
	<div id="footer">

		<p>&copy; Copyright 2015 <a href="#">Aditya Hilman</a>. - STMIK Nusa Mandiri - Jakarta.</p>
		
	
	</div> <!-- end footer -->

</body>
</html>