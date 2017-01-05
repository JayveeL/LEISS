<?php $this->load->view('js'); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
  
    <title>Laboratory Equipment Inventory Software System</title>

    <!-- Bootstrap CSS -->    
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="<?php echo base_url(); ?>css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="<?php echo base_url(); ?>css/elegant-icons-style.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>css/font-awesome.min.css" rel="stylesheet" />    

    <!-- Custom styles -->
    <link href="<?php echo base_url(); ?>css/widgets.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/style-responsive.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>css/jquery-ui-1.10.4.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/custom.css" rel="stylesheet">
    
  </head>

  <body>
  <!-- container section start -->
  <section id="container" class="">
      <!--main content start-->
          <section class="wrapper">            
              <!--overview start-->
             <div class="">
              <ul class="nav nav-tabs">
                <li class="active pointer" onclick="showReport('all')"><a data-toggle="tab">All</a></li>
                <?php if(null != $labList){
                  for($i = 0; $i < count($labList); $i++){
                    echo '<li id='.$labList[$i]->labID.' onclick="showReport(this.id)" class="pointer"><a data-toggle="tab">'.$labList[$i]->labName.'</a></li>';
                  }
                } ?>
              </ul>

              <div class="tab-content">
                <div id="report" class="tab-pane fade in active">
                    <iframe id="labReportFrame" src="<?php echo site_url('Reports/loadReports/all');?>" style="height: 45em; width: 100%; border: none;"></iframe>
                </div>
              </div>
            </div>
      </section>
  </section>
  <!-- container section start -->

    <!-- javascripts -->
    <script src="<?php echo base_url(); ?>js/jquery.js"></script>
  <script src="<?php echo base_url(); ?>js/jquery-ui-1.10.4.min.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui-1.9.2.custom.min.js"></script>
    <!-- bootstrap -->
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="<?php echo base_url(); ?>js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery.nicescroll.js" type="text/javascript"></script>

   
    <!--custome script for all page-->
    <!-- custom script for this page-->   
  <script src="<?php echo base_url(); ?>js/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="<?php echo base_url(); ?>js/jquery-jvectormap-world-mill-en.js"></script>  
  <script src="<?php echo base_url(); ?>js/jquery.autosize.min.js"></script>
  <script src="<?php echo base_url(); ?>js/jquery.placeholder.min.js"></script> 
  <script src="<?php echo base_url(); ?>js/jquery.slimscroll.min.js"></script>
  
  </body>
</html>
