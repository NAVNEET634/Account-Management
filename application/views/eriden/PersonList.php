<style>.black_overlay{display:block;}</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  
  <!-- Main content -->
  <section class="content" ng-app="EridenModel" ng-controller="EridenController">
    <div class="row">
    	
        <div class="col-xs-6">
            <small>Manage Person</small>
        </div>
        
    	<div class="col-xs-3-right">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search" ng-model="name">
			</div>		
		</div>
       
	   <div class="col-xs-12">
         <div class="box">
         
         <div class="box-header">
            <div class="col-xs-8">
            	<h3 class="box-title">You have created {{ PersonData.length }} Person</h3>
            </div>
            <div class="col-xs-4" style="text-align:right;">
            <a href="javaScript:void(0)" style="color:#fff;" ng-Click="BookFD()"><h3 class="box-title">Add New</h3></a>
            </div>
            
          </div><!-- /.box-header -->
          
          
          
          
          <div class="box-body">
           
                      
          <div id="GridLayout">
          <table width='100%' class="table table-bordered table-hover" id="PersonList" ajaxUrl="<?php echo base_url(); ?>eriden/PersonListData" deleteUrl="<?php echo base_url(); ?>eriden/PersonDelete">
          
          <tr>
          		<th>
                <span ng-click="sort('PersonName')">
                	Person Name
                    <span class="glyphicon sort-icon" ng-show="sortKey=='PersonName'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                </span>
                </th>
                
                <th style="text-align:center;width:200px;">
                <span ng-click="sort('Email')">
                	Email
                    <span class="glyphicon sort-icon" ng-show="sortKey=='Email'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                </span>
                </th>
                
                <th style="text-align:center;width:200px;">
                <span ng-click="sort('Phone')">
                	Phone
                    <span class="glyphicon sort-icon" ng-show="sortKey=='Phone'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
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
          
          <tr ng-repeat="member in resultValue=(PersonData | filter:name | orderBy:sortKey:reverse)" id="{{ member.Id }}">	
          		<td>{{ member.PersonName }}</td>
          		<td>{{ member.Email }}</td>
                <td align="center">{{ member.Phone }}</td>
          		<td align="center">{{ member.DateCreated }}</td>
           		<td align="center">
                <a class="fa fa-edit" href="javaScript:void(0)" ng-click="PersonUpdate('<?php echo base_url(); ?>eriden/PersonUpdate/'+member.Id,member.Id)"></a>
                    &nbsp;&nbsp;&nbsp;
                    <a class="fa fa-trash-o" ng-click="DeletePerson(member.Id)" href="javaScript:void(0)"> </a>                    
                </td>
          </tr>
          
         
          </table>     
    
          </div>        
          
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
      <div class="col-xs-3-right">
           <div class="form-group">
                <dir-pagination-controls max-size="5" direction-links="true" boundary-links="true" ></dir-pagination-controls>
           </div>		
       </div>
    </div><!-- /.row -->
    
    
    
    
    <div class='lightbox-content' style="width:70%">
    
        <div class="modal-header">
            <button aria-hidden="true" data-dismiss="modal" class="close" type="button" onclick="hideLightbox()">×</button>
            <h5 id="myModalLabel" class="modal-title">Add Person</h5>
        </div>
        
        <div style="padding-top: 10px;border:0px;" class="modal-body">
        <form method="post" id="PersonDataPost" action="<?php echo base_url(); ?>eriden/SavePersonData/" redirectUrl="<?php echo base_url(); ?>eriden/PersonList" onSubmit="return CreatePerson()">
            <table id="additional-content" width='100%'>
            <tr>
                <td width='45%' valign='top'> 
                
                <div class="col-xs-12">
                    <div class="form-group">
                         <label for="AssistantName">Person Name <span class='red-star'>*</span></label>
                         <input type="text" placeholder="Person Name" id="PersonName" name='PersonName' class="form-control" required>
                         <input type="hidden" id="PersonId" name='PersonId'/>
                    </div>
                </div>
                
                <div class="col-xs-6">
                    <div class="form-group">
                        <label for="AssistantPhone">Email <span class='red-star'>&nbsp;</span></label>
                        <input type="text" placeholder="Email" id="Email" name='Email' class="form-control">
                    </div>
                </div>
                
                <div class="col-xs-6">
                    <div class="form-group">
                        <label for="AssistantPhone">Phone <span class='red-star'>&nbsp;</span></label>
                        <input type="text" placeholder="Phone Number" id="Phone" name='Phone' class="form-control">
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