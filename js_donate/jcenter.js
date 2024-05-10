
function preload_wait(){
	$('#dlg').dialog('open');	
}
function preload_wait_close(){
	$('#dlg').dialog('close');
}



function gen_inv(inv,pay_round,type_pay,seller_id,doc_date)
{
	//alert(inv+" , "+pay_round+" , "+seller_id+" , "+doc_date);
	//alert(seller_id);
	if(seller_id == '')
	{
		alert('กรุณาเลือก seller ที่ต้องการออก INV ');
		//window.history.back();
		return false;
	}
	$.get("../gen_inv/process_gen_inv.php",{
		pay_round:pay_round,
		type_pay:type_pay,
		seller_id:seller_id,
		doc_date:doc_date},

	function(data){
		var arr=data.split("@@@");
		var status = arr[0];
		var receipt_no = arr[1];
		
		//alert(data+' = '+type_pay);
		//alert(status+" ---  "+receipt_no);

		if(type_pay == 'pay_seller')
		{
			
			if(status == 'Y')
			{
				window.open("http://crmkty.ssup.co.th/app_service_kty/reportpay/charged/report_pdf.php?pay_type=pay_seller&receipt_no="+receipt_no ,"_blank");
				window.open("http://crmkty.ssup.co.th/app_service_kty/reportpay/pay_seller/report_pdf_seller_v1.php?receipt_no="+receipt_no ,"_blank");
				window.open("http://crmkty.ssup.co.th/app_service_kty/reportpay/pay_seller/report_pdf_receipt_v1.php?pay_type=pay_seller&receipt_no="+receipt_no ,"_blank");
			}
				
			
		}
		else if(type_pay == 'pay_charged')
		{
			//alert("offline = "+status);
			if(status == 'YY')
			{
				window.open("http://crmkty.ssup.co.th/app_service_kty/reportpay/charged/report_pdf_charged_v1.php?receipt_no="+receipt_no ,"_blank");
				window.open("http://crmkty.ssup.co.th/app_service_kty/reportpay/charged/report_pdf.php?pay_type=pay_charged&receipt_no="+receipt_no ,"_blank");
				window.open("http://crmkty.ssup.co.th/app_service_kty/reportpay/charged/report_pdf_receipt_v1.php?pay_type=pay_charged&receipt_no="+receipt_no ,"_blank");
				
			}
			else if(status == 'NY')
			{
				//alert('show receipt');
				
				window.open("http://crmkty.ssup.co.th/app_service_kty/reportpay/charged/report_pdf_receipt_v1.php?pay_type=pay_charged&receipt_no="+receipt_no ,"_blank");
				window.open("http://crmkty.ssup.co.th/app_service_kty/reportpay/charged/report_pdf.php?pay_type=pay_charged&receipt_no="+receipt_no ,"_blank");
			}
		
			
		
			}
			
		
		
    });
	
}