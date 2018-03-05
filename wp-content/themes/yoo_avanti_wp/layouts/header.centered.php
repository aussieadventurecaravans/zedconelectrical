<div class="tm-navbar-wrapper <?php echo $args['navbar']; ?>" <?php echo $args['sticky']; ?>>
    <div class="tm-navbar tm-navbar-centered uk-navbar">

        <div class="uk-container uk-container-center tm-navbar-container uk-flex uk-flex-center uk-flex-column">

            <?php if ($this['widgets']->count('logo + logo-small')) : ?>
            <div class="tm-navbar-center uk-flex uk-flex-middle uk-flex-center">

                <?php if ($this['widgets']->count('logo')) : ?>
                <a class="uk-navbar-brand uk-flex uk-flex-middle uk-hidden-small" href="<?php echo $this['config']->get('site_url'); ?>"><?php echo $this['widgets']->render('logo'); ?></a>
                <?php endif; ?>

                <?php if ($this['widgets']->count('logo-small')) : ?>
                <a class="tm-logo-small uk-visible-small" href="<?php echo $this['config']->get('site_url'); ?>"><?php echo $this['widgets']->render('logo-small'); ?></a>
                <?php endif; ?>

            </div>
            <?php endif; ?>

            <?php if ($this['widgets']->count('menu')) : ?>
            <div class="tm-navbar-center uk-flex uk-flex-middle uk-flex-center uk-hidden-small">
                <?php echo $this['widgets']->render('menu'); ?>
            </div>
            <?php endif; ?>

            <?php if ($this['widgets']->count('search + more + offcanvas')) : ?>
            <div class="tm-navbar-right uk-flex uk-flex-middle">

                <?php if ($this['widgets']->count('search')) : ?>
                <div class="tm-search uk-hidden-small">
                    <div data-uk-dropdown="{mode:'click', pos:'left-center'}">
                        <button class="tm-navbar-button tm-search-button"></button>
                        <div class="uk-dropdown-blank tm-navbar-dropdown">
                            <?php echo $this['widgets']->render('search'); ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <?php if ($this['widgets']->count('more')) : ?>
                <div class="tm-more uk-hidden-small">
                    <div data-uk-dropdown="{mode:'click', pos:'left-center'}">
                    	<button class="tm-navbar-button tm-more-button"></button>
                    	<div class="uk-dropdown-blank tm-navbar-dropdown">
                    		<?php echo $this['widgets']->render('more'); ?>
                    	</div>
                    </div>
                </div>
                <?php endif; ?>

                <?php if ($this['widgets']->count('offcanvas')) : ?>
                <a href="#offcanvas" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas></a>
                <?php endif; ?>

            </div>
            <?php endif; ?>

        </div>

    </div>
</div>
