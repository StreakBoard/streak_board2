@include('pages.header')


	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style type="text/css">
	.panel-title {
	display: inline;
	font-weight: bold;
	}
	.display-table {
		display: table;
	}
	.display-tr {
		display: table-row;
	}
	.display-td {
	   display: table-cell;
		vertical-align: middle;
		width: 61%;
	}

	#herohead  .submit-button {
		display: block;
		margin-top: 30px;
		margin-right: auto;
		margin-left: auto;
		padding: 13px 48px;
		text-align: center;
	}
	#herohead  .w-button {
		background-color: #12a6b1;
		color: white;
		border: 0;
		line-height: inherit;
		text-decoration: none;
		cursor: pointer;
		border-radius: 200px;
	}
	#herohead  .form-body {
        padding: 0px 15% !important;
	}
	#herohead  .form-wrap.account.w-form {
		width: 65%;
	}
	#herohead h1{
		font-weight: 600;
	}


</style>


<div id="herohead" class="form-body">
	<div class="form-holder">
		<div class="inner-div">
			<div class="container">
				<div id="herohead" class="form-body">
					<div class="form-holder">
						<div class="top-header-area">
							<h1 class="h1" style="font-family: Avenir, sans-serif;color: #293b46;font-size: 36px;line-height: 48px;font-weight: 900;text-shadow: none;">Payment for Standard Plan</h1>
						</div>
						<div class="form-wrap account w-form">

						<script src="https://js.stripe.com/v3/"></script>
							<form role="form" action="{{ route('payment.store') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="pk_test_suHvsjLy6fQXdCHl230IN7Fb007dEC4bHH" id="payment-form">
									@csrf
									<label class='form-label'>Name on Card</label>
									<input class='form-style w-input' size='4' maxlength="256" type='text' name="cardinfo" placeholder="Enter Name on Card" required/>

									<label class='form-label'>Card Number</label>
									<input autocomplete='off' class='form-style w-input card-number required' placeholder='4444 4444 4444 4444' value="" maxlength="256" size='20' name="cnum" type='text' required/>
									<div class="row">
										<div class="col-md-4">
											<label class='form-label'>Expiration Month</label>
											<input class='form-style w-input card-expiry-month required' maxlength="256" placeholder='MM' size='2' name="cexp"    value="" type='text' required/>
										</div>
										<div class="col-md-4">
											<label class='form-label'>Expiration Year</label>
											<input class='form-style w-input  card-expiry-year required' maxlength="256" placeholder='YYYY' name="cyear"  size='4' value="" type='text' required/>
										</div>
										<div class="col-md-4">
											<label class='form-label'>CVC</label>
											<input autocomplete='off' class='form-style w-input card-cvc required' maxlength="256" placeholder='123'name="Cvc"  value=""  size='3' type='text' required/>
										</div>
										<?php
										$id =request()->route('id');
										$packages = App\Package::where('id',$id)->first();
										$prices=$packages->price;
										$packagesTitle = $packages->title;
										?>
										<input hidden  value="{{$prices}}" maxlength="256" size='20' name="prices" type='text' required/>
										<input hidden  value="{{$packagesTitle}}" maxlength="256" size='20' name="packagesTitle" type='text' required/>
									</div>
									<button class="submit-button w-button" type="submit">Pay Now({{$prices}})</button>
								<div class="error hide"><div class="alert" style="text-align: center;/*! padding: 20px; */border: 2px solid red;margin-top: 13px;"></div></div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- remove member confirm popup -->
<div class="overLay"></div>
<div class="confirmPopup">
	<p>Remove this member from your team?</p>
	<p><button class="invite-button view w-button yesdelete">Yes</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="invite-button view w-button" onClick="jQuery(this).parent().parent().hide();jQuery('.overLay').hide();">No</button></p>
</div>
<!-- remove member confirm popup -->



</body>
</html>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
    $(function() {

        var $form = $(".require-validation");

        $('form.require-validation').bind('submit', function(e) {

            var $form = $(".require-validation"),

                inputSelector = ['input[type=email]', 'input[type=password]',

                    'input[type=text]', 'input[type=file]',

                    'textarea'
                ].join(', '),

                $inputs = $form.find('.required').find(inputSelector),

                $errorMessage = $form.find('div.error'),

                valid = true;

            $errorMessage.addClass('hide');

            $('.has-error').removeClass('has-error');

            $inputs.each(function(i, el) {

                var $input = $(el);

                if ($input.val() === '') {

                    $input.parent().addClass('has-error');

                    $errorMessage.removeClass('hide');

                    e.preventDefault();

                }

            });

            if (!$form.data('cc-on-file')) {

                e.preventDefault();

                Stripe.setPublishableKey($form.data('stripe-publishable-key'));

                Stripe.createToken({

                    number: $('.card-number').val(),

                    cvc: $('.card-cvc').val(),

                    exp_month: $('.card-expiry-month').val(),

                    exp_year: $('.card-expiry-year').val()

                }, stripeResponseHandler);

            }

        });

        function stripeResponseHandler(status, response) {

            if (response.error) {

                $('.error')

                .removeClass('hide')

                .find('.alert')

                .text(response.error.message);

            } else {

                var token = response['id'];

                $form.find('input[type=text]').empty();

                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");

                $form.get(0).submit();

            }

        }

    });
</script>
@include('pages.footer')
