
	<style type="text/css">
		.print-action-bar {
		position: fixed;
		width: 100%;
		background: #fff;
		bottom: 0;
		height: 60px;
		padding: 10px;
		box-shadow: 0px 8px 15px 0px #000;
		text-align: center;
		z-index: 100000;
		}
		.print-icon,.download-icon {
		display: inline-block;
		margin: 0 10px;
		width: 200px;
		background: #0070C0;
		position: relative;
		line-height: 40px;
		color: #fff;
		padding: 10px 30px;
		font-size: 21px;
		text-transform: uppercase;
		font-weight: bold;
		}
		.print-icon:hover,.download-icon:hover{
		cursor:pointer;
		}
		.ads-container{margin:10px auto;text-align:center;}
		.print-icon svg,
		.download-icon svg {
		height: 40px;
		width: 40px;
		float: left;
		margin-right: 15px;
		}
		
			html, body, div, span, applet, object, iframe,
			h1, h2, h3, h4, h5, h6, p, blockquote, pre,
			a, abbr, acronym, address, big, cite, code,
			del, dfn, em, img, ins, kbd, q, s, samp,
			small, strike, strong, sub, sup, tt, var,
			b, u, i, center,
			dl, dt, dd, ol, ul, li,
			fieldset, form, label, legend,
			table, caption, tbody, tfoot, thead, tr, th, td,
			article, aside, canvas, details, embed,
			figure, figcaption, footer, header, hgroup,
			menu, nav, output, ruby, section, summary,
			time, mark, audio, video {
				margin: 0;
				padding: 0;
				border: 0;
				font-size: 12px;
				font: inherit;
				vertical-align: baseline;
			}
			article, aside, details, figcaption, figure,
			footer, header, hgroup, menu, nav, section {
				display: block;
			}
			body {
				line-height: 1;
				word-break: break-word;
				letter-spacing:0 !important;
			}
			ol, ul {
				list-style: none;
			}
			blockquote, q {
				quotes: none;
			}
			blockquote:before, blockquote:after, q:before, q:after {
				content: '';
				content: none;
			}
			table {
				border-collapse: collapse;
				border-spacing: 0;
			}
			body {
				font-family:'Roboto';
			}
			b {
				font-weight:bold;
			}
			table {
				vertical-align: top;
				width: 100%;
				border-collapse: collapse;
			}
			tr {
				vertical-align: top;
			}
			td {
				vertical-align: middle;
				margin:0;
				padding:0;
			}
			.txt-tranport-sr-no{color:#fff;font-size:0;}
			.txt-bold {
				font-weight:bold;
			}
			.txt-center {
				text-align:center;
			}
			.txt-left {
				text-align:left;
			}
			.txt-right {
				text-align:right;
			}
			.txt-bg {
				background-color:#E8F3FD;
			}
			.border-bottom-cell {
				border-bottom:1px solid #0070C0;
			}
			.invoice .main-border {
				border:1px solid #0070C0;
				padding: 0;
				margin:0;
			}
			.invoice .header-row {
				vertical-align:middle;
				border-bottom:1px solid #0070C0;
			}
			.invoice .header .invoice-title {
				text-align:center;
				font-size:20px;
				color:#0070C0;
				padding:3px 0;
				font-weight:bold;
			}
			.invoice .header .copyname {
				text-align:right;
				padding-right:5px;
				font-size:11px;
				font-weight:bold;
			}
			.invoice .header .gstin {
				padding-left:5px;
			}
			.invoice .header .gstin span {
				font-weight:bold;
				text-align:left;
			}
			.billdetailsthead td {
				background-color:#E8F3FD;
				border:1px solid #0070C0;
				border-collapse:collapse;
				text-align:center;
				font-weight:bold;
				padding:5px 2px;
			}
			.billdetailstbody td {
				padding:2px 2px 0px;
				font-size:11px;
				vertical-align: top;
				line-height:15px;
			}
			.billdetailstbody td.txt-center {
				text-align:center;
			}
			.billdetailstbody td.txt-left {
				text-align:left;
			}
			.billdetailstbody td.txt-right {
				text-align:right;
			}
			.billdetailstbody td.txt-bg {
			}
			.billdetailstbody .last-row td {
			}
			.invoicedataFooter td {
				font-size:10px;
				background-color:#E8F3FD;
				padding:5px 1px 5px 0px;
				border:1px solid #0070C0;
			}
			.valign-top {
				vertical-align: top;
			}
			.valign-mid {
				vertical-align: middle;
			}
			.billdetailstbody td span {
				font-style:italic;
			}
			.billdetailstbody td {
				max-width: 1px;
			}
			
			.customerexportdata td {
				padding:2px 5px 3px 5px;
				font-size:11px;
				vertical-align: top;
				line-height:13px;
			}
			.customerexportdata td.customerexportdata_item_label {
				font-weight: bold;
			}
			
			.customerdata td {
				padding:2px 5px 3px 5px;
				font-size:11px;
				vertical-align: top;
				line-height:13px;
			}
			.invoicedata td {
				padding:3px 5px 6px 5px;
				font-size:11px;
				vertical-align: top;
				line-height:13px;
			}
			.invoiceInfo td {
				padding:3px 5px;
				font-size:11px;
				line-height:13px;
				font-weight:bold;
				border:1px solid #0070C0;
				border-left:none;
				border-right:none;
			}
			.invoiceTotal,.invoiceInfo {
				border-collapse:collapse;
			}
			.invoiceTotal td {
				padding:3px 5px;
				font-size:10px;
				line-height:13px;
				font-weight:bold;
				border:1px solid #0070C0;
				border-right:none;
				border-left:none;
			}
			.invoiceTotal td.txt-bg {
				background-color:#E8F3FD;
			}
			.tableboxLine{
				border-right:1px  solid #0070C0;
				border-left:1px  solid #0070C0;
				border-collapse: collapse;
				height:417px;top:0;
				box-sizing: border-box;
				-moz-box-sizing: border-box;
				-webkit-box-sizing: border-box;
				z-index: -1;
			}
			.tableboxLinetable {
				position: absolute;
				top: 0;
				left: 0;
				z-index: -1;
			}
			.page-wrapper-table {
				width:700px;
				margin:0px auto;
				position:relative;
			}
			.page-wrapper {
							height:1010px;
				width:700px;
				margin:0px auto;
				position:relative;
			}
					
			.page-wrapper .page-header {
				position: relative;
			}
			.page-wrapper .page-footer {
			}
			.page-wrapper .page-content {
				position: relative;
			}
			.page-wrapper-table,
			.page-wrapper-tr,
			.page-copy-container-wrapper {
				position: relative;
			}
			.page-copy-container-wrapper {
		       margin: 30px 0 100px;
		    }
			.page-wrapper {
				margin-top: 50px;
				padding-bottom: 50px;
				border-bottom: 3px dashed #000;
			}
			.billtaxdetailsthead td {
				border:1px solid #0070C0;
				border-collapse:collapse;
				text-align:center;
				font-weight:bold;
				border-right:none;
				padding:2px 2px;
				font-size:11px;
			}
			.billtaxdetailsthead tr:first-child td:first-child {
				border-left:none;
			}
			.billtaxdetailstbody td {
				padding:2px 2px;
				font-size:11px;
				vertical-align: top;
				line-height:15px;
				border-left:1px solid #0070C0;
				border-right:none;
			}
			.billtaxdetailstbody td:first-child{
				border-left:none;
			}
			.billtaxdetailstbody td.txt-center {
				text-align:center;
			}
			.billtaxdetailstbody td.txt-left {
				text-align:left;
			}
			.billtaxdetailstbody td.txt-right {
				text-align:right;
			}
			.billtaxdetailstbody td.txt-bg {
			}
			.billtaxdetailstbody .last-row td {
			}
			.invoicetaxdataFooter td {
				background-color:#E8F3FD;
				font-size:10px;
				padding:2px 1px 2px 0px;
				border:1px solid #0070C0;
				border-right:none;
			}
			.invoicetaxdataFooter td:first-child {
				border-left:none;
			}
			.no-pad td{padding-top:0;padding-bottom:0;}
		    .billdetailstbody td span.taxrate-below {
		        display: block;
			}
			.payment-account-row td.special span{font-size:15px;font-style:normal;}
			.branding_image img{max-width:100%;float:left;}
			 @media print {
				.ads-container,.print-action-bar {
					display:none;
				}
				.page-copy-container-wrapper {
					margin: 0;
				}
				.submit_font_sizes{display:none;}
				.page-wrapper {
					margin-top: 0;
					padding-bottom: 0;
					border-bottom: none;
				}
				.branding_rt {
					opacity:1;
					visibility:visible;
				}
			}
			.page-header img + br {
				display:none;
			}
			.invoice-cont table, .invoice-cont th, .invoice-cont td, .invoice-cont .table thead th {
				border-color: #0070C0 !important;
				z-index: 999;
			}
						
		</style>
		<style>
			.org_orgname_logo{ vertical-align: top;font-size:22px;font-weight:bold;line-height:30px;padding-left:15px;padding-bottom:5px;}
			.org_address_logo{ vertical-align: top;font-size:12px;font-weight:normal;line-height:15px;height:43px;padding-left:15px;}
			.org_orgname{vertical-align: top;font-size:23px;font-weight:bold;line-height:30px;padding-left:0px;padding-bottom:5px;padding-right: 0px;}
			.org_address{ vertical-align: top;font-size:12px;font-weight:normal;line-height:15px;height:auto;padding-left:0px;}
			.contact_details {line-height:17px;font-size:12px;}
			.contact_details b{font-size:11px;}
			.supplement{border-bottom:1px solid #0070C0;text-align:center;font-weight:bold;font-size:13px;line-height:18px;}
			.customerdata td:not(.customerdata_label):not(.customerdata_item_label):not(.special){font-size: 11px;line-height: 13px;}
			.customerdata td.customerdata_label{text-align:middle;font-weight:bold;border-bottom:1px solid #0070C0;width:100%;text-align:center;font-size:10px;}
			.customerdata td.customerdata_item_label{font-weight:bold;}
			.billdetailsthead td{font-size:9px;}
			.invoicedata td:not(.invoicedata_item_label):not(.special){font-size: 11px;line-height: 13px;}
			.invoicedata td .invoicedata_item_label{font-weight:bold;}
			.invoicedata td.special{font-weight:bold;font-size:12px;}
			.billdetailstbody td {font-size: 11px;line-height: 15px;}
			.billdetailstbody td  b{font-weight:bold;}
			.invoicedataFooter td{}
			.invoiceInfo td{font-size: 11px;line-height: 13px;font-weight: normal;}
			.invoiceInfo td.section_header{font-weight: bold;}
			.invoiceInfo td.amount_in_words{width:100%;text-align:center;font-size:11px;line-height:15px;height:30px;vertical-align:middle;text-transform:capitalize;}
			.invoiceInfo td.terms_condition_box{min-height:90px;width:100%;overflow:hidden;font-size:10px;}
			.invoiceTotal td:not(.special) {font-size: 10px;line-height: 13px;font-weight: bold;}
			.invoiceTotal td.special {font-size:13px;}
			.invoiceTotal td.footer_seal_title{border-bottom:none;text-align:center;font-size:8px;}
			.invoiceTotal td.footer_seal_name{border-top:none;border-bottom:none;text-align:center;font-size:12px;}
			.invoiceTotal td.footer_seal_signature{border-bottom:none;text-align:center;font-size:8px;}
		</style>	
		
	
	<div class="invoice-cont" style="font-size: 13px;margin: 10% 6%;">
		<div class="page-copy-container-wrapper">
			<div class="page-wrapper-table">
				<div class="page-wrapper-tr" style="page-break-inside:avoid; page-break-after:auto;">
					<div>
						<div class="page-wrapper">
							<div class="page-header">
								<table cellspacing="0" cellpadding="0" class="branding" width="100%">
									<colgroup>
										<col style="width: 70%">
										<col style="width: 30%">
									</colgroup>
									<tbody>
										<tr>
											<td style="position:relative;vertical-align: top;">
												<table cellspacing="0" cellpadding="0" width="100%">
													<tbody>
														<tr>
															<td class="org_orgname_logo" data-editor=".org_orgname_logo">
																Epiliam </td>
														</tr>
														<tr>
															<td class="org_address_logo" data-editor=".org_address_logo">
																{{$payment_receipt->address}} </td>
														</tr>
													</tbody>
												</table>
											</td>

											<td style="text-align:right;vertical-align:bottom;float:right;">
												<table cellspacing="0" cellpadding="0">
													<tbody>
														<tr>
															<td class="contact_details" data-editor=".contact_details">
																<b>Name</b> :{{$user_details->name}} </td>
														</tr>
														<tr>
															<td class="contact_details">
																<b data-editor=".contact_details b">Phone</b> :{{$user_details->phone}}
															</td>
														</tr>
														<tr>
															<td class="contact_details">
																<b>Email</b> : {{$user_details->email}}
															</td>
														</tr>
													</tbody>
												</table>
											</td>
										</tr>
									</tbody>
								</table>
								<br>

								<table cellspacing="0" cellpadding="0" class="invoice">
									<tbody>
										<tr>
											<td class="main-border" style="width: 100%;border-bottom:none;">
												<table cellspacing="0" border="0" cellpadding="0" class="header">
													<tbody>
														<tr>
															<td style="width: 100%;" class="header-row">
																<table cellspacing="0" cellpadding="0">
																	<tbody>
																		<tr>
																			<td style="width: 35%;" class="gstin"
																				data-editor=".gstin"><span style="">PAN
																					:</span>{{$organization->gstin}} </td>
																			<td style="width: 30%;" class="invoice-title">
																			RECEIPT VOUCHER</td>
																			<td style="width: 35%;" class="copyname">
																				</td>
																		</tr>
																	</tbody>
																</table>
															</td>
														</tr>
													</tbody>
												</table>
												<table>
													<colgroup>
														<col style="width: 40%">
														<col style="width: 60%">
													</colgroup>
													<tbody>
														<tr>
															<td style="border-bottom:1px solid #0070C0;border-right: 1px solid #0070C0;vertical-align: top;">
																<table cellspacing="0" class="customerdata"
																	style="table-layout: fixed;">
																	<colgroup>
																		<col style="width: 22%">
																		<col style="width: 78%">
																	</colgroup>
																	<tbody>
																		<tr>
																			<td colspan="2" class="customerdata_label"
																				data-editor=".customerdata td.customerdata_label">
																				Customer Detail</td>
																		</tr>
																		<tr>
																			<td class="customerdata_item_label"
																				data-editor=".customerdata td.customerdata_item_label">
																				M/S</td>
																			<td class="special"
																				data-editor=".customerdata td.special">{{$payment_receipt->name}}</td>
																		</tr>
																		<tr>
																			<td class="customerdata_item_label">Address</td>
																			<td style="">
																				<div style="overflow: hidden;">{{$payment_receipt->address}}, {{$payment_receipt->state_name}}
																				</div>
																			</td>
																		</tr>
																		<tr>
																			<td class="customerdata_item_label">PHONE</td>
																			<td style="">{{$payment_receipt->phone}}</td>
																		</tr>
																		<tr>
																			<td class="customerdata_item_label">
																				GSTIN </td>
																			<td style="">{{$payment_receipt->gstin_pan}}</td>
																		</tr>
																		<tr>
																			<td class="customerdata_item_label">
																				State </td>
																			<td style="">{{$payment_receipt->state_name}} ({{$payment_receipt->state_code}})</td>
																		</tr>
																	</tbody>
																</table>
															</td>
															<td style="border-bottom:1px solid #0070C0;vertical-align:top;">
																<table cellspacing="0" class="invoicedata">
																	<colgroup>
																		<col style="width: 27%">
																		<col style="width: 29%">
																		<col style="width: 25%">
																		<col style="width: 19%">
																	</colgroup>
																	<tbody>
																		<tr>
																			<td class="invoicedata_item_label"
																				data-editor=".invoicedata td.invoicedata_item_label">
																				Voucher No.</td>
																			<td class="special"
																				data-editor=".invoicedata td.special">
																			</td>
																			<td class="invoicedata_item_label">{{$payment_receipt->receipt_no}}
																			</td>
																			<td></td>
																		</tr>
																		<tr>
																			<td class="invoicedata_item_label">Voucher Date</td>
																			<td>&nbsp;</td>
																			<td>{{$payment_receipt->payment_date}}</td>
																			<td>&nbsp;</td>
																		</tr>
																	</tbody>
																</table>
															</td>
														</tr>
													</tbody>
												</table>
												<br>
											</td>
										</tr>
									</tbody>
								</table>
								<table class="billdetailsthead" cellspacing="0" border="0" cellpadding="0"
									data-editor=".billdetailsthead td">
									<colgroup>
										<col>
										<col>
										<col>
										<col>
										<col>
										<col>
										<col>
										<col>
										<col>
									</colgroup>
									<tbody>
										<tr>
											<td class="valign-mid" rowspan="2">Sr. No.</td>
											<td class="valign-mid" rowspan="2">Particulars</td>
										</tr>
										<tr>
											<td style="">Amount</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="page-content" style="height: 446px;">
								<table class="tableboxLinetable" cellspacing="0" cellpadding="0" border="0">

									<colgroup>
										<col>
										<col>
										<col>
										<col>
										<col>
										<col>
										<col>
										<col>
										<col>
									</colgroup>
									<tbody>
										<tr>
											<td class="tableboxLine linebox1"
												style="width: 4%; left: 0px; border-left: 1px solid rgb(0, 112, 192); height: 446px;">
											</td>
											<td class="tableboxLine linebox2" style="width: 27%; left: 4%; height: 446px;">
											</td>
											<td class="tableboxLine linebox3" style="width: 11%; left: 31%; height: 446px;">
											</td>
										</tr>
									</tbody>
								</table>
								<table class="billdetailstbody" id="billdetailstbody" cellspacing="0" border="0"
									cellpadding="0" data-editor=".billdetailstbody td">
									<colgroup>
										<col style="width:4%">
										<col style="width:27%">
										<col style="width:11%">
									</colgroup>
									<?php
										$invoice_nos = explode(',',$payment_receipt->invoice_no);
										$invoice_amount = explode(',',$payment_receipt->invoice_amount);
									?>
									<tbody>
										<tr class="pageRow1">
											<td class="txt-center  ">1</td>
											<td class="txt-left" style="margin-left:20px;">
												<b>Account</b><br>
												{{$payment_receipt->name}}<br>
												@foreach($invoice_nos as $invoice)
												invoice no : {{$invoice}}<br>
												@endforeach

												<b>Through</b><br>
												{{$payment_receipt->payment_type}}
											</td>
											<td class="txt-right " style="">
												{{$payment_receipt->amount}}	
											</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="page-footer">
								<table class="invoicedataFooter" cellspacing="0" style="width:100%;"
									data-editor=".invoicedataFooter td">
									<colgroup>
										<col>
										<col>
										<col>
									</colgroup>
									<tbody>
										<tr>
											<td class="txt-bold ">Total</td>
											<td class="txt-bold txt-right">{{$payment_receipt->amount}}</td>
										</tr>
									</tbody>
								</table>
								<table cellspacing="0" cellpadding="0" class="invoice">
									<tbody>
										<tr>
											<td class="main-border" style="width: 100%;border-top:none;">
												<br>
												<table cellspacing="0" style="width: 100%;">
													<colgroup>
														<col style="width: 60%">
														<col style="width: 40%">
													</colgroup>
													<tbody>
														<tr>
															<td
																style="border-top:none;border-right:none;border-left:none;vertical-align:top;">
																<table cellspacing="0" style="width: 100%;"
																	class="invoiceInfo">
																	<colgroup>
																		<col style="width: 35%">
																		<col style="width: 65%">
																	</colgroup>
																	<tbody>
																		<tr>
																			<td colspan="2"
																				data-editor=".invoiceInfo td.section_header"
																				class="section_header"
																				style="width:100%;text-align:center;border-bottom:none;">
																				Total in words</td>
																		</tr>
																		<tr>
																			<td colspan="2" class="amount_in_words"
																				data-editor=".invoiceInfo td.amount_in_words">
																			</td>
																		</tr>
																		<tr>
																			<td colspan="2" class="section_header"
																				style="width:100%;text-align:center;border-bottom:none;">
																				Terms and Conditions</td>
																		</tr>
																		<tr>
																			<td colspan="2"
																				style="width:100%;border-bottom:none;"
																				data-editor=".invoiceInfo td .terms_condition_box">
																				<div class="terms_condition_box"></div>
																			</td>
																		</tr>
																	</tbody>
																</table>
															</td>
															<td
																style="border-top:none;vertical-align:top;border-left:1px solid #0070C0;">
																<table cellspacing="0" style="width: 100%;"
																	class="invoiceTotal">
																	<colgroup>
																		<col style="width: 64%">
																		<col style="width: 36%">
																	</colgroup>
																	<tbody>
																		<tr>
																			<td class="txt-bg"
																				data-editor=".invoiceTotal td:not(.special)">
																				Total Amount</td>
																			<td class="txt-bg txt-right">{{$payment_receipt->amount}}</td>
																		</tr>
																		<tr>
																			<td colspan="2" class="txt-right">(E &amp; O.E.)
																			</td>
																		</tr>
																		<tr>
																			<td colspan="2" class="footer_seal_title"
																				data-editor=".invoiceTotal td.footer_seal_title">
																				Certified that the particulars given above
																				are true and correct.</td>
																		</tr>
																		<tr>
																			<td colspan="2" class="footer_seal_name"
																				data-editor=".invoiceTotal td.footer_seal_name">
																				For {{$user_details->name}}</td>
																		</tr>
																		<tr>
																			<td colspan="2"
																				style="border-bottom:none;height:60px;text-align:center;">
																			</td>
																		</tr>
																		<tr>
																			<td colspan="2" class="footer_seal_signature"
																				data-editor=".invoiceTotal td.footer_seal_signature">
																				Authorised Signatory</td>
																		</tr>
																	</tbody>
																</table>
															</td>
														</tr>
													</tbody>
												</table>
											</td>
										</tr>
									</tbody>
								</table>
								<table cellspacing="0" cellpadding="0" class="branding_table">
									<colgroup>
										<col style="width: 80%">
										<col style="width: 20%">
									</colgroup>
									<tbody>
										<tr class="branding_rt">
											<td
												style="padding: 5px 0 0;font-size: 12px;line-height: 15px;font-weight: normal;">
											</td>
											<td
												style="text-align:left;padding: 5px 0 0;font-weight: bold;color: #7A7A7A;font-size: 10px;line-height: 20px;text-transform: uppercase;vertical-align:top;">
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.min.js" ></script>
<script src="{{asset('/js/general.js')}}"></script>
<script>
$(".amount_in_words").text(number2text({{$payment_receipt->amount}}));
</script>



