<div class="container">
	<div class="row">
		<div class="col-md-6"></div>
		<div class="col-md-6" style="margin-top:2.5rem;">

			<?php if(isset($error_msg)) { ?>

			<?php } ?>
			

			<?php echo form_open('Auth/register') ?>
				<div class="form-group">
					<?php if($this->session->flashdata('emailErr')){ ?>

					<div class="alert alert-danger">
						<?php echo $this->session->flashdata('emailErr');?>
					</div>

						<?php } ?>
					<label>Email</label>
					<input class="form-control" type="email" name="email" />
				</div>

				<div class="form-group">
					<label>Password</label>
					<input class="form-control" type="password" name="password" />
				</div>

				<div class="form-group">
					<label>Confirm Password</label>
					<input class="form-control" type="password" name="conf_password" />
				</div>

				<div class="form-group">
					<?php if($this->session->flashdata('usernameErr')){ ?>

					<div class="alert alert-danger">
						<?php echo $this->session->flashdata('usernameErr');?>
					</div>

						<?php } ?>
					<label>Username</label>
					<input class="form-control" type="text" name="username" />
				</div>

				<div class="form-group">
					<label>Full name</label>
					<input class="form-control" type="text" name="fullname" />
				</div>

				<input class="btn btn-primary" type="submit" name="submit" value="Register!" />
			</form>

		</div>
	</div>
</div>