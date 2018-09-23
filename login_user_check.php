<?php if ($_SESSION['login_user_name']=='') { ?>
<script language="javascript">location.href='login.php?disp_type=login';</script>
<?php exit; } ?>