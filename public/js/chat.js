$(function(){
	'use strict';

	$(function() {
		window.addEventListener('message', event => {
                if(event.data == 'chat open'){
                    document.getElementById("myFrame").height = "580";
                    document.getElementById("myFrame").width = "410";
                }else if(event.data == 'chat close'){
                    document.getElementById("myFrame").height = "100";
                    document.getElementById("myFrame").width = "100";
                }
        });
	});
});