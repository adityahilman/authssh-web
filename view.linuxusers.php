<?php 
session_start(); 
if (!isset($_SESSION['USERNAME_ADMIN']))
{
    header("location:index.html");
}
if ($_SESSION['LEVEL_ADMIN'] != 'superuser') {
    ?>
    <script>alert("Access Denied!");document.location.href="dashboard.php";</script>
    <?php
    //header("location:dashboard.php");
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
include 'classess/user.php';
$data = new USERS();
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
                                include 'menu.php';
                                ?>
			</div> <!-- end side-menu -->			
			<div class="side-content fr">
				<div class="content-module">
					<div class="content-module-heading cf">
						<h3 class="fl">Registered Linux Users</h3>
					</div> <!-- end content-module-heading -->
					<div class="content-module-main cf">
                                            <div class="half-size-column fl">
                                                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                                    <table>
                                                        <tr>
                                                            <td>Search Linux User</td>
                                                            <td><input type="text" id="simple-input" name="txtSearchUsername" class="round default-width-input"/></td>
                                                            <td><input type="submit" name="btnSearch" id="btnSubmit" class="button round blue image-right ic-right-arrow text-upper" value="Search"/></td>
                                                        </tr>
                                                    </table>
                                                </form>
                                            </div>
                                             <?php
                                            if (isset($_POST['btnSearch'])) {
                                                $txtSearchUsername = $_POST['txtSearchUsername'];
                                                if (empty($txtSearchUsername)) {
                                                    ?> <div class="half-size-column fr"><div class="error-box round">Username is Empty.</div></div>  <?php
                                                } else {
                                                    $search = new USERS();
                                                    $search->setUsername($txtSearchUsername);
                                                    $result = $search->getSearchUsersLinux();
                                                    while ($row = mysql_fetch_array($result)) {
                                                        ?>
                                                        <table>
                                                            <thead>
                                                                <tr>
                                                                    <th>Username</th>
                                                                    <th>Detail</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td height="25px" width="5px"><?= $row['USER_NAME'] ?></td>                                                            
                                                                    <td height="25px" width="5px"><?= $row['USER_DETAIL'] ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                            <?php } ?>
                                                                <?php
                                                                
                                                    }
                                                    }
                                                    ?>
                                             <table>
                                                <thead>
                                                    <tr>
                                                        <th>Username</th>
                                                        <th>User Detail</th>
                                                        <th>Action</th>
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
                                                            <td height="25px" width="5px"><?php echo "<a class='table-actions-button ic-table-delete' href=delete.userlinux.php?user_linux=$row[USER_NAME]>"; echo "</a>"; ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                            <div class="content-module-main">
                                            <ul class="temporary-button-showcase">
                                                <li><a href="adduserslinux.php" class="button round blue image-right ic-add text-upper">Add Linux User</a></li>
                                            </ul>
					</div> <!-- end content-module-main -->
                                        </div>
				</div> <!-- end content-module -->
			</div>
			</div> <!-- end side-content -->
		</div> <!-- end full-width -->
	<!-- FOOTER -->
	<div id="footer">

		<p>&copy; Copyright 2015 <a href="#">Aditya Hilman</a>. - STMIK Nusa Mandiri - Jakarta.</p>
		
	
	</div> <!-- end footer -->

</body>
</html>