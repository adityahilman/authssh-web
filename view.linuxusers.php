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
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">
	
	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	<!-- jQuery & JS files -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
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
						<li><a href="admin_profile.php">My Profile</a></li>
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
						<h3 class="fl">Login Users Linux Summary</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					</div> <!-- end content-module-heading -->
					<div class="content-module-main cf">
                                            <div class="half-size-column fl">
                                                <div class="content-module-main">
                                                    <h1>Linux User</h1>
                                                    <table>
                                                        <thead>
                                                            <tr>
                                                                <th height="40px">ID</th>
                                                                <th>Username</th>
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
                                                                    <td height="25px" width="5px"><?= $row['ID'] ?></td>
                                                                    <td height="25px" width="5px"><?= $row['USER_NAME'] ?></td>
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                    <br>

                                                </div>
                                            </div>
                                            <div class="half-size-column fr">
                                                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
							<label for="textarea">Search User</label>
                                                        <input type="text" id="simple-input" name="username" class="round default-width-input" />
                                                        <input type="submit" name="btnSubmit" id="btnSubmit" class="button round blue image-right ic-search text-upper" value="Detail"/>
                                                </form>
                                                <br>
                                                <?php 
                                                if(isset($_POST['btnSubmit']))
                                                {
                                                    $username = $_POST['username'];
                                                    $userid = shell_exec("id $username");
                                                    if (empty($userid)) {
                                                        echo "USER NOT FOUND";
                                                    } else {
                                                        echo "$userid";
                                                    }
                                                }
                                                ?>
                                            </div>
                                            
					</div> <!-- end content-module-main -->
				</div> <!-- end content-module -->
				<div class="content-module">
					<div class="content-module-heading cf">
						<h3 class="fl">Latest Linux Users Login Monitoring</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					</div> <!-- end content-module-heading -->					
					<!--<div class="content-module-main cf"> -->
                                        <div class="content-module-main">
                                            <table>
						
                                            </table>
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