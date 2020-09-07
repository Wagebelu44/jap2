<?php $this->load->view('common/monitor_header'); ?>

<!-- trainer area start -->
<section class="trainer-area ptb--70" id="monitor_wrap" style="margin-top:50px;">
	<div class="container">
		<div class="section-title">
			<h2 style="">Instagram Likes</h2>
		</div>
		<div class="row" style="min-height:260px;">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped">
						<thead class="thead-dark-custom">
							<tr>
								<th class="text-center"> Service ID</th>
								<th class="text-center"> Service Name</th>
								<th class="text-center"> Start Time </th>
								<th class="text-center"> Finish Time</th>
								<th class="text-center"> Price</th>
								<th class="text-center"> Last Check</th>
							</tr>
						</thead>
						<tbody class="tablebody">

							<?php foreach ($instagramdata as $likes) { ?>
								<?php if($likes['type'] == "Instagram Likes") { ?>
									<tr>
										<td class="text-center"><?php echo $likes['serviceId']; ?></td>
										<td class="text-center"><?php echo $likes['type']; ?></td>
										<td class="text-center">30 Sec</td>
										<td class="text-center">3 Mins 29 Sec</td>
										<td class="text-center">0.3$</td>
										<td class="text-center">4 hours ago</td>
									</tr>
								<?php } ?>
							<?php } ?>

						</tbody>
					</table>
				</div>
			</div>

		</div>




	</div>
</section>


<section class="trainer-area pb--70" id="monitor_wrap">
	<div class="container">
		<div class="section-title">
			<h2 style="">Instagram Followers</h2>
		</div>
		<div class="row" style="min-height:260px;">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped">
						<thead class="thead-dark-custom">
							<tr>
								<th class="text-center"> Service ID</th>
								<th class="text-center"> Service Name</th>
								<th class="text-center"> Start Time </th>
								<th class="text-center"> Finish Time</th>
								<th class="text-center"> Price</th>
								<th class="text-center"> Last Check</th>
							</tr>
						</thead>
						<tbody class="tablebody">
							<tr>
								<td class="text-center">321</td>
								<td class="text-center">ABC</td>
								<td class="text-center">30 Sec</td>
								<td class="text-center">3 Mins 29 Sec</td>
								<td class="text-center">0.3$</td>
								<td class="text-center">4 hours ago</td>
							</tr>
							<tr>
								<td class="text-center">321</td>
								<td class="text-center">ABC</td>
								<td class="text-center">30 Sec</td>
								<td class="text-center">3 Mins 29 Sec</td>
								<td class="text-center">0.3$</td>
								<td class="text-center">4 hours ago</td>
							</tr>
							<tr>
								<td class="text-center">321</td>
								<td class="text-center">ABC</td>
								<td class="text-center">30 Sec</td>
								<td class="text-center">3 Mins 29 Sec</td>
								<td class="text-center">0.3$</td>
								<td class="text-center">4 hours ago</td>
							</tr>
							<tr>
								<td class="text-center">321</td>
								<td class="text-center">ABC</td>
								<td class="text-center">30 Sec</td>
								<td class="text-center">3 Mins 29 Sec</td>
								<td class="text-center">0.3$</td>
								<td class="text-center">4 hours ago</td>
							</tr>
							<tr>
								<td class="text-center">321</td>
								<td class="text-center">ABC</td>
								<td class="text-center">30 Sec</td>
								<td class="text-center">3 Mins 29 Sec</td>
								<td class="text-center">0.3$</td>
								<td class="text-center">4 hours ago</td>
							</tr>
							<tr>
								<td class="text-center">321</td>
								<td class="text-center">ABC</td>
								<td class="text-center">30 Sec</td>
								<td class="text-center">3 Mins 29 Sec</td>
								<td class="text-center">0.3$</td>
								<td class="text-center">4 hours ago</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

		</div>




	</div>
</section>
<!-- trainer area end -->
<?php $this->load->view('common/footer'); ?>