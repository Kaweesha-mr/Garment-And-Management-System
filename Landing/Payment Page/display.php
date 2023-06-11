<html>
    <head>
    <script>
        
        function delete_dataa(id)
		{
			if(confirm('Are you sure to delete the record ?'))
			{
				window.location.href = 'delete.php?id='+id;
			}
		}

        function editRecord(id) 
        {
            window.location ='editpayment.php?id=' + id;
        }
     
    </script>
	</head> 
    <div class="productData" id="tbl">
    <table border="5" width="100%">
        <tr>
            <th><b>FirstName</b></th>
            <th><b>LastName</b></th>
            <th><b>Address</b></th>
            <th><b>City</b></th>
            <th><b>State</b></th>
            <th><b>ZipCode</b></th>
            <th><b>CardNumber</b></th>
            <th><b>ExpireMonth</b></th>
            <th><b>ExpireYear</b></th>
            <th><b>CVV</b></th>
            
        </tr>

        <?php
        require 'connection.php';
        $sql = "SELECT * FROM cart";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) 
        {
            while ($row = $result->fetch_assoc()) 
            {                                      
                $id = $row["id"];
         
                echo "<tr>";

                echo "<td style='text-align:left'>" . $row["FirstName"] . "</td>";
                echo "<td style='text-align:left'>" . $row["LastName"] . "</td>";
                echo "<td style='text-align:left'>" . $row["Address"] . "</td>";
                echo "<td style='text-align:left'>" . $row["City"] . "</td>";
                echo "<td style='text-align:left'>" . $row["State"] . "</td>";
                echo "<td style='text-align:left'>" . $row["ZipCode"] . "</td>";
                echo "<td style='text-align:left'>" . $row["CRD"] . "</td>";
                echo "<td style='text-align:left'>" . $row["EXmonth"] . "</td>";
                echo "<td style='text-align:left'>" . $row["EXyear"] . "</td>";
                echo "<td style='text-align:left'>" . $row["CVV"] . "</td>";

                echo"<td style = 'text-align:center'><center><input type='submit' value='Edit' onclick='editRecord($id)'></center></td>";
                echo "<td><center><button class='btndelpayment' type='submit' onclick='delete_dataa($id)'>Delete</button></center></td>";

                
                echo "</tr>";
            }
        } 
        else 
        {
            echo "No Results";
        }
        ?>
    </table>
</div>
</html>