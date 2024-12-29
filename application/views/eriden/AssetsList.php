<style>.black_overlay{display:block;}</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  
  <!-- Main content -->
  <section class="content" ng-app="EridenModel" ng-controller="EridenController">
    <div class="row">
    	
        <div class="col-xs-6">
            <small>Manage Insurance</small>
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
            	<h3 class="box-title">You have created {{ AssetsListData.length }} Insurance</h3>
            </div>
            <div class="col-xs-4" style="text-align:right;">
            <a href="javaScript:void(0)" style="color:#fff;" ng-Click="BookFD()"><h3 class="box-title">Add New</h3></a>
            </div>
            
          </div><!-- /.box-header -->
          
          
          
          
          <div class="box-body">
           
                      
          <div id="GridLayout">
          <table width='100%' class="table table-bordered table-hover" id="AssetsList" ajaxUrl="<?php echo base_url(); ?>eriden/AssetsListData" deleteUrl="<?php echo base_url(); ?>eriden/AssetsDelete">
          
          <tr>
          		<th>
                <span ng-click="sort('Name')">
                	Name
                    <span class="glyphicon sort-icon" ng-show="sortKey=='Name'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                </span>
                </th>
                
                <th style="text-align:center;width:150px;">
                <span ng-click="sort('PurchaseDate')">
                	Purchase Date
                    <span class="glyphicon sort-icon" ng-show="sortKey=='PurchaseDate'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                </span>
                </th>
                
                <th style="text-align:center;width:150px;">
                <span ng-click="sort('WarrantyDate')">
                	Warranty Date
                    <span class="glyphicon sort-icon" ng-show="sortKey=='WarrantyDate'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                </span>
                </th>
                
                <th style="text-align:center;width:160px;">
                <span ng-click="sort('DateCreated')">
                	Date Created
                    <span class="glyphicon sort-icon" ng-show="sortKey=='DateCreated'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                </span>
                </th>
                
                <th style="text-align:center;width:110px;">
                <span ng-click="sort('Price')">
                	Price
                    <span class="glyphicon sort-icon" ng-show="sortKey=='Price'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                </span>
                </th>
                
                <th style="text-align:center;width:50px;">Download</th>
                <th style="text-align:center;width:50px;">Action</th>
          </tr>  
          
          <tr ng-repeat="member in resultValue=(AssetsListData | filter:name | orderBy:sortKey:reverse)" id="{{ member.Id }}">	
          		<td>{{ member.Name }}</td>
          		<td align="center">{{ member.PurchaseDate }}</td>
          		<td align="center">{{ member.WarrantyDate }}</td>
          		<td align="center">{{ member.DateCreated }}</td>
                <td align="center">&#8377; {{ member.Price }}</td>
                <td align="center"><a target="_blank" class="fa fa-download" href="<?php echo base_url(); ?>/assets/ASSETS/{{ member.UserId }}/{{ member.FileName }}"></a></td>
           		<td align="center">
                <a class="fa fa-edit" href="javaScript:void(0)" ng-click="AssetsUpdate('<?php echo base_url(); ?>eriden/AssetsUpdate/'+member.Id,member.Id)"></a>
                    &nbsp;&nbsp;&nbsp;
                    <a class="fa fa-trash-o" ng-click="DeleteAsset(member.Id)" href="javaScript:void(0)"> </a>                    
                </td>
          </tr>
          
          <tr>
              <td colspan="4" align="center"><b>Total</b></td>
              <td align="center"><b>&#8377; {{resultValue | sumOfValue:'Price'}}</b></td>
              <td colspan="3">&nbsp;</td>
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
            <h5 id="myModalLabel" class="modal-title">Add New Asset</h5>
        </div>
        
        <div style="padding-top: 10px;border:0px;" class="modal-body">
        <form method="post" id="AssetsDataPost" action="<?php echo base_url(); ?>eriden/SaveAssetsData/" redirectUrl="<?php echo base_url(); ?>eriden/AssetsList" enctype="multipart/form-data">
            <table id="additional-content" width='100%'>
            <tr>
                <td width='45%' valign='top'> 
                
                <div class="col-xs-6">
                    <div class="form-group">
                         <label for="AssistantName">Name <span class='red-star'>*</span></label>
                         <input type="text" placeholder="Name" id="Name" name='Name' class="form-control" required>
                         <input type="hidden" id="AssetId" name='AssetId'/>
                    </div>
                </div>
                
                <div class="col-xs-6">
                    <div class="form-group">
                        <label for="AssistantPhone">Price <span class='red-star'>*</span></label>
                        <input type="text" placeholder="Price" id="Price" name='Price' class="form-control" required>
                    </div>
                </div>
                
                
                <div class="col-xs-6">
                    <div class="form-group">
                        <label for="AssistantPhone">Purchase Date <span class='red-star'>*</span></label>
                        <input type="text" placeholder="Purchase Date" id="PurchaseDate" name='PurchaseDate' class="form-control" required>
                    </div>
                </div>
                
                <div class="col-xs-6">
                    <div class="form-group">
                        <label for="AssistantPhone">Warranty Date <span class='red-star'>*</span></label>
                        <input type="text" placeholder="Warranty Date" id="WarrantyDate" name='WarrantyDate' class="form-control" required>
                    </div>
                </div>
                
                 <div class="col-xs-12">
                    <div class="form-group">
                        <label for="AssistantPhone">Attachment <span class='red-star'>*</span></label>
                        <input type="file" placeholder="FileName" id="FileName" name='FileName'>
                    </div>
                </div>
                
                 <div class="col-xs-12">
                    <div class="form-group">
                        <label for="AssistantPhone">Notes <span class='red-star'>&nbsp;</span></label>
                        <textarea id="Notes" name='Notes' class="form-control" rows="6"></textarea>
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