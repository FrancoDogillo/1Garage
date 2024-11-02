<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Car Company & Model Management</title>
</head>

<body>
    <div class="wrapper">
        <h1>Welcome to Car Company Management</h1>
        <h2>Manage Car Companies and Models</h2>

        <!-- Form to Add New Car Company -->
        <div>
            <h3>Add a New Car Company</h3>
            <form action="core/handleForms.php" method="POST">
                <p>
                    <label for="company_name">Company Name</label>
                    <select name="company_name" id="company_name" required onchange="populateFields()">
                        <option value="">Select a Company</option>
                        <option value="Honda">Honda</option>
                        <option value="Toyota">Toyota</option>
                        <option value="Tesla">Tesla</option>
                        <option value="Ferrari">Ferrari</option>
                        <option value="Ford">Ford</option>
                    </select>
                </p>
                <p>
                    <label for="country">Country</label>
                    <input type="text" name="country" id="country" required readonly>
                </p>
                <p>
                    <label for="founded_year">Founded Year</label>
                    <input type="number" name="founded_year" id="founded_year" required readonly>
                </p>
                <div class="btn_container">
                    <button class="btn" type="submit" name="submitCompanyButton">Add Company</button>
                </div>
            </form>

            <script>
                function populateFields() {
                    const companySelect = document.getElementById('company_name');
                    const selectedCompany = companySelect.value;
                    const countryInput = document.getElementById('country');
                    const yearInput = document.getElementById('founded_year');

                    // Define a mapping of companies to their respective country and founded year
                    const companyData = {
                        'Honda': {
                            country: 'Japan',
                            foundedYear: 1948
                        },
                        'Toyota': {
                            country: 'Japan',
                            foundedYear: 1937
                        },
                        'Tesla': {
                            country: 'USA',
                            foundedYear: 2003
                        },
                        'Ferrari': {
                            country: 'Italy',
                            foundedYear: 1939
                        },
                        'Ford': {
                            country: 'USA',
                            foundedYear: 1903
                        }
                    };

                    // Check if the selected company exists in the mapping
                    if (companyData[selectedCompany]) {
                        countryInput.value = companyData[selectedCompany].country;
                        yearInput.value = companyData[selectedCompany].foundedYear;
                    } else {
                        // Clear the fields if no valid company is selected
                        countryInput.value = '';
                        yearInput.value = '';
                    }
                }
            </script>
        </div>

        <!-- Display All Car Companies -->
        <h3>Car Companies</h3>
        <?php $allCompanies = getAllCompanies($pdo); ?>
        <table>
            <thead>
                <tr>
                    <th>Company Name</th>
                    <th>Country</th>
                    <th>Founded Year</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($allCompanies as $company) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($company['company_name']); ?></td>
                        <td><?php echo htmlspecialchars($company['country']); ?></td>
                        <td><?php echo htmlspecialchars($company['founded_year']); ?></td>
                        <td>
                            <a class="links" href="viewmodels.php?company_id=<?php echo $company['company_id']; ?>">View Models</a>
                            <a class="links" href="editcompany.php?company_id=<?php echo $company['company_id']; ?>">Edit</a>
                            <a class="links" href="deletecompany.php?company_id=<?php echo $company['company_id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>
</body>

</html>