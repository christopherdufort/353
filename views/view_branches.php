
<main role="main" class="container my-5">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Branch Name</th>
                <th scope="col">Location</th>
                <th scope="col">Phone</th>
                <th scope="col">Fax</th>
                <th scope="col">Opening Date</th>
            </tr>
        </thead>
        <tbody>
            <?php include 'classes/branch/branchDAO.php';
$db = new branchDAO();
foreach ($db->getAllBranches() as $branch) {
	?>
            <tr>
                <td><?php echo $branch['name']; ?></td>
                <td><?php echo $branch['location']; ?></td>
                <td><?php echo $branch['phone']; ?></td>
                <td><?php echo $branch['fax']; ?></td>
                <td><?php echo $branch['openingDate']; ?></td>
            </tr>

        <?php }?>
        </tbody>
    </table>
</main>