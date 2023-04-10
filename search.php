<?php


        // 'search_data' from GET Method
        echo "<b>{$_GET['search_data']}</b> Search Result <br>";

        $data = addslashes($_GET['search_data']); // Through addslashes()

        $db_conn = mysqli_connect("127.0.0.1", "webhacking_db", "webhacking", "portal"); // Installed ip(mysql), database name, password, to use database ... db_conn = result of mysqli_connect()

        // When error is caused
        if($db_conn == false) {

                echo mysqli_connect_error();

        }
        // When a connection is successful
        else{

                $query = "select * from search where content like '%{$data}%'"; // Select everything has the keyword 'data'

                $result = mysqli_query($db_conn, $query);

                // <table> : table .. <th> : top of row .. <td> : each cell
                // style - 1px 2 solid lines .. When lines overlap, show only one line
                echo "<table style='border:1px solid; border-collapse:collapse'>";

                echo "<th style='border:1px solid'>Search Result Contents</th>";

                // Error
                if($result==false) {

                        echo mysqli_error($db_conn);

                }

                // Not error
                else {
                        // Show results
                        // 'result' == NULL  ==>> false  ==>>  stop stream' 
                        while($row = mysqli_fetch_array($result)) {

                                echo "<tr><td style='border:1px solid'>{$row['content']}</td></tr>";

                        }

                }
                // close
                mysqli_close($db_conn);
        }
?>
