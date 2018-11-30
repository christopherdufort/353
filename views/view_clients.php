<main role="main" class="container my-5">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Birth Date</th>
                <th scope="col">Joining Date</th>
                <th scope="col">Address</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
            </tr>
        </thead>
        <tbody>
            <?php include 'classes/client/clientDAO.php';
$db = new ClientDAO();
foreach ($db->getAllClients() as $client) {
	?>
            <tr>
                <td><?php echo $client['first_name']; ?></td>
                <td><?php echo $client['lastName']; ?></td>
                <td><?php echo $client['birthDate']; ?></td>
                <td><?php echo $client['joiningDate']; ?></td>
                <td><?php echo $client['address']; ?></td>
                <td><?php echo $client['email']; ?></td>
                <td><?php echo $client['phone']; ?></td>
            </tr>

        <?php }?>
        </tbody>
    </table>
</main>