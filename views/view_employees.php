<main role="main" class="container my-5">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Start Date</th>
                <th scope="col">Salary</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Employee Type</th>
            </tr>
        </thead>
        <tbody>
            <?php include 'classes/employee/employeeDAO.php';
            $db = new EmployeeDAO();
            if ($_SESSION['employee']['type'] == "president") {
                $employees = $db->getAllEmployees();
            } else if ($_SESSION['employee']['type'] == "teller") {
                $employees = $db->getEmployeesByType("teller");
            } else {
                $employees = $db->getEmployeesForManagers();
            }

            foreach ($employees as $employee) {
	        ?>
            <tr>
                <td><?php echo $employee['firstName']; ?></td>
                <td><?php echo $employee['lastName']; ?></td>
                <td><?php echo $employee['startDate']; ?></td>
                <td><?php echo $employee['salary']; ?></td>
                <td><?php echo $employee['email']; ?></td>
                <td><?php echo $employee['phone']; ?></td>
                <td><?php echo $employee['type']; ?></td>
            </tr>

        <?php }?>
        </tbody>
    </table>
</main>