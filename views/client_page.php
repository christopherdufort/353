<main role="main" class="container my-5">
    <table class="table table-sm">
        <tbody>
            <tr>
                <th scope="row">First Name</th>
                <td><?php echo $_SESSION['client']['firstName']; ?></td>
            </tr>
            <tr>
                <th scope="row">Last Name</th>
                <td><?php echo $_SESSION['client']['lastName']; ?></td>
            </tr>
            <tr>
                <th scope="row">Email</th>
                <td><?php echo $_SESSION['client']['email']; ?></td>
            </tr>
            <tr>
                <th scope="row">Phone Number</th>
                <td><?php echo $_SESSION['client']['phone']; ?></td>
            </tr>
            <tr>
                <th scope="row">Address</th>
                <td><?php echo $_SESSION['client']['address']; ?></td>
            </tr>
            <tr>
                <th scope="row">Birth Date</th>
                <td><?php echo $_SESSION['client']['birthDate']; ?></td>
            </tr>
            <tr>
                <th scope="row">Joining Date</th>
                <td><?php echo $_SESSION['client']['joiningDate']; ?></td>
            </tr>
            <tr>
                <th scope="row">Receive Alerts</th>
                <td>
                    <form class="form-inline" action="actions.php" method="post">
                        <input class="form-check-input" type="checkbox" name="alertsInput" <?php if ($_SESSION['client']['alerts'] == 1) {
	echo 'checked';
}
?> onChange="this.form.submit()">
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
</main>