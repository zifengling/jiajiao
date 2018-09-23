<?php 
if ($_SESSION['login_user_level']!='admin_user') { ?>
<script language="javascript">location.href='index.php';</script>
<?php exit; } ?>