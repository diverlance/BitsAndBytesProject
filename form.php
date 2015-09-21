<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Team Members</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <h1 class="title">Team Member</h1>
    <p>
        <?php
            $first = filter_input(INPUT_GET, "firstName");
            $last  = filter_input(INPUT_GET, "lastName");
            $gender = filter_input(INPUT_GET, "gender");
            $major  = filter_input(INPUT_GET, "major");
            $phone = filter_input(INPUT_GET, "phone");

            try
            {
                $con = new PDO("mysql:host=localhost;dbname=Assignment1", "root", "G0Sharks");
                $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                if ((strlen($first) > 0) && (strlen($last) > 0))
                {
                    $query = "SELECT * FROM members ".
                             "WHERE first = '$first' ".
                             "AND   last  = '$last' ".
                             "AND   gender  = '$gender' ".
                             "AND   major  = '$major' ";
                }
                else
                {
                    $query = "SELECT * FROM members ".
                             "WHERE   gender  = '$gender' ".
                             "AND   major  = '$major' ";
                }

                print "<table border='1'>\n";
                $data = $con->query($query);
                $data->setFetchMode(PDO::FETCH_ASSOC);
                $doHeader = true;
                foreach ($data as $row)
                {
                    if ($doHeader)
                    {
                        print "        <tr>\n";
                        foreach ($row as $name => $value)
                        {
                          if($name=="phone")
                          {
                            if($phone=="true")
                              print "                <th>$name</th>\n";
                          }
                          else
                            print "            <th>$name</th>\n";
                        }
                        print "        </tr>\n";

                        $doHeader = false;
                    }
                    print "            <tr>\n";
                    foreach ($row as $name => $value)
                    {
                        if($name=="phone")
                        {
                          if($phone=="true")
                            print "                <td>$value</td>\n";
                        }
                        else
                          print "                <td>$value</td>\n";
                    }
                    print "            </tr>\n";
                }
                print "        </table>\n";
            }
            catch(PDOException $ex)
            {
                echo 'ERROR: '.$ex->getMessage();
            }
        ?>
    </p>
</body>
</html>
