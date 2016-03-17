<?php	
	include_once("setting/database_setting.php");
	
	function read_all_product($where)
	{
	$con = connect_db();
		$x = "select p.productId,p.productName,p.productDescription,p.price,p.addOn,p.addBy,p.productimg,p.categoryId,p.hot,c.categoryName cname
								from product p inner join category c
								on p.categoryId=c.categoryId $where
								order by p.addOn DESC";
		//$y = "SELECT * FROM product WHERE categoryid='8'";
		$result = mysqli_query($con,$x);
								
		$products = array();
		
		while($row = mysqli_fetch_array($result))
		{
			array_push($products,$row);
		}
		
		mysqli_close($con);
		return $products;
	}
	
	function read_10_products()
	{
		$con = connect_db();
		$x = "select p.productId,p.productName,p.productDescription,p.price,p.addOn,p.addBy,p.productimg,c.categoryName cname
								from product p inner join category c
								on p.categoryId=c.categoryId 
								order by p.addOn DESC limit 0,6";
		$result = mysqli_query($con,$x);
								
		$products = array();
		
		while($row = mysqli_fetch_array($result))
		{
			array_push($products,$row);
		}
		
		mysqli_close($con);
		return $products;
	}
	
	function read_limit_product($startIndex)
	{
		if(isset($startIndex)){
			$startIndex = '10';
		}
		$con = connect_db();
		$x = "select p.productId,p.productName,p.productDescription,p.price,p.addOn,p.addBy,p.productimg,p.hot,c.categoryName cname
								from product p inner join category c
								on p.categoryId=c.categoryId 
								order by p.addOn DESC limit $startIndex,5";
		$result = mysqli_query($con,$x);
								
		$products = array();
		
		while($row = mysqli_fetch_array($result))
		{
			array_push($products,$row);
		}
		
		mysqli_close($con);
		return $products;
	}
	
	
	
	function read_all_product_by_catid($catId,$where)
	{
		$con = connect_db();
		$x = "select p.productId,p.productName,p.productDescription,p.price,p.addOn,p.addBy,p.productimg,p.categoryId,p.hot,c.categoryName cname
								from product p inner join category c
								on p.categoryId=c.categoryId where p.categoryId='$catId' $where
								order by p.addOn DESC";
		//$y = "SELECT * FROM product WHERE categoryid='8'";
		$result = mysqli_query($con,$x);
								
		$products = array();
		
		while($row = mysqli_fetch_array($result))
		{
			array_push($products,$row);
		}
		
		mysqli_close($con);
		return $products;
	}
	
	function read_limit_product_bycatId($catId)
	{
		$con = connect_db();
		$x = "select p.productId,p.productName,p.productDescription,p.price,p.addOn,p.addBy,p.productimg,p.hot,c.categoryName cname
								from product p inner join category c
								on p.categoryId=c.categoryId where p.categoryId='$catId'
								order by p.addOn DESC";
		$result = page_query($con,$x,5);
								
		$products = array();
		
		while($row = mysqli_fetch_array($result))
		{
			array_push($products,$row);
		}
		
		mysqli_close($con);
		return $products;
	}
	
	
	
	
	function get_product_by_id($productId)
	{
		$con = connect_db();
		$result = mysqli_query($con,"select * from product where productId='$productId'");
		
		$product = mysqli_fetch_array($result);
		
		mysqli_close($con);
			
		return $product;	
	}
	
	
	function create_product($productName,$productDescription,$productPrice,$categoryId,$addBy,$upload_file,$HotItem)
	{
		$con = connect_db();
		$sql_is = "insert into product(productName,productDescription,price,categoryId,addBy,addOn,productimg,hot)
					values('$productName','$productDescription',$productPrice,$categoryId,'$addBy',NOW(),'$upload_file','$HotItem')
					";
					
		if(!mysqli_query($con,$sql_is))
		{
			die("เพิ่มข้อมูลไม่สำเร็จเพราะ :".mysqli_error($con));
		}
		
		$product_id = mysqli_insert_id($con);
		
		mysqli_close($con);
		
		return $productId;
		
	}
	
	function update_product($name,$description,$price,$categoryId,$productId,$addBy,$HotItem)
	{
		$con = connect_db();
		
		$sql_ud = "update product
				set productName = '$name',
					productDescription = '$description',
					price = $price,
					categoryId = $categoryId,
					addBy = '$addBy',
					hot = '$HotItem'	
				where productId = $productId
				";
		if(!mysqli_Query($con,$sql_ud))
		{
			die("สั่งงานฐานข้อมมูลผิดพลาดเพราะ :".mysqli_error());
		}
	}
	
	function update_cover_pic($proId,$upload_file)
	{
		$con = connect_db();
		
		$sql_ud = "update product
				set productimg = '$upload_file'	
				where productId = $proId
				";
		if(!mysqli_Query($con,$sql_ud))
		{
			die("สั่งงานฐานข้อมมูลผิดพลาดเพราะ :".mysqli_error($con));
		}
	}
	
	function delete_product($productId)
	{
		$con = connect_db();
		
		$sql_dl = "delete from product where productId=$productId";
		
		if(!mysqli_query($con,$sql_dl))
		{
			die("สั่งงานฐานข้อมูลไม่ได้เพราะ :".mysqli_error($con));
		}
		mysqli_close($con);
	}
	
	
	
	
	function read_hot_products()
	{
		$con = connect_db();
		$x = "select p.productId,p.productName,p.productDescription,p.price,p.addOn,p.addBy,p.productimg,c.categoryName cname
								from product p inner join category c
								on p.categoryId=c.categoryId 
								where p.hot = '1'
								order by p.addOn DESC limit 0,6";
		$result = mysqli_query($con,$x);
								
		$products = array();
		
		while($row = mysqli_fetch_array($result))
		{
			array_push($products,$row);
		}
		
		mysqli_close($con);
		return $products;
	}
	
	
	function count_product()
	{
		$con = connect_db();
		$query = "select count(*) totalProduct from product";
		$totalProductResult = mysqli_query($con,$query);
		$totalProductRow = mysqli_fetch_array($totalProductResult);
		
		return $totalProductRow;
	}
	
	
	function count_product_bycatid($catId)
	{
		$con = connect_db();
		$query = "select count(*) totalProduct from product where categoryId = $catId";
		$totalProductResult = mysqli_query($con,$query);
		$totalProductRow = mysqli_fetch_array($totalProductResult);
		
		return $totalProductRow;
	}
	
	function read_all_product_by_catid_home($cat_id)
	{
		$con = connect_db();
		$query = "select * from v_allproduct where categoryId = '$cat_id' order by addOn DESC";
		$result = page_query($con,$query,8);
		//$result = mysqli_query($con,$query);
								
		$products = array();
		
		while($row = mysqli_fetch_array($result))
		{
			array_push($products,$row);
		}
		
		mysqli_close($con);
		return $products;
	}
	
	function read_all_product_limit_by_catid_home($cat_id,$startIndex)
	{
		$con = connect_db();
		$query = "select * from v_allproduct where categoryId = '$cat_id' order by addOn DESC limit $startIndex,10";
		$result = mysqli_query($con,$query);
								
		$products = array();
		
		while($row = mysqli_fetch_array($result))
		{
			array_push($products,$row);
		}
		
		mysqli_close($con);
		return $products;
	}
	function read_all_product_home()
	{
		$con = connect_db();
		$query = "select * from v_allproduct order by addOn DESC limit 0,8"; 
		$result = mysqli_query($con,$query);
								
		$products = array();
		
		while($row = mysqli_fetch_array($result))
		{
			array_push($products,$row);
		}
		
		mysqli_close($con);
		return $products;
	}
	function read_all_product_limit_home()
	{
		//echo "string";
		$con = connect_db();
		$query = "select * from v_allproduct order by addOn DESC"; 
		$result = page_query($con,$query,8);
		//$result = mysqli_query($con,$query);
								
		$products = array();
		
		while($row = mysqli_fetch_array($result))
		{
			array_push($products,$row);
		}
		
		mysqli_close($con);
		//print_r($products);
		return $products;
	}
	
	
		function count_hot_product()
	{
		$con = connect_db();
		$query = "select count(*) totalProduct from product where hot = 1";
		$totalProductResult = mysqli_query($con,$query);
		$totalProductRow = mysqli_fetch_array($totalProductResult);
		
		return $totalProductRow;
	}
		function read_hot_product_home()
	{
		$con = connect_db();
		$query = "select * from v_allproduct where hot = 1 order by addOn DESC limit 0,8"; 
		$result = mysqli_query($con,$query);
								
		$products = array();
		
		while($row = mysqli_fetch_array($result))
		{
			array_push($products,$row);
		}
		
		mysqli_close($con);
		return $products;
	}
	function read_hot_product_limit_home()
	{
		$con = connect_db();
		$query = "select * from v_allproduct where hot = 1 order by addOn DESC"; 
		//$result = mysqli_query($con,$query);
		$result = page_query($con,$query,8);
								
		$products = array();
		
		while($row = mysqli_fetch_array($result))
		{
			array_push($products,$row);
		}
		
		mysqli_close($con);
		return $products;
	}

	function read_all_product_page()
	{
	$con = connect_db();
		$x = "select p.productId,p.productName,p.productDescription,p.price,p.addOn,p.addBy,p.productimg,p.categoryId,p.hot,c.categoryName cname
								from product p inner join category c
								on p.categoryId=c.categoryId
								order by p.addOn DESC ";
		//$y = "SELECT * FROM product WHERE categoryid='8'";
		$result = page_query($con,$x,5);
								
		$products = array();
		
		while($row = mysqli_fetch_array($result))
		{
			array_push($products,$row);
		}
		
		mysqli_close($con);
		return $products;
	}
	
?>