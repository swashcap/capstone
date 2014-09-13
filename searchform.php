<form action="<?php echo esc_url(home_url('/')); ?>" method="get" id="search" class="form-inline" role="search">
    <div class="form-group">
        <label for="searchform-input" class="sr-only"><?php _e('Search', 'capstone'); ?></label>
        <input type="search" name="s" placeholder="<?php esc_attr_e('Find something&hellip;', 'capstone'); ?>" id="searchform-input" class="form-control">
    </div>
    <button type="submit" class="btn btn-default"><?php _e('Search', 'capstone'); ?></button>
</form>
