<?php 
    
    if(!$this->session->has_userdata('username_admin')){
        redirect(base_url() . "Login");
    }

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="shortcut icon" href="<?php echo base_url(); ?>image/Tasty.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Admin-Dicemil</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Admin CSS -->
    <link href="<?php echo base_url(); ?>assets/css/admin_style.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="<?php echo base_url(); ?>assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="<?php echo base_url(); ?>assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo base_url(); ?>assets/css/demo.css" rel="stylesheet" />



    <!--     Fonts and icons     -->
    <link href="<?php echo base_url(); ?>assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/datatable.css" rel="stylesheet" />
    

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="<?php echo base_url(); ?>Dashboard" class="simple-text">
                    Dicemil Tim
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="<?php echo base_url(); ?>Dashboard">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>Table">
                        <i class="pe-7s-note2"></i>
                        <p>Table List</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>Kategori">
                        <i class="pe-7s-news-paper"></i>
                        <p>Kategori</p>
                    </a>
                </li>
                 <li>
                    <a href="<?php echo base_url(); ?>Diskon">
                        <i class="pe-7s-smile"></i>
                        <p>Diskon</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>Penjualan">
                        <i class="pe-7s-user"></i>
                        <p>Laporan Penjualan</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>Icons">
                        <i class="pe-7s-science"></i>
                        <p>Icons</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url(); ?>Dashboard">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
								<p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="logout">
                            <p>Selamat Datang, <strong><?php if($this->session->has_userdata("username_admin")){ ?> <?php echo $this->session->userdata("username_admin"); ?><?php } ?><?php if(isset($_SESSION["name"]) !=""){ $name = $_SESSION["name"]; echo $name; } else if(!isset($_SESSION["name"])) { echo ""; }; ?></strong>  <a class="logoutsubmit" href="<?php echo base_url(); ?>Login/logOut">LogOut</a></p>
                        </li>
						<li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <?php if(isset($content_page)){ 
                $this->load->view($content_page);
            }
            ?>

        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="#">Dicemil</a>, Makan Enak Makan Nikmat 
                </p>
            </div>
        </footer>

    </div>
</div>
    
   




</body>



    <!--   Core JS Files   -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="<?php echo base_url(); ?>assets/js/chartist.min.js"></script>

    <!--  Admin Plugin -->
    <script src="<?php echo base_url(); ?>assets/js/admin_model.js"></script>

    <!--  Notifications Plugin    -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-notify.js"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="<?php echo base_url(); ?>assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="<?php echo base_url(); ?>assets/js/demo.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/datatable.js"></script>
    

	<script type="text/javascript">

        $(document).ready(function(){

            demo.initChartist();
            <?php if(isset($content_ultah)){ ?>
            <?php if(count($content_ultah)>0){ ?>
                    var ultah="Yang Berulang Tahun Hari Ini adalah";
                    <?php foreach ($content_ultah as $rows) { ?>
                        ultah+="<br><?php echo $rows["username"]; ?>";
                  <?php  } ?>

            $.notify({
                icon: 'pe-7s-gift',
                message: ultah

            },{
                type: 'info',
                timer: 4000
            });

        <?php } } ?>

        });


    	$(document).ready(function(){

        $('#example').DataTable();
        
        	demo.initChartist();
    	});

	</script>
</html>
