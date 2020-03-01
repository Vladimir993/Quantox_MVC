<div class="content">
	<h1><?= @$data['username']; ?></h1>
	<h2>Home Page</h2>
	<form action="result.php" method="get">
		<input type="search" name="search">
		<select name="userType">
					<?php foreach ($data['user_types'] as $key) {
						echo "<option>". $key["name"] ."</option>";
					}?>
		</select>
		<input type="submit" name="Search" value="Search">
	</form>			
</div>