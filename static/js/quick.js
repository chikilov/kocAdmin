var site_settings = 
	'<div class="ts-button">'
        +'<span class="fa fa-bookmark"></span>'
    +'</div>'
    +'<div class="ts-body">'
	    +'<div class="ts-title">Quick Link</div>'                
	    +'<div class="panel-body form-horizontal">'                                   
	    +'    <div class="form-group">'
	    +'       <div onclick="location.href=\'user_view01.php?pid='+pid+'\'" class="col-md-12 col-xs-12  text-center">상세내역</div>'                                         
	    +'    </div>'
	    +'    <div class="form-group">'
	    +'       <div onclick="location.href=\'user_charge.php?pid='+pid+'\'" class="col-md-12 col-xs-12  text-center">충전내역</div>'    
	      
	    +'    </div>'
	    +'    <div class="form-group">'
	    +'       <div onclick="location.href=\'user_trade.php?pid='+pid+'\'" class="col-md-12 col-xs-12  text-center">거래내역</div>'    
	        
	    +'    </div>'
	    
	    +'</div>'
    +'</div>';    
var settings_block = document.createElement('div');
    settings_block.className = "theme-settings";
    settings_block.innerHTML = site_settings;
    document.body.appendChild(settings_block);

$(document).ready(function(){
/*
    $.get("assets/settings.html",function(data){        
        $("body").append($(data));
    });*/
    
    /* Open/Hide Settings */
    $(".ts-button").on("click",function(){
        $(".theme-settings").toggleClass("active");
    });
    /* End open/hide settings */
});
