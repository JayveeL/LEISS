<?php $this->load->view('js'); ?>

<!DOCTYPE html>
<html>
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
      <!--header start-->          
      <header class="header">
            <div class="toggle-nav">
                <div class="icon-reorder"><i class="icon_menu"></i></div>
            </div>
            <a href='' onclick='location.reload(true);' class="logo">Laboratory Equipment Inventory Software System</a>
            </div>
      </header>      
      <!--header end-->

      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li id="all" class="active"><a>
                        <i class="icon_grid-3x3"></i>
                        <span style="cursor: pointer;">All</span>                      
                  </a></li> 
                  <table id="labList" width="100%"></table>
                  <li id="reports"><a>
                        <i class="icon_piechart"></i>
                        <span style="cursor: pointer;">Reports</span>  
                  </a></li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!--main content start-->
      <section id="main-content">           
            <iframe id="frame" src="<?php echo site_url('Index/loadIframe/all');?>"></iframe>
      </section>
      <!--main content end-->
      <a id="addBtn" class="btn btn-success btn-lg add-btn">Add Laboratory</a>

      <div id="addLab" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Add Laboratory</h2>
              </div>
              <div class="modal-body">
               Name </br><input type="text" class="input" id="labName" maxlength="20">
               <p class="idNumValidate" id="labNameValidate"></p>
               Description <i>(optional)</i></br><textarea id="description" class="input" rows="4"></textarea>
              </div>
              <div class="modal-footer">
                <button type="button" id="addLabBtn" class="btn btn-success btn-lg modalBtn">Add Laboratory</button>
                <button type="button" class="btn btn-danger btn-lg modalBtn" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>


      <div id="addEqpmnt" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Add Equipment</h2>
              </div>
              <div class="modal-body">
              <form>
                <table align="center" width="60%">
                  <tr>
                     <td align="center">Serial No.</td><td><input type="text" name="eqpSerialNum" id="eqpSerialNum" class="input" required autofocus="true"><p class="idNumValidate" id="serialNumValidate"></p></td>
                   </tr><br><tr>
                     <td align="center">Name </td><td><input type="text" id="eqpName" name="eqpName" class="input" required autofocus="true"></td>
                   </tr><br><tr align="center">
                     <td><input type="radio" name="item" id="component" value="component"> Component</td>
                     <td><input type="radio" name="item" id="equipment" value="equipment" checked> Equipment</td>
                   </tr><br><tr>
                     <td align="center">Price </td><td><input type="text" onkeypress="return acceptDecimal(event)" id="eqpPrice" class="input" name="eqpPrice" required autofocus="true"></td>
                   </tr>
                </table>
                <div class="modal-footer">
                   <button type="submit" id="addEquipmentBtn" class="btn btn-success btn-lg modalBtn">Add Equipment</button>
                   <button type="button" class="btn btn-danger btn-lg modalBtn" data-dismiss="modal">Close</button>
                </div>
              </form>
            </div>
          </div>
        </div>



  </section>  

    <!-- javascripts -->

    <script type="text/javascript">
      function isNumberKey(evt){
          var charCode = (evt.which) ? evt.which : event.keyCode
          if (charCode > 31 && (charCode < 48 || charCode > 57))
              return false;
          return true;
      }

      function acceptDecimal(evt){
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
        }
    </script>
    
    <script src = "<?php echo base_url();?>js/jquery.js"></script>
	  <script src="<?php echo base_url();?>js/jquery-ui-1.10.4.min.js"></script>
    <script src="<?php echo base_url();?>js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui-1.9.2.custom.min.js"></script>
    <!-- bootstrap -->
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="<?php echo base_url();?>js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo base_url();?>js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- charts scripts -->
    <script src="<?php echo base_url();?>assets/jquery-knob/js/jquery.knob.js"></script>
    <!--script for this page only-->
	  <script src="<?php echo base_url();?>js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="<?php echo base_url();?>js/jquery.customSelect.min.js" ></script>
	  <script src="<?php echo base_url();?>assets/chart-master/Chart.js"></script>   
    <!--custome script for all page-->
    <script src="<?php echo base_url();?>js/scripts.js"></script>
    <!-- custom script for this page-->   
	<script src="<?php echo base_url();?>js/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="<?php echo base_url();?>js/jquery-jvectormap-world-mill-en.js"></script>
	<script src="<?php echo base_url();?>js/jquery.autosize.min.js"></script>
	<script src="<?php echo base_url();?>js/jquery.placeholder.min.js"></script>
	<script src="<?php echo base_url();?>js/jquery.slimscroll.min.js"></script>
  </body>
</html>
