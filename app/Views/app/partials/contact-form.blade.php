<!-- Start contact-page Area -->
<section class="contact-page-area">
	<div class="container">
		<h2 class="section-title">Ready to Get Started?</h1>
		<p class="tag-description">
			Ready to start a project or want to learn more about our process and how we work with clients? Let’s get it scheduled. Please fill out our project inquiry form in as much detail as possible and we’ll reach out to get the conversation started.
		</p><br><br>
		<div class="row">
			<div class="col-lg-4 d-flex flex-column address-wrap">
				<div class="single-contact-address d-flex flex-row">
					<div class="icon">
						<span class="lnr lnr-home"></span>
					</div>
					<div class="contact-details">
						<h5>Vadodara, Gujarat(India)</h5>
						
					</div>
				</div>
				<div class="single-contact-address d-flex flex-row">
					<div class="icon">
						<span class="lnr lnr-phone-handset"></span>
					</div>
					<div class="contact-details">
						<h5>+91 9712340450</h5>						
					</div>
				</div>
				<div class="single-contact-address d-flex flex-row">
					<div class="icon">
						<span class="lnr lnr-envelope"></span>
					</div>
					<div class="contact-details">
						<h5>info@digizigs.com</h5>						
					</div>
				</div>
			</div>
			<div class="col-lg-8">
				<form class="form-area " id="myForm" action="{{route('app.inquiry')}}" method="post" class="contact-form text-right">
					@csrf
					<div class="row">
						<div class="col-lg-6 form-group form-group-top">
							<input name="name" placeholder="Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Name'"
							 class="common-input mb-20 form-control" required="" type="text">

							<input name="email" placeholder="Email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''"
							 onblur="this.placeholder = 'Email address'" class="common-input mb-20 form-control" required="" type="email">

							<input name="contact" placeholder="Contact Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Contact Number'"
							 class="common-input mb-20 form-control" required="" type="text">
						</div>
						<div class="col-lg-6 form-group">
							<textarea class="common-textarea form-control" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" ></textarea>
						</div>
						<div class="col-lg-12">
							<div class="alert-msg" style="text-align: left;"></div>

							<button class="primary-btn" style="float: right;" data-text="Send Message">
								<span>S</span>
								<span>e</span>
								<span>n</span>
								<span>d</span>
								<span> </span>
								<span>M</span>
								<span>e</span>
								<span>s</span>
								<span>s</span>
								<span>a</span>
								<span>g</span>
								<span>e</span>

							</button>
						</div>
					</div>
				</form>
			</div>			
		</div>
	</div>
</section>
<!-- End contact-page Area -->