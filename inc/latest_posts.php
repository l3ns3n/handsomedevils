<?php
if( class_exists( 'WP_Customize_Control' ) ):
    class WP_Customize_Latest_Post_Control extends WP_Customize_Control {
        public $type = 'latest_post_dropdown';
        public $post_type = 'post';

        public function render_content() {

        $latest = new WP_Query( array(
            'post_type'   => $this->post_type,
            'post_status' => 'publish',
            'orderby'     => 'date',
            'order'       => 'DESC',
            'posts_per_page' => -1
        ));

        ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <select <?php $this->link(); ?>>
                    <?php
                    while( $latest->have_posts() ) {
                        $latest->the_post();
                        echo "<option " . selected( $this->value(), get_the_ID() ) . " value='" . get_the_ID() . "'>" . the_title( '', '', false ) . "</option>";
                    }
                    ?>
                </select>
            </label>
        <?php
        }
    }
endif;
