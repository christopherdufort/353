<main role="main" class="container my-5">
    <table class="table table-sm">
        <tbody>
            <tr>
                <th scope="row">Title</th>
                <td><?php echo $_SESSION['employee']['title']; ?></td>
            </tr>
            <tr>
                <th scope="row">First Name</th>
                <td><?php echo $_SESSION['employee']['firstName']; ?></td>
            </tr>
            <tr>
                <th scope="row">Last Name</th>
                <td><?php echo $_SESSION['employee']['lastName']; ?></td>
            </tr>
            <tr>
                <th scope="row">Email</th>
                <td><?php echo $_SESSION['employee']['email']; ?></td>
            </tr>
            <tr>
                <th scope="row">Phone Number</th>
                <td><?php echo $_SESSION['employee']['phone']; ?></td>
            </tr>
            <tr>
                <th scope="row">Address</th>
                <td><?php echo $_SESSION['employee']['address']; ?></td>
            </tr>
            <tr>
                <th scope="row">Start Date</th>
                <td><?php echo $_SESSION['employee']['startDate']; ?></td>
            </tr>
            <tr>
                <th scope="row">Salary</th>
                <td><?php echo $_SESSION['employee']['salary']; ?></td>
            </tr>

            <tr>
                <th scope="row">Sick Days Used</th>
                <td>3</td>
            </tr>
        </tbody>
    </table>
</main>