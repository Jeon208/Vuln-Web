<?php

        // Define 'id', 'pw'
        $id = $_GET['id_param']; // 'id_param' from 'GET' Method

        $pw = $_GET['pw_param'];


        // Define 'db_conn'
        $db_conn = mysqli_connect("127.0.0.1", "webhacking_db", "webhacking", "login"); // installed ip(mysql), database name, password, to use database ... db_conn = result of mysqli_connect()

        // When error is caused
        if($db_conn == false){

                echo mysqli_connect_error();

        }

        // When a connection is successful
        else{

                $query = "select * from user where id='{$id}' and pw='{$pw}'"; // Check id and pw
                $result = mysqli_query($db_conn, $query); // 'result' : result
                echo "query : {$query} <br>";

                // When error is caused
                if($result == false){

                        echo mysql_error($db_conn);

                }

                // When a connection is successful
                else{

                        $row = mysqli_fetch_array($result); // <mysqli_fetch_array()>  First try : the top of 'result' .. Second try : next top of 'result'

                        if($row) { // 0, false, NULL == false .. others == true .. => When id and pw are right
                                echo "Hello {$row['id']}, login success!"; // Show id and messages
                        }

                        // When id and pw are not right
                        else {
                                echo "login failed";
                        }
                }

                mysqli_close($db_conn); // Connection close
        }

?>