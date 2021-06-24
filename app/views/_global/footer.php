</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Required Jquery -->
<script src="<?= Utils::generateLink('assets/js/jquery/jquery.min.js'); ?>"></script>
<script src="<?= Utils::generateLink('assets/js/jquery-ui/jquery-ui.min.js'); ?>"></script>
<script src="<?= Utils::generateLink('assets/js/popper.js/popper.min.js'); ?>"></script>
<script src="<?= Utils::generateLink('assets/js/bootstrap/js/bootstrap.min.js'); ?>"></script>
<script src="<?= Utils::generateLink('assets/js/iziToast-1.4.0/js/iziToast.min.js'); ?>"></script>
<script src="<?= Utils::generateLink('assets/js/jquery.maskMoney.min.js'); ?>"></script>
<script src="<?= Utils::generateLink('assets/js/jquery.maskedinput.min.js'); ?>"></script>
<script src="<?= Utils::generateLink('assets/js/custom.js'); ?>"></script>

<?php if (isset($DATA['JAVASCRIPT_MODULE'])): ?>
    <script src="<?= Utils::generateLink($DATA['JAVASCRIPT_MODULE']); ?>"></script>
<?php endif; ?>
</body>

</html>
