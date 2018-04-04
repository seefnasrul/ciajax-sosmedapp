
$('#create').submit(function (event) {
    dataString = $("#create").serialize();
    $.ajax({
        type:"POST",
        url:"<?php echo base_url(); ?>main/index",
        data:dataString,

        success:function (data) {
            $('body').html(data);
        }

    });
    event.preventDefault();
});	


function myFunction() {
    var x = document.getElementById("myDIV");
    var btn = document.getElementById("crtbtn");
    if (x.style.display === "none") {
        x.style.display = "block";
        btn.innerHTML = "Hidde Status Box";
    } else {
        x.style.display = "none";
        btn.innerHTML = "Create Status!";
    }
}	

function hideshowcomment($id) {
    var x = document.getElementById("commentBox"+$id);
    var btn = document.getElementById("cmntbtn"+$id);
    if (x.style.display === "none") {
        x.style.display = "block";
        btn.innerHTML = "Hide Comments";
    } else {
        x.style.display = "none";
        btn.innerHTML = "Comment";
    }
}	

function delenquiry(id) {
	$.ajax({
		url: "<?php echo base_url(); ?>Main/Delete/"+id,
		type: "POST",
		data: {id:id},
		success: function (data) {
			$('body').html(data);	 
		}
	});	      		    
}


