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
        <div class="bannerSection">
            <h1>Data Table Site January 2022</h1>
        </div>

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
            <input type="submit" name="submit" onsubmit="this.form.submit()">
        </form>

        <div class="tableSection">
            
            <table class="table">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Zip Code</th>
                    <th>Customer Code</th>
                    <th>Total</th>
                </tr>
            <?php
                // assign vars for server connection
                $serverName = "localhost";  $dbUsername = "root";
                $dbPassword = "";  $dbName = "january_2022";
                $connect = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

                // connection is working
                if (!$connect) {
                    die("Connection failed: ".mysqli_connect_error());
                } else {
                    $option = $_POST["option"];
                }

                function sortData($selection) {
                    // reiterating vars for allowing additional selection
                    $serverName = "localhost";  $dbUsername = "root";
                    $dbPassword = "";  $dbName = "january_2022";
                    $connect = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

                    //lmao
                    if ($selection == "-") {echo '<h2 class="tableTitle red">Please select an option.</h2>';}
                    else if ($selection == "Name") {$sortVar = "name";}
                    else if ($selection == "Email") {$sortVar = "email";}
                    else if ($selection == "Zip Code") {$sortVar = "postalZip";}
                    else if ($selection == "Customer Code") {$sortVar = "alphanumeric";}
                    else if ($selection == "Transaction Total") {$sortVar = "currency";}
                    else {echo '<h2 class="tableTitle red">What did you do?</h2>';}

                    $sqlRequest = "
                    SELECT * 
                    FROM users 
                    ORDER BY ".$sortVar;  // add DESC to descend order

                    // -> is used to call a method or access a property on the object of a class
                    // => is used to assign values to keys of an array
                    $result = $connect->query($sqlRequest);
                    print '<h2 class="tableTitle">Sorting by '.$selection.'</h2>';

                    if ($result->num_rows > 0) {
                        $rowCount = 1;
                        while ($row = $result->fetch_assoc()) {
                            if ($rowCount % 2 == 0 ) {
                                echo '<tr class="evenRow">
                                    <td>'.$row["name"].'</td>
                                    <td>'.$row["email"].'</td>
                                    <td>'.$row["postalZip"].'</td>
                                    <td>'.$row["alphanumeric"].'</td>
                                    <td>'.$row["currency"].'</td>
                                </tr>';
                            }
                            if ($rowCount % 2 != 0 ) {
                                echo '<tr class="oddRow">
                                    <td>'.$row["name"].'</td>
                                    <td>'.$row["email"].'</td>
                                    <td>'.$row["postalZip"].'</td>
                                    <td>'.$row["alphanumeric"].'</td>
                                    <td>'.$row["currency"].'</td>
                                </tr>';
                            }
                            $rowCount += 1;
                        }
                    } else {
                        echo "no results";
                    }
                    $connect->close();
                }
                
                sortData($option);
            ?>
            </table>
        </div>
        <footer>This is a footer</footer>
    </div>
</body>
</html>