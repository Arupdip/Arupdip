<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="padding: 0; margin: 0;">
	<div style="padding: 15px; font-family: 'Arial'; font-size: 14px; line-height: 22px;">
		<table width="100%" cellpadding="5" cellspacing="0" border="1">
			<tr>
				<td rowspan="2" width="26%" align="center">
					<img src="{{asset('images/trader-logo.jpg')}}" alt="">
				</td>
				<td colspan="2" align="center">
					<h3 style="margin: 0;">FORM 8-C<br/>[See Rule 49]</h3>
					<h4 style="margin: 0;">License of Commission Agent Under Section 7(1-B) of Andhra Pradesh (Agricultural Produce & Livestock) Markets Act, 1966</h4>
					<h3 style="margin: 0;">Renewal License</h3>
				</td>
			</tr>
			<tr>
				<td>
					<h3 style="margin: 0;">No.{{$body->liscence_no}}</h3>
				</td>
			</tr>
		</table>
		<table width="100%" cellpadding="5" cellspacing="0">
			<tr>
				<td>
					<h3>The Agriculture Market Committee,<br/>Guntur</h3>
				</td>
				<td align="right">
					<img src="{{asset('public/uploads/'.$body->image)}}" alt="" height="160px">
				</td>
			</tr>
		</table>
		<p>As per Rule 49 of the Andhra Pradesh (Agricultural Produce & Live Stock) Markets Act, 1969, <strong> {{$body->name}} S/o {{$body->fathersname}}, {{$body->address}},{{$body->district->name}},{{$body->state->name}} (Cell.No.{{$body->mobile}})</strong> is herby granted Commission Agent License for the notified market and carry business in the premises described in the schedule ' below, subject to the provisions of the Andhra Pradesh (Agricultural Produce & Lie Stock) Market Act, 1966 and Rules 1969, on the following conditions namely: The license is valid from {{$body->issue_date}} to {{$body->expiry_date}}.</p>
		<p>1) The licensee shall be abide by the provisions of the Andhra Pradesh Markets Act, 1966 and the Rules made there under.</p>
		<p>2) The license shall not be transferable. In case of any change in the composition of the partners or Directors of the firm, the same shall be notified / updated to the Director of Marketing within 15 days of suCh change coming into effect.</p>
		<p>3) The license may be suspended or cancelled for violation of the provisions of the Andhra Pradesh (Agricultural Produce & Live Stock) Markets Act, 1966 and the Rules made there under and conditions of this license.</p>
		<p>4) In the event of suspension or cancellation of this license, it shall be surrendered to the Oirector of Marketing.</p>
		<p>5) Licensee shall equip himself to be able to participate in the online trading platform provided by the Government.</p>
		<p>6) The licensee shall make all payments relating to the trade settlement, within the stipulated time limits established through the procedures notified in this regard.</p>
		<p>7) For violation of any of the procedures stipulated for participation on the online marketing platform provided by the government, the licensee shall be liable to be disabled form further participation on the platform.</p>
		<p>8) The licensee Shall generate a takpatti for every lot sold thorough him immediately after price determination -and weighment of the Not is completed. The takpatti shall contain the details of the commodity, the price determined, the weighmnet, total sale value, followed by applicable deductions on amount payable to the seller. A copy each of the tkpatti shall given under acknowledgement to the seller, the market committee and the buyer on the same day.</p>
		<p>9) The licensee shall shall also generate a sale bill for every lot sold thorugh him immediately after price determination and weighment of the lot is completed. The sale bill shall contain the details of the commodity, the price determined, the weighment, total sale value, followed by applicable additions on account of market charges and market fee and the net amount payable by the buyer, A copy each of the sale bill given to the buyer under acknowledgement and to the market committee on the same day.</p>
		<p>10) The licensee shall pay market fee decided in the sale bills from the buyers and remit the same to the market committee on first working day of every week.</p>
		<p>11) The licensee shall not aduiterate or cause adulteration of any notified agricultural produce.</p>
		<p>12) The licensee shall not carry out any other business or activity except that of a commission agent, at the place for which the license is issued.</p>
		<p>13) The licensee shall not solicit or receive any fee or recover any charges other than those which he is entailed to receive or receiver in accordance with the provisions of the Act, and the rules and bye-laws made there under.</p>
		<p>14) The licensee shall provide Electronic weighing scales certified by the officer in the legal metrology department.</p>
		<p>15) The licensee shall inform to the Agricultural Market Committee any changes in the constitution of the licensee.</p>
		<p>16) The licensee shall during business hours on any allow access to an employee of the Market Committee authorizecl*by the said committee to inspect all his of accounts and produce or cause to be produced the same as per Rule and Bye- Laws and directions issued by the market committee.</p>
		<p>17) The licensee shall pay and also facilitate the collection of fees under Section 12 of the said Act, due to the market committee as and when it become due as per the provisions of the Act, Rules and Bye-Laws of the market committee.</p>
		<p>18) The licensee functioning as commission agent shall collect the market fees the purchaser and remit the same to the market committee and shall deliver goods to the purchaser after satisfying himself fully that the purchaser has paid the market fee.</p>
		<p>19) The licensee shall maintain books, registers and records in the manner, required by the Director and shall make them available for inspection to the Secretary of Agricultural Market Committee or any person authorized him.</p>
		<p>20) The licensee shall furnish monthly returns to the Agricultural Market Committee and any information relating to the trade as may be required by the licensing authority from time to time.</p>
		<p>21) The licensee shall refer all his disputes in relation to the marketing of the declared agricultural produce I the manner provided under the Andhra Pradesh (Agricultural Produce & Live Stock) Markets Act, 1966 and Rules 1969.</p>
		<p>22) In case the license issued is defaced, misplaced, tom, lost or accidentally destroyed, etc., a duplicate license on payment of Rs.100.00 may be issued.</p>
		<table width="100%" cellpadding="5" cellspacing="0" border="1">
		  <tr>
		    <th colspan="6" align="center">SCHEDULE UNDER FORM 8-C </th>
		  </tr>
		  <tr>
		    <th>Sl.No.</th>
		    <th>Name of the Taluk </th>
		    <th>Name of the Town </th>
		    <th>Ward Block No. </th>
		    <th>Revenue or Town Survey No. </th>
		    <th>Name of the Block </th>
		  </tr>
		  <tr>
		    <td align="center"><strong>1</strong></td>
		    <td align="center"><strong>2</strong></td>
		    <td align="center"><strong>3</strong></td>
		    <td align="center"><strong>4</strong></td>
		    <td align="center"><strong>5</strong></td>
		    <td align="center"><strong>6</strong></td>
		  </tr>
		  <tr>
		    <td align="center">1</td>
		    <td align="center">{{$body->taluk}}</td>
		    <td align="center">{{$body->town}}</td>
		    <td align="center">{{$body->wardblockno}}</td>
		    <td align="center">{{$body->toensurveyno}}</td>
		    <td align="center">{{$body->nameofblock}}</td>
		  </tr>
		  <tr>
		    <td rowspan="2" align="center"><strong>Plot No</strong> </td>
		    <td rowspan="2" align="center"><strong>Description of Primises</strong> </td>
		    <td colspan="4" align="center"><strong>Boundaries</strong></td>
		  </tr>
		  <tr>
		    <td align="center"><strong>North</strong></td>
		    <td align="center"><strong>East</strong></td>
		    <td align="center"><strong>South</strong></td>
		    <td align="center"><strong>West</strong></td>
		  </tr>
		  <tr>
		    <td align="center"><strong>7</strong></td>
		    <td align="center"><strong>8</strong></td>
		    <td align="center"><strong>9</strong></td>
		    <td align="center"><strong>10</strong></td>
		    <td align="center"><strong>11</strong></td>
		    <td align="center"><strong>12</strong></td>
		  </tr>
		  <tr>
		    <td align="center">{{$body->plotno}}</td>
		    <td align="center">{{$body->descriptionofpremises}} </td>
		    <td align="center">{{$body->boundarynorth}}</td>
		    <td align="center">{{$body->boundaryeast}}</td>
		    <td align="center">{{$body->boundarysouth}}</td>
		    <td align="center">{{$body->boundarywest}}</td>
		  </tr>
		</table>
		<table width="100%" cellpadding="5" cellspacing="0" border="1" style="margin-top: 20px;">
			<tr>
				<th colspan="4">PARTNERSHIP DETAILS</th>
			</tr>
			<tr>
				<th>Sl.No.</th>
				<th>Partner Name</th>
				<th>Share</th>
				<th>PAN/Aadhar Number</th>
			</tr>
			<tr>
				<td align="center">1</td>
				<td>Sri Gorijavolu nanda kishore</td>
				<td align="center"><strong>40</strong></td>
				<td align="center"><strong>6715 0922 2431</strong></td>
			</tr>
			<tr>
				<td align="center">2</td>
				<td>Smt. Gorijavolu Anantha Lakshmi</td>
				<td align="center"><strong>30</strong></td>
				<td align="center"><strong>6302 3486 8659</strong></td>
			</tr>
			<tr>
				<td align="center">3</td>
				<td>Sri Panchumarthi Upendra Chowdary</td>
				<td align="center"><strong>10</strong></td>
				<td align="center"><strong>7216 0390 1611</strong></td>
			</tr>
			<tr>
				<td align="center">4</td>
				<td>Podila Ramakotesware Rao</td>
				<td align="center"><strong>20</strong></td>
				<td align="center"><strong>5566 0141 8655</strong></td>
			</tr>
		</table>
		<div style="margin: 10px 0;">
			<strong>Place: Guntur</strong><br/>
			<strong>Date: {{date('Y-m-d')}}</strong>
		</div>
		<table width="100%" style="margin: 25px 0;">
			<tr>
				<td align="center" width="33.3%">
					<strong>Seal</strong>
				</td>
				<td align="center" width="33.3%">
					<strong>Selection Grade Secretary<br/>
					Agrl. Market Committee Guntur</strong>
				</td>
				<td align="center">
					<strong>Chairman<br/>
					Agrl. Market Committee Guntur</strong>
				</td>
			</tr>
		</table>
	</div>
</body>
</html>

