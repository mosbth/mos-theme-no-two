<?php $s = empty($_GET['s']) ? null : htmlentities($_GET['s']); ?>
<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="s" class="assistive-text"><?php _e( 'Sök: ', 'twentyeleven' ); ?></label>
	<input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Sök', 'twentyeleven' ); ?>" value='<?=$s?>'/>
	<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Sök', 'twentyeleven' ); ?>" />
</form>
