<?php
/**
* @package   Avanti
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

return array(

    'name' => 'widget/slideshow-panel_avanti',

    'main' => 'YOOtheme\\Widgetkit\\Widget\\Widget',

    'config' => array(

        'name'  => 'slideshow-panel_avanti',
        'label' => 'Avanti Slideshow Panel',
        'core'  => false,
        'icon'  => 'plugins/widgets/slideshow-panel_avanti/widget.svg',
        'view'  => 'plugins/widgets/slideshow-panel_avanti/views/widget.php',
        'item'  => array('title', 'content', 'media'),
        'settings' => array(
            'panel'              => 'blank',
            'nav'                => 'dotnav',
            'nav_overlay'        => true,
            'nav_align'          => 'center',
            'thumbnail_width'    => '70',
            'thumbnail_height'   => '70',
            'thumbnail_alt'      => false,
            'slidenav'           => 'default',
            'nav_contrast'       => true,
            'animation'          => 'swipe',
            'slices'             => '15',
            'duration'           => '500',
            'autoplay'           => false,
            'interval'           => '3000',
            'autoplay_pause'     => true,
            'kenburns'           => false,
            'kenburns_animation' => '',
            'kenburns_duration'  => '15',
            'fullscreen'         => false,
            'min_height'         => '420',

            'media'              => true,
            'image_width'        => 'auto',
            'image_height'       => 'auto',
            'media_align'        => 'left',
            'media_width'        => '1-2',
            'media_breakpoint'   => 'medium',
            'content_align'      => true,

            'title'              => true,
            'content'            => true,
            'title_size'         => 'h1',
            'content_size'       => '',
            'content_max_width'  => '60',
            'text_align'         => 'left',
            'link'               => true,
            'link_style'         => 'button-link',
            'link_text'          => 'Project Details',
            'badge'              => true,
            'badge_style'        => 'badge',

            'link_target'        => false,
            'class'              => ''
        )

    ),

    'events' => array(

        'init.site' => function($event, $app) {
            $app['scripts']->add('uikit-slideshow', 'vendor/assets/uikit/js/components/slideshow.min.js', array('uikit'));
        },

        'init.admin' => function($event, $app) {
            $app['angular']->addTemplate('slideshow-panel_avanti.edit', 'plugins/widgets/slideshow-panel_avanti/views/edit.php', true);
        }

    )

);
