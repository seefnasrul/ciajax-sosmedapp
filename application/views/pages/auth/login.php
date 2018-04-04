<div class="container">
	<div class="row">
		<div class="col-md-6"></div>
		<div class="col-md-6" style="margin-top:2.5rem;">
			<?php echo form_open('Auth/login') ?>
				
				<div class="form-group">
					<label>Username</label>
					<input class="form-control" type="text" name="username" />
				</div>
				<div class="form-group">
					<label>Password</label>
					<input class="form-control" type="password" name="password" />
				</div>

				<input class="btn btn-primary" type="submit" name="submit" value="Login" />
			</form>

		</div>
	</div>
</div>