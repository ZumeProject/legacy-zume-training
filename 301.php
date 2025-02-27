<?php
if ( !defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly.

class Zume_301_Redirects
{

    private static $_instance = null;
    public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __construct() {
        if( dt_is_rest() ) {
            return;
        }

        if ( defined( 'DOING_CRON' ) && DOING_CRON ) {
            return;
        }

        $url = dt_get_url_path();
        if ( empty( $url ) ) {
            return;
        }

        $list = $this->list_of_urls();

        if ( isset( $list[$url] ) ) {
            $this->redirect( $list[$url] );
        }
    }

    public function list_of_urls() {
        $z = 'https://zume.training/';
        $l = 'https://legacy.zume.training/';

        $pages = [

            "ar-tn/" => $z . "ar_tn",
            "ar-tn/3-3-group-meeting-pattern-ar-tn" => $z . "ar_tn/3-3-group-meeting-pattern-ar-tn",
            "ar-tn/3-circles-gospel-presentation-ar-tn" => $z . "ar_tn/3-circles-gospel-presentation-ar-tn",
            "ar-tn/a-person-of-peace-and-how-to-find-one-ar-tn" => $z . "ar_tn/a-person-of-peace-and-how-to-find-one-ar-tn",
            "ar-tn/about-ar-tn" => $z . "ar_tn/about-ar-tn",
            "ar-tn/accountability-groups-ar-tn" => $z . "ar_tn/accountability-groups-ar-tn",
            "ar-tn/always-part-of-two-churches-ar-tn" => $z . "ar_tn/always-part-of-two-churches-ar-tn",
            "ar-tn/baptism-and-how-to-do-it-ar-tn" => $z . "ar_tn/baptism-and-how-to-do-it-ar-tn",
            "ar-tn/consumer-vs-producer-lifestyle-ar-tn" => $z . "ar_tn/consumer-vs-producer-lifestyle-ar-tn",
            "ar-tn/cookie-policy-ar-tn" => $z . "ar_tn/cookie-policy-ar-tn",
            "ar-tn/course-ar-tn" => $z . "ar_tn/course-ar-tn",
            "ar-tn/definition-of-disciple-and-church-ar-tn" => $z . "ar_tn/definition-of-disciple-and-church-ar-tn",
            "ar-tn/duckling-discipleship-leading-immediately-ar-tn" => $z . "ar_tn/duckling-discipleship-leading-immediately-ar-tn",
            "ar-tn/expect-non-sequential-growth-ar-tn" => $z . "ar_tn/expect-non-sequential-growth-ar-tn",
            "ar-tn/eyes-to-see-where-the-kingdom-isnt-ar-tn" => $z . "ar_tn/eyes-to-see-where-the-kingdom-isnt-ar-tn",
            "ar-tn/faithfulness-is-better-than-knowledge-ar-tn" => $z . "ar_tn/faithfulness-is-better-than-knowledge-ar-tn",
            "ar-tn/faq-ar-tn" => $z . "ar_tn/faq-ar-tn",
            "ar-tn/generational-mapping-ar-tn" => $z . "ar_tn/generational-mapping-ar-tn",
            "ar-tn/get-a-coach-ar-tn" => $z . "ar_tn/get-a-coach-ar-tn",
            "ar-tn/home-ar-tn" => $z . "ar_tn/home-ar-tn",
            "ar-tn/how-to-follow-jesus-ar-tn" => $z . "ar_tn/how-to-follow-jesus-ar-tn",
            "ar-tn/how-to-spend-and-hour-in-prayer-ar-tn" => $z . "ar_tn/how-to-spend-and-hour-in-prayer-ar-tn",
            "ar-tn/leadership-cells-ar-tn" => $z . "ar_tn/leadership-cells-ar-tn",
            "ar-tn/leadership-in-networks-ar-tn" => $z . "ar_tn/leadership-in-networks-ar-tn",
            "ar-tn/mobile-app-ar-tn" => $z . "ar_tn/mobile-app-ar-tn",
            "ar-tn/pace-of-multiplication-matters-ar-tn" => $z . "ar_tn/pace-of-multiplication-matters-ar-tn",
            "ar-tn/peer-mentoring-groups-ar-tn" => $z . "ar_tn/peer-mentoring-groups-ar-tn",
            "ar-tn/prayer-walking-and-how-to-do-it-ar-tn" => $z . "ar_tn/prayer-walking-and-how-to-do-it-ar-tn",
            "ar-tn/prepare-your-3-minute-testimony-ar-tn" => $z . "ar_tn/prepare-your-3-minute-testimony-ar-tn",
            "ar-tn/privacy-policy-ar-tn" => $z . "ar_tn/privacy-policy-ar-tn",
            "ar-tn/relational-stewardship-list-of-100-ar-tn" => $z . "ar_tn/relational-stewardship-list-of-100-ar-tn",
            "ar-tn/resources-ar-tn" => $z . "ar_tn/resources-ar-tn",
            "ar-tn/soaps-bible-reading-ar-tn" => $z . "ar_tn/soaps-bible-reading-ar-tn",
            "ar-tn/spiritual-breathing-is-hearing-and-obeying-god-ar-tn" => $z . "ar_tn/spiritual-breathing-is-hearing-and-obeying-god-ar-tn",
            "ar-tn/terms-of-service-ar-tn" => $z . "ar_tn/terms-of-service-ar-tn",
            "ar-tn/the-bless-prayer-pattern-ar-tn" => $z . "ar_tn/the-bless-prayer-pattern-ar-tn",
            "ar-tn/the-gospel-and-how-to-share-it-ar-tn" => $z . "ar_tn/the-gospel-and-how-to-share-it-ar-tn",
            "ar-tn/the-kingdom-economy-ar-tn" => $z . "ar_tn/the-kingdom-economy-ar-tn",
            "ar-tn/the-lords-supper-and-how-to-lead-it-ar-tn" => $z . "ar_tn/the-lords-supper-and-how-to-lead-it-ar-tn",
            "ar-tn/training-ar-tn" => $z . "ar_tn/training-ar-tn",
            "ar-tn/training-cycle-for-maturing-disciples-ar-tn" => $z . "ar_tn/training-cycle-for-maturing-disciples-ar-tn",
            "ar-tn/translation-progress-ar-tn" => $z . "ar_tn/translation-progress-ar-tn",
            "ar-tn/vision-ar-tn" => $z . "ar_tn/vision-ar-tn",
            "ar-tn/vision-casting-the-greatest-blessing-ar-tn" => $z . "ar_tn/vision-casting-the-greatest-blessing-ar-tn",
            "ar-tn/welcome-to-gods-family-ar-tn" => $z . "ar_tn/welcome-to-gods-family-ar-tn",
        
        ];
        return $pages;
    }

    public function redirect( $redirect ) {
        header( 'Location: '.$redirect, true, 301 );
        exit();
    }
}
Zume_301_Redirects::instance();
