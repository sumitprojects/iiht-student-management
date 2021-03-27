<!DOCTYPE html>
<html lang="en">

<head>
	<?php include 'metas.php'; ?>
	<title><?php echo get_settings('system_title'); ?> | <?php echo $page_title; ?></title>
	<?php include 'includes_top.php'; ?>
</head>
<style>
.card,.card-header,.card-img-top,.box_grid figure,.box_grid,.box_detail,#list_sidebar .box_list, #list_sidebar .box_list figure{
    box-shadow: rgb(0 0 0 / 10%) 0px 1px 20px 0px;
    border-radius:24px;
}

.box_grid figure .price{
	border-radius:24px 0px 24px 0;
}


.alert.alert-danger {
  border-radius: 24px;
  color: #791200;
  background: #ffdcd5;
}
</style>
<body <?php if ($page_name == 'login' || $page_name == 'sign_up' || $page_name == 'forgot_password'): ?> id="login_bg" <?php endif; ?>>
	<?php if ($page_name != 'login' && $page_name != 'sign_up' && $page_name != 'forgot_password'): ?>
		<div id="page">
			<!-- Header -->
			<?php include 'header.php'; ?>
			<!-- Main content starts from here -->
			<main>
				<?php include $page_name.'.php'; ?>
			</main>
			<!-- footer -->
			<?php include 'footer.php'; ?>
		</div>
		<!-- end of page -->
	<?php elseif ($page_name == 'login' || $page_name == 'sign_up' || $page_name == 'forgot_password'):?>
		<nav id="menu" class="fake_menu"></nav>
		<div id="preloader">
			<div data-loader="circle-side"></div>
		</div>
		<div id="login">
			<?php include $page_name.'.php'; ?>
		</div>
	<?php endif; ?>
	<!-- COMMON SCRIPTS -->
	<?php include 'includes_bottom.php'; ?>
	<?php include 'common_scripts.php'; ?>
	<?php include 'modal.php'; ?>
</body>
</html>
