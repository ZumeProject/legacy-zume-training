<footer class="footer" role="contentinfo">
    <div id="inner-footer" class="grid-x">
        <div class="medium-1 cell"></div>
        <div class="medium-10 cell center">

            <p class="source-org copyright hide-for-small-only" style="padding-top:50px; opacity:.3;">
                <span>
                    <a href="https://www.facebook.com/zumemultiplyingdisciples" target="_blank" rel="noopener"><img src="<?php echo esc_attr( get_template_directory_uri() ); ?>/assets/images/facebook-square.svg" style="height: 23px" title="Facebook"></a>
                </span> &copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> Zúme
            </p>
            <br><br><br>
        </div>
        <div class="medium-1 cell"></div>
    </div> <!-- end #inner-footer -->
</footer> <!-- end .footer -->
</div>  <!-- end .main-content -->
</div> <!-- end .off-canvas-wrapper -->


<!-- language selector modal -->
<div id="language-menu-reveal" class="reveal" data-reveal data-v-offset="0">
    <h3><img src="<?php echo esc_url( zume_images_uri() ) ?>language.svg" style="width:25px;height:25px;" /> <?php esc_html_e( "Language", 'zume' ) ?></h3>
    <hr>
    <table class="hover" id="language-table">
        <?php

        $dt_url = new DT_URL( dt_get_url_path() );
        $url_pieces = zume_get_url_pieces();
        $zume_languages_by_code = zume_languages();

        foreach ( $zume_languages_by_code as $item ){
            $is_v4 = ( ! $item['enable_flags']['version_5_ready'] && $item['enable_flags']['version_4_available'] );
            $is_v5 = $item['enable_flags']['version_5_ready'];

            $query = '';
            if ( isset( $dt_url->parsed_url['query'] ) ) {
                $query = '?' . $dt_url->parsed_url['query'];
            }

            if ( 'en' === $item['code'] ) {
                $url = 'https://zume.training/' . $url_pieces['path'] . $query;
            }
            else if ( $is_v5 ) {
                $url = 'https://zume.training/' . $item['code'] . '/' . $url_pieces['path'] . $query;
            }
            else if ( $is_v4 ) {
                $url = esc_url( trailingslashit( site_url() ) ) . $item['code'] . '/' . $url_pieces['path'] . $query;
            } else {
                continue;
            }

            ?>
            <tr role="button" class="language-selector" data-url="<?php echo esc_url( $url ) ?>" data-value="<?php echo esc_attr( $item['code'] ) ?>" id="row-<?php echo esc_attr( $item['code'] ) ?>">
                <td><?php echo esc_html( $item['nativeName'] ) ?></td>
                <td><?php echo esc_html( $item['enDisplayName'] ) ?></td>
            </tr>
            <?php
        }

        ?>

    </table>
    <script>
        jQuery(document).ready(function($){
            $('.language-selector').on('click', function(e){
                let lang = $(this).data('value')
                let url = $(this).data('url')
                $('.language-selector:not(#row-'+lang+')').fadeTo("fast", 0.33)
                window.location = url
            })
        })
    </script>
    <button class="close-button" data-close aria-label="Close modal" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<?php wp_footer(); ?>

<?php
/**
 * Enable Zendesk by setting this variable to true at the top of the template or page.
 */
global $zendesk_enable;
if ( false ) : ?>
    <!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "918362801617354");
        chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml            : true,
                version          : 'v15.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
<?php endif; ?>
</div><!-- top bar notice wrapper - end wrapper -->
</body>
</html> <!-- end page -->
