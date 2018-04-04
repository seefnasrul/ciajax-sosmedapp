<div class="container">
	<div class="row" style="margin-top:40px;position:relative;">
		<div class="col-md-4">
			
		</div>
		<div class="col-md-4">
			<?php if(isset($message)){ ?>
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
  				<strong><?php echo $message;?></strong> 
  				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?php }?>

			<button id="crtbtn" class="btn btn-primary" onclick="myFunction()">Create Status</button>
			<div id="myDIV" style="display:none;"> 	
				<?php echo validation_errors(); ?>
				<?php 
				$attributes = array('id'=>'create');
				echo form_open('',$attributes); ?>
					<div class="form-group" style="margin-top:0.25rem;">
						<label>How do you feel?</label>
						<textarea class="form-control" type="text" name="body"></textarea>
					</div>
					
					<input type="submit" name="" me="submit" value="Post the Status!" class="btn btn-primary"/>
					
				</form>
			</div>
			
			<?php foreach ($status as $key => $status) { ?>
			<div class="row">
				<div class="col-md-12">
					<div style="margin-top:2rem;" class="card">
						<div class="card-body">
							 <img  class="card-img-top" width="100" src="<?php echo base_url() ?>assets/images/gege.jpg" alt="Card image cap">

								<?php echo $status['status_body']; ?>
						</div>
						<div class="form-inline" style="padding-bottom:0.5rem;">	
							<a style="margin-left:0.5rem;"class="btn btn-sm btn-success" href="">Like</a>
							<button id="cmntbtn<?php echo $status['status_id'];?>" 
								style="margin-left:0.5rem;" 
								onclick="hideshowcomment(<?php echo $status['status_id'];?>)" 
								class="btn btn-sm btn-default">Comment</button>
							<button style="margin-left:0.5rem" type="button" class="btn-sm btn-danger" onclick="delenquiry(<?php echo $status['status_id'];?>)">Delete</button>


							<!-- ajax for deleting comment -->
							

						 </div>
					</div>
					<div id="commentBox<?php echo $status['status_id'];?>" style="display:none;">
						
						<?php foreach ($status['comments'] as $i => $comment) { ?>
						<div class="card" style="padding:0.5rem 2rem 0.5rem;background-color:#ededed;width:50%;margin-top:0.2rem;">

							<strong><?php echo $comment['comment_by'];?></strong><?php echo $comment['comment_body']; ?>
							<div class="form-inline">
								<a style="margin-left:0.25rem" href=""><small>Like</small></a>
								<a style="margin-left:0.25rem" href=""><small>Reply</small></a>
								<a style="margin-left:0.25rem" href=""><small>Delete</small></a>
							</div>
						</div>
					<?php } ?>

					<div class="card" style="margin-top:0.25rem;padding:0.5rem;background-color:#ededed;width:50%;">
						<?php 
						$attributes = array('id'=>'addcomment'.$status['status_id']);
						echo form_open('', $attributes); ?>
							<div class="form-group">
								<textarea id="comment" class="form-control" type="text" name="comment"></textarea>
								<input style="margin-top:0.25rem;" class="btn btn-sm btn-primary" type="submit" value="Post a comment!" name="submit" />
							</div>
						</form>

						<!-- ajax for adding comment -->
						<script type="text/javascript">
						$("#addcomment<?php echo $status['status_id'];?>").submit(function (event) {
					    dataString = $("#addcomment<?php echo $status['status_id'];?>").serialize();
					    $.ajax({
					        type:"POST",
					        url:"<?php echo base_url(); ?>main/addcomment/<?php echo $status['status_id'];?>",
					        data:dataString,

					        success:function (data) {
					            $('body').html(data);
					            document.getElementById('commentBox<?php echo $status['status_id'];?>').style.display = "block";
					        }

					    	});
					    	event.preventDefault();
						});	
						</script>
						<!-- ajax for adding comment -->
					</div>

					</div>
					

				</div>
			</div>
			<?php } ?>
		</div>
		<div class="col-md-4">
			
		</div>
	</div>
</div>
 <script type="text/javascript">
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
 </script>

 <script type="text/javascript">
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

 </script>

 <script type="text/javascript">
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
 </script>

 <script type="text/javascript">
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
 </script>

