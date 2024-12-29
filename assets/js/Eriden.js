var app = angular.module('EridenModel', ['angularUtils.directives.dirPagination'	]);

app.filter('sumOfValue', function () {
    return function (data, key) {        
        //alert(data)
		if (angular.isUndefined(data) && angular.isUndefined(key))
            return 0;        
        var sum = 0;        
        angular.forEach(data,function(value){
            sum = sum + parseFloat(value[key]);
        });        
        return numberWithCommas(sum.toFixed(2));
    }
}).filter('totalProfit', function () {
    return function (data, key1, key2) {        
        if (angular.isUndefined(data) && angular.isUndefined(key1)  && angular.isUndefined(key2)) 
            return 0;        
        
		var sum = 0;        
        angular.forEach(data,function(value){
            sum = sum + parseInt(value['DepositAmount']);
        }); 
		
		var sumTwo = 0;        
        angular.forEach(data,function(value){
            sumTwo = sumTwo + parseInt(value['MaturityAmount']);
        }); 
		
		var total=parseInt(sumTwo) - parseInt(sum);
        return numberWithCommas(total.toFixed(2));
    }
}).filter('numberFormat', function () {
    return function (data, sum) {        
        return numberWithCommas(sum.toFixed(2));
    }
})

app.controller('EridenController', function($scope, $http) 
{
	
	if(document.getElementById('PersonListData'))
	{
		jQuery('.black_overlay').show();
		$http.get(jQuery('#PersonListData').attr('ajaxUrl'))
		.success(function (response) 
		{
			$scope.personListData = response;	
			jQuery('.black_overlay').hide();		
		});
	}
	
	
	/* Manage FD Codes */
	if(document.getElementById('FDList'))
	{
		jQuery('.black_overlay').show();
		$http.get(jQuery('#FDList').attr('ajaxUrl'))
		.success(function (response) 
		{
			$scope.fdData = response;
			$scope.reverse = true;
			jQuery('.black_overlay').hide();
		});
	}
	
	if(document.getElementById('CompletedFDList'))
	{
		jQuery('.black_overlay').show();
		$http.get(jQuery('#CompletedFDList').attr('ajaxUrl'))
		.success(function (response) 
		{
			$scope.fdData = response;
			$scope.reverse = true;
			jQuery('.black_overlay').hide();
		});
	}
	
	$scope.BookFD = function() 
	{
		showLightbox();	
	}
	
	$scope.FDUpdate = function(URL,Id) 
	{
		jQuery.ajax({
			url : URL,
			type: "POST",
			data : '',
			success: function(data)
			{
				jQuery('#FDId').val(Id);
				var jsObj = angular.fromJson(data);
				for (key in jsObj) 
				{
					if(jQuery('#'+key))
					{
						jQuery('#'+key).val(jsObj[key]);
					}
				}
				showLightbox();				
			}
		});		
	}
	
	$scope.DeleteFD = function(FDId) 
	{
		if(confirm('Do you want to delete?'))
		{
			var URL = $("#FDList").attr("deleteUrl")+"?id="+Math.random();	
			jQuery.ajax({
				url : URL,
				type: "POST",
				data : {FDId:FDId},
				success: function(data)
				{
					jQuery('#'+FDId).remove();
				}
			});
		}
	}	
	/* Manage FD Codes */
	
	
	
	
	/* Manage Insurance Codes */
	if(document.getElementById('InsuranceList'))
	{
		jQuery('.black_overlay').show();
		$http.get(jQuery('#InsuranceList').attr('ajaxUrl'))
		.success(function (response) 
		{
			$scope.InsuranceData = response;
			$scope.reverse = true;
			jQuery('.black_overlay').hide();
		});
	}
	
	$scope.BookInsurance = function() 
	{
		showLightbox();	
	}
	
	$scope.InsuranceUpdate = function(URL,Id) 
	{
		jQuery.ajax({
			url : URL,
			type: "POST",
			data : '',
			success: function(data)
			{
				jQuery('#InsuranceId').val(Id);
				var jsObj = angular.fromJson(data);
				for (key in jsObj) 
				{
					if(jQuery('#'+key))
					{
						jQuery('#'+key).val(jsObj[key]);
					}
				}
				showLightbox();				
			}
		});		
	}
	
	$scope.DeleteInsurance = function(InsuranceId) 
	{
		if(confirm('Do you want to delete?'))
		{
			var URL = $("#InsuranceList").attr("deleteUrl")+"?id="+Math.random();	
			jQuery.ajax({
				url : URL,
				type: "POST",
				data : {InsuranceId:InsuranceId},
				success: function(data)
				{
					jQuery('#'+InsuranceId).remove();
				}
			});
		}
	}	
	/* Manage Insurance Codes */
	
	
	
	/* Manage Assets */
	if(document.getElementById('AssetsList'))
	{
		jQuery('.black_overlay').show();
		$http.get(jQuery('#AssetsList').attr('ajaxUrl'))
		.success(function (response) 
		{
			$scope.AssetsListData = response;
			$scope.reverse = true;
			jQuery('.black_overlay').hide();
		});
	}
	
	$scope.BookAssets = function() 
	{
		showLightbox();	
	}
	
	$scope.AssetsUpdate = function(URL,Id) 
	{
		jQuery.ajax({
			url : URL,
			type: "POST",
			data : '',
			success: function(data)
			{
				jQuery('#AssetId').val(Id);
				var jsObj = angular.fromJson(data);
				for (key in jsObj) 
				{
					if(jQuery('#'+key) && key!='FileName')
					{
						jQuery('#'+key).val(jsObj[key]);
					}
				}
				showLightbox();				
			}
		});		
	}
	
	$scope.DeleteAsset = function(AssetId) 
	{
		if(confirm('Do you want to delete?'))
		{
			var URL = jQuery("#AssetsList").attr("deleteUrl")+"?id="+Math.random();	
			jQuery.ajax({
				url : URL,
				type: "POST",
				data : {AssetId:AssetId},
				success: function(data)
				{
					jQuery('#'+AssetId).remove();
				}
			});
		}
	}	
	/* Manage Assets */
	
	
	
	/* Manage CSR Transaction Codes */
	/*if(document.getElementById('CSRList'))
	{
		jQuery('.black_overlay').show();
		$http.get(jQuery('#CSRList').attr('ajaxUrl'))
		.success(function (response) 
		{
			$scope.CSRData = response;
			$scope.reverse = true;
			jQuery('.black_overlay').hide();
		});
	}
	*/
	
	$scope.BookCSR = function() 
	{
		showLightbox();	
	}
	
	$scope.CSRUpdate = function(URL,Id) 
	{
		jQuery.ajax({
			url : URL,
			type: "POST",
			data : '',
			success: function(data)
			{
				jQuery('#CSRId').val(Id);
				var jsObj = angular.fromJson(data);
				for (key in jsObj) 
				{
					if(jQuery('#'+key))
					{
						jQuery('#'+key).val(jsObj[key]);
					}
				}
				showLightbox();				
			}
		});		
	}
	
	$scope.DeleteCSR = function(CSRId) 
	{
		if(confirm('Do you want to delete?'))
		{
			var URL = $("#CSRList").attr("deleteUrl")+"?id="+Math.random();	
			jQuery.ajax({
				url : URL,
				type: "POST",
				data : {CSRId:CSRId},
				success: function(data)
				{
					jQuery('#'+CSRId).remove();
				}
			});
		}
	}	
	/* Manage CSR Transaction Codes */
	
	
	
	
	/* Manage Person Codes */
	if(document.getElementById('PersonList'))
	{
		jQuery('.black_overlay').show();
		$http.get(jQuery('#PersonList').attr('ajaxUrl'))
		.success(function (response) 
		{
			$scope.PersonData = response;
			$scope.reverse = true;
			jQuery('.black_overlay').hide();
		});
	}
	
	$scope.BookPerson = function() 
	{
		showLightbox();	
	}
	
	$scope.PersonUpdate = function(URL,Id) 
	{
		jQuery.ajax({
			url : URL,
			type: "POST",
			data : '',
			success: function(data)
			{
				jQuery('#PersonId').val(Id);
				var jsObj = angular.fromJson(data);
				for (key in jsObj) 
				{
					if(jQuery('#'+key))
					{
						jQuery('#'+key).val(jsObj[key]);
					}
				}
				showLightbox();				
			}
		});		
	}
	
	$scope.DeletePerson = function(PersonId) 
	{
		if(confirm('Do you want to delete?'))
		{
			var URL = $("#PersonList").attr("deleteUrl")+"?id="+Math.random();	
			jQuery.ajax({
				url : URL,
				type: "POST",
				data : {PersonId:PersonId},
				success: function(data)
				{
					jQuery('#'+PersonId).remove();
				}
			});
		}
	}	
	/* Manage Person Codes */
	
	
	$scope.changeFormat = function(x) 
	{
		return numberWithCommas(x)
    }
	
	
	
	
	$scope.order = function(predicate) {
		$scope.reverse = ($scope.predicate === predicate) ? !$scope.reverse : false;
		$scope.predicate = predicate;
	};
	
	$scope.sort = function(keyname){
		$scope.sortKey = keyname; 
		$scope.reverse = !$scope.reverse;
	}
	
	
});

function CreateFD()
{
	hideLightbox();
	jQuery('.black_overlay').show();
	var formData = $("#FDDataPost").serializeArray();
	var URL = $("#FDDataPost").attr("action")+"?id="+Math.random();	
	jQuery.ajax({
		url : URL,
		type: "POST",
		data : formData,
		success: function(data)
		{
			window.location.href=$("#FDDataPost").attr("redirectUrl");
		}
	});		
	return false;	
}


function CreateInsurance()
{
	hideLightbox();
	jQuery('.black_overlay').show();
	var formData = $("#InsuranceDataPost").serializeArray();
	var URL = $("#InsuranceDataPost").attr("action")+"?id="+Math.random();	
	jQuery.ajax({
		url : URL,
		type: "POST",
		data : formData,
		success: function(data)
		{
			window.location.href=$("#InsuranceDataPost").attr("redirectUrl");
		}
	});		
	return false;	
}

function CreateCSR()
{
	hideLightbox();
	jQuery('.black_overlay').show();
	var formData = $("#CSRDataPost").serializeArray();
	var URL = $("#CSRDataPost").attr("action")+"?id="+Math.random();	
	jQuery.ajax({
		url : URL,
		type: "POST",
		data : formData,
		success: function(data)
		{
			window.location.href=$("#CSRDataPost").attr("redirectUrl");
		}
	});		
	return false;	
}


function CreatePerson()
{
	hideLightbox();
	jQuery('.black_overlay').show();
	var formData = $("#PersonDataPost").serializeArray();
	var URL = $("#PersonDataPost").attr("action")+"?id="+Math.random();	
	jQuery.ajax({
		url : URL,
		type: "POST",
		data : formData,
		success: function(data)
		{
			window.location.href=$("#PersonDataPost").attr("redirectUrl");
		}
	});		
	return false;	
}

function numberWithCommas(x) {
    var returnValue=0;
	if(x.length==10)
	{
		return returnValue=x.substr(0,2)+','+x.substr(2,2)+','+x.substr(4,10);	
	}
	else if(x.length==9)
	{
		return returnValue=x.substr(0,1)+','+x.substr(1,2)+','+x.substr(3,10);	
	}
	else if(x.length==8)
	{
		return returnValue=x.substr(0,2)+','+x.substr(2,10);	
	}
	else
	{
		return x.toString().replace(/\B(?=(\d{2})+(?!\d))/g, ",");
	}
}






jQuery(function(){
    jQuery("#StartDate").datepicker({
		format: 'yyyy-mm-dd',
		autoclose: true,		
	})
	
	jQuery("#MaturityDate").datepicker({
		format: 'yyyy-mm-dd',
		autoclose: true,		
	})
	
	jQuery("#PurchaseDate").datepicker({
		format: 'yyyy-mm-dd',
		autoclose: true,		
	})
	
	jQuery("#WarrantyDate").datepicker({
		format: 'yyyy-mm-dd',
		autoclose: true,		
	})
		
  });


