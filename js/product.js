/**
 * @author Jesniphat
 */
function addDlg(){
	$('#add_product')[0].reset;
	$('#action').val('add');
	$('#dlg').dialog({title:'เพิ่มสินค้า',modal:true, width:600, height:400});
	console.log($('#action').val());
};

function addProduct(){
	var newProductData = $('#add_product').serializeArray();
	$.ajax({
		url:'ajax_product_action.php',
		data:newProductData,
		type:'post',
		dataType:'json',
		beforeSend:function(){
			$.blockUI({message:'<h3>กำลังส่งข้อมูล</h3>'});
		},
		success:function(result){
			console.log(result);
			if(result.tf=='f'){
				alert(result.etext);
				$.unblockUI();
			}else{
			$('#bt-upload').click();
			}
		},
		complete:function() { 
			//$.unblockUI();
		}
	});
}; 

function uploadProCoverImg(){
	//var proImgCovers = $('#formcoverImg').serializeArray();
	$('#formcoverImg').ajaxForm({
		dataType:'html',
		beforeSend:function(){
			$.blockUI({message:'<h3>กำลังอัพโหลดรูปภาพ</h3>'});
		},
		success:function(result){
			console.log(result);
			alert(result);
			//$('#dlg').dialog('close');
		},
		complete:function(){
			$('#dlg').dialog('close');
			$.unblockUI();
			location.reload();
		}
	});
};


var edit = function(event){
	var editId = event.target.id;
	console.log(editId);
	var param = {prodId:editId,action:'editProdDlg'}; console.log(param);
	$.ajax({
		url:'ajax_product_action.php',
		data:param,
		type:'post',
		beforeSend:function(){
			$.blockUI({message:'<h3>กำลังส่งข้อมูล</h3>'});
		},
		success:showProductEditDialog,
		complete:function() { 
			$.unblockUI();
		}
	});
};

var showProductEditDialog = function(result){
	console.log("vvbc");
	var divForm = $("<div id='divEditForm'></div>");
	divForm.html(result).dialog({
		title:'แก้ไขข้อมูลสินค้า',width:500,modal:true
	});
	$('#editProdbt').click(editProdFc);
};

var editProdFc = function(){
	var editProductData = $('#editProdForm').serializeArray();
	$.ajax({
		url:'ajax_product_action.php',
		data:editProductData,
		type:'post',
		dataType:"json",
		beforeSend:function(){
			$.blockUI({message:'<h3>กำลังส่งข้อมูล</h3>'});
		},
		success:function(result){
			console.log(result);
			if(result.tf == 'f'){
				alert(result.etext);
				$.unblockUI();
			}else{
				alert('แก้ไขข้อมูลสำเร็จ');
				$('#divEditForm').dialog('close');
				$.unblockUI();
				location.reload();
			}
		},
		complete:function() {
			
		}
	});
};

var deleteProd = function(event){
	var prodIdforEdit = event.target.id;
	console.log(event.target.id);
	var param  = {action:'deleteProd', prodId:prodIdforEdit};
	$.ajax({
		url:'ajax_product_action.php',
		data:param,
		type:'post',
		//dataType:'json',
		beforeSend:function(){
			$.blockUI({message:'<h3>กำลังลบข้อมูล</h3>'});
		},
		success:function(result){
			console.log(result);
			alert(result);
		},
		complete:function() { 
			$.unblockUI();
			location.reload();
		}

	})
};

var showProductDetailHome = function(event){
	var prodId  = event.target.id;
	console.log(event.target.id);
	var param = {action:'showProductDetailHome', prodId:prodId};
	$.ajax({
		url:'ajax_product_action.php',
		data:param,
		type:'post',
		beforeSend:function(){
			$.blockUI({message:'<h3>กำลังส่งข้อมูล</h3>'});
		},
		success:showProductDetailDialog,
		complete:function() { 
			$.unblockUI();
		},
	})
};

var showProductDetailDialog = function(result){
	var divShow = $("<div id='divShowDetail'></div>");
	divShow.html(result).dialog({
		title:'ข้อมูลสินค้า',width:550,modal:true
	});
	$('.ui-dialog-titlebar-close').click(function(){
		console.log("ddd");
		//location.reload();
	});
	//$('.viewImg').click(viewImg);
};

var viewImg = function(event){
	var prodImgId = event.target.id;
	console.log(prodImgId);
	event.stopPropagation();
	$.ajax({
		url:'ajax_product_action.php',
		data:{action:'showProdPic',prodShowId:prodImgId},
		type:'post',
		//dataType:'json',
		beforeSend:function(){
			$.blockUI({message:'<h3>กำลังส่งข้อมูล</h3>'});
		},
		success:showAllProdDialog,
		// function(result){
		// 	console.log(result);
		// 	// $('img.sPic').attr('src',result[prodImgId]);
		// 	// $('img.sPic').attr('id',prodImgId);
		// 	// $('#divShowPic').dialog({
		// 	// title:'รูปสินค้า',width:650,modal:true
		// 	//});
		// },
		complete:function() { 
			$.unblockUI();
		},
	})
	
}

var showAllProdDialog = function(result){
	console.log(result);
	var divShowAllProdDialog = $("<div id='divShowAllProdDialog'></div>");
	divShowAllProdDialog.html(result).dialog({
		title:'รูปสินค้า',width:550,modal:true
	});
	$('.showImg').click(showImg);
};

var showImg = function(event){
	var showProdId = event.target.id;
	console.log(showProdId);
	event.stopPropagation();
	$('img.showAllPic').attr('src',showProdId);
}