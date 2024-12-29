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
            	<h3 class="box-title">You have created {{ InsuranceData.length }} Insurance</h3>
            </div>
            <div class="col-xs-4" style="text-align:right;">
            <a href="javaScript:void(0)" style="color:#fff;" ng-Click="BookFD()"><h3 class="box-title">Add New</h3></a>
            </div>
            
          </div><!-- /.box-header -->
          
          
          
          
          <div class="box-body">
           
                      
          <div id="GridLayout">
          <table width='100%' class="table table-bordered table-hover" id="InsuranceList" ajaxUrl="<?php echo base_url(); ?>eriden/InsuranceListData" deleteUrl="<?php echo base_url(); ?>eriden/InsuranceDelete">
          
          <tr>
          		<th>
                <span ng-click="sort('CompanyName')">
                	Company Name
                    <span class="glyphicon sort-icon" ng-show="sortKey=='CompanyName'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                </span>
                </th>
                
                <th style="text-align:center;width:150px;">
                <span ng-click="sort('PolicyNumber')">
                	Policy Number
                    <span class="glyphicon sort-icon" ng-show="sortKey=='PolicyNumber'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                </span>
                </th>
                
                <th style="text-align:center;width:90px;">
                <span ng-click="sort('Tenure')">
                	Tenure
                    <span class="glyphicon sort-icon" ng-show="sortKey=='Tenure'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                </span>
                </th>
                
                <th style="text-align:center;width:110px;">
                <span ng-click="sort('StartDate')">
                	Start Date
                    <span class="glyphicon sort-icon" ng-show="sortKey=='StartDate'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                </span>
                </th>
                
                <th style="text-align:center;width:130px;">
                <span ng-click="sort('Amount')">
                	Policy Amount
                    <span class="glyphicon sort-icon" ng-show="sortKey=='Amount'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                </span>
                </th>
                
                <th style="text-align:center;width:130px;">
                <span ng-click="sort('PaidAmount')">
                	Paid Amount
                    <span class="glyphicon sort-icon" ng-show="sortKey=='PaidAmount'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
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
          
          <tr ng-repeat="member in resultValue=(InsuranceData | filter:name | orderBy:sortKey:reverse)" id="{{ member.Id }}">	
          		<td>{{ member.CompanyName }}</td>
          		<td align="center">{{ member.PolicyNumber }}</td>
                <td align="center">{{ member.Tenure }}</td>
          		<td align="center">{{ member.StartDate }}</td>
          		<td align="center">&#8377; {{ member.Amount }}</td>
           		<td align="center">&#8377; {{ member.PaidAmount }}</td>
                <td align="center">{{ member.DateCreated }}</td>
           		<td align="center">
                <a class="fa fa-edit" href="javaScript:void(0)" ng-click="InsuranceUpdate('<?php echo base_url(); ?>eriden/InsuranceUpdate/'+member.Id,member.Id)"></a>
                    &nbsp;&nbsp;&nbsp;
                    <a class="fa fa-trash-o" ng-click="DeleteInsurance(member.Id)" href="javaScript:void(0)"> </a>                    
                </td>
          </tr>
          
          <tr>
              <td colspan="4" align="center"><b>Total</b></td>
              <td align="center"><b>&#8377; {{resultValue | sumOfValue:'Amount'}}</b></td>
              <td align="center"><b>&#8377; {{resultValue | sumOfValue:'PaidAmount'}}</b></td>
              <td colspan="2">&nbsp;</td>
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
            <h5 id="myModalLabel" class="modal-title">Add Insurance</h5>
        </div>
        
        <div style="padding-top: 10px;border:0px;" class="modal-body">
        <form method="post" id="InsuranceDataPost" action="<?php echo base_url(); ?>eriden/SaveInsuranceData/" redirectUrl="<?php echo base_url(); ?>eriden/InsuranceList" onSubmit="return CreateInsurance()">
            <table id="additional-content" width='100%'>
            <tr>
                <td width='45%' valign='top'> 
                
                <div class="col-xs-6">
                    <div class="form-group">
                         <label for="AssistantName">Company Name <span class='red-star'>*</span></label>
                         <input type="text" placeholder="Company Name" id="CompanyName" name='CompanyName' class="form-control" required>
                         <input type="hidden" id="InsuranceId" name='InsuranceId'/>
                    </div>
                </div>
                
                <div class="col-xs-6">
                    <div class="form-group">
                        <label for="AssistantPhone">Policy Number <span class='red-star'>*</span></label>
                        <input type="text" placeholder="Policy Number" id="PolicyNumber" name='PolicyNumber' class="form-control" required>
                    </div>
                </div>
                
                <div class="col-xs-6">
                    <div class="form-group">
                        <label for="AssistantPhone">Tenure <span class='red-star'>*</span></label>
                        <input type="text" placeholder="Tenure" id="Tenure" name='Tenure' class="form-control" required>
                    </div>
                </div>
                
                 <div class="col-xs-6">
                    <div class="form-group">
                        <label for="AssistantPhone">Amount <span class='red-star'>*</span></label>
                        <input type="text" placeholder="Amount" id="Amount" name='Amount' class="form-control" required>
                    </div>
                </div>
                
                
                <div class="col-xs-6">
                    <div class="form-group">
                        <label for="AssistantPhone">Start Date <span class='red-star'>*</span></label>
                        <input type="text" placeholder="Start Date" id="StartDate" name='StartDate' class="form-control" required/>
                    </div>
                </div>
                
                
                <div class="col-xs-6">
                    <div class="form-group">
                        <label for="AssistantPhone">Maturity Date <span class='red-star'>&nbsp;</span></label>
                        <input type="text" placeholder="Maturity Date" id="MaturityDate" name='MaturityDate' class="form-control">
                    </div>
                </div>
                
                <div class="col-xs-6">
                    <div class="form-group">
                        <label for="AssistantPhone">Paid Amount <span class='red-star'>*</span></label>
                        <input type="text" placeholder="Paid Amount" id="PaidAmount" name='PaidAmount' class="form-control" required>
                    </div>
                </div>
                
                <div class="col-xs-6">
                    <div class="form-group">
                        <label for="AssistantPhone">Renewal <span class='red-star'>*</span></label>
                        <select  id="Renewal" name='Renewal' class="form-control" required>
                        <option value="">--Saving Type--</option>
                        <option>Monthly</option>
                        <option>Quaterly</option>
                        <option>Half Yearly</option>
                        <option>Yearly</option>
                        </select>
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