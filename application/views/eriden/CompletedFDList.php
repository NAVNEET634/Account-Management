<style>.black_overlay{display:block;}</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  
  <!-- Main content -->
  <section class="content" ng-app="EridenModel" ng-controller="EridenController">
    <div class="row">
    	
        <div class="col-xs-6">
            <small>Completed Savings</small>
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
            	<h3 class="box-title">You have Completed {{ fdData.length }} saving</h3>
            </div>
            <div class="col-xs-4" style="text-align:right;">
            
            </div>
            
          </div><!-- /.box-header -->
          
          
          
          
          <div class="box-body">
           
                      
          <div id="GridLayout">
          <table width='100%' class="table table-bordered table-hover" id="FDList" ajaxUrl="<?php echo base_url(); ?>eriden/CompletedFDListData" deleteUrl="<?php echo base_url(); ?>eriden/FDDelete">
          
          <tr>
          		<th>
                <span ng-click="sort('UserName')">
                	Person Name
                    <span class="glyphicon sort-icon" ng-show="sortKey=='UserName'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                </span>
                </th>
                
                <th style="text-align:center;width:70px;">
                <span ng-click="sort('SavingType')">
                	Type
                    <span class="glyphicon sort-icon" ng-show="sortKey=='SavingType'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                </span>
                </th>
                
                <th style="text-align:center;width:130px;">
                <span ng-click="sort('BankName')">
                	Bank Name
                    <span class="glyphicon sort-icon" ng-show="sortKey=='BankName'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                </span>
                </th>
                
                <th style="text-align:center;width:110px;">
                <span ng-click="sort('StartDate')">
                	Start Date
                    <span class="glyphicon sort-icon" ng-show="sortKey=='StartDate'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                </span>
                </th>
                
                <th style="text-align:center;width:120px;">
                <span ng-click="sort('MaturityDate')">
                	Maturity Date
                    <span class="glyphicon sort-icon" ng-show="sortKey=='MaturityDate'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                </span>
                </th>
                
                <th style="text-align:center;width:130px;">
                <span ng-click="sort('DepositAmount')">
                	Amount
                    <span class="glyphicon sort-icon" ng-show="sortKey=='DepositAmount'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                </span>
                </th>
                
                <th style="text-align:center;width:130px;">
                <span ng-click="sort('MaturityAmount')">
                	Maturity
                    <span class="glyphicon sort-icon" ng-show="sortKey=='MaturityAmount'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                </span>
                </th>
                
                <th style="text-align:center;width:120px;">
                <span ng-click="sort('InterestRate')">
                	ROI
                    <span class="glyphicon sort-icon" ng-show="sortKey=='InterestRate'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                </span>
                </th>
                
                <th style="text-align:center;width:120px;">
                <span ng-click="sort('ReInvestment')">
                	RI
                    <span class="glyphicon sort-icon" ng-show="sortKey=='ReInvestment'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                </span>
                </th>
                
                <th style="text-align:center;width:50px;">Action</th>
                
          </tr>  
          
          <tr ng-repeat="member in resultValue=(fdData | filter:name | orderBy:sortKey:reverse)" id="{{ member.Id }}">	
          		<td>{{ member.UserName }}</td>
          		<td align="center">{{ member.SavingType }}</td>
                <td align="center">{{ member.BankName }}</td>
          		<td align="center">{{ member.StartDate }}</td>
          		<td align="center">{{ member.MaturityDate }}</td>
           		<td align="center" ng-init="DepositAmount = changeFormat(member.DepositAmount)">&#8377; {{ DepositAmount }}</td>
           		<td align="center" ng-init="maturityValue = changeFormat(member.MaturityAmount)">&#8377; {{ maturityValue }}</td>
                <td align="center">{{ member.InterestRate }}%</td>
                <td align="center">{{ member.ReInvestment }}</td>
                <td align="center">
                	<a class="fa fa-edit" href="javaScript:void(0)" ng-click="FDUpdate('<?php echo base_url(); ?>eriden/FDUpdate/'+member.Id,member.Id)"></a>
                                        
                </td>
           		
          </tr>
          
          <tr>
              <td colspan="5" align="center"><b>Total</b></td>
              <td align="center"><b>&#8377; {{resultValue | sumOfValue:'DepositAmount'}}</b></td>
              <td align="center"><b>&#8377; {{resultValue | sumOfValue:'MaturityAmount'}}</b></td>
              <td colspan="2" align="center"><b>&#8377; {{resultValue | totalProfit:'DepositAmount'}}</b></td>
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
            <h5 id="myModalLabel" class="modal-title">Add Saving</h5>
        </div>
        
        <div style="padding-top: 10px;border:0px;" class="modal-body" id="PersonListData" ajaxUrl="<?php echo base_url(); ?>eriden/PersonListData/">
        
        <form method="post" id="FDDataPost" action="<?php echo base_url(); ?>eriden/SaveFDData/" redirectUrl="<?php echo base_url(); ?>eriden/CompletedFDList" onSubmit="return CreateFD()">
            <table id="additional-content" width='100%'>
            <tr>
                <td width='45%' valign='top'> 
                
                <div class="col-xs-6">
                    <div class="form-group">
                         <label for="AssistantName">Person Name <span class='red-star'>*</span></label>
                         <select  id="PersonName" class="form-control" disabled required>
                            <option value="">--Select Person Name--</option>
                            <option ng-repeat="user in personListData" value="{{ user.Id }}" >{{ user.PersonName }}</option>
                          </select>
                            
                         <input type="hidden" id="FDId" name='FDId'/>
                    </div>
                </div>
                
                <div class="col-xs-6">
                    <div class="form-group">
                        <label for="AssistantPhone">Bank Name <span class='red-star'>*</span></label>
                        <input type="text" placeholder="Bank Name" disabled id="BankName" class="form-control" required>
                    </div>
                </div>
                
                
                <div class="col-xs-6">
                    <div class="form-group">
                        <label for="AssistantPhone">Deposit Amount <span class='red-star'>*</span></label>
                        <input type="text" placeholder="Deposit Amount" disabled id="DepositAmount" class="form-control" required>
                    </div>
                </div>
                
                
                <div class="col-xs-6">
                    <div class="form-group">
                        <label for="AssistantPhone">Maturity Amount <span class='red-star'>*</span></label>
                        <input type="text" placeholder="Maturity Amount" disabled id="MaturityAmount" class="form-control" required>
                    </div>
                </div>
                
                <div class="col-xs-4">
                    <div class="form-group">
                        <label for="AssistantPhone">ROI <span class='red-star'>*</span></label>
                        <input type="text" placeholder="Interest Rate" disabled id="InterestRate" class="form-control" required>
                    </div>
                </div>
                
                
                <div class="col-xs-4">
                    <div class="form-group">
                        <label for="AssistantPhone">Account Number <span class='red-star'>*</span></label>
                        <input type="text" placeholder="Account Number" disabled id="AccountNumber" class="form-control" required>
                    </div>
                </div>
                
                
                
                <div class="col-xs-4">
                    <div class="form-group">
                        <label for="AssistantPhone">Reinvestment<span class='red-star'>*</span></label>
                        <select  id="ReInvestment" name='ReInvestment' class="form-control" required>
                        <option value="">--ReInvestment--</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                        </select>
                    </div>
                </div>
                
                
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="AssistantPhone">Reinvestment Detail<span class='red-star'>*</span></label>
                        <textarea class="form-control" name="ReInvestmentDetail" id="ReInvestmentDetail" rows="5"></textarea>
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