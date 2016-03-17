<?php
session_start();
// if($_POST['action']=='editProdAction'){
// 	doEditProd();
// }
switch ($_POST['action']) {
	case 'add':
		doAddProd();
		break;
	case 'insertCoverImg':
		doAddProdImgCover();
		break;
	case 'editProdDlg':
		doEditDlgShow();
		break;
	case 'editProdAction':
		doEditProd();
		break;
	case 'deleteProd':
		doDeleteProd();
		break;
	case 'showProductDetailHome':
		doShowProductDetailHome();
		break;
	case 'showProdPic':
		doShowProdPic();
		break;
}

	$productField = array();
    function doAddProd(){
    	$productName = $_POST['productName'];
		$productDescription = $_POST['productDescription'];
		$productPrice = $_POST['productPrice'];
		$categoryId = $_POST['categoryId'];
		$HotItem = $_POST['HotItem'];
		$addBy = $_SESSION["login"]["adminName"];
		$anser = array();
		
		$error = '';
		if ($productName == ''||!isset($productName)) {
			$error = $error.'กรุณาใส่ชื่อสินค้า';
		}
		if($productDescription==''||!isset($productDescription)){
			$error =  $error.'กรุณาใส่ข้อมูลสินค้า';
		}
		if($productPrice == ''||!isset($productPrice)){
			$error =  $error.'กรุณาใส่ราคาสินค้า';
		}
		if ($error !='') {
			$anser = array('tf'=>'f','etext'=>$error);
		}
		elseif($error==''){
		include_once("setting/database_setting.php");
			$con = connect_db();
			$sql_is = "insert into product(productName,productDescription,price,categoryId,addBy,addOn,hot)
						values('$productName','$productDescription',$productPrice,$categoryId,'$addBy',NOW(),'$HotItem')
						";			
			if(!mysqli_query($con,$sql_is))
			{
				die("เพิ่มข้อมูลไม่สำเร็จเพราะ :".mysqli_error($con));
			}
			$newProduct_id = mysqli_insert_id($con);
			mysqli_close($con);
			$_SESSION['proInsertId'] = $newProduct_id;
			$anser = array('tf'=>'t');
		}
		echo json_encode($anser);
	}
	
	function doAddProdImgCover(){
		$filename = $_FILES['proCoverImg']['tmp_name'];
		$fileType = $_FILES['proCoverImg']['type'];
		$name_file = $_FILES["proCoverImg"]["name"];
		$upload_file = "product_cover_img/".$name_file;
		if(is_uploaded_file($filename)) {
			$error = $_FILES['proCoverImg']['error'];
			if($error == 0){
				include "lib/IMager/imager.php";
				$cut = array('.jpg'=>'', '.JPG'=>'', 'png'=>'', 'PNG'=>'', 'gif'=>'', 'GIF'=>'');
				$name_files = strtr($name_file, $cut);
				$img = image_upload('proCoverImg');
				$img = image_to_jpg($img);
				$myFile = image_save($img,"product_cover_img/$name_files.jpg");
				$productInsertId = $_SESSION['proInsertId'];
				//echo $_SESSION['proInsertId'];
				include_once("setting/database_setting.php");
				$con = connect_db();
				$sql_ud = "update product
						set productimg = 'product_cover_img/$name_files.jpg'	
						where productId = $productInsertId
						";
				if(!mysqli_Query($con,$sql_ud))
				{
					die("สั่งงานฐานข้อมมูลผิดพลาดเพราะ :".mysqli_error());
				}
				mysqli_close($con);
				echo "เพิ่มสินค้าเรียบร้อยแล้ว".$productInsertId;
			}else{
				echo "เพิ่มรูปภาพสินค้าไม่สำเร็จ".$error;
			}
		}
		if(!isset($filename)||$filename==''){
			echo "ไม่ได้เลือกรูปภาพ";
		}
	}

	function doEditDlgShow(){
		$prodId = $_POST['prodId'];
		include_once("setting/database_setting.php");
			$con = connect_db();	
			$result = mysqli_query($con,"select * from product where productId = '$prodId'");				
			$product = mysqli_fetch_array($result);
			
			$result2 = mysqli_query($con,"select * from category");				
			$catagory = array();
			while($row = mysqli_fetch_array($result2))
			{
				array_push($catagory,$row);
			}
			mysqli_close($con);
			echo"
			<form id='editProdForm'>  
			<input type='hidden' name='action' id='action' value='editProdAction' />
			<input type='hidden' name='productId' value='$product[productId]'>
			<p>กรุณาใส่ชื่อ สินค้า</p>
		  	<input class='left' id='productName' name='productName' type='text' value='$product[productName]' /><br/></br>
		  	<p>กรุณาใส่คำอธิบายสินค้า</p>
		  	<input class='left' id='productDescription' name='productDescription' type='text' value='$product[productDescription]'/><br/></br>
		  	<p>กรุณาใส่ราคา สินค้า</p>
		  	<input class='left' id='productPrice' name='productPrice' type='text' value='$product[price]'/><br/></br>
		  	<p>กรุณาเลือกหมวดหมู่สินค้า</p>
		  	<select name='categoryId'>";
			foreach($catagory as $cat){
			echo"<option ";
				if(isset($product['categoryId']))
				{
					if($product['categoryId'] == $cat["categoryId"])
					{
						echo "selected='selected'";
					}
				}
			echo "value= ".$cat["categoryId"].">".$cat["categoryName"]."</option>";
				}
		echo"</select>";
	  	echo"<br/><br/>" ;
		echo"<p>Hot Item</p>
	  	<input type='checkbox' name='HotItem' value='1'/><br/><br/>";
	  	echo "<button type='button' id='editProdbt'>แก้ไขสินค้า</button>
	  	</form>";
		}
		

	function doEditProd(){
		$productId = $_POST['productId'];
    	$productName = $_POST['productName'];
		$productDescription = $_POST['productDescription'];
		$productPrice = $_POST['productPrice'];
		$categoryId = $_POST['categoryId'];
		$HotItem = $_POST['HotItem'];
		$addBy = $_SESSION["login"]["adminName"];
		$anser = array();

		$error = '';
		if ($productName == ''||!isset($productName)) {
			$error = $error.'กรุณาใส่ชื่อสินค้า';
		}
		if($productDescription==''||!isset($productDescription)){
			$error =  $error.'กรุณาใส่ข้อมูลสินค้า';
		}
		if($productPrice == ''||!isset($productPrice)){
			$error =  $error.'กรุณาใส่ราคาสินค้า';
		}
		if ($error !='') {
			$anser = array('tf'=>'f','etext'=>$error);
		}
		elseif($error==''){
		include_once("setting/database_setting.php");
			$con = connect_db();
			$sql_is = "update product set productName='$productName', productDescription='$productDescription',
					   price='$productPrice', addOn = NOW(), addBy = '$addBy', categoryId='$categoryId', hot='$HotItem'
					   where productId='$productId'";			
			if(!mysqli_query($con,$sql_is))
			{
				die("เพิ่มข้อมูลไม่สำเร็จเพราะ :".mysqli_error($con));
			}
			$newProduct_id = mysqli_insert_id($con);
			mysqli_close($con);
			$anser = array('tf'=>'t');
		}
		echo json_encode($anser);
		//echo "แก้ไขสินค้าเรียบร้อย";
	}

	function doDeleteProd(){
		$deleteProdId = $_POST['prodId'];
		include_once("setting/database_setting.php");
		$con = connect_db();
		$sql_query = "delete from product where productId = '$deleteProdId'";
		if (mysqli_query($con, $sql_query)) {
	    	echo "ลบสินค้าสำเร็จ";
		} else {
		    echo "ลบสินค้าไม่สำเร็จเพราะ: " . mysqli_error($con);
		}

		mysqli_close($con);

	}

	function doShowProductDetailHome(){
		$prodId = $_POST['prodId'];
		include_once("setting/database_setting.php");
		$con = connect_db();
		$query = "select * from product where productId = '$prodId'";
		$result = mysqli_query($con,$query);
		$product = mysqli_fetch_array($result);
		
		$result2 = mysqli_query($con,"select * from product_img where productId = '$prodId' limit 5");
		$prodImg = array();
			while($row = mysqli_fetch_array($result2))
			{
				array_push($prodImg,$row);
			}
			mysqli_close($con);
		echo "
			<style>
			table, th, td {
			    border-collapse: collapse;
			}
			</style>
			<table style='width:100%'>
				<tr>
					<td width='120px'>
						<div style='padding:3px;'>ชื่อสินค้า</div>
					</td>
					<td>
						<div style='padding:3px;'>$product[productName]</div>
					</td>
				</tr>
				<tr>
					<td width='120px'>
						<div style='padding:3px;'>รายละเอียดสินค้า</div>
					</td>
					<td>
						<div style='padding:3px;'>$product[productDescription]</div>
					</td>
				</tr>
				<tr>
					<td width='120px'>
						<div style='padding:3px;'>ราคาสินค้า</div>
					</td>
					<td>
						<div style='padding:3px;'>$product[price]</div>
					</td>
				</tr>
				<tr>
					<td colspan='2'>
						<div style='padding:3px;'><img class='pImg' width='250px' src='$product[productimg]'></div>
					</td>
				</tr>
				<tr>
					<td colspan='2'>";
					echo "<div style='padding:3px;'>";
					$allProdPic = array(); $j = 0;
					foreach ($prodImg as $prodImgs) {
						//echo "<button class='viewImg' id='$j'><img width='80px' src='$prodImgs[Img]'></button>";
						echo "<a href='view_product_action.php?product_id=$prodId' target = '_blank' class='viewImg' id='$j' style='margin:3px;'>
						<img width='80px' src='$prodImgs[Img]'>
						</a>";
						$j = $j+1;
						array_push($allProdPic, $prodImgs[Img]);
					}
					echo "</div>";
					$_SESSION['prodShowId'] = $allProdPic;
			echo "</td>
				</tr>
				</table>";
	}

	function doShowProdPic(){
		$picShowId = $_POST['prodShowId'];
		$picId = $_SESSION['prodShowId'];
		echo"<div style='padding:3px; text-align: center;'><img class='showAllPic' width='450px' src='$picId[$picShowId]'></div>";
		echo "<div style='display:block; width:500px; height:90px; padding:3px; text-align: center; overflow: scroll;'>
			<ul style='float:left; list-style-type:none; margin:0px;'>";
		foreach ($picId as $picIds) {
			echo "<li style='display:block; float:left; text-align:center;'>
					<button class='showImg' id='$picIds'><img width='80px' src='$picIds'></button>
				  </li>";
		}
		echo "</ul></div>";
		//echo json_encode($picId);
	}
?>