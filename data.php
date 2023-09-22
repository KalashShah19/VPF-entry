<!DOCTYPE html>
<html>
<head>
    <title> Visitors Data </title>
    <style>
        .card-container {
            text-align: center;
        }

        .card {
            width: 25%;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 5px;
            margin-bottom: 20px;
            margin-left: 10px;
            display: inline-block;
        }
        
        .card-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        
        .card-data {
            font-size: 14px;
            margin-bottom: 10px;
        }

        .card-link {
            font-size: 14px;
            color: #007bff;
            text-decoration: none;
        }
    
        @media screen and (max-width: 580px) {
            .card {
                /* width: 100%; */
                padding: 10px;
            }
    
            .card-title {
                font-size: 16px;
            }
    
            .card-data {
                font-size: 12px;
            }
        }

        * {
            box-sizing: border-box;
        }

        .navbar {
            overflow: hidden;
            background-color: #333;
            text-align: center;
        }
        
        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
        
        body {
            font-family: Arial, sans-serif;
            background-color: black;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .active {
            background-color: #4CAF50;
        }
    </style>
</head>

<body>
    <?php 
    $conn=mysqli_connect("sql12.freesqldatabase.com","sql12647865","swC7yDKF1Q","sql12647865") or die("Failed to connect");
    $sql = 'select count(Name) as count from visitors;';
    $sql4 = 'select count(Name) as attended from visitors where Status = "Attended";';
    $data4 = mysqli_query($conn, $sql4);
    foreach ($data4 as $item4) {
        $attended = $item4['attended'];
    }
    $data = mysqli_query($conn, $sql);
    foreach ($data as $item) {
        $count = $item['count'];
    }
    ?>
    <h1 style='text-align:center;color:white'> Registrations - <?php echo $count; ?> </h1>
    <h1 style='text-align:center;color:white'> Attended - <?php echo $attended; ?> </h1>

    <center>
    <?php
    $sql2 = 'select * from visitors;';
    $data = mysqli_query($conn, $sql2);
    foreach ($data as $item) {
        $name = $item['Name'];
        $email = $item['Email'];
        $number = $item['Mobile_Number'];
        $company = $item['Company_Name'];
        $city = $item['City'];
        echo "
        <div class='card'>
            <p class='card-data'> Name : $name </p>
            <p class='card-data'> Number : $number </p>
            <p class='card-data'> Company : $company </p>
            <p class='card-data'> City : $city </p>
            <p class='card-data'> Email : $email </p>
        </div>";
    }
    ?>
    </center>
    
    </body>
</html>    