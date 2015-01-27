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
$data = new USERS;
$list = $data->getUsersLinux();
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
                                                                <td>New Password</td>
                                                                <td><input type="password" id="simple-input" name="newPass" class="round default-width-input"/></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Retype Password</td>
                                                                <td><input type="password" id="simple-input" name="newPass2" class="round default-width-input"/></td>
                                                            </tr>
                                                        </table>
                                                        <input type="submit" name="btnSubmit" id="btnSubmit" class="button round blue image-right ic-right-arrow text-upper" value="Submit"/>
                                                    </form>
                                                <?php 
                                                
                                                ?>
                                                </div>
                                            </div>
                                            
					</div> <!-- end content-module-main -->
				</div> <!-- end content-module -->
				<div class="content-module">
					<div class="content-module-heading cf">
						<h3 class="fl">Detail Registered Linux Users</h3>
					</div> <!-- end content-module-heading -->					
					<!--<div class="content-module-main cf"> -->
                                        <div class="content-module-main cf">
                                                    <table>
                                                        <thead>
                                                            <tr>
                                                                <th height="40px" >Username</th>
                                                                <th>User Detail</th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot>
                                                            <!-- Paging -->
                                                        </tfoot>
                                                        <tbody>
                                                            <?php
                                                            $summary = $data->getUsersLinux();
                                                            while ($row = mysql_fetch_array($summary)) {
                                                                ?>
                                                                <tr>
                                                                    <td height="25px" width="5px"><?= $row['USER_NAME'] ?></td>
                                                                    <td height="25px" width="5px"><?= $row['USER_DETAIL'] ?></td>
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                    <br>
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