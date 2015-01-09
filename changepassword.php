<?php 
session_start(); 
if (!isset($_SESSION['USERNAME_ADMIN']))
{
    header("location:error.html");
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
$data = new USERS;
$list = $data->getUsersLinux();
?>
	<!-- TOP BAR -->
	<div id="top-bar">
		
		<div class="page-full-width cf">

			<ul id="nav" class="fl">
	
				<li class="v-sep"><a href="#" class="round button dark menu-user image-left">Logged in as <strong><?php echo $_SESSION['USERNAME_ADMIN']; ?></strong></a>
					<ul>
						<li><a href="#">Change Password</a></li>
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
				<ul>
                                        <li><a href="dashboard.php">Dashboard</a></li>
					<li><a href="#">View Linux Users</a></li>
					<li><a href="#">View Web Portal Users</a></li>
                                        <li><a href="view.summary.php">Report</a></li>
				</ul>	
			</div> <!-- end side-menu -->			
			<div class="side-content fr">
				<div class="content-module">
					<div class="content-module-heading cf">
						<h3 class="fl">Update Password</h3>
					</div> <!-- end content-module-heading -->
					<div class="content-module-main cf">
                                            <div class="half-size-column fl">
                                                <div class="content-module-main">
                                                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                                        <table>
                                                            <tr>
                                                                <td>Current Password</td>
                                                                <td><input type="password" id="simple-input" name="currentPass" class="round default-width-input"/></td>
                                                            </tr>
                                                            <tr>
                                                                <td>New Password</td>
                                                                <td><input type="password" id="simple-input" name="newPass" class="round default-width-input"/></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Retype Password</td>
                                                                <td><input type="password" id="simple-input" name="newPass2" class="round default-width-input"/></td>
                                                            </tr>
                                                        </table>
                                                        <input type="submit" name="btnUpdate" id="btnSubmit" class="button round blue image-right ic-right-arrow text-upper" value="Update"/>
                                                    </form>
                                                    <br>
                                                    <?php                                                 
                                                    if (isset($_POST['btnUpdate'])) {
                                                        $currentPassword = $_POST['currentPass'];
                                                        $newPassword = $_POST['newPass'];
                                                        $newPassword2 = $_POST['newPass2'];
                                                        $username =  $_SESSION['USERNAME_ADMIN']; 
                                                        
                                                        if (empty($currentPassword)) {
                                                            ?> 
                                                            <div class="error-box round">Current Password is Wrong.</div>
                                                            <?php
                                                            //echo "Please input Username";
                                                        } 
                                                        elseif (empty ($newPassword)) {
                                                           ?>
                                                           <div class="error-box round">Please type New Password.</div>
                                                           <?php
                                                        }
                                                        elseif (empty ($newPassword2) || $newPassword2 != $newPassword) {
                                                           ?>
                                                           <div class="error-box round">New Password is not same. Please type New Password correctly.</div>
                                                           <?php
                                                        }
                                                        else {
                                                            $update_pass = new USERS();
                                                            $update_pass->setUsername($username);
                                                            $update_pass->setPassword($newPassword);
                                                            $result_update = $update_pass->getUpdatePassword();
                                                            if ($result_update) {
                                                            ?>
                                                           <div class="confirmation-box round">Password has been updated.</div>
                                                           <?php
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="half-size-column fr">
                                               
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