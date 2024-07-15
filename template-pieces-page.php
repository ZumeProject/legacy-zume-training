<?php
/*
Template Name: Pieces Page
*/
get_header();

$zendesk_enable = true;

if (have_posts()) :
    while (have_posts()) : the_post();
        $language = zume_current_language();
        $postid = get_the_ID();
        $meta = get_post_meta( $postid );
        $tool_number = $meta['zume_piece'][0] ?? 0;
        $pre_video_content = $meta['zume_pre_video_content'][0] ?? '';
        $post_video_content = $meta['zume_post_video_content'][0] ?? '';
        $ask_content = $meta['zume_ask_content'][0] ?? '';
        $h1_title = empty( $meta['zume_piece_h1'][0] ) ? get_the_title( $postid ) : $meta['zume_piece_h1'][0];

        $args = Zume_V4_Pieces::vars( $tool_number );
        if ( empty( $args ) ) {
            return;
        }
        $session_number = $args['session_number'];
        $alt_video = $args['alt_video'];
        $image_url = $args['image_url'];
        $audio = $args['audio'];
        $has_video = $args['has_video'];
        $video_id = $args['video_id'];

        ?>

        <!-- Wrappers -->
        <div id="content" class="grid-x grid-padding-x training pieces"><div id="inner-content" class="cell">

        <!------------------------------------------------------------------------------------------------>
        <!-- Title section -->
        <!------------------------------------------------------------------------------------------------>
        <div class="grid-x grid-margin-x grid-margin-y vertical-padding">
            <div class="medium-2 small-1 cell"></div><!-- Side spacer -->

            <!-- Center column -->
            <div class="medium-8 small-10 cell center">

                <?php if ( ! empty( $image_url ) ) : ?>
                    <img src="<?php echo esc_url( $image_url ) ?>" alt="<?php echo esc_html( $h1_title ) ?>" style="max-height:225px;"/>
                <?php endif; ?>

                <h1><?php echo esc_html( $h1_title ) ?></h1>
                <span class="sub-caption">
                    <a onclick="open_session(<?php echo esc_attr( $session_number ); ?>)">
                        <?php echo sprintf( __( 'This concept is called "%s" in session %s of the Zúme Training', 'zume' ), esc_html( $h1_title ), esc_attr( (string) $session_number ) ) ?>
                    </a>
                </span>
            </div>

            <div class="medium-2 small-1 cell"></div><!-- Side spacer -->
        </div>


        <!------------------------------------------------------------------------------------------------>
        <!-- Unique page content section -->
        <!------------------------------------------------------------------------------------------------>
        <div class="grid-x ">

            <!-- Center column -->
            <div class="cell center-content" id="training-content">

                <section><!-- Step Title -->

                    <!-- pre-video block -->
                    <div class="grid-x grid-margin-x grid-margin-y">
                        <div class="cell content-large">
                            <?php echo wp_kses_post( wpautop( $pre_video_content ) ) ?>
                        </div>
                    </div>


                    <!-- video block -->
                    <?php if ($has_video) : ?>
                        <div class="grid-x grid-margin-x grid-margin-y">
                            <div class="cell content-large center">
                                <?php if ( $audio ) :  ?>
                                    <h3><?php esc_html_e( "Listen and Read Along", 'zume' ) ?></h3>
                                    <a class="button large text-uppercase"
                                       href="<?php echo esc_url( Zume_Course::get_download_by_key( '33' ) ) ?>"
                                       target="_blank" rel="noopener noreferrer nofollow">
                                        <?php esc_html_e( 'Download Free Guidebook', 'zume' ) ?>
                                    </a>
                                <?php else : ?>
                                    <h3 class="center"><?php esc_html_e( 'Watch This Video', 'zume' ) ?></h3>
                                <?php endif; ?>

                                <?php if ( $alt_video ) : ?>
                                    <video width="960" style="border: 1px solid lightgrey;max-width: 960px;width:100%;" controls>
                                        <source src="<?php echo esc_url( zume_mirror_url() . zume_current_language() . '/'.$video_id.'.mp4' ) ?>" type="video/mp4" >
                                        Your browser does not support the video tag.
                                    </video>
                                <?php else : ?>
                                    <div class="video-section">
                                        <iframe style="border: 1px solid lightgrey;"  src="<?php echo esc_url( Zume_Course::get_video_by_key( $video_id ) ) ?>" width="560" height="315"
                                                frameborder="1" webkitallowfullscreen mozallowfullscreen allowfullscreen>
                                        </iframe>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>


                    <!-- post-video block -->
                    <div class="grid-x grid-margin-x grid-margin-y">
                        <div class="cell content-large">
                            <?php echo wp_kses_post( wpautop( $post_video_content ) ) ?>
                        </div>
                    </div>


                    <!-- question block -->
                    <div class="grid-x grid-margin-x">
                        <div class="cell content-large center">
                            <h3 class="center"><?php esc_html_e( 'Ask Yourself', 'zume' ) ?></h3>
                        </div>
                        <div class="cell content-large">
                            <?php echo wp_kses_post( wpautop( $ask_content ) ) ?>
                        </div>
                    </div>


                </section>

            </div>

        </div> <!-- grid-x -->

        <?php get_template_part( "parts/content", "modal" ); ?>

        <?php do_action( 'zume_movement_log_pieces', [
            'tool' => $tool_number,
            'session' => $session_number,
            'language' => $language,
            'title' => get_the_title( zume_landing_page_post_id( $tool_number ) )
        ] ) ?>
        <!-- end zume vision logging -->

        <?php
    endwhile;
endif;

get_footer();
