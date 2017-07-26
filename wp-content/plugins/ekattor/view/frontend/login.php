<div class="row" style="margin-top:10%;">
	<div class="col-md-6 col-md-offset-3">
	
		<div class="panel panel-default"><!-- to apply shadow add class "panel-shadow" -->
			
			<!-- panel head -->
			<div class="panel-heading">
				<div class="panel-title"><i class="entypo-lock"></i> User login</div>
				
			</div>
			
			<!-- panel body -->
			<div class="panel-body">
				
				<form role="form" class="form-horizontal form-groups validate" method="post"
					 name="loginform" id="loginform" action="<?php echo site_url();?>/wp-login.php">
	
					<div class="form-group">
						<label for="field-1" class="col-sm-4 control-label">Username / Email</label>
						
						<div class="col-sm-7">
							<div class="input-group">
								<span class="input-group-addon"><i class="entypo-user"></i></span>
								<input type="text" class="form-control" placeholder="" autofocus data-validate="required" 
                                	data-message-required="value required" name="log" id="email" />
							</div>
						</div>
					</div>
	
					<div class="form-group">
						<label for="field-1" class="col-sm-4 control-label">Password</label>
						
						<div class="col-sm-7">
							<div class="input-group">
								<span class="input-group-addon"><i class="entypo-key"></i></span>
								<input type="password" class="form-control" placeholder=""  data-validate="required" 
                                	data-message-required="value required"name="pwd" id="password" />
							</div>
						</div>
					</div>

					<div class="form-group">
                        <div class="col-sm-offset-4 col-sm-7">
                        	<input type="hidden" name="redirect_to" value="<?php echo the_permalink();?>">
                            <button type="submit" class="btn btn-primary btn-icon">
								login
								<i class="entypo-right-open-mini"></i>
							</button>
							<br /><br />
							<a href="<?php echo wp_lostpassword_url( get_permalink() ); ?>" 
								style="color:rgba(148,148,148,1);">Lost your password?</a>
                            <span id="preloader-form"></span>
                        </div>
                    </div>
				</form>
			</div>
			
		</div>
	
	</div>
</div>