<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  
  <!-- Main content -->
  <section class="content" ng-app="EridenModel" ng-controller="EridenController">
    <div class="row">
    	
        <div class="col-xs-6">
            <small><a href="javaScript:void(0)" style="color:#000;" ng-Click="BookFD()">Add New</a></small>
        </div>
        
    	<div class="col-xs-3-right">
			<div class="form-group">
				<select  id="SearchUserId" name='SearchUserId' class="form-control" onChange="window.location.href='<?php echo base_url(); ?>eriden/CSRList/'+this.value">
                <option value="">--Search Person Name--</option>
                <option ng-repeat="user in personListData" value="{{ user.Id }}" >{{ user.PersonName }}</option>
              </select>
			</div>		
		</div>
       
       <?php
	   $TotalCreditedBy=0;
	   $TotalDebitedBy=0;
	   foreach($CSRData as $Name=>$MemberRow) { ?>
	   <div class="col-xs-12">
         <div class="box">
         
         <div class="box-header">
            <div class="col-xs-8">
            	<h3 class="box-title"><?php echo $Name;?></h3>
            </div>
            <div class="col-xs-4" style="text-align:right;">
            <a href="javaScript:void(0)" style="color:#fff;" ng-Click="BookFD()"><h3 class="box-title">Add New</h3></a>
            </div>
            
          </div><!-- /.box-header -->
          
          
          
          
          <div class="box-body">
           
                      
          <div id="GridLayout">
          <table width='100%' class="table table-bordered table-hover" id="CSRList" ajaxUrl="<?php echo base_url(); ?>eriden/CSRListData" deleteUrl="<?php echo base_url(); ?>eriden/CSRDelete">
          
          <tr>
          		<th>
                <span ng-click="sort('PersonName')">
                	Person Name
                    <span class="glyphicon sort-icon" ng-show="sortKey=='PersonName'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                </span>
                </th>
                
                <th style="text-align:center;width:300px;">
                <span ng-click="sort('Comments')">
                	Comments
                    <span class="glyphicon sort-icon" ng-show="sortKey=='Comments'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                </span>
                </th>
                
                <th style="text-align:center;width:120px;">
                <span ng-click="sort('CreditedBy')">
                	Credited By
                    <span class="glyphicon sort-icon" ng-show="sortKey=='CreditedBy'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                </span>
                </th>
                
                <th style="text-align:center;width:120px;">
                <span ng-click="sort('DebitedBy')">
                	Debited By
                    <span class="glyphicon sort-icon" ng-show="sortKey=='DebitedBy'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                </span>
                </th>
                
                <th style="text-align:center;width:160px;">
                <span ng-click="sort('DateCreated')">
                	Date Created
                    <span class="glyphicon sort-icon" ng-show="sortKey=='DateCreated'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                </span>
                </th>
                
                <th style="text-align:center;width:50px;">Action</th>
          </tr>  
          
          <?php 
		  $CreditedBy=0;
		  $DebitedBy=0;
		  
		  foreach($MemberRow as $Member) 
		  { 
		  	  $CreditedBy+=$Member['CreditedBy'];
			  $DebitedBy+=$Member['DebitedBy'];
			  ?>
              <tr id="<?php echo $Member['Id'];?>">	
                    <td><?php echo $Member['PersonName'];?></td>
                    <td><?php echo $Member['Comments'];?></td>
                    <td align="center">&#8377; <?php echo number_format($Member['CreditedBy'], 2, '.', ',');?></td>
                    <td align="center">&#8377; <?php echo number_format($Member['DebitedBy'], 2, '.', ',');?></td>
                    <td align="center"><?php echo $Member['DateCreated'];?></td>
                    <td align="center">
                    <a class="fa fa-edit" href="javaScript:void(0)" ng-click="CSRUpdate('<?php echo base_url(); ?>eriden/CSRUpdate/<?php echo $Member['Id'];?>','<?php echo $Member['Id'];?>')"></a>
                        &nbsp;&nbsp;&nbsp; 
                        <a class="fa fa-trash-o" ng-click="DeleteCSR('<?php echo $Member['Id'];?>')" href="javaScript:void(0)"> </a>                    
                    </td>
              </tr>
          	  <?php 
			} 
			$TotalCreditedBy+=$CreditedBy;
			$TotalDebitedBy+=$DebitedBy;
			?>
          
          <tr>
              <td align="center" colspan="2"><b>Total</b></td>
              <td align="center"><b>&#8377; <?php echo number_format($CreditedBy, 2, '.', ',');?></b></td>
              <td align="center"><b>&#8377; <?php echo number_format($DebitedBy, 2, '.', ',');?></b></td>
              <td colspan="2"><b>&#8377; <?php echo number_format(($DebitedBy-$CreditedBy), 2, '.', ',');?></b></td>
           </tr>
          
         
          </table>     
    
          </div>        
          
          </div><!-- /.box-body -->
        </div><!-- /.box -->        
      </div><!-- /.col -->
      <?php } ?>
      
      <div class="col-xs-12">
         <div class="box">
         
         <div class="box-header">
            <div class="col-xs-8">
            	<h3 class="box-title">Total</h3>
            </div>
            <div class="col-xs-4" style="text-align:right;">
            <a href="javaScript:void(0)" style="color:#fff;" ng-Click="BookFD()"><h3 class="box-title">
			<?php echo number_format($TotalDebitedBy, 2, '.', ',');?> - <?php echo number_format($TotalCreditedBy, 2, '.', ',');?> = <?php echo number_format(($TotalDebitedBy-$TotalCreditedBy), 2, '.', ',');?>
            </h3></a>
            </div>
            
          </div><!-- /.box-header -->      
          
       </div>
       </div>
       
       
      <div class="col-xs-3-right">
           <div class="form-group">
                <dir-pagination-controls max-size="5" direction-links="true" boundary-links="true" ></dir-pagination-controls>
           </div>		
       </div>
    </div><!-- /.row -->
    
    
    
    
    <div class='lightbox-content' style="width:70%">
    
        <div class="modal-header">
            <button aria-hidden="true" data-dismiss="modal" class="close" type="button" onclick="hideLightbox()">×</button>
            <h5 id="myModalLabel" class="modal-title">Add CSR</h5>
        </div>
        
        <div style="padding-top: 10px;border:0px;" class="modal-body" id="PersonListData" ajaxUrl="<?php echo base_url(); ?>eriden/PersonListData/">
        <form method="post" id="CSRDataPost" action="<?php echo base_url(); ?>eriden/SaveCSRData/" redirectUrl="<?php echo base_url(); ?>eriden/CSRList" onSubmit="return CreateCSR()">
            <table id="additional-content" width='100%'>
            <tr>
                <td width='45%' valign='top'> 
                
                <div class="col-xs-12">
                    <div class="form-group">
                         <label for="AssistantName">Person Name <span class='red-star'>*</span></label>
                         <select  id="UserId" name='UserId' class="form-control" required>
                            <option value="">--Select Person Name--</option>
                            <option ng-repeat="user in personListData" value="{{ user.Id }}" >{{ user.PersonName }}</option>
                          </select>
                          
                         <input type="hidden" id="CSRId" name='CSRId'/>
                    </div>
                </div>
                
                <div class="col-xs-6">
                    <div class="form-group">
                        <label for="AssistantPhone">Credited By <span class='red-star'>&nbsp;</span></label>
                        <input type="text" placeholder="Enter Amount" id="CreditedBy" name='CreditedBy' class="form-control">
                    </div>
                </div>
                
                <div class="col-xs-6">
                    <div class="form-group">
                        <label for="AssistantPhone">Debited By <span class='red-star'>&nbsp;</span></label>
                        <input type="text" placeholder="Enter Amount" id="DebitedBy" name='DebitedBy' class="form-control">
                    </div>
                </div>
                
                 <div class="col-xs-12">
                    <div class="form-group">
                        <label for="AssistantPhone">Comments <span class='red-star'>&nbsp;</span></label>
                        <textarea id="Comments" name='Comments' class="form-control" rows="6"></textarea>
                    </div>
                </div>
                
                </td>
            </tr>            
            
            <tr>
                <td colspan='2' align='right'>
                <div class="box-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button" onclick="hideLightbox()">Close</button>
                	<button id="create-event" class="btn btn-primary" type="submit">Save</button>
                </div>
                </td>
            </tr>
            
            </table> 
            </form>
        </div>   
    </div>
    <div class='lightbox-loader'></div>
    
    
    
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<script src="<?php echo base_url(); ?>assets/js/Eriden.js" type="text/javascript"></script>