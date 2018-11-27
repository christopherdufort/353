<main role="main" class="container my-5">
    <?php if (isset($_SESSION['is_logged']) && isset($_SESSION['client'])) {
	header("Location: index.php?page=accounts");
	exit;
} else if (isset($_SESSION['is_logged']) && isset($_SESSION['employee'])) {
	header("Location: index.php?page=view_branches");
	exit;
} else {
	header("Location: index.php?page=login");
	exit;
}

?>
</main>