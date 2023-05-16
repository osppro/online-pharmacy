<?php 
include 'root/config.php';
include 'root/process.php';
$id = $_SESSION['id'];
$rx = dbRow("SELECT * FROM orders WHERE order_id = '$id' ");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Client Invoice</title>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/invoice.css">
	<script type="text/javascript">
    // JavaScript function for printing using div element
    function PrintContent(el){
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
    }
</script>
</head>
<body>
<div class="container bootdey">
<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
			<div class="widget-box">
				<div class="">
					<a href="<?=SITE_URL; ?>" class="btn btn-info"><--Back</a>
				</div>
				<div class="widget-header widget-header-large">
					<h3 class="widget-title grey lighter">
						<i class="ace-icon fa fa-leaf green"></i>
						Online Pharmacy Invoice
					</h3>

					<div class="widget-toolbar no-border invoice-info">
						<span class="invoice-info-label">Invoice:</span>
						<span class="red">#00<?=$rx->order_id; ?></span>

						<br>
						<span class="invoice-info-label">Date:</span>
						<span class="blue"><?=date('jS F, Y', strtotime($rx->order_date)); ?></span>
					</div>

					<div class="widget-toolbar hidden-480">
						<a href="#" onclick="PrintContent('print')">
							<i class="ace-icon fa fa-print"></i>
						</a>
					</div>
				</div>
				<div class="widget-body" id="print">
					<div class="widget-main padding-24">
						<div class="row">
							<div class="col-sm-6">
								<div class="row">
									<div class="col-xs-11 label label-lg label-info arrowed-in arrowed-right">
										<b>Drug Info</b>
									</div>
								</div>

								<div>
									<ul class="list-unstyled spaced">
									<?php $drug = $dbh->query("SELECT * FROM drug_store WHERE drug_id = '".$rx->drug_id."' ");
									while ($rr = $drug->fetch(PDO::FETCH_OBJ)) { ?>
										<li>
											<i class="ace-icon fa fa-caret-right blue"></i>
											<strong>Batch NO. <?=Batch($numAlpha=8,$numNonAlpha=2); ?></strong>
										</li>
										<li>
											<i class="ace-icon fa fa-caret-right blue"></i>
											<strong>Drug Name. <?=$rr->drug_name; ?></strong>
										</li>
										<li>
											<i class="ace-icon fa fa-caret-right blue"></i>
											<strong>Selling Price. <?=$rr->drug_selling_price; ?></strong>
										</li>
									<?php } ?>
									</ul>
								</div>
							</div><!-- /.col -->

							<div class="col-sm-6">
								<div class="row">
									<div class="col-xs-11 label label-lg label-success arrowed-in arrowed-right">
										<b>Customer Info</b>
									</div>
								</div>

								<div>
									<ul class="list-unstyled  spaced">
										<li>
											<i class="ace-icon fa fa-caret-right green"></i>Name: <?=$rx->customer_name; ?>
										</li>

										<li>
											<i class="ace-icon fa fa-caret-right green"></i>Phone: <?=$rx->customer_phone; ?>
										</li>

										<li>
											<i class="ace-icon fa fa-caret-right green"></i>Address: <?=$rx->customer_location; ?>
										</li>
										<li class="divider"></li>
									</ul>
								</div>
							</div><!-- /.col -->
						</div><!-- /.row -->

						<div class="space"></div>

						<div>
							<table class="table table-striped table-bordered">
								<thead>
									<tr>
										<th class="center">#</th>
										<th>Product</th>
										<th class="hidden-xs">Quantity</th>
										<th class="hidden-480">Unit Price</th>
										<th>Total</th>
									</tr>
								</thead>

								<tbody>
								<?php $drug = $dbh->query("SELECT * FROM drug_store WHERE drug_id = '".$rx->drug_id."' ");
								$x = 1; 
									while ($rr = $drug->fetch(PDO::FETCH_OBJ)) { ?>
									<tr>
										<td class="center"><?=$x++; ?></td>
										<td>
											<a href="#"><?=$rr->drug_name; ?></a>
										</td>
										<td class="hidden-xs">
											<?=$rx->customer_qunatity; ?>
										</td>
										<td class="hidden-480"> UGX. <?=$rr->drug_selling_price; ?> </td>
										<td>UGX. <?=number_format($rr->drug_selling_price*$rx->customer_qunatity); ?></td>
									</tr>
								<?php } ?>
								</tbody>
							</table>
						</div>

						<div class="hr hr8 hr-double hr-dotted"></div>

						<div class="row">
							<div class="col-sm-5 pull-right">
						<?php $drug = $dbh->query("SELECT * FROM drug_store WHERE drug_id = '".$rx->drug_id."' ");
								while ($rr = $drug->fetch(PDO::FETCH_OBJ)) { ?>
								<h4 class="pull-right">
									Total amount :
									<span class="red">UGX. <?=number_format($rr->drug_selling_price*$rx->customer_qunatity); ?></span>
								</h4>
							<?php } ?>
							</div>
						</div>
						<div class="space-6"></div>
						<div class="well">
							Thank you for choosing Online Pharmacy.
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</body>
</html>