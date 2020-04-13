
<div class="content">
	<div >
		<h2>Register</h2>
		<form method="post">
			<input type="text" name="username" placeholder="Username" id="username" >
			<input type="text" name="email" placeholder="Email" >
			<input type="password" name="password" placeholder="Password" >
			<input type="password" name="repeatPassword" placeholder="Repeat password" >
			<div>
				<div>
					<select name="userType">
						<option disabled selected>select user type</option>
						<option>Front End Developer</option>
						<option>Back End Developer</option>
					</select>
				</div>
				<div>
					<select name="language">
						<option>select language</option>
							 <?php foreach ($data['languages'] as $key): ?>
							 	<option><?=  $key["name"]?></option>
							 <?php endforeach ?>
					</select>
				</div>
				<div>
					<select name="framework">
						<option disabled selected>select framework</option>
							 <?php foreach ($data['frameworks'] as $key): ?>
							 	<option><?=  $key["name"]?></option>
							 <?php endforeach ?>						
					</select>
				</div>
				<div>
					<select name="sub_framework">
						<option>select Subtype framework</option>
							 <?php foreach ($data['sub_frameworks'] as $key): ?>
							 	<option><?=  $key["name"]?></option>
							 <?php endforeach ?>						
					</select>
				</div>
			</div>
			<input type="submit" name="register" value="Register">
		</form>
	</div>
</div>