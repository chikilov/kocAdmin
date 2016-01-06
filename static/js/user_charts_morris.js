
$(document).ready(function(){
    $('#sales').click(function(){
        var data = money;
        if(data == '')
            return;        
        JSONToCSVConvertor(data, date+"_daily_sales", true);
    });
});


var dau = (function () {
        var dau = null;
        $.ajax({
    	   'async': false,
           'global': false,								  
		   url: 'ajax/dau.php',
		   dataType: 'json',
		   success: function(data){
   		   dau = data;   		      		  
		   }											   
		});
        return dau;
})
();

var money = (function () {
        var money = null;
        $.ajax({
    	   'async': false,
           'global': false,								  
		   url: 'ajax/money.php',
		   dataType: 'json',
		   success: function(data){
   		   money = data;   		      		  
		   }											   
		});
        return money;
})
();


var join = (function () {
        var join = null;
        $.ajax({
    	   'async': false,
           'global': false,								  
		   url: 'ajax/join_user.php',
		   dataType: 'json',
		   success: function(data){
   		   join = data;   		      		  
		   }											   
		});
        return join;
})
();

var morrisCharts = function() {
	
    Morris.Line({
      element: 'morris-line-new',
      data: join,
      xkey: 'y',
      xLabels : "day",
      ykeys: ['a'],
      ymax : [15000],
      labels: ['신규'],
      postUnits : '명',
      resize: true,
      continuousLine : true, 
      lineColors: ['#33414E']      
    });
    
    Morris.Line({
      element: 'morris-line-accrue',
      data: join,
      xkey: 'y',
      ykeys: ['b'],
      labels: ['누적'],
      postUnits : '명',
      resize: true,
      continuousLine : true, 
      lineColors: ['#95B75D']      
    });
	

    Morris.Area({
        element: 'morris-area-example',
        data: dau,
        xkey: 'y',
        ykeys: ['a', 'b'],
        ymax : [15000],
        labels: ['아이린', '루루'],
        postUnits : '명',
        resize: true,
        lineColors: ['#3FBAE4', '#FEA223']
    });


    Morris.Bar({
        element: 'morris-bar-example',
        data: money,
     	ymax : [15000000],
        xkey: 'day',
        ykeys: ['total'],
        preUnits : '￦',
        labels: ['총 매출'],
        barColors: ['#B64645']
    });


    Morris.Donut({
        element: 'morris-donut-example',
        data: [
            {label: "google", value: google},
            {label: "Naver", value: naver},
            {label: "Tstore", value: tstore}
        ],
        colors: ['#95B75D', '#3FBAE4', '#FEA223']
        
    });
    
    Morris.Donut({
        element: 'morris-donut-example2',
        data: [
            {label: "google", value: google_user},
            {label: "Naver", value: naver_user},
            {label: "facebook", value: facebook_user},
            {label: "tnt", value: tnt_user}
        ],
        colors: ['#95B75D', '#3FBAE4', '#FEA223', '#ff0000']
    });


}();