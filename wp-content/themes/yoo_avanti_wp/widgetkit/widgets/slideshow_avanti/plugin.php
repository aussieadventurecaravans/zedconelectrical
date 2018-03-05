<?php
/**
* @package   Avanti
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

return array(

    'name' => 'widget/slideshow_avanti',

    'main' => 'YOOtheme\\Widgetkit\\Widget\\Widget',

    'config' => array(

        'name'  => 'slideshow_avanti',
        'label' => 'Avanti Slideshow',
        'core'  => false,
        'icon'  => 'plugins/widgets/slideshow_avanti/widget.svg',
        'view'  => 'plugins/widgets/slideshow_avanti/views/widget.php',
        'item'  => array('title', 'content', 'media'),
        'settings' => array(
            'nav'                       => 'number',
            'nav_overlay'               => false,
            'nav_align'                 => 'left',
            'thumbnail_width'           => '70',
            'thumbnail_height'          => '70',
            'thumbnail_alt'             => false,
            'slidenav'                  => 'default',
            'nav_contrast'              => true,
            'animation'                 => 'swipe',
            'slices'                    => '15',
            'duration'                  => '500',
            'autoplay'                  => false,
            'interval'                  => '3000',
            'autoplay_pause'            => true,
            'kenburns'                  => false,
            'kenburns_animation'        => '',
            'kenburns_duration'         => '15',
            'fullscreen'                => false,
            'min_height'                => '700',

            'media'                     => true,
            'image_width'               => 'auto',
            'image_height'              => 'auto',
            'overlay'                   => true,
            'overlay_layout'            => 'middle-left',
            'overlay_content_width'     => '50',
            'overlay_background'        => false,

            'title'                     => true,
            'content'                   => true,
            'title_animation'           => true,
            'title_size'                => 'large',
            'content_size'              => 'large',
            'link'                      => true,
            'link_style'                => 'button-link',
            'link_text'                 => 'View',
            'badge'                     => true,
            'badge_style'               => 'badge',

            'link_target'               => false,
            'class'                     => ''
        )

    ),

    'events' => array(

        'init.site' => function($event, $app) {
            $app['scripts']->add('uikit-slideshow', 'vendor/assets/uikit/js/components/slideshow.min.js', array('uikit'));
            $app['scripts']->add('uikit-slideshow-fx', 'vendor/assets/uikit/js/components/slideshow-fx.min.js', array('uikit'));
        },

        'init.admin' => function($event, $app) {
            $app['angular']->addTemplate('slideshow_avanti.edit', 'plugins/widgets/slideshow_avanti/views/edit.php', true);
        }

    )

);
