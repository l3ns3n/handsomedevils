<?php if (is_active_sidebar('pre-footer-sidebar')) { ?><div><?php dynamic_sidebar('pre-footer-sidebar'); ?></div><?php } ?>

<footer class="footer--wrapper js-footer-wrapper">
    <div class="footer">
        <div class="wrapper">
            <div class="footer-menu--wrapper">
                <?php if (is_active_sidebar('footer-1')) { ?><div class="footer-menu--item"><div class="footer-menu--item"><?php dynamic_sidebar('footer-1'); ?></div></div><?php } ?>
                <?php if (is_active_sidebar('footer-2')) { ?><div class="footer-menu--item"><div class="footer-menu--item"><?php dynamic_sidebar('footer-2'); ?></div></div><?php } ?>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="wrapper">
            <span id="copyright">&copy; <?php echo date('Y'); ?> <?php echo get_bloginfo('name'); ?></span>
        </div>
    </div>
</footer>

<?php
wp_footer();
?>
</div>

</body>
</html>
