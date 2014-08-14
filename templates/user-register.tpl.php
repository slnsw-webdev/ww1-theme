<div class="blueFilterContainerTop"></div>
<div class="secondary-main-content">
   <div style="margin-top: 75px;"></div>
	<div id="story-header-title">Register and get involved</div>
	

	<div class="register-content">
		<p>Can you tell us more about the World War I soldiers whose diaries we hold? 

<p>The State Library holds 1200 volumes of diaries written by 550 men and women who served in the First World War. We know very little about many of them, apart from their personal experiences detailed in their writing. With your help, we can add stories, photos and momentoes to the collections we hold. 

<p>You must be logged in to add a story or upload a photo.

<p>Register or log in using your email of facebook account to add your own story or photo about a World War I diarist in our collection.
	</div>	
	
	<?php print $messages; ?>
	<div class="user-login-fb-container">
		<!-- Custom login form -->
		<p>Login with your Facebook account or or enter details below.</p>
		<!-- Print Fb connect button if fboauth module loaded -->
		<?php if (module_exists('fboauth')) {
   		print fboauth_action_display('connect');
		}
		?>
	</div>

	<?php
	
	print drupal_render_children($form)
	
	?>
	
   <div style="margin-bottom: 50px;"></div>
   <a href="/user/login">Have an account? Login</a>
	<p><strong>Copyright and Ownership</strong>

	<p>When you upload content, you are giving the State Library of NSW permission to publish. Please read our <a href="/about/terms-and-conditions">Terms and Conditions</a> before sharing your content. 

	<div style="margin-bottom: 50px;"></div>
</div>