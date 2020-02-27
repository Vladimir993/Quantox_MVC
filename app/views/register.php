<div class="content">
	<div >
		<h1>Register</h1>
		<form action="http://localhost/Quantox_MVC/public/Login/loginValidation" method="get">
			<input type="text" name="username" placeholder="Username" id="username" >
			<input type="text" name="email" placeholder="Email" >
			<input type="password" name="password" placeholder="Password" >
			<input type="password" name="repeat_password" placeholder="Repeat password" >
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
					</select>
				</div>
				<div>
					<select name="framework">
						<option disabled selected>select framework</option>
					</select>
				</div>
				<div>
					<select name="sub_framework">
						<option>select Subtype framework</option>
					</select>
				</div>
			</div>
			<input type="submit" name="submit" value="Register">
		</form>
	</div>
</div>