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
    <!-- Pagination css -->
    <link href="<?php echo base_url(); ?>css/simplePagination.css" rel="stylesheet">
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
                      <div id="page-nav" style="background-color: #EEEEEE;"></div>
                          <table class="table table-striped">
                           <thead id="headEquipments">
                              <tr>
                                 <th class="th"><i class="icon_clipboard"></i> Name</th>
                                 <th class="th"><i class="icon_datareport_alt"></i> Quantity</th>                                 
                              </tr>
                            </thead>
                            <tbody id="allEquipments">
                            <?php if(null != $equipList[0] || null != $equipList[1]){
                                    if(null != $equipList[0]){
                                      foreach ($equipList[0] as $key) { ?>
                                        <tr class="paginate">
                                           <td><?php echo $key['eqpName']; ?></td>
                                           <td><?php echo $key['quantity']; ?></td>
                                        </tr>
                               <?php } 
                                    }
                                     if(null != $equipList[1]){
                                      foreach ($equipList[1] as $key) { ?>
                                        <tr class="paginate">
                                           <td><?php echo $key['compName']; ?></td>
                                           <td><?php echo $key['quantity']; ?></td>
                                        </tr>
                               <?php } 
                                    } 
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
    <!-- custom script for this page-->   
    <script src="<?php echo base_url(); ?>js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery-jvectormap-world-mill-en.js"></script>  
    <script src="<?php echo base_url(); ?>js/jquery.autosize.min.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery.placeholder.min.js"></script> 
    <script src="<?php echo base_url(); ?>js/jquery.slimscroll.min.js"></script>
    <!-- Pagination plugin and custom script -->
    <script src="<?php echo base_url(); ?>js/jquery.simplePagination.js"></script>
    <script src="<?php echo base_url(); ?>js/main.js"></script>
  
  </body>
</html>
