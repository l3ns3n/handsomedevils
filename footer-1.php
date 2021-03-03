<?php if (is_active_sidebar('pre-footer-sidebar')) { ?><div><?php dynamic_sidebar('pre-footer-sidebar'); ?></div><?php } ?>

<footer class="footer--wrapper">
    <div class="footer">
        <div class="wrapper">
            <div class="footer-menu--wrapper">
                <?php if (is_active_sidebar('footer-1')) { ?><div class="footer-menu--item"><div class="footer-menu--item"><?php dynamic_sidebar('footer-1'); ?></div></div><?php } ?>
                <?php if (is_active_sidebar('footer-2')) { ?><div class="footer-menu--item"><div class="footer-menu--item"><?php dynamic_sidebar('footer-2'); ?></div></div><?php } ?>
            </div>
        </div>
    </div>
    <a href="#page" class="scroll-top js-scrollto"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
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
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-144670315-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-144670315-1');
</script>

</body>
</html>
