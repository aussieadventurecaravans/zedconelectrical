<?php
/**
* @package   Avanti
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

// get theme configuration
include($this['path']->path('layouts:theme.config.php'));

?>
<!DOCTYPE HTML>
<html lang="<?php echo $this['config']->get('language'); ?>" dir="<?php echo $this['config']->get('direction'); ?>"  data-config='<?php echo $this['config']->get('body_config','{}'); ?>'>

    <head>
    <!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');

fbq('init', '1431527937088274');
fbq('track', "PageView");</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1431527937088274&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->

    <?php echo $this['template']->render('head'); ?>
    </head>

    <body class="<?php echo $this['config']->get('body_classes'); ?><?php echo $this['widgets']->count('header') !== 0 ? '' : ' tm-header-offset'; ?> <?php echo $this['config']->get('navbar_template') == 'centered' ? ' tm-navbar-centered-true' : ''; ?>">

        <?php if ($this['widgets']->count('logo + logo-small + search + social + menu + offcanvas + header')) : ?>

            <div id="tm-header" class="tm-block-header">

                <?php echo $this['template']->render('header.'.$this['config']->get('navbar_template', 'default').'', $navbar_config); ?>

                <?php if ($this['widgets']->count('header')) : ?>
                <div class="tm-header-container">
                    <?php echo $this['widgets']->render('header'); ?>
                </div>
                <?php endif; ?>

            </div>

        <?php endif; ?>

        <?php if ($this['widgets']->count('top-a')) : ?>
        <div id="tm-top-a" class="tm-block-top-a uk-block <?php echo $classes['block.top-a']; ?>" <?php echo $styles['block.top-a']; ?>>

            <div class="uk-container uk-container-center">

                <section class="<?php echo $classes['grid.top-a']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
                    <?php echo $this['widgets']->render('top-a', array('layout'=>$this['config']->get('grid.top-a.layout'))); ?>
                </section>

            </div>

        </div>
        <?php endif; ?>

        <?php if ($this['widgets']->count('top-b')) : ?>
        <div id="tm-top-b" class="tm-block-top-b uk-block <?php echo $classes['block.top-b']; ?>" <?php echo $styles['block.top-b']; ?>>

            <div class="uk-container uk-container-center">

                <section class="<?php echo $classes['grid.top-b']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
                    <?php echo $this['widgets']->render('top-b', array('layout'=>$this['config']->get('grid.top-b.layout'))); ?>
                </section>

            </div>

        </div>
        <?php endif; ?>

        <?php if ($this['widgets']->count('top-c')) : ?>
        <div id="tm-top-c" class="tm-block-top-c uk-block <?php echo $classes['block.top-c']; ?>" <?php echo $styles['block.top-c']; ?>>

            <div class="uk-container uk-container-center">

                <section class="<?php echo $classes['grid.top-c']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
                    <?php echo $this['widgets']->render('top-c', array('layout'=>$this['config']->get('grid.top-c.layout'))); ?>
                </section>

            </div>

        </div>
        <?php endif; ?>

        <?php if ($this['widgets']->count('top-d')) : ?>
        <div id="tm-top-d" class="tm-block-top-d uk-block <?php echo $classes['block.top-d']; ?>" <?php echo $styles['block.top-d']; ?>>

            <div class="uk-container uk-container-center">

                <section class="<?php echo $classes['grid.top-d']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
                    <?php echo $this['widgets']->render('top-d', array('layout'=>$this['config']->get('grid.top-d.layout'))); ?>
                </section>

            </div>

        </div>
        <?php endif; ?>

        <?php if ($this['widgets']->count('main-top + main-bottom + sidebar-a + sidebar-b') || $this['config']->get('system_output', true)) : ?>
        <div id="tm-main" class="tm-block-main uk-block <?php echo $classes['block.main']; ?>" <?php echo $styles['block.main']; ?>>

            <div class="uk-container uk-container-center">

                <div class="tm-middle uk-grid" data-uk-grid-match data-uk-grid-margin>

                    <?php if ($this['widgets']->count('main-top + main-bottom') || $this['config']->get('system_output', true)) : ?>
                    <div class="<?php echo $classes['layout.main'] ?>"> <?php if ($this['widgets']->count('main-top')) : ?>
                        <section id="tm-main-top" class="tm-main-top <?php echo $classes['grid.main-top']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
                            <?php echo $this['widgets']->render('main-top', array('layout'=>$this['config']->get('grid.main-top.layout'))); ?>
                        </section>
                        <?php endif; ?>

                       

                        <?php if ($this['config']->get('system_output', true)) : ?>
                        <main id="tm-content" class="tm-content<?php echo $this['config']->get('breadcrumb') == true ? ' tm-breadcrumb-centered' : ''; ?>">

                            <?php if ($this['widgets']->count('breadcrumbs')) : ?>
                            <?php echo $this['widgets']->render('breadcrumbs'); ?>
                            <?php endif; ?>

                            <?php echo $this['template']->render('content'); ?>
                            

                        </main>
                        <?php endif; ?>

                        <?php if ($this['widgets']->count('main-bottom')) : ?>
                        <section id="tm-main-bottom" class="tm-main-bottom <?php echo $classes['grid.main-bottom']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
                            <?php echo $this['widgets']->render('main-bottom', array('layout'=>$this['config']->get('grid.main-bottom.layout'))); ?>
                        </section>
                        <?php endif; ?>

                    </div>
                    <?php endif; ?>

                    <?php foreach($sidebars as $name => $sidebar) : ?>
                    <aside class="<?php echo $classes["layout.$name"] ?>"><?php echo $this['widgets']->render($name) ?></aside>
                    <?php endforeach ?>

                </div>

            </div>

        </div>
        <?php endif; ?>

        <?php if ($this['widgets']->count('bottom-a')) : ?>
        <div id="tm-bottom-a" class="tm-block-bottom-a uk-block <?php echo $classes['block.bottom-a']; ?>" <?php echo $styles['block.bottom-a']; ?>>

            <div class="uk-container uk-container-center">

                <section class="<?php echo $classes['grid.bottom-a']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
                    <?php echo $this['widgets']->render('bottom-a', array('layout'=>$this['config']->get('grid.bottom-a.layout'))); ?>
                </section>

            </div>

        </div>
        <?php endif; ?>

        <?php if ($this['widgets']->count('bottom-b')) : ?>
        <div id="tm-bottom-b" class="tm-block-bottom-b uk-block <?php echo $classes['block.bottom-b']; ?>" <?php echo $styles['block.bottom-b']; ?>>

            <div class="uk-container uk-container-center">

                <section class="<?php echo $classes['grid.bottom-b']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
                    <?php echo $this['widgets']->render('bottom-b', array('layout'=>$this['config']->get('grid.bottom-b.layout'))); ?>
                </section>

            </div>

        </div>
        <?php endif; ?>

        <?php if ($this['widgets']->count('bottom-c')) : ?>
        <div id="tm-bottom-c" class="tm-block-bottom-c uk-block <?php echo $classes['block.bottom-c']; ?>" <?php echo $styles['block.bottom-c']; ?>>

            <div class="uk-container uk-container-center">

                <section class="<?php echo $classes['grid.bottom-c']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
                    <?php echo $this['widgets']->render('bottom-c', array('layout'=>$this['config']->get('grid.bottom-c.layout'))); ?>
                </section>

            </div>

        </div>
        <?php endif; ?>

        <?php if ($this['widgets']->count('bottom-d')) : ?>
        <div id="tm-bottom-d" class="tm-block-bottom-d uk-block <?php echo $classes['block.bottom-d']; ?>" <?php echo $styles['block.bottom-d']; ?>>

            <div class="uk-container uk-container-center">

                <section class="<?php echo $classes['grid.bottom-d']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
                    <?php echo $this['widgets']->render('bottom-d', array('layout'=>$this['config']->get('grid.bottom-d.layout'))); ?>
                </section>

            </div>

        </div>
        <?php endif; ?>

        <?php echo $this['template']->render('footer.'.$this['config']->get('footer_template', 'default')); ?>

        <?php if ($this['widgets']->count('modal')) : ?>
        <div>
            <?php echo $this['widgets']->render('modal'); ?>
        </div>
        <?php endif; ?>

        <?php if ($this['widgets']->count('offcanvas')) : ?>
        <div id="offcanvas" class="uk-offcanvas">
            <div class="uk-offcanvas-bar uk-offcanvas-bar-flip"><?php echo $this['widgets']->render('offcanvas'); ?></div>
        </div>
        <?php endif; ?>

        <?php if ($this['widgets']->count('debug')) : ?>
            <?php echo $this['widgets']->render('debug'); ?>
        <?php endif; ?>

        <?php echo $this->render('footer'); ?>

    </body>
</html>