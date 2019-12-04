				<div class="block_header">

					<!-- BLOCK TYPE NAME -->
					<?php echo mb_get_readable_name_from_block_type($params['type']); ?>

					<!-- BLOCK EDIT ICON -->
					<span class="block-edit"></span>

					<!-- BLOCK NAMETAG -->
					<input class='block_option name_tag' type='text' name='canon_options_pagebuilder[blocks][<?php echo $index; ?>][name_tag]' value="<?php if (isset($params['name_tag'])) echo htmlspecialchars($params['name_tag']); ?>">

				</div>
