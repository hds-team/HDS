<?php
		$row = $query->row_array();
?>
<html>
<head>
<style>
h1{
    color: #333333;
	margin-left: 8.5cm;
	margin-top: 2cm;
	font-size: 22px;
	font-weight: bold;
}
h2{
    color: #333333;
	margin-left: 8.5cm;
	font-size: 16px;
}
.head{
	 background-color:white; 
	 font-size: 20px;
	 color:black;
	 margin: 70px;	
}
p{
	margin-left: 5cm;
	font-weight: bold;
}
table{
	margin-left: 5cm;
}

</style>
</head>
<body>
	<div class = "head"><br>
	<h1><img src> แบบฟอร์มคำร้อง </h1>
	<h2> ระบบช่วยเหลือผู้ใช้ (Help Desk System: HDs)</h2>
	<div style= "margin-left:2cm; width:60%; height:3px; background:#333333; -webkit-border-top-right-radius: 10px; border-radius: 0px 10px 0px 0px;"></div>
	
	<div>
        <div>  
            <div>
                <table style="color:#333333">
                    <tbody>
                    	<tr class="odd"><br>
                        	<th> ชื่อเรื่อง </th>
							<td> : </td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row['rq_subject'];?> </td>
                        </tr>
	                    <tr class="even">
                        	<th> ระบบ </th>
							<td> : </td>
							<td>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row['StNameT'];?> </td>
                        </tr>
    	                <tr class="odd">
                        	<th> ประเภท </th>
							<td> : </td>
                        	<td>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row['ct_name'];?> </td>
                        </tr>
						<tr class="even">
                        	<th> หมวด </th>
							<td> : </td>
							<td>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row['kn_name'];?> </td>
						</tr>
                        <tr class="odd">
                        	<th> ระดับความสำคัญ </th>
							<td> : </td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row['lv_name'];?> </td>
                        </tr>
                        <tr class="even">
                        	<th> วันที่ส่ง </th>
							<td> : </td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row['rq_date'];?> </td>
                        </tr>
                        <tr class="odd">
                        	<th> กำหนดส่ง </th>
							<td> : </td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row['rq_date'];?> </td>
                        </tr>
						<tr class="even">
                        	<th> ช่องทางการติดต่อ </th>
                        </tr>
						<tr class="odd">
							<th>&nbsp;&nbsp; เบอร์โทร </th>
							<td> : </td>
							<td>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row['rq_date'];?> </td>
						</tr>
						<tr class="even">
							<th>&nbsp;&nbsp; อีเมล </th>
							<td> : </td>
							<td>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row['rq_date'];?> </td>
						</tr>
						<tr class="odd">
							<th>&nbsp;&nbsp; อื่นๆ </th>
							<td> : </td>
							<td>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row['rq_date'];?> </td>
						</tr>
                        <tr class="odd">
                        	<th> องค์กร </th>
							<td> : </td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row['dpName'];?> </td>
                        </tr>
                        <tr class="even">
                        	<th> ผู้ส่ง </th>
							<td> : </td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row['UsName'];?> </td>
                        </tr>
                        <tr class="odd">
                        	<th> รายละเอียด : </th>
							<td> : </td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row['rq_detail'];?> </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
	<?php
		//$row = $query->row_array();
		//echo "ลำดับ = ".$row['rq_id']."<br>";
		//echo "<p>"."เรื่อง  : ".$row['rq_subject']."<br>"."<br>";
		//echo "หมวด = ".$row['kn_name']."<br>"."<br>";
		//echo "ประเภท = ".$row['ct_name']."<br>"."<br>";
		//echo "ระดับความสำคัญ = ".$row['lv_name']."<br>"."<br>";
		//echo "ระบบ = ".$row['StNameT']."<br>"."<br>";
		//echo "วันที่ส่ง = ".$row['rq_date']."<br>"."<br>";
		//echo "องค์กร = ".$row['dpName']."<br>"."<br>";
		//echo "ผู้ส่ง = ".$row['UsName']."<br>"."<br>";
		//echo "รายละเอียด = ".$row['rq_detail'];
	?>
	<br><br>
	<div style= " margin-left: 2cm; width:60%; height:3px; background:#333333; -webkit-border-top-right-radius: 10px; border-radius: 0px 10px 0px 0px;"></div>
	<br><br><br><br>
	</div>
</body>
</html>