<div>
	<ul>
		<ul>
			<?php foreach ($data['languages'] as $lang): ?>

				<li><?= $lang["name"] ?></li>

				<?php foreach ($data['frameworks'] as $framework): ?>
					<ul>

						<?php if ($lang['id'] == $framework['language']): ?>

							<li><?= $framework["name"] ?></li>

							<?php foreach ($data['sub_frameworks'] as $sub_framework): ?>
								<ul>

									<?php if ($framework["id"] == $sub_framework['framework']): ?>

										<li><?= $sub_framework["name"] ?></li>

									<?php endif ?>

								</ul>
							<?php endforeach ?>

						<?php endif ?>
					</ul>

				<?php endforeach ?>
			<?php endforeach ?>
		</ul>
	</ul>	
</div>