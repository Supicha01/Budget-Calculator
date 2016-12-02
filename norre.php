<?php
// LightBlue #99ccff
	//<label for="name">Username:</label>
	 echo "<body style='background-color:#99ccff'>";
?>
<style type="text/css">  
.center_div {  
    margin:auto;
    width:23%; 
    background-color:#99ccff;  
    
} 
</style>

<script type="text/javascript">
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
</script>

<body>
 <font color=SlateBlue  size='10pt'>Budget Calculator</font><br>
 
<form  action = 'revenueMem.php' method = 'GET','POST'>


   <table border="0" align="center" style="width:200" > 
        	<tr> <th>เดือน</th> <th>ปี</th> </tr>
            <tr> 
            	<td>
                    <p align="center">
                        <select name="m">
                        <?php
                        for($i=1;$i<=12;$i++){
                            echo "<option value='$i'>$i</option>";
                        }
                        ?>
                        </select>
                    </p>
                </td>
            	
            	<td>
                	<p align="center">
                        <select name="year">
                        <?php
                        for($i=1800;$i<=2216;$i++){
                            echo "<option value='$i'>$i</option>";
                        }
                        ?>
                        </select>
                    </p>
                </td> 
            </tr>
        </table>
<fieldset style="border: #0044cc  solid;">
	<legend>
		 <font color=#0044cc  size='5pt'>รายได้</font>
	</legend>
 
<div class="center_div">    
	<table border="0" cellspacing="0" cellpadding="5" style="width: 400px">
    	<tbody>
	 		<tr>
	  		<td>เงินเดือน</td>
	  		<td>
	  			<input min=0 type='Text' name = 'เงินเดือน' value=0 onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}"/>บาท
	  		</td>
	  		</tr>
	  		<tr>
			<td>เงินบำนาญ</td>
			<td>
				<input min=0 type='Text' name = 'เงินบำนาญ'value=0  onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}"/>บาท
			</td>
		  	</tr>
		  	<tr>
		  	<td>รายได้จากการลงทุน</td> 
		  	<td>
		  		<input min=0 type='Text' name = 'รายได้จากการลงทุน' value=0 onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}"/>บาท
		  	</td>
			</tr>
			<tr>
			<td>รายได้พิเศษ </td>
			<td>
				<input min=0 type='Text' name = 'รายได้พิเศษ' value=0 onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}"/>บาท<br>
			</td>
		  	</tr>
	  	</tbody>
	</table>
		
</div>
</fieldset>
   
   <br>
   
<fieldset style="border: #0044cc  solid;">
	<legend>
 		<font color=#0044cc  size='5pt'>รายจ่าย<body style='background-color:#99ccff'></font>
	</legend>
 
 <div align="center"> 
 	<p style="color: #ffffff; background-color: #33cccc"> ค่าที่พักอาศัย</p>
 </div>
 
 <div class="center_div">  
 	<table border="0" cellspacing="0" cellpadding="5" style="width: 460px">
    	<tbody>
			<tr>
	        <td>ค่าเช่าบ้าน</td>
	        <td>
	        	<input min=0 type='Text' name = 'บ้าน' value=0  onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}"/>บาท
			</td>
			</tr>
	 		<tr>
			<td>ค่าหอ</td>
			<td>
				<input min=0 type='Text' name = 'หอ' value=0 onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}"/ >บาท
			</td>
			</tr>
	 		<tr>
			<td>ค่าคอนโด</td>
			<td><input min=0  type='Text' name = 'คอน' value=0 onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}"/ >บาท
			</td>
			</tr>
	 		<tr>
			<td>ค่าที่พักอาศัยอื่นๆ(โรงแรม,รีสอร์ทฯ)</td>
			<td><input min=0 type='Text' name = 'พักอื่นๆ' value=0 onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}"/ >บาท
			</td>
			</tr>
		</tbody>
		</table>
 </div>
 
<div align="center">   
	<p style="color: #ffffff; background-color: #33cccc">ค่าดำรงชีพ</p>
</div>
 
 <div class="center_div">  
 	<table border="0" cellspacing="0" cellpadding="5" style="width: 400px">
    	<tbody>
			<tr>
			<td>สิ่งจำเป็นเพื่อการดำรงชีพ</td> 
			<td><input min=0 type='Text' name = 'การดำรงชีพ' value=0 onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}"/>บาท <br>
			</td>
			</tr>
			<tr>
 			<td>ค่าน้ำ,ค่าไฟ</td>
 			<td><input min=0 type='Text' name = 'น้ำ'value=0 onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}"/ >บาท<br>
			</td>
			</tr>
			<tr>
			<td>ค่าเดินทาง</td>
			<td><input min=0 type='Text' name = 'เดินทาง' value=0 onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}"/>บาท<br>
			</td>
			</tr>
			<tr>
			<td>ค่าเสื้อผ้า</td>
			<td><input min=0 type='Text' name = 'ค่าเสื้อผ้า' value=0 onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}"/>บาท<br>
			</td>
			</tr>
			<tr>
			<td>ค่าสิ่งบันเทิง</td>
			<td><input min=0 type='Text' name = 'ค่าสิ่งบันเทิง'value=0 onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}"/>บาท<br>
 			</td>
			</tr>
 		</tbody>
		</table>
 </div>
 	
 
<div align="center">
	<p style="color: #ffffff; background-color: #33cccc">เงินออมและเงินลงทุน</p>
</div>
  
<div class="center_div">  
 	<table border="0" cellspacing="0" cellpadding="5" style="width: 800px">
    	<tbody>
			<tr>  
			<td>เงินออม</td>
			<td><input min=0 type='Text' name = 'ออม' value=0 onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}"/>บาท
			</td>
			</tr>
			<td>หุ้น</td>
			<td><input min=0 type='Text' name = 'หุ้น' value=0 onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}"/>บาท
      		</td>
			</tr>
		</tbody>
	</table>
</div>	
			
<div align="center">			
	<p style="color: #ffffff; background-color: #33cccc">ค่ารักษาสุขภาพ</p> 
</div>

<div class="center_div">  
 	<table border="0" cellspacing="0" cellpadding="5" style="width: 500px">
    	<tbody>
			<tr>
			<td>ค่าประกันสุขภาพ</td>
			<td><input min=0 type='Text' name = 'ภาพ' value=0 onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}"/>บาท<br>
        	</td>
        	</tr>
        	<td>ค่ายาอื่นๆ</td>
        	<td><input min=0  type='Text' name = 'ยา' value=0 onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}"/>บาท<br>
        	</td>
			</tr>
		</tbody>
	</table>
</div>		


<div align="center">		
	<p style="color: #ffffff; background-color: #33cccc">การศึกษา</p> 
</div>

<div class="center_div"> 
	<table border="0" cellspacing="0" cellpadding="5" style="width: 500px">
    	<tbody>
			<tr>
			<td>ค่าเรียนเล่าเรียน</td>
			<td><input min=0 type='Text' name = 'เรียน' value=0 onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}"/ >บาท<br>
	    	</td>
			</tr>
	    	<td>ค่าใช้จ่ายอื่นๆ(หนังสือ,ทัศนศึกษาฯ)</td>
	    	<td><input  min=0 type='Text' name = 'เรียนอื่นๆ' value=0 onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}"/>บาท<br>
			</td>
			</tr>
		</tbody>
	</table>
</div>
	
</fieldset>
	<p><br>
<div align="center"> 
	  
	  <input type="submit" name="Calculate" value="Calculate" style="background: #84e184;" >
      &nbsp;&nbsp;&nbsp;&nbsp;
	  <input name="Back" type="button" style="background: #0CF;" onClick="MM_goToURL('parent','regis.php');return document.MM_returnValue" value="Back" >
</p>
    
</body>
</form>	 

