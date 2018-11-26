<main role="main" class="container my-5">
    <?php if ($_SESSION['is_logged']) {
	header("Location: index.php?page=accounts");
	exit;
} else {
	header("Location: index.php?page=login");
	exit;
}

?>
</main>