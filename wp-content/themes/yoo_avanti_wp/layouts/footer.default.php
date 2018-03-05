<div id="tm-footer" class="tm-block-footer <?php echo $this['config']->get('footer_contrast') == true ? ' uk-contrast' : ''; ?>">
    <div class="uk-container uk-container-center uk-flex uk-flex-middle uk-height-1-1 uk-width-1-1">

        <?php if ($this['widgets']->count('footer') || $this['config']->get('warp_branding', true) || $this['config']->get('totop_scroller', true)) : ?>
        <footer class="tm-footer uk-flex uk-flex-middle uk-width-1-1">

            <div class="tm-footer-left uk-flex uk-flex-middle">
                <?php echo $this['widgets']->render('footer'); ?>
                <?php $this->output('warp_branding'); ?>
            </div>

            <div class="tm-footer-center uk-flex uk-flex-middle uk-flex-center uk-width-1-1">
                <?php if ($this['config']->get('totop_scroller', true)) : ?>
                <a id="tm-anchor-bottom" class="tm-totop-scroller" data-uk-smooth-scroll href="#"></a>
                <?php endif; ?>
            </div>

            <?php if ($this['config']->get('warp_branding', true)) : ?>
            <div><?php $this->output('warp_branding'); ?></div>
            <?php endif; ?>

            <div class="tm-footer-right uk-flex uk-flex-middle">
                <?php echo $this['widgets']->render('footer-menu'); ?>
            </div>

        </footer>
        <?php endif; ?>

    </div>
</div>
