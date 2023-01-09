<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<title>Product List Information</title>

		<!-- Favicon -->
		<link rel="icon" href="./images/favicon.png" type="image/x-icon" />

		<!-- Invoice styling -->
		<style>
			body {
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				text-align: center;
				color: #777;
			}

			body h1 {
				font-weight: 300;
				margin-bottom: 0px;
				padding-bottom: 0px;
				color: #000;
			}

			body h3 {
				font-weight: 300;
				margin-top: 10px;
				margin-bottom: 20px;
				font-style: italic;
				color: #555;
			}

			body a {
				color: #06f;
			}

			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
				border-collapse: collapse;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}
		</style>
	</head>

	<body>
         <div class="invoice-box">
			<table>
				<tr class="top">
				   <td colspan="2">
						<table>
							<tr>
								<td class="text-center">
									<h4>Product Information Details</h4>
								</td>
									<img src="{{asset('uploads/users/OIP.jpg')}}" alt="Company logo" style="width: 200%; max-width:200px;" />
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr class="heading">
				    <td>Product ID</td>
				    <td>Product Name</td>
                    <td>Type</td>
                    <td>Coast Price</td>
                    <td>Sale Price</td>
                    <td>Has Stock</td>
					<td>Created At</td>
				</tr>
				@foreach($products as $key=>$product)
				<tr class="information">
				    <td>{{$key+1}}</td>
					<td>{{ $product->product_name }}</td>
                    <td>{{ $product->type }}</td>
                    <td>{{ $product->coast_price }}</td>
                    <td>{{ $product->sale_price }}</td>
                    <td>{{ $product->has_stock }}</td>
					<td>{{($product->created_at->diffforHumans() > 24)?$product->created_at->format('d/m/y h:i:s A'):$product->created_at->diffforHumans()}}</td>
				</tr>
				@endforeach 
			</table>
		</div>
	</body>
 </html>