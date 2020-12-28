<footer>
    <div class="row">
        <?php wp_footer(); ?>
        <div class="col-md-3 footer-copyright">
            <p><?php echo dogeared_copyright(); ?></p>
        </div>
        <div class="col-md-9">
            <?php if(is_active_sidebar('custom-header-links')) : ?>
                <?php dynamic_sidebar('custom-header-links'); ?>
            <?php endif; ?>
        </div>
    </div>
</footer>
<script src="https://kit.fontawesome.com/908d298a6e.js" crossorigin="anonymous"></script>
</body>
</html>