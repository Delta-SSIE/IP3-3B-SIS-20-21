<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <!-- Bootstrap-->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title>Připojení k DB</title>
    </head>
    <body class="container">
        <?php
        $host = '127.0.0.1';
        $db = 'ip_3';
        $user = 'www-aplikace';
        $pass = 'Bezpe4n0Heslo.';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        $pdo = new PDO($dsn, $user, $pass, $options);

        $fields = [
            "name" => "Název",
            "phone" => "Tel.",
            "no" => "Číslo"
        ];

        //        $stmt = $pdo->query('SELECT name, phone, no FROM room ORDER BY no');
        $stmt = $pdo->query('SELECT ' .implode(',', array_keys($fields)) . ' FROM room ORDER BY no');

        if ($stmt->rowCount() == 0) {
            echo "Záznam neobsahuje žádná data";
        } else {
            $html = "<table class='table table-striped'>";
                $html .= "<tr>";
                foreach ($fields as $field) {
                    $html .= "<th>" . htmlspecialchars( $field ) . "</th>";
                }
                $html .= "</tr>";

            while ($row = $stmt->fetch() ) { //nebo foreach ($stmt as $row)
                $html .= "<tr>";
//                $html .= "<td>" . $row["no"] . "</td>";
//                $html .= "<td>" . $row["name"] . "</td>";
//                $html .= "<td>" . $row["phone"] . "</td>";
                foreach (array_keys($fields) as $field) {
                    $html .= "<td>" . htmlspecialchars( $row[$field] ) . "</td>";
                }
                $html .= "</tr>";
            }

            $html .= "</table>";
            echo $html;
        }
        unset($stmt);
        ?>
    </body>
</html>