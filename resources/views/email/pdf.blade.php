<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="padding: 0; margin: 0;">
	<div style="padding: 15px; font-family: 'Arial'; font-size: 14px; line-height: 22px;">
		<div style="text-align: center;">
			<img src="logo.jpg" alt="">
			<h3 style="color: #27ae60; margin-top: 0;">Agricultural Marketing Department<br/>Government of Andhra Pradesh</h3>
			<h4>FORM 8-A</h4>
			<h4>(See Rule 48)</h4>
			<h4>Single State Wide Trader License for operating as Trader under Section 7(1-A) of Andhra Pradesh<br/>(Agricultural Produce & Live Stock) Markets Act,1966</h4>
			<h4>ORIGINAL LICENSE</h4>
		</div>
		<table width="100%">
			<tr>
				<td width="25%">
					<img src="Shaik-Rafi.jpg" alt="" height="150px">
				</td>
				<td>
					<table width="100%" cellpadding="0" cellspacing="0" border="1">
						<tr>
							<td>Trader Name</td>
							<td><strong>{{$body->name}}</strong></td>
						</tr>
						<tr>
							<td>License Number</td>
							<td><strong>{{$body->liscence_no}}</strong></td>
						</tr>
						<tr>
							<td>License Isssued On</td>
							<td><strong>{{$body->issue_date}}</strong></td>
						</tr>
						<tr>
							<td>License Expires On</td>
							<td><strong>{{$body->expiry_date}}</strong></td>
						</tr>
						<tr>
							<td>Issued AMC Name</td>
							<td><strong>{{$body->amc->name}}</strong></td>
						</tr>
					</table>
				</td>
				<td width="25%" align="right">
					<img src="qr-code.jpg" alt="" height="150px">
				</td>
			</tr>
		</table>
		<p>Single State wide Trader License is hereby granted to <strong> {{$body->firmaddress}} {{$body->firmpincode}} {{$body->district->name}}R.N. ENTERPRISES, WARD NO:41, ROHITH COTTON GINNING MILL, GANGAMMA ESTATE, ETUKUR ROAD, Guntur-522003 , 8919038568</strong> herein after referred to as the license on payment of fee of Rs 5000/- for operating as trader for purchase/sale of notified agricultural produce, livestock and products of livestock in the entire state of the Andhra Pradesh. This License is valid upto <strong>{{$body->expiry_date}}</strong>, subject to provisions of the Andhra Pradesh (Agricultural Produce & Live Stock) Markets Act, 1966 and Rules 1969, on the following conditions namely:-</p>
		<p>1. This license shall abide by the provisions of the Andhra Pradesh Markets Act, 1966 and the Rules 1966 made thereunder.</p>
		<p>2. This license shall not be transferrable, in case of any change in the composition of the partners or directors of the firm, the same shall be notified/updated to the Director of Marketing within 15 days of such change coming into effect.</p>
		<p>3. This license may be suspended or cancelled for violation of provisions of the Andhra Pradesh (Agricultural Products & Live Stock) Markets Act, 1996 and the rules made thereunder and conditions of this license.</p>
		<p>4. In the event of suspension or cancellation of this license, it shall be surrendered to the Director of Marketing.</p>
		<p>5. This license permits the licensee to participate in the trade in any notified market area in the state.</p>
		<p>6. The licensee shall equip himself to be able to participate in the online trading platform provided by the Government.</p>
		<p>7. This license shall make all payments relating to the trade settlement, within the stipulated time limits established through the procedures notified in this regard.</p>
		<p>8. For violation of any of the procedures stipulated for participating on the online marketing platform provided by the government, the licensee shall be liable to be disabled from further participation on the platform.</p>
		<p>9. This license shall at times transport the purchased notified commodities only under the authority of an e-transport permit obtained from the online marketing platform provided by the Government.</p>
		<p>10. This license shall during business hours on any day allow access to an employee of the Market Committee concerned authorized by the said committee and the person authorized by the Director of Marketing to inspect the business premises and all his books of accounts and produce or cause to be produced the same.</p>
		<p>11. The licensee shall pay market fees as prescribed, to the concerned Market Committee, in the manner laid down from time to time.</p>
		<p>12. This license shall not adulterate or cause adulteration of any notified agricultural produce.</p>
		<p>13. The licensee shall maintain books, registers and records in the manner, required by the Director and shall make them available for inspection to the Director of Marketing or any person authorized by him.</p>
		<p>14. The licensee shall furnish monthly returns to the respective Agricultural Market Committees and licensing authority and any information relating to the trade as may be required by the licensing authority from time to time.</p>
		<p>15. The licensee shall livestock and products of livestock refer all his disputes in relation to the marketing of the notified agricultural produce, in the manner provided under the Andhra Pradesh (Agricultural Produce & Live Stock) Markets Act, 1966 and Rules 1969.</p>
		<p>16. In case, this license issued is defaced, misplaced, torn, lost or accidentally destroyed, etc., a duplicate license on payment of Rs.100.00 may be issued.</p>
		<div>
			<strong>Date:</strong> {{date('Y-m-d')}}<br/>
			<strong>Place:</strong> Guntur
		</div>
		<div style="text-align: right; margin-top: 30px;">
			<strong>
				Digitally signed by Isireddy<br/>
				Venkateswarareddy<br/>
				Date: {{date('Y-m-d H:i:s')}}
			</strong>
		</div>
	</div>
</body>
</html>
{{-- @php

die();
@endphp --}}