<!-- this footer will not be shown on login page -->
        <?php if ($inner_view != 'common/login') { ?>
            <footer class="main-footer">
               <!--  <div class="pull-right hidden-xs">
                    Designed and Developed by <a href="http://www.karyonsolutions.com"><strong>Karyon Solutions</strong></a>
                </div>
                <strong>&copy; <?php echo date('Y'); ?></strong> All rights reserved by <strong>Karyon Solutions</strong>
            </footer> -->
        <?php } ?>
    </div>
</body>
<!-- getting this scripts from karyon_config.php file which is under application > config folder -->
<?php
foreach ($scripts['foot'] as $file) {
    echo "<script src='$file'></script>";
}
?>
</html>
