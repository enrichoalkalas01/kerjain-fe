<?php include 'php/head.php'; ?>
<?php include 'php/header.php'; ?>

	<section class="overlape">
		<div class="block no-padding">
			<div data-velocity="-.1" style="background: url(images/resource/mslider1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
			<div class="container fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="inner-header">
							<h3 id="title-jobs"></h3>
							<div class="job-statistic">
								<!-- <span>PART TIME</span> -->
								<p id="location-jobs"><i class="la la-map-marker"></i></p>
								<p id="created-at-jobs"><i class="la la-calendar-o"></i></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="block">
			<div class="container">
				<div class="row">
				 	<div class="col-lg-8 column">
				 		<div class="job-single-sec">
				 			<div class="job-single-head">
				 				<div class="job-thumb" id="company-logo"> <img src="https://lh3.googleusercontent.com/proxy/Wunhqmyz9MJOwBgrPv0ZU9B-PCs_IFvadadbyG37PcYdXO5SA0UMiySFCus5DnMfz9h3JvAluzI1G1GDYsg3IxWm8DxGrwi0yYXJbe2LIXikWYIq8qZJg4YQ6WBiVGtpVI3TCbew" alt="" /> </div>
				 				<div class="job-head-info">
				 					<h4 id="company-jobs">Tix Dog</h4>
				 					<span id="address-jobs">274 Seven Sisters Road, London, N4 2HY</span>
				 					<p><i class="la la-unlink"></i> www.kerja.in</p>
				 					<p><i class="la la-phone"></i> +62 538 963 54 87</p>
				 					<p><i class="la la-envelope-o"></i> contact@kerja.in</p>
				 				</div>
				 			</div><!-- Job Head -->
				 			<div class="job-details" id="jobs-description" style="padding: 25px 5%">
				 				
				 			</div>
				 			<div class="share-bar">
				 				<span>Share</span><a href="#" title="" class="share-fb"><i class="fa fa-facebook"></i></a><a href="#" title="" class="share-twitter"><i class="fa fa-twitter"></i></a>
				 			</div>
				 			
				 		</div>
				 	</div>
				 	<div class="col-lg-4 column">
				 		<a class="apply-thisjob" href="#" title=""><i class="la la-paper-plane"></i>Penerimaan Lowongan</a>
				 		<div class="apply-alternative">
				 			<!-- <a href="#" title=""><i class="fa fa-linkedin"></i> Penerimaan dengan Linkedin</a> -->
				 			<span><i class="la la-heart-o"></i> Difavoritkan</span>
				 		</div>
				 		<div class="job-overview">
				 			<h3>Job Overview</h3>
				 			<ul>
				 				<li><i class="la la-money"></i><h3>Pengajuan Gaji</h3><span id="salary-jobs"></span></li>
				 				<!-- <li><i class="la la-mars-double"></i><h3>Jenis Kelamin</h3><span>Perempuan</span></li> -->
				 				<li><i class="la la-thumb-tack"></i><h3>Level Karir</h3><span id="level-jobs"></span></li>
				 				<li><i class="la la-puzzle-piece"></i><h3>Industri</h3><span id="industrion-jobs">Management</span></li>
				 				<li><i class="la la-shield"></i><h3>Pengalaman</h3><span id="experience-jobs"></span></li>
				 				<li><i class="la la-line-chart "></i><h3>Kualifikasi</h3><span id="qualification-jobs">Sarjana</span></li>
				 			</ul>
				 		</div>
				 		<!-- <div class="extra-job-info">
				 			<span><i class="la la-clock-o"></i><strong>35</strong> Hari</span>
				 			<span><i class="la la-search-plus"></i><strong>35697</strong> Ditampilkan</span>
				 			<span><i class="la la-file-text"></i><strong>300-500</strong> Lowongan</span>
				 		</div> -->
				 	</div>
				</div>
			</div>
		</div>
	</section>

<?php include 'php/footer.php'; ?>

<script type="text/javascript">
	
</script>
<script type="text/javascript">
	let defaultLogo = 'https://lh3.googleusercontent.com/proxy/Wunhqmyz9MJOwBgrPv0ZU9B-PCs_IFvadadbyG37PcYdXO5SA0UMiySFCus5DnMfz9h3JvAluzI1G1GDYsg3IxWm8DxGrwi0yYXJbe2LIXikWYIq8qZJg4YQ6WBiVGtpVI3TCbew';
	var res = window.location.href;
	let id = res.split('http://localhost/kerjain-fe/detail-pekerjaan?=');
	// Call Ajax
	var ajax = new XMLHttpRequest();
	var method = "GET";
	var url = "http://febrianti-laravel.herokuapp.com/jobs-detail/1";// + id[1];
	var asynchronous = true;

	ajax.open(method, url, asynchronous);
	
	// Sending ajax request
	ajax.send();	

	// Receiving response from data.php
	ajax.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			// Converting JSON back to array
			var dataJobs = JSON.parse(this.responseText);
			console.log(dataJobs); // For Debugging

			$('#company-jobs').html(dataJobs.jobsDetail.company)
			$('#company-logo').html(`<img src="`+ defaultLogo +`" alt="`+defaultLogo+`"/>`)
			$('#title-jobs').html(dataJobs.jobsData.title)
			$('#created-at-jobs').append(dataJobs.jobsData.created_at)
			$('#location-jobs').append(dataJobs.jobsData.location)
			$('#jobs-description').append(dataJobs.jobsDetail.description_detail)
			$('#salary-jobs').html(dataJobs.jobsDetail.salary)
			$('#level-jobs').html(dataJobs.jobsDetail.jobs_level)
			$('#industrion-jobs').html(dataJobs.jobsDetail.industrion)
			$('#experience-jobs').html(dataJobs.jobsDetail.experience)
			$('#qualification-jobs').html(dataJobs.jobsDetail.qualification)
		}
	};

	// `<div class="job-listing wtabs">
	// 	<div class="job-title-sec">
	// 		<div class="c-logo"> <img src="images/resource/l1.png" alt="" /> </div>
	// 		<h3><a href="detail-pekerjaan.php" title="">Web Designer / Developer</a></h3>
	// 		<span>Massimo Artemisis</span>
	// 		<div class="job-lctn"><i class="la la-map-marker"></i>Jakarta</div>
	// 	</div>
	// 	<div class="job-style-bx">
	// 		<span class="job-is ft">Full time</span>
	// 		<span class="fav-job"><i class="la la-heart-o"></i></span>
	// 		<i>5 bulan yang lalu</i>
	// 	</div>
	// </div>`
</script>