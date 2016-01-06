$(document).ready(function(){
    $('#noo1').click(function(){
        var data = no1;
        if(data == '')
            return;        
        JSONToCSVConvertor(data, date+"_noo_user", true);
    });
});


var no1 = (function () {
        var no1 = null;
        $.ajax({
    	   'async': false,
           'global': false,								  
		   url: 'ajax/noo.php',
		   data: {"s_date":s_date,"e_date":e_date},
		   dataType: 'json',
		   success: function(data){
   		   no1 = data;   		      		  
		   }
		});
        return no1;
})
();



var morrisCharts = function() {
	
    Morris.Line({
      element: 'morris-line-no1',
      data: no1,
      xkey: 'time',      
      ykeys: ['cnt_1','cnt_2','cnt_t'],      
      labels: ['아이린','루루','합계'],
      postUnits : '명',
      resize: true,
      continuousLine : true, 
      lineColors: ['#33414E','#3FBAE4','#B64645']      
    });
    

}();


