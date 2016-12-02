 <font color=SlateBlue  size='10pt'>Budget Calculator</font><br>
  <form  action = 'nor.php'> 
  <fieldset style="border: #0044cc  solid;">
<legend>
	 <font color=#0044cc  size='5pt'>ผลการคำนวณ</font>
		</legend>
		
		<style type="text/css">  
.center_div {  
    margin:auto;
    width:23%; 
    background-color:#99ccff;  
    
} 
</style>
<?php

echo "<body style='background-color:#99ccff'>";
$calIn =0;$calpayall =0;$calH =0; $calLive =0; $calSave =0; $calHeal =0; $calStudy =0; $end=0;
	$c = new Cal();
	if(isset($_GET['Calculate'])){
		if(isset($_GET['เงินเดือน'])){	
		$cal = array($_GET['เงินบำนาญ'],$_GET['เงินเดือน'],$_GET['รายได้จากการลงทุน'],$_GET['รายได้พิเศษ']);
		$calIn=$c->add($cal);
		
		$calP = array($_GET['บ้าน'],$_GET['หอ'],$_GET['คอน'],$_GET['พักอื่นๆ']);
		$calH = $c->add($calP);
			
		$calP2 = array($_GET['การดำรงชีพ'],$_GET['น้ำ'],$_GET['เดินทาง'],$_GET['ค่าเสื้อผ้า'],$_GET['ค่าสิ่งบันเทิง']);
		$calLive =  $c->add($calP2);
		
		$calP3 = array($_GET['ออม'],$_GET['หุ้น']);
		$calSave =   $c->add($calP3);
		
		$calP4 = array($_GET['ภาพ'],$_GET['ยา']);
		$calHeal =   $c->add($calP4);
				
		$calP5 = array($_GET['เรียน'],$_GET['เรียนอื่นๆ']);
		$calStudy = $c->add($calP5);
				
		$calP6 = array($calH,$calLive,$calSave,$calHeal,$calStudy);	
		$calpayall =$c->add($calP6);
		
		$end =$c->delete($calIn,$calpayall);
		
		$de =0;
		if($c->checkEnd($end)){
			$de = -$end;
			$end=0;
		}
		$zz = 0;
		$perH =0; $perLive=0; $perSave=0; $perHeal=0; $perS=0;
		if($calIn!=0){
		$perH = $c->percent($calH,$calIn);
		$perLive = $c->percent($calLive,$calIn);
		$perSave = $c->percent($calSave,$calIn);
		$perHeal = $c->percent($calHeal,$calIn);
		$perS =  $c->percent($calStudy,$calIn);
		$b = array($perH,$perLive,$perSave,$perHeal,$perS);
		$zz = $c->balancePer($b);
		}
		
		echo "<div class='center_div'>";
		echo "<table border='0' cellspacing='0' cellpadding='5' style='width: 400px'> <tbody>";
		echo "<tr> <td>รวมเงินรายได้ทั้งหมด</td>			<td><p align = 'right'>$calIn</p></td>		</tr>";
		echo "<tr> <td>รวมเงินรายจ่ายทั้งหมด</td>			<td><p align = 'right'>$calpayall</p></td>	</tr>";
		echo "<tr> <td>คงเหลือ </td>					<td><p align = 'right'><font color=#FFFF00>$end</font></p></td>	</tr>";
		echo "<tr> <td>ใช้จ่ายเกิน </td>				<td><p align = 'right'><font color=#FF0000>$de<body 			
		style='background-color:#99ccff'></font></p></td>		</tr>";
		echo "<tr> <td>รวมค่าที่อยู่อาศัย </td>			<td><p align = 'right'>$calH</p></td>		</tr>";
		echo "<tr> <td>รวมค่าใช้จ่ายในการดำรงชีพทั้งหมด</td>	<td><p align = 'right'>$calLive</p></td>	</tr>";
		if($calIn<10000&&$calIn>0){
			if($perSave<5){
			echo "<tr> <td>รวมเงินออมและเงินลงทุนทั้งหมด </td><td><p align = 'right'>$calSave </p></td>
			<td><font color=Red >*ควรมีมากกว่า5% ของรายได้</font></td></tr>";	
			}
			else  echo "<tr> <td>รวมเงินออมและเงินลงทุนทั้งหมด </td>		<td><p align = 'right'>$calSave</p></td></tr>";
		}
		else if($calIn<100000&$calIn>=10000){
			if($perSave<10){
			echo "<tr> <td>รวมเงินออมและเงินลงทุนทั้งหมด </td><td><p align = 'right'>$calSave </p></td>
			<td><font color=Red >*ควรมีมากกว่า10% ของรายได้</font></td></tr>";	
			}
			else  echo "<tr> <td>รวมเงินออมและเงินลงทุนทั้งหมด </td>		<td><p align = 'right'>$calSave</p></td></tr>";
		}
			else if($calIn>=100000){
			if($perSave<15){
			echo "<tr> <td>รวมเงินออมและเงินลงทุนทั้งหมด </td><td><p align = 'right'>$calSave </p></td>
			<td><font color=Red >*ควรมีมากกว่า15% ของรายได้</font></td></tr>";	
			}
			else  echo "<tr> <td>รวมเงินออมและเงินลงทุนทั้งหมด </td>		<td><p align = 'right'>$calSave</p></td></tr>";
		}
		
		echo "<tr> <td>รวมค่ารักษาสุขภาพทั้งหมด </td>		<td><p align = 'right'>$calHeal</p></td>	</tr>";
		echo "<tr> <td>รวมค่าการศึกษาทั้งหมด </td>			<td><p align = 'right'>$calStudy</p></td>	</tr>";
		echo "</tbody></table></div></fieldset><br>";
		
			}		
		}

	if($de>0){
			if($calIn!=0){
			$de= $c->percent($de,$calIn);
			$zz= 0;
			}
			else if($calIn==0){
				$de=0;
			}
			$dataPoints =array( array("y" => $de, "name" => "ใช้จ่ายเกิน", "exploded" => true));
		}		
			else $dataPoints = array(
            array("y" => $perH, "name" => "ที่อยู่อาศัย", "exploded" => true),
            array("y" => $perLive, "name" => "ค่าใช้จ่ายในการดำรงชีพ"),
            array("y" => $perSave, "name" => "เงินออมและเงินลงทุน"),
            array("y" => $perHeal, "name" => "ค่ารักษาสุขภาพ"),
            array("y" => $perS, "name" => "ค่าการศึกษา"),
			array("y" => $zz, "name" => "คงเหลือ")
		);
		
?>
<?php 
class Cal{
	private $result;	
	function  __construct(){
		$this->result=0;	
	}
	
	function add(array $in){
		$this->result=0;
		$arrlength = count($in);
		for($x = 0; $x < $arrlength; $x++){
			if(empty($in[$x]))
				$in[$x] = 0;
			$this->result+=$in[$x];	
			}	
			return $this->result;
		}
		function delete($in,$x){	
		return $in-$x;
		}
		
		function percent($cal,$all){
		return ($cal*100)/$all;
		}
		function checkEnd($end){
			if($end<0){
			return  true;
			}
			else return false;
		}
		function balancePer(array $all){
		$arrlength = count($all);
		$this->result=100;
		for($x = 0; $x < $arrlength; $x++){
			 $this->result=$this->result-$all[$x];
			}
			return $this->result;
		}

	}
?>

   <div align="right" >         
  	<input type="submit" name="Back" value="Back" style="background: #84e184;" ></div>
    
</form>	
<!DOCTYPE html>
<html>
    <head>
        <script src="jquery-1.12.4.min.js"></script>
	<script src="canvasjs.min.js"></script>
    </head>
 
    <body>
 
        <div id="chartContainer"></div>
        <script type="text/javascript">
            $(function () {
                var chart = new CanvasJS.Chart("chartContainer",
                {
                    theme: "theme2",
                    title:{
                        text: "Calculate"
                    },
                    exportFileName: "Calculate",
                    exportEnabled: true,
                    animationEnabled: true,		
                    data: [
                    {      
                        type: "pie",
                        showInLegend: true,
                        toolTipContent: "{name}: <strong>{y}%</strong>",
                        indexLabel: "{name} {y}%",
                        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                    }]
                });
                chart.render();
            });
        </script>
    </body>
 
</html>
