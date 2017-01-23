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
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
  </head>

  <body>
  <!-- container section start -->
  <section id="container" class="">
      <!--main content start-->
          <section class="wrapper">            
              <!--overview start-->
              <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-list-alt"></i>List of All Equipments</h3>
                     <div class="input-group">

                      <span class="input-group-btn">
                    <i class=" icon_search"></i>
                  </span>   
                  <input type="text" style= "margin-left: 5px" input type="text" class="form-control" placeholder="Search all laboratories for..." id="searchAll">
                      
                    </div>
                             
                </div>
             </div>
             </br>
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel panel-primary">
                          <table class="table table-striped" id='listAllEquipments'>
                           <thead id="headEquipments">
                              <tr>
                                 <th class="th"><i class="icon_clipboard"></i> Name</th>
                                 <th class="th"><i class="icon_datareport_alt"></i> Quantity</th>                                 
                              </tr>
                            </thead>
                            <tbody id="allEquipments">
                            <?php if(null != $equipList){
                                    foreach ($equipList as $key) { ?>
                                      <tr>
                                         <td><?php echo $key['eqpName']; ?></td>
                                         <td><?php echo $key['quantity']; ?></td>
                                      </tr>
                             <?php } 
                                  }else{?>
                                   <tr>
                                      <td>No records to display..</td><td></td>
                                   </tr>
                            <?php } ?>
                           </tbody>
                        </table>
                      </section>
                  </div>
              </div>
            
    
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
                </div>
              </div>
              
            </div>
                        
          </div> 
              <!-- project team & activity end -->

          </section>
      </section>
  </section>
  <!-- container section start -->
        <!-- Edit Equipment -->
      <div id="editModal" class="modal fade" role="dialog">
          <div class="modal-dialog" style="overflow: hidden;">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Edit Equipment</h2>
              </div>
              <div class="modal-body" >
               <table align="center" width="60%">
                <tr>
                   <td align="center">Serial No</td><td><input type="text" class="input" id="editSerialNum" disabled></td>
                 </tr><tr>
                   <td align="center">Name </td><td><input type="text" class="input" id="editName"></td>
                 </tr><tr>
                   <td align="center">Price </td><td><input type="text" class="input" id="editPrice"></td>
                 </tr>
              </table>
              </div>
              <div class="modal-footer">
                <button type="button" id="editSaveBtn" class="btn btn-success btn-lg modalBtn" >Save Changes</button>
                 <button type="button" class="btn btn-danger btn-lg modalBtn" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

        <!-- View Equipment History-->
       <div id="vehModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title"></h2>
              </div>
              <div class="modal-body" >
              <br>
               <table align="center" class="table" width="80%">
                  <th>Date</th>
                  <th>Detail</th>
                  <tbody id="equipmentHistory">
                    <tr><td><span id="loadSpinner"><i class="fa fa-spinner fa-spin fa-5x fa-fw"></i></span></td></tr>
                  </tbody>                            
              </table>
              </div>
              <div class="modal-footer">                
                 <button type="button" class="btn btn-danger btn-lg modalBtn" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

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
