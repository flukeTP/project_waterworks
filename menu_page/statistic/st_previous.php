<?php
session_start();
if($_SESSION['UserID'] == "")
{
    header("location:../../login/login_admin.php");
    exit();
}

if($_SESSION['Status'] != "admin")
{
    echo "Homepage_admin";
    exit();
}

require '../../connect/connect.php';
$strSQL = "SELECT * FROM member WHERE UserID = '".$_SESSION['UserID']."' ";
$objQuery = mysqli_query($conn,$strSQL);
$objResult = mysqli_fetch_array($objQuery);
?>
   <?php 
    require '../../connect/connect.php';
    $sql="SELECT * FROM name_village";
    $objq_user=mysqli_query($conn, $sql);
    $objr_user=mysqli_fetch_array($objq_user);
    
   ?>
   

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>สถิติใช้น้ำ</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="../homepage_admin.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>Waterwork</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <?php require '../nav_bar/form_top_bar.php';?>
          <!-- /account -->
          </ul>
      </div>
    </nav>
    
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <?php require 'nav_bar/side_bar.php';?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
            	 ตรวจสอบข้อมูลสถิติการใช้น้ำย้อนหลัง
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">สถิติ</a></li>
        <li class="active"> ตรวจสอบข้อมูลสถิติการใช้น้ำย้อนหลัง</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
   
            <!-- form start -->
         <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li><a href="#activity" data-toggle="tab">สถิติการใช้น้ำเเต่ล่ะบ้าน</a></li>
              <li><a href="#timeline" data-toggle="tab">สถิติการใช้น้ำรายเดือน</a></li>
              <li><a href="#settings" data-toggle="tab">สถิติการใช้น้ำรายปี</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane" id="activity">
                <!-- Post -->
                
                   <div class="box-body">
              <table id="example" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ลำดับ</th>
                  <th>ชื่อหมู่บ้าน</th>
                  <th>หมู่ที่</th>
                  <th>ข้อมูล</th>
                </tr> 
                </thead>    
                 <?php foreach ($objq_user as $r ) :?>
                 <tr>
                 <td><?php echo $r["id"]?></td>
                 <td><?php echo $r["village"]?></td>
                 <td><?php echo $r["villageno"]?></td>
                 <td> <a target="_blank" href="village_user.php?villageNo=<?php echo $r["villageno"];?>" ><i class="fa fa-search"></i></a> </td>
                 </tr>
                  <?php endforeach;?>
              </table>
            </div>  
                
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                
                  <div class="form-group">
                       <div class="box box-default">
                            <div class="box-header with-border">
                    
                             
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                              <div class="row">
                              <div class="container">
                              <form action="village.php" method="get">
                                <div class="col-md-5">
                                   <!-- /.form-group -->
                                  <div class="box-body">
                                          <strong><i class="fa fa-file-text-o margin-r-5"></i> การใช้</strong>
                            
                                          <p> -กรุณาเลือก เดือน เเละ  ปี พ.ศ. เพื่อตรวจสอบข้อมูลสถิติการใช้น้ำย้อนหลัง</p>
                                        </div>
                                  <!-- /.form-group -->
                                </div>
                               
                                <!-- /.col -->
                                <div class="col-md-7">
                                   <div class="form-group col-md-5">
                                    <label>ตั้งเเต่ เดือน</label>
                                    <select name="month_before" class="form-control select2" style="width: 80%;">
                                      <option selected="selected" value="01">มกราคม</option>
                                      <option value="02">กุมภาพันธ์</option>
                                      <option value="03">มีนาคม</option>
                                      <option value="04">เมษายน</option>
                                      <option value="05">พฤษภาคม</option>
                                      <option value="06">มิถุนายน</option>
                                      <option value="07">กฤกฏาคม</option>
                                      <option value="08">สิงหาคม</option>
                                      <option value="09">กันยายน</option>
                                      <option value="10">ตุลาคม</option>
                                      <option value="11">พฤศจิกายน</option>
                                      <option value="12">ธันวาคม</option>
                                    </select>
                                  </div>
                                  <!-- /.form-group -->
                                  <div class="form-group col-md-5">
                                    <label>ปี พ.ศ.</label>
                                    <select name="year_before" class="form-control select2" style="width: 80%;">
                                      <option  value="2018">2561</option> 
                                      <option  value="2017">2560</option>  
                                      <option value="2016">2559</option>
                                      <option value="2015">2558</option>
                                      <option selected="selected" value="2014">2557</option>
                                    </select>
                                  </div>
                                                                     
                                   <div class="form-group col-md-5">
                                    <label>ถึง เดือน</label>
                                    <select name="month_after" class="form-control select2" style="width: 80%;">
                                      <option selected="selected" value="01">มกราคม</option>
                                      <option value="02">กุมภาพันธ์</option>
                                      <option value="03">มีนาคม</option>
                                      <option value="04">เมษายน</option>
                                      <option value="05">พฤษภาคม</option>
                                      <option value="06">มิถุนายน</option>
                                      <option value="07">กฤกฏาคม</option>
                                      <option value="08">สิงหาคม</option>
                                      <option value="09">กันยายน</option>
                                      <option value="10">ตุลาคม</option>
                                      <option value="11">พฤศจิกายน</option>
                                      <option value="12">ธันวาคม</option>
                                    </select>
                                  </div>
                                  <!-- /.form-group -->
                                  <div class="form-group col-md-5">
                                    <label>ปี พ.ศ.</label>
                                    <select name="year_after" class="form-control select2" style="width: 80%;">
                                      <option selected="selected" value="2018">2561</option> 
                                      <option selected="selected" value="2017">2560</option>  
                                      <option value="2016">2559</option>
                                      <option value="2015">2558</option>
                                      <option value="2014">2557</option>
                                    </select>
                                  </div>
                                  <div class="box-footer col-md-7">
                                        <button type="submit" class="btn btn-info pull-left">ตกลง</button>
                                   </div>
                                  <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                               </form>
                              </div>
                              </div>
                              <!-- /.row -->
                            </div>
                          </div>
                  </div>
                
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
                <div class="box box-default">
                            <div class="box-header with-border">
                    
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                              <div class="row">
                              <div class="container">
                              <form action="st_previos_year.php" method="get">
                                <div class="col-md-5">
                                 
                                  <!-- /.form-group -->
                                  <div class="box-body">
                                          <strong><i class="fa fa-file-text-o margin-r-5"></i> การใช้</strong>
                            
                                          <p> -กรุณาเลือกปี พ.ศ. เพื่อตรวจสอบข้อมูลสถิติการใช้น้ำย้อนหลัง</p>
                                        </div>
                                  <!-- /.form-group -->
                                </div>
                                
                                
                               
                                <!-- /.col -->
                                <div class="col-md-5">
                                  
                                  <!-- /.form-group -->
                                 <div class="form-group">
                                    <label>ตั้งเเต่ ปี พ.ศ.</label>
                                    <select name="year_before" class="form-control select2" style="width: 40%;">
                                      <option value="2018">2561</option> 
                                      <option value="2017">2560</option>  
                                      <option value="2016">2559</option>
                                      <option value="2015">2558</option>
                                      <option  selected="selected" value="2014">2557</option>
                                    </select>
                                  </div>
                                   <div class="form-group">
                                    <label>ถึง ปี พ.ศ.</label>
                                    <select name="year_after" class="form-control select2" style="width: 40%;">
                                      <option selected="selected" value="2018">2561</option> 
                                      <option value="2017">2560</option>  
                                      <option value="2016">2559</option>
                                      <option value="2015">2558</option>
                                      <option value="2014">2557</option>
                                    </select>
                                  </div>
                                   <div class="box-footer">
                                        <button type="submit" class="btn btn-info pull-left">ตกลง</button>
                                   </div>
                                  <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                             </form>
                             </div>
                            </div>
                              <!-- /.row -->
                            </div>
                          </div>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
       
   
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>CPE XIII-UP</strong>
  </footer>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="...../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
