<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Table Site January 2022</title>
    <link rel="stylesheet" type="text/css" href="./style.css">
</head>

<!-- MAY NEED TO MAKE A SEPARATE PHP FILE FOR WHEN FORM IS SUBMITTED, JUST COPY OVER BASE HTML LAYOUT-->
<body>
    <div class="container">
        <div class="bannerSection">
            <h1>Data Table Site January 2022</h1>
        </div>

        <!-- note: blank action attribute is essential for having this work on same page-->
        <form name="form" method="post" action="" class="controls">
            <h3 class="controlsTitle">Controls</h3>

            <label>Cool! A Dropdown!</label>
            <select name="option" onchange="this.form.submit();" method="post">
                <option value="-" selected="selected">-</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
        </form>

        <div class="tableSection">
            <!-- Dropdown selection test -->
            <?php
                $option = $_POST["option"];

                if ($option == "-") {print "<h2>Please select an option.</h2>";}
                else {print "<h2>You selected option ".$option."</h2>";}
            ?>

            <!-- THIS TABLE WILL BE REPLACED WITH DYNAMIC DATA -->
            <table class="table">
                <tr>
                    <th>First Name</th>
                    <th>Blood Type</th>
                    <th>Bone Type</th>
                    <th>Last Name</th>
                </tr>
                <tr class="oddRow">
                    <td>Jeff</td>
                    <td>A</td>
                    <td>glass</td>
                    <td>Jeffries</td>
                </tr>
                <tr class="evenRow">
                    <td>Joan</td>
                    <td>B</td>
                    <td>paper</td>
                    <td>Lark</td>
                </tr>
                <tr class="oddRow">
                    <td>Jeof</td>
                    <td>C</td>
                    <td>broth</td>
                    <td>Joffreys</td>
                </tr>
                <tr class="evenRow">
                    <td>Joober</td>
                    <td>????</td>
                    <td>????</td>
                    <td>Jooberov</td>
                </tr>
            </table>
        </div>
    </div>
    <footer>This is a footer</footer>
</body>
</html>