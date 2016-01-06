$(document).ready(function(){
    $('#sales').click(function(){
        var data = money;
        if(data == '')
            return;        
        JSONToCSVConvertor(data, date+"_daily_sales", true);
    });
});


var join = (function () {
        var join = null;
        $.ajax({
    	   'async': false,
           'global': false,								  
		   url: 'ajax/join_user.php',
		   data: {"s_date":s_date,"e_date":e_date},
		   dataType: 'json',
		   success: function(data){
   		   join = data;   		      		  
		   }											   
		});
        return join;
})
();

var dau = (function () {
        var dau = null;
        $.ajax({
    	   'async': false,
           'global': false,								  
		   url: 'ajax/dau.php',
		   data: {"s_date":s_date,"e_date":e_date},
		   dataType: 'json',
		   success: function(data){
   		   dau = data;   		      		  
		   }											   
		});
        return dau;
})
();

var sales = (function () {
        var sales = null;
        $.ajax({
    	   'async': false,
           'global': false,								  
		   url: 'ajax/sales.php',
		   data: {"s_date":s_date,"e_date":e_date},
		   dataType: 'json',
		   success: function(data){
   		   sales = data;   		      		  
		   }											   
		});
        return sales;
})
();

var sales_user = (function () {
        var sales_user = null;
        $.ajax({
    	   'async': false,
           'global': false,								  
		   url: 'ajax/sales_user_count.php',
		   data: {"s_date":s_date,"e_date":e_date},
		   dataType: 'json',
		   success: function(data){
   		   sales_user = data;   		      		  
		   }											   
		});
        return sales_user;
})
();


var sales_count = (function () {
        var sales_count = null;
        $.ajax({
    	   'async': false,
           'global': false,								  
		   url: 'ajax/sales_count.php',
		   data: {"s_date":s_date,"e_date":e_date},
		   dataType: 'json',
		   success: function(data){
   		   sales_count = data;   		      		  
		   }											   
		});
        return sales_count;
})
();



var morrisCharts = function() {
	
    Morris.Line({
      element: 'morris-line-new',
      data: join,
      xkey: 'date',
      xLabels : "day",
      ykeys: ['new'],      
      labels: ['신규'],
      postUnits : '명',
      resize: true,
      continuousLine : true, 
      lineColors: ['#33414E']      
    });
    
    Morris.Line({
      element: 'morris-line-accrue',
      data: join,
      xkey: 'date',
      ykeys: ['total'],
      labels: ['누적'],
      postUnits : '명',
      resize: true,
      continuousLine : true, 
      lineColors: ['#95B75D']      
    });
    
    Morris.Line({
      element: 'morris-line-dau',
      data: dau,
      xkey: 'date',
      xLabels : "day",
      ykeys: ['s1','s2','total'],      
      labels: ['아이린','루루','합계'],
      postUnits : '명',
      resize: true,
      continuousLine : true, 
      lineColors: ['#3FBAE4','#FFC73F','#FF5D3F']      
    });
    
    Morris.Line({
      element: 'morris-line-cnt',
      data: sales_count,
      xkey: 'date',
      xLabels : "day",
      ykeys: ['s1_cnt','s2_cnt','total_cnt'],      
      labels: ['아이린','루루','합계'],
      postUnits : '건',
      resize: true,
      continuousLine : true, 
      lineColors: ['#3FBAE4','#FFC73F','#FF5D3F']      
    });
    
    Morris.Line({
      element: 'morris-line-user',
      data: sales_user,
      xkey: 'date',
      xLabels : "day",
      ykeys: ['s1_cnt','s2_cnt','total_cnt'],      
      labels: ['아이린','루루','합계'],
      postUnits : '명',
      resize: true,
      continuousLine : true, 
      lineColors: ['#3FBAE4','#FFC73F','#FF5D3F']      
    });
    
    
    Morris.Bar({
        element: 'morris-bar-sales',
        data: sales,
        xkey: 'date',
        xLabels : "day",
        ykeys: ['s1', 's2', 'total'],
        labels: ['아이린', '루루','합계'],
        lineColors: ['#3FBAE4','#FFC73F','#FF5D3F']
    });
	

}();