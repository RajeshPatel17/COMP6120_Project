<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COMP6120 Final Rajesh Patel rrp0019</title>
    <link rel="stylesheet" href="style.css">



</head>

<body class="home">

    <h1>Database Query Form for Rajesh Patel (rrp0019) </h1>

    
    <label for="SQL Input">Input SQL Here:</label>
    <form method="get" name="form" action="api.php">
    <input type="text" id="SQL Input" name="SQL Input" class="inputBox">
        <div class="buttons">
            <button type="button" onclick="submit();">Submit Query</button>
            <button type="button" onclick="document.getElementById('SQL Input').value = '';">Clear Query</button>    
        </div>
    </form>

    <script type="text/javascript">
        function submit(){
            var sqlQuery = document.getElementById("SQL Input").value;
            if (sqlQuery.match(/drop/i)){
                alert("DROP Statements Are Forbidden");
                document.getElementById("SQL Input").value = '';
            }else{
                alert(sqlQuery);
                //const connection = <?php //echo connect();?>;
                //alert(connection)
            }
        }
    </script>

</body>
</html>