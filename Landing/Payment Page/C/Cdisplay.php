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
            <th><b>UserID</b></th>
            <th><b>Email</b></th>
            <th><b>Message</b></th>
            
        </tr>

        <?php
        require 'Conn.php';
        $sql = "SELECT * FROM contact";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) 
        {
            while ($row = $result->fetch_assoc()) 
            {                                      
                $id = $row["id"];
         
                echo "<tr>";

                echo "<td style='text-align:left'>" . $row["UserID"] . "</td>";
                echo "<td style='text-align:left'>" . $row["Email"] . "</td>";
                echo "<td style='text-align:left'>" . $row["Message"] . "</td>";
               
                
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