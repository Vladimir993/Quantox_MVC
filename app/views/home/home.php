<div class="content">
	<h2>Home Page</h2>
	<h2>Welcome <?= @$data['username']; ?></h2>
	<form action="http://localhost/Quantox_MVC/public/Result" method="get">
		<input type="search" name="searchField">
		<select name="userType">
					<?php foreach ($data['user_types'] as $key) {
						echo "<option>". $key["name"] ."</option>";
					}?>
		</select>
		<input type="submit" name="search" value="Search">
	</form>			
</div>