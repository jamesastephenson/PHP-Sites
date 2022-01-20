<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Table Site January 2022</title>
    <link rel="stylesheet" type="text/css" href="./style.css">
</head>

<body>
    <div class="container">
        <!-- Title Banner -->
        <div class="bannerSection">
            <h1>Data Table Site January 2022</h1>
        </div>

        <!-- Reiterate form so page can be re-used / called -->
        <form name="form" method="post" action="" class="controls">
            <h3 class="controlsTitle">Controls</h3>

            <label>Sort By: &nbsp;</label>
            <select name="option" method="post">
                <option value="Name">Name</option>
                <option value="Email">Email</option>
                <option value="Zip Code">Zip Code</option>
                <option value="Customer Code">Customer Code</option>
                <option value="Transaction Total">Transaction Total</option>
            </select>
            <br><br>

            <label for="minTransaction">Min transaction value (0-10000):</label>
            <input type="number" name="minTransaction" min="0" max="10000" value="0">
            <br><br>

            <input type="radio" name="order" value="ascending" checked="checked">
            <label for="order">Ascending</label>
            <input type="radio" name="order" value="descending">
            <label for="order">Descending</label>
            <br>

            <button type="submit" name="submit" onsubmit="this.form.submit()" class="submit">Submit</button>
        </form> 

        <!-- Table -->
        <div class="tableSection">
            <?php
                // assign vars for server connection
                $serverName = "localhost";  $dbUsername = "root";
                $dbPassword = "";  $dbName = "january_2022";
                $connect = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

                // check connection is working
                if (!$connect) {
                    die("Connection failed: ".mysqli_connect_error());
                } else {
                    $option = $_POST["option"];
                    $order = $_POST["order"];
                    $minTransaction = $_POST["minTransaction"];
                }

                // Call main function, pass in order / filter options and SQL connection var
                sortData($option, $order, $minTransaction, $connect);

                // Sort based on user controls, connect to SQL server (localhost in this case), generate table
                function sortData($selection, $ordering, $minSpent, $connection) {
                    // define var for ORDER BY section of SQL req
                    if ($selection == "-") {echo '<h2 class="tableTitle red">Please select an option.</h2>';}
                    else if ($selection == "Name") {$sortVar = "name";}
                    else if ($selection == "Email") {$sortVar = "email";}
                    else if ($selection == "Zip Code") {$sortVar = "postalZip";}
                    else if ($selection == "Customer Code") {$sortVar = "alphanumeric";}
                    else if ($selection == "Transaction Total") {$sortVar = "transaction";}
                    else {echo '<h2 class="tableTitle red">What did you do?</h2>';}

                    // define ASC / DESC for ORDER BY section of SQL req
                    if ($ordering == "descending") {$orderVar = "DESC";}
                    else {$orderVar = "ASC";}

                    // generate SQL Request
                    $sqlRequest = "
                    SELECT * 
                    FROM users 
                    WHERE transaction >= ".$minSpent." 
                    ORDER BY ".$sortVar." ".$orderVar.";";

                    // -> is used to call a method or access a property on the object of a class
                    // => is used to assign values to keys of an array
                    $result = $connection->query($sqlRequest);
                    echo '<h2 class="tableTitle">Sorting by '.$selection.' ('.strtolower($orderVar).'ending)</h2>';

                    // loop through SQL database
                    if ($result->num_rows > 0) {
                        // initialize table
                        echo '<table class="table">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Zip Code</th>
                            <th>Customer Code</th>
                            <th>Total</th>
                        </tr>';

                        // generate table rows, style zebra stripe effect
                        $rowCount = 1;
                        while ($row = $result->fetch_assoc()) {
                            if ($rowCount % 2 == 0 ) {
                                echo '<tr class="evenRow">
                                    <td>'.$row["name"].'</td>
                                    <td>'.$row["email"].'</td>
                                    <td>'.$row["postalZip"].'</td>
                                    <td>'.$row["alphanumeric"].'</td>
                                    <td>$'.$row["transaction"].'</td>
                                </tr>';
                            }
                            else if ($rowCount % 2 != 0 ) {
                                echo '<tr class="oddRow">
                                    <td>'.$row["name"].'</td>
                                    <td>'.$row["email"].'</td>
                                    <td>'.$row["postalZip"].'</td>
                                    <td>'.$row["alphanumeric"].'</td>
                                    <td>$'.$row["transaction"].'</td>
                                </tr>';
                            }
                            $rowCount += 1;
                        }
                    } else {
                        echo '<h2 class="tableTitle red">no results</h2>';
                    }
                    $connection->close();  // end connection
                }
            ?>
            </table> <!-- complete table -->
        </div>
        <!-- Footer -->
        <footer class="footer">James Stephenson 2022</footer>
    </div>
</body>
</html>