<?php 
session_start(); 
if (!isset($_SESSION['USERNAME_ADMIN']))
{
    header("location:index.html");
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
include_once "jpgraph/src/jpgraph.php";
include_once "jpgraph/src/jpgraph_bar.php";
include_once "jpgraph/src/jpgraph_line.php";
include 'classess/class.viewlog.php';
$data = new ViewLog();
$list = $data->getViewLastTenLog();
$topten = $data->getViewTopTenLog();
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
                                <?php include 'menu.php' ?>
			</div> <!-- end side-menu -->			
			<div class="side-content fr">
				<div class="content-module">
					<div class="content-module-heading cf">
						<h3 class="fl">Login Users Linux Summary</h3>
					</div> <!-- end content-module-heading -->
					<div class="content-module-main cf">
                                            <div class="half-size-column fl">
                                                <img src="summary.chart.php">
                                            </div>
                                            <div class="half-size-column fr">
                                                <div class="content-module-main">
                                                    Top 10 Traffic
                                                    <table>
                                                        <thead>
                                                            <tr>
                                                                <th height="40px">Username</th>
                                                                <th height="40px">IP Address</th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot>
                                                            <!-- Paging -->
                                                        </tfoot>
                                                        <tbody>
                                                            <?php
                                                            $topten_view = $data->getViewTopTenLog();
                                                            while ($topten_row = mysql_fetch_array($topten_view)) {
                                                                ?>
                                                                <tr>
                                                                    <td height="25px"><?= $topten_row['USER_NAME'] ?></td>
                                                                    <td height="25px"><?= $topten_row['USER_IP'] ?>  (<?= $topten_row['COUNT(*)'] ?> Hit)</td>
                                                                    
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                    Login Summary
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th height="40px">Username</th>
                                                            <th>Hit</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <!-- Paging -->
                                                    </tfoot>
                                                    <tbody>
                                                        <?php 
                                                        $summary = $data->getUserSummaryLog();
                                                        while ($row = mysql_fetch_array($summary)) { 
                                                            ?>
                                                            <tr>
                                                                <td height="25px"><?= $row['USER_NAME'] ?></td>
                                                                <td height="25px"><?= $row['COUNT(*)'] ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                                    <table>
                                                        <thead>
                                                            <tr>
                                                                <th height="40px">IP Address</th>
                                                                <th>Hit</th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot>
                                                            <!-- Paging -->
                                                        </tfoot>
                                                        <tbody>
                                                            <?php
                                                            $summary_ip = $data->getTopTenIpSummaryLog();
                                                            while ($row_ip = mysql_fetch_array($summary_ip)) {
                                                                ?>
                                                                <tr>
                                                                    <td height="25px"><?= $row_ip['USER_IP'] ?></td>
                                                                    <td height="25px"><?= $row_ip['COUNT(*)'] ?></td>
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
					</div> <!-- end content-module-main -->
				</div> <!-- end content-module -->
				<div class="content-module">
					<div class="content-module-heading cf">
						<h3 class="fl">Last 10 Login Linux Users Login</h3>
					</div> <!-- end content-module-heading -->					
					<!--<div class="content-module-main cf"> -->
                                        <div class="content-module-main">
                                            <table>
							<thead>
								<tr>
                                                                        <th>Username</th>
									<th>IP Address</th>
									<th>Date</th>
                                                                        <th>Status</th>        
								</tr>
							</thead>
							<tfoot>
								<!-- Paging -->
							</tfoot>
							<tbody>
                                                            <?php while($row= mysql_fetch_array($list)) { ?>
								<tr>
									<td><?= $row['USER_NAME'] ?></td>
                                                                        <td><?= $row['USER_IP'] ?></td>
									<td><?= $row['USER_LASTLOGIN'] ?></td>
									<td><?= $row['USER_LOGIN_STATUS'] ?></a></td>
								</tr>
                                                            <?php } ?>
							</tbody>
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