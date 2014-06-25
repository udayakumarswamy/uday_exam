<?php include "login_header.php"; ?>

<div>
	<form action="" method="post">
		<h1>User Login</h1>		
			<div class="login-fields">
				<?php
          if($error_message != '') {
          ?>
        <p class="alert"><?php echo $error_message; ?></p>
          <?php
          } else {
          ?>
				<p>Please provide your details</p>
          <?php
          }
        ?>
				<div class="field">
					<label for="username">Email</label>
					<input type="text" id="User_Email" name="User_Email" value="" placeholder="Email" class="login username-field">
				</div> <!-- /field -->
				
				<div class="field">
					<label for="password">Password:</label>
					<input type="password" id="User_Password" name="User_Password" value="" placeholder="Password" class="login password-field">
				</div> <!-- /password -->
				
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
				<span class="login-checkbox">
					<input id="Field" name="Field" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4">
					<label class="choice" for="Field">Keep me signed in</label>
				</span>
									
				<button type="submit" name="User_Login" id="User_Login" class="button btn btn-success btn-large">Login In</button>
				
			</div> <!-- .actions -->
			
			
			
		</form>
</div>


<?php include "footer.php"; ?>