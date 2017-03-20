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
      <link href="<?php echo base_url(); ?>css/dataTables.bootstrap.min.css" rel="stylesheet">

      <!-- Pagination css -->
      <!-- <link href="<?php echo base_url(); ?>css/simplePagination.css" rel="stylesheet"> -->
    </head>

    <body>
    <!-- container section start --> 
        <section id="container" class="">
        <!--main content start-->
          <section class="wrapper"> 
             <!--overview start-->  
  			  <div class="row">
  				<div class="col-lg-12">
            <input type="hidden" value="<?php echo $equipList[0][0]['labID']; ?>" id = "currLab">
  					 <h3 class="page-header" id="pageHeader"><i class="icon_menu-square_alt2"></i><?php echo $equipList[0][0]['labName']; ?>
             <a class="btn btn-danger btn-lg pull-right" data-toggle="modal" data-target="#deleteModal" style="margin-top: -1%">Delete Laboratory</a>
             <br>
             <span style="font-size: 15px; text-align: center; word-wrap: break-word;"><?php echo nl2br($equipList[0][0]['description']); ?></span>
            </h3>
          </div>
          </div>

          <div class="row">
            <div class="col-lg-12">          
              <ol class="breadcrumb">
                 <li class="pointer"><i class=" icon_menu-square_alt2"></i><a onClick="window.location.reload()">All</a></li>
                 <li class="pointer"><i class="arrow_carrot-2up_alt2"></i><a data-toggle="modal" data-target="#borrowModal" id="borrow">Borrow</a></li>
                 <li class="pointer"><i class="arrow_triangle-down_alt2"></i><a data-toggle="modal" data-target="#returnModal" id="return">Return</a></li>
                 <li class="pointer"><i class=" icon_error-circle_alt"></i><a data-toggle="modal" data-target="#damageModal" id="fde">File Damaged Equipment</a></li>
                 <li class="pointer"><i class=" icon_check_alt2"></i><a data-toggle="modal" data-target="#repairModal" id="repair">Repair Equipment</a></li>          
              </ol>

           <!--  <div class="input-group">               
                    <span class="input-group-btn">
                      <i class=" icon_search"></i>
                    </span>   
                    <input type="text" style= "margin-left: 5px" class="form-control" placeholder="Search in <?php echo $equipList[0][0]['labName']; ?> for..." id="searchEquipment">    
            </div>                        		
            </br>      -->    
             
            <!-- Display Table List -->
            <section class="panel panel-primary">
            <div id="page-nav" style="background-color: #EEEEEE;"></div>
              <table class="table table-striped table-advance table-hover" id="labEquipmentsTable">
                <thead><tr>
                     <th class="th"><i class="icon_tag"></i> Serial No.</th>
                     <th class="th"><i class="icon_clipboard"></i> Name</th>
                     <th class="th"><i class="icon_clipboard"></i> Type</th>
                     <th class="th"><i class="icon_cogs"></i> Actions

                        <input type="checkbox" id="moveAll" onclick="moveAll('all')" class="check">
                        <img src="<?php echo base_url();?>img/icons/move-icon.png" class="move-icon" data-target="#moveModal" data-toggle="modal" rel="tooltip" title="Move">               

                     </th> 
                </tr></thead>
                  <tbody>
                   <?php if(null != $equipList[1] || null != $equipList[2]){
                            if(null != $equipList[1]){
                                for($i = 0; $i < count($equipList[1]); $i++){ ?>
                                  <tr class="itemDetails paginate" id="<?php echo $equipList[1][$i]['eqpSerialNum'].'tr';?>">
                                    <td><?php echo $equipList[1][$i]['eqpSerialNum'];?></td>
                                    <td><?php echo $equipList[1][$i]['eqpName'];?></td>
                                    <td><?php echo "Equipment"; ?></td>
                                    <td>
                                      <div class="btn-group">
                                        <a class="btn btn-primary" onclick = "editEquipment('<?php echo $equipList[1][$i]['eqpSerialNum']; ?>')" id="<?php echo $equipList[1][$i]['eqpSerialNum']; ?>"  value="<?php echo $equipList[1][$i]['eqpSerialNum']; ?>" rel="tooltip" title="Edit"><i class="icon_pencil"></i></a>
                                        <a class="btn btn-success" onclick = "viewEquipmentHistory('<?php echo $equipList[1][$i]['eqpSerialNum']; ?>', '<?php echo $equipList[1][$i]['eqpName']; ?>')" id="<?php echo $equipList[1][$i]['eqpSerialNum']; ?>"  value="<?php echo $equipList[1][$i]['eqpSerialNum']; ?>" rel="tooltip" title="View Equipment History"><i class=" icon_search-2" ></i></a>
                                      </div>
                                      <?php 
                                        // print_r($equipList[4]);
                                        $show = false;
                                        if(count($equipList[4]) > 0){
                                          for($j = 0; $j < count($equipList[4]); $j++){
                                            if($equipList[1][$i]['eqpSerialNum'] == $equipList[4][$j]['eqpSerialNum']){
                                                $show = true; ?>
                                              <?php break;
                                            }else{ ?>
                                           <?php }
                                          }
                                          if($show == false){?>
                                              <input type="checkbox" class="check equipCheck" name="checkItem" id="<?php echo $equipList[1][$i]['eqpSerialNum'].'checkbox';?>" onclick = "moveAll(this.id)">
                                        <?php }}else{ ?>
                                          <input type="checkbox" class="check equipCheck" name="checkItem" id="<?php echo $equipList[1][$i]['eqpSerialNum'].'checkbox';?>" onclick = "moveAll(this.id)">
                                        <?php }
                                      ?>
                                    </td>
                                  </tr>
                            <?php }  
                            }
                            if(null != $equipList[2]){
                                for($i = 0; $i < count($equipList[2]); $i++){ ?>
                                  <tr class="itemDetails paginate" id="<?php echo $equipList[2][$i]['compSerialNum'].'tr';?>">
                                    <td><?php echo $equipList[2][$i]['compSerialNum'];?></td>
                                    <td><?php echo $equipList[2][$i]['compName'];?></td>
                                    <td><?php echo "Component"; ?></td>
                                    <td>
                                      <div class="btn-group">
                                        <a class="btn btn-primary" onclick = "editEquipment('<?php echo $equipList[2][$i]['compSerialNum']; ?>')" id="<?php echo $equipList[2][$i]['compSerialNum']; ?>"  value="<?php echo $equipList[2][$i]['compSerialNum']; ?>" rel="tooltip" title="Edit"><i class="icon_pencil"></i></a>
                                        <a class="btn btn-success" onclick = "viewEquipmentHistory('<?php echo $equipList[2][$i]['compSerialNum']; ?>', '<?php echo $equipList[2][$i]['compName']; ?>')" id="<?php echo $equipList[2][$i]['compSerialNum']; ?>"  value="<?php echo $equipList[2][$i]['compSerialNum']; ?>" rel="tooltip" title="View Equipment History"><i class=" icon_search-2" ></i></a>
                                      </div>
                                      <?php 
                                         // print_r($equipList[5]);
                                         $show = false;
                                        if(count($equipList[5]) > 0){
                                          for($j = 0; $j < count($equipList[5]); $j++){
                                            // print_r($equipList[5][$j]['compSerialNum']);
                                            if($equipList[2][$i]['compSerialNum'] == $equipList[5][$j]['compSerialNum']){ 
                                              $show = true; ?>
                                              <?php break;
                                            }else{ ?>
                                           <?php }
                                          }
                                          if($show == false){?>
                                              <input type="checkbox" class="check equipCheck" name="checkItem" id="<?php echo $equipList[2][$i]['compSerialNum'].'checkbox';?>" onclick = "moveAll(this.id)">
                                        <?php }}else{ ?>
                                          <input type="checkbox" class="check equipCheck" name="checkItem" id="<?php echo $equipList[2][$i]['compSerialNum'].'checkbox';?>" onclick = "moveAll(this.id)">
                                        <?php }
                                      ?>
                                    </td>
                                  </tr>
                          <?php } 
                          }
                        }else{
                    ?>
                     <tr>
                        <td>No records to display..</td>
                        <td></td><td></td><td></td>
                     </tr>
                    <?php } ?>
                  </tbody>
               </table>
            </section>
         </section>

         <!-- modals -->
         <div id="deleteModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h2 class="modal-title">Delete Laboratory</h2>
                </div>
                <div class="modal-body" align="center">
                 Are you sure you want to delete <?php echo $equipList[0][0]['labName']; ?>?
                </div>
                <div class="modal-footer">
                  <button type="button"  id="deleteLab" class="btn btn-success btn-lg modalBtn" data-dismiss="modal">Delete Laboratory</button>
                   <button type="button"  class="btn btn-danger btn-lg modalBtn" data-dismiss="modal">Cancel</button>
                </div>
              </div>
            </div>
         </div>

         <!-- Move Equipment -->
         <div id="moveModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h2 class="modal-title">Move Equipment</h2>
                </div>
                <div class="modal-body">
                 <table align="center" width="60%">
                  <tr>
                     <td align="center">Item(s)</td>
                     <td><span><button id="viewItems" onclick="showBorrowed()" disabled type="button" class="btn btn-primary btn-xs">No items</button></span></td>
                   </tr><tr>
                     <td align="center">From </td><td> <?php echo $equipList[0][0]['labName']; ?> </td>
                   </tr><tr>
                     <td align="center">To </td>
                     <td><select class="input" id="moveLabList" onchange="clearError()">
                          <option selected="true" disabled>Select Laboratory</option>
                      <?php if(null != $equipList[3]){
                                for($i = 0; $i < count($equipList[3]); $i++){ 
                                  echo '<option value="'.$equipList[3][$i]['labID'].'">'.$equipList[3][$i]['labName'].'</option>';
                                }
                            }?>                      
                     </select>
                      <p class="idNumValidate" id="moveValidate"></p>
                     </td>                   
                   </tr>
                </table>
                </div>
                <div class="modal-footer">
                  <button type="button"  class="btn btn-success btn-lg modalBtn" onclick="moveEquipments()">Move Equipment(s)</button>
                   <button type="button" class="btn btn-danger btn-lg modalBtn" data-dismiss="modal">Cancel</button>
                </div>
              </div>
            </div>
          </div>

          <!-- Edit Equipment -->
        <div id="editModal" class="modal fade" role="dialog">
            <div class="modal-dialog" style="overflow: hidden;">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h2 class="modal-title">Edit Equipment</h2>
                </div>
                <div class="modal-body" >
                <form>  
                 <table align="center" width="60%">
                  <tr>
                     <td align="center">Serial No.</td><td><input type="text" class="input" id="editSerialNum" disabled></td>
                   </tr><tr>
                     <td align="center">Name </td><td><input type="text" class="input" id="editName" required autofocus="true"></td>
                   </tr><tr>
                     <td align="center">Price </td><td><input type="text" onkeypress="return acceptDecimal(event)" class="input" id="editPrice" required autofocus="true"></td>
                   </tr>
                </table>
                <div class="modal-footer">
                  <button type="submit" id="editSaveBtn" class="btn btn-success btn-lg modalBtn" >Save Changes</button>
                   <button type="button" class="btn btn-danger btn-lg modalBtn" data-dismiss="modal">Cancel</button>
                </div>
              </form>
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
                 <div style="height: 20em; overflow-y: auto">
                 <table align="center" class="table" width="80%">
                    <thead>
                      <th>Date</th>
                      <th>Detail</th>
                    </thead>
                    <tbody id="equipmentHistory">
                      <tr><td><span id="loadSpinner"><i class="fa fa-spinner fa-spin fa-5x fa-fw"></i></span></td></tr>
                    </tbody> 
                                         
                </table>
                </div>    
                </div>
                <div class="modal-footer">                
                   <button type="button" class="btn btn-danger btn-lg modalBtn" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>

          <!-- Borrow Equipment -->
          <div id="borrowModal" class="modal fade" role="dialog">
             <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close">&times;</button>
                  <h2 class="modal-title">Borrow Equipment</h2>
                </div>
                <div class="modal-body" >
                <form>
                 <table align="center" width="60%">
                  <tr>
                     <td align="center">ID number </td><td><input type="text" onkeypress="return isNumberKey(event)" onmouseup = "checkIDnumber(this.value)" onkeyup = "checkIDnumber(this.value)" class="input" id='borrowerID' required autofocus="true"></td> <td><i class="idNumCheck" aria-hidden="true"></i></td>
                   </tr>
                    <tr><td></td><td><span class="idNumValidate"></span></td></tr>
                   <tr>
                     <td align="center">Name </td><td><input type="text" onkeyup = "validate(this, event)" class="input" id='borrowerName' required maxlength="35" autofocus="true"></td> <td><i class="nameCheck" aria-hidden="true"></i></td>
                   </tr>
                   <tr><td></td><td><span class="nameValidate"></span></td></tr>
                   <tr>
                     <td align="center">Teacher </td><td><input type="text" onkeyup = "validate(this, event)" class="input" id='borrowerTeacher' required  maxlength="35"  autofocus="true"></td>
                     <td><i class="teacherCheck" aria-hidden="true"></i></td>
                   </tr>
                   <tr><td></td><td><span class="teacherValidate"></span></td></tr>
                   <tr>
                     <td align="center">In-charge </td><td><input type="text" onkeyup = "validate(this, event)" class="input" id='incharge' required  maxlength="35" autofocus="true"></td>
                     <td><i class="inchargeCheck" aria-hidden="true"></i></td>
                   </tr>
                   <tr><td></td><td><span class="inchargeValidate"></span></td></tr>
                </table>
                </br>

              <div class="parentDiv">
                  <div id="borrowModalInnerDiv">
                    <input type="text" class="input" id="searchBorrowed" placeholder="Search equipments">
                    <div id="borrowModalInnerDiv2">
                        <table class="table first "  id="borrowedEquipList">
                         <tr id='borrowmModalHeader'>
                            <th><u>All Equipments</u></th>
                            <th align="right"><input type="checkbox" onclick = "checkAllBorrow()" class="returnItem"></th> 
                          </tr>
                          <tbody id="borrowedList">
                            <td>No records to display...</td>
                            <td></td>
                          </tbody>
                      </table>
                    </div>
                  </div>
          
                  <div class="floatRightWidth49">
                   Borrowed Equipments:                 
                        <table class="table" >
                          <thead class="displayBlock">
                              <th class="width80">Equipment</th>
                          </thead>
                          <tbody id="borrowedEquipments" class="tbodyData"></tbody>
                         </table>
                 </div>
              </div>
              
           </div>
                <div class="modal-footer">
                  <button type="submit" id="borrowBtn" class="btn btn-success btn-lg modalBtn" >Borrow Equipments</button>
                   <button type="button" class="btn btn-danger btn-lg modalBtn">Cancel</button>
                </div>
              </div>
            </div>
            </form>
          </div>

          <!-- Return Equipment -->
          <div id="returnModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close">&times;</button>
                  <h2 class="modal-title">Return Equipment</h2>
                </div>
                <div class="modal-body" >
                 <table align="center" width="60%">
                  <tr>
                     <td align="center">ID number</td><td><input type="text" onkeypress="return isNumberKey(event)" class="input" id="returnerID"></td>
                     <td><i class="idNumCheck" aria-hidden="true"></i></td>
                     <tr><td></td><td><span class="idNumValidate"></span></td></tr>
                   </tr><tr>
                     <td align="center">Name </td><td><input type="text" disabled class="input" id="returnerName"></td>      
                     <td><i class="nameCheck" aria-hidden="true"></i></td>           
                </table>
                <br>

                Borrowed Equipments:
                  <table class="table" id="returnModalTable">
                          <thead id='returnModalHeader' class="th displayBlock">
                          </thead>
                          <tbody id="returnedEquipments">
                             <tr>
                              <td>No Records to display...</td>
                             </tr>
                          </tbody>
                      </table>

                </div>
                <div class="modal-footer">
                  <button type="button" id="returnBtn" class="btn btn-success btn-lg modalBtn" >Return Equipments</button>
                   <button type="button" id="modalBtn" class="btn btn-danger btn-lg modalBtn">Cancel</button>
                </div>
              </div>
            </div>
          </div>

          <!-- File Damage Equipment -->
          <div id="damageModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close">&times;</button>
                  <h2 class="modal-title">File Damaged Equipment</h2>
                </div>
                <div class="modal-body" >
                <form>
                 <table align="center" width="60%">
                  <tr>
                     <td align="center">ID number </td><td><input type="text" onkeypress="return isNumberKey(event)" onmouseup = "checkIDnumber(this.value)" onkeyup = "checkIDnumber(this.value)" class="input" id='damagerID' required autofocus="true"></td> <td><i class="idNumCheck" aria-hidden="true"></i></td>
                   </tr>
                   <tr><td></td><td><span class="idNumValidate"></span></td></tr>
                   
                   <tr><br>
                     <td align="center">Name </td><td><input type="text" onkeyup = "validate(this, event)" class="input" id='damagerName' required  maxlength="35" autofocus="true"></td><td><i class="nameCheck" aria-hidden="true"></i></td>
                   </tr>
                   <tr><td></td><td><span class="nameValidate"></span></td></tr>
                   <tr>
                     <td align="center">Teacher </td><td><input type="text" onkeyup = "validate(this, event)" class="input" id='damagerTeacher' required  maxlength="35" autofocus="true"></td>
                     <td><i class="teacherCheck" aria-hidden="true"></i></td>
                   </tr>
                   <tr><td></td><td><span class="teacherValidate"></span></td></tr>
                </table>
                </br>

                <div class="parentDiv">
                  <div id="damageModalInnerDiv">
                    <input type="text" class="input" id="searchDamaged" placeholder="Search equipments">
                    <div id="damageModalInnerDiv2">
                        <table class="table first "  id="damagedEquipList">
                         <tr id="damagemModalHeader">
                            <th><u>All Equipments</u></th>
                            <th align="right"><input type="checkbox" onclick = "checkAllDamage()" class="damageItem"></th> 
                          </tr>
                          <tbody id="damagedList">
                            <td>No records to display...</td>
                            <td></td>
                          </tbody>
                      </table>
                    </div>
                  </div>
          
                  <div class="floatRightWidth49">
                   Damaged Equipments:                 
                        <table class="table" class="height95Width100">
                          <thead class="displayBlock">
                              <th class="width80">Equipment</th>
                              <th>Price</th>
                          </thead>
                          <tbody id="damagedEquipments" class="tbodyData"></tbody>
                         </table>
                    <span>Total: </span><span id="price"></span>
                  </div>
              </div>

                </div>
                <div class="modal-footer">
                  <button type="submit" id="damageBtn" class="btn btn-success btn-lg modalBtn" >File Damaged Equipments</button>
                   <button type="button" class="btn btn-danger btn-lg modalBtn">Cancel</button>
                </div>
              </div>
            </div>
            </form>
          </div>

          <!-- Repair Equipment -->
          <div id="repairModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h2 class="modal-title">Repair Equipment</h2>
                </div>
                <div class="modal-body" >

                Damaged Equipments:
                  <table class="table" id="returnModalTable">
                    <tbody id="repairEquipments">
                      <tr>
                      <td>No Records to display...</td>
                      <td></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="modal-footer">
                  <button type="button" id="repairBtn" class="btn btn-success btn-lg modalBtn" >Repair Equipments</button>
                   <button type="button" id="modalBtn" class="btn btn-danger btn-lg modalBtn" data-dismiss="modal">Cancel</button>
                </div>
              </div>
            </div>
          </div>

          <!-- Modal -->
           <div class="modal fade" id="notifyModal" tabindex="-1" role="dialog" aria-labelledby="notifyModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-header notifyHeader">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="notifyModalLabel"></h4>
                </div>
                <div class="modal-body notifyBody">
                  <div id = 'divContent'></div>
                </div>
              </div>
            </div>
          </div>
         </section>


      <script type="text/javascript">
          $(document).ready(function(){
              $('#labEquipmentsTable').DataTable({
                "pageLength": 5,
                "lengthMenu": [[5, 15, 25, 100], [5, 15, 25, "All"]],
                "columnDefs": [ {
                              "targets": 3,
                              "orderable": false
                              } ]
              });
          });
          $(".modal-footer .btn-danger, .close").click(function(){
              checkModalContent($(this));
          });

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

      <!-- javascript imports -->
      <script src="<?php echo base_url(); ?>js/jquery.js"></script>
      <script src="<?php echo base_url(); ?>js/jquery-ui-1.10.4.min.js"></script>
      <script src="<?php  echo base_url(); ?>js/jquery-1.12.4.js"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui-1.9.2.custom.min.js"></script>      
      <!-- bootstrap -->
      <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
      <!-- nice scroll -->      
      <script src="<?php echo base_url(); ?>js/jquery.scrollTo.min.js"></script>
      <script src="<?php echo base_url(); ?>js/jquery.nicescroll.js" type="text/javascript"></script>
      <!-- custom script for all page -->
      <script src="<?php echo base_url(); ?>js/scripts.js"></script>      
      <!-- custom script for this page -->   
      <script src="<?php echo base_url(); ?>js/jquery-jvectormap-1.2.2.min.js"></script>
      <script src="<?php echo base_url(); ?>js/jquery-jvectormap-world-mill-en.js"></script> 
      <script src="<?php echo base_url(); ?>js/jquery.autosize.min.js"></script>
      <script src="<?php echo base_url(); ?>js/jquery.placeholder.min.js"></script> 
      <!-- Pagination plugin and custom script -->
      <!-- <script src="<?php echo base_url(); ?>js/jquery.simplePagination.js"></script> -->
      <!-- <script src="<?php echo base_url(); ?>js/framelab.js"></script> -->
      <script src="<?php echo base_url(); ?>js/jquery.dataTables.min.js"></script>
      <script src="<?php echo base_url(); ?>js/dataTables.bootstrap.min.js"></script>
    </body>
  </html>
