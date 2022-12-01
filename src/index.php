<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COMP6120 Final Rajesh Patel rrp0019</title>
    <link rel="stylesheet" href="style.css">
    <script language="JavaScript" type="text/javascript", src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body class="home">

    <h1>Database Query Form for Rajesh Patel (rrp0019) </h1>

    
    <label for="SQL Input">Input SQL Here:</label>
    <textarea type="text" id="SQL Input" name="SQL Input" class="inputBox"></textarea>
    <div class="buttons">
        <button type="button" onclick="submit();">Submit Query</button>
        <button type="button" onclick="document.getElementById('SQL Input').value = '';">Clear Query</button>
        <button type="button" onclick="clearOutput();">Clear Output</button>   
    </div>
        <label for="SQL Output">Output:</label>
    <div id= "output" name="output">
        
    </div>

    
    <script>
        function clearOutput(){
            document.getElementById("output").innerText = '';
            document.getElementById("output").innerHTML = '';
        }
        function submit(){
            var sqlQuery = document.getElementById("SQL Input").value;
            if (sqlQuery.match(/drop/i)){
                clearOutput();
                alert("DROP Statements Are Forbidden");
                document.getElementById("SQL Input").value = '';
            }else{
                apiCall(sqlQuery);
            }
        }
        function apiCall(query){
            if(query != 0){
                $.ajax({
                    url: "api.php", 
                    type: "get",
                    data: {
                        query: query
                    },
                    success: function(data) {
                        if (data != ""){
                            print(data);
                        } else {
                            print("error");
                        }
                    }, 
                });
            }
        }
        function print(data){
            try{
                let jsonData = JSON.parse(data);
                htmlBuilder = "<table>";
                htmlBuilder += "<tr>";
                keys = Object.keys(jsonData[0]);
                for(var i = 0; i < keys.length; i++){
                    htmlBuilder += "<th>" + keys[i] + "</th>";
                }
                htmlBuilder += "</tr>";
                for(var i = 0; i < jsonData.length; i++){
                    for(var j = 0; j < keys.length; j++){
                        htmlBuilder += "<td>" + jsonData[i][keys[j]] + "</td>";
                    }
                    htmlBuilder += "</tr>";
                }
                htmlBuilder += "</table>";
                document.getElementById("output").innerHTML += htmlBuilder;
            } catch (e) {
                clearOutput();
                htmlBuilder = data;
                alert("Error with SQL Statement");
                document.getElementById("output").innerText = htmlBuilder;
            }
        }
    </script>

    

</body>
</html>