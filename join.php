<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Team Members</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    
    <p>
        <?php
            $first = filter_input(INPUT_GET, "firstName");
            $last  = filter_input(INPUT_GET, "lastName");
            try
            {
                $con = new PDO("mysql:host=127.0.0.1;dbname=homework", "root", "");
                $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                if ((strlen($first) > 0) && (strlen($last) > 0))
                {
                    $query = $con->prepare("SELECT Courses FROM schedule, records ".
                            " WHERE records.name = :name ".
                            "AND records.id = schedule.id ");
                    $query->execute(array(':name' => "$first $last"));
                    $data = $query->fetchAll(PDO::FETCH_ASSOC);
                }
                print "<h1 class='title'>$first $last</h1>";
                print "<table border='1'>\n";
                $doHeader = true;
                foreach ($data as $row)
                {
                    if ($doHeader)
                    {
                        print "        <tr>\n";
                        foreach ($row as $name => $value)
                        {
                            print "            <th>$name</th>\n";
                        }
                        print "        </tr>\n";

                        
                        $doHeader = false;
                    }
                    print "            <tr\n>";
                    foreach ($row as $name => $value)
                    {
                          print "                <td>$value</td>\n";
                    }
                    print "            </tr\n>";
                    
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
