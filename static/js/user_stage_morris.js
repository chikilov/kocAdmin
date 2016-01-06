
var normal = (function () {
        var normal = null;
        $.ajax({
    	   'async': false,
           'global': false,								  
		   url: 'ajax/stage_normal.php',
		   dataType: 'json',
		   success: function(data){
   		   normal = data;   		      		  
		   }											   
		});
        return normal;
})
();


var hard = (function () {
        var hard = null;
        $.ajax({
    	   'async': false,
           'global': false,								  
		   url: 'ajax/stage_hard.php',
		   dataType: 'json',
		   success: function(data){
   		   hard = data;   		      		  
		   }											   
		});
        return hard;
})
();


var hell = (function () {
        var hell = null;
        $.ajax({
    	   'async': false,
           'global': false,								  
		   url: 'ajax/stage_hell.php',
		   dataType: 'json',
		   success: function(data){
   		   hell = data;   		      		  
		   }											   
		});
        return hell;
})
();

var morrisCharts = function() {
	
    Morris.Bar({
        element: 'morris-bar-normal',
        data: normal,
        xkey: 'y',
        ykeys: ['a'],
        labels: ['user'],
        xLabels : ['stage'],
        barColors: ['#da3d4f']
    });
    Morris.Bar({
        element: 'morris-bar-hard',
        data: hard,
        xkey: 'y',
        ykeys: ['a'],
        labels: ['user'],
        barColors: ['#e4823f']
    });
    Morris.Bar({
        element: 'morris-bar-hell',
        data: hell,
        xkey: 'y',
        ykeys: ['a'],
        labels: ['user'],
        barColors: ['#28907f']
    });
	

}();