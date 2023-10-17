@extends('layouts.home')
@section('content')
	@include('dashboard/nav')

	<style>
		.payment-withdraw a {
			color: #f72e5e;
		}
	</style>
	<div class="right-all">
		<div id="head-title" class="col-lg-12">
			<div class="dashboard_head">
				<h2>Payment Withdraw</h2>
				<p>You can withdraw you payment with easy step</p>
			</div>
		</div>
		<div class="col-lg-12" id="extra-pad-n1">
			@if(session()->has('success'))
				<div class="alert alert-success">
					{{ session()->get('success') }}
				</div>
			@endif
			@if(session()->has('error'))
				<div class="alert alert-danger">
					{{ session()->get('error') }}
				</div>
			@endif
			<div id="payments" class="tab-content">
				<div class="setting-page" style="background:#fff;padding:15px 20px 20px 20px; margin-top:-5px">
					<h4 style="margin-bottom: 12px;">My Balance </h4>
					<div class="card-all">
						<div class="card-body1">
							<div class="d-flex_all">
								<div class="wallet-b">
									<p class="mb-0">Available</p>
									<h3 id="aval_bal">Rs: {{ $availableBalance }}/-</h3>
								</div>
								<div class="wallet-b">
									<p class="mb-0">Pending</p>
									<h3 id="pending_bal">Rs: {{ $pendingAmount }}/-</h3>
								</div>
								<div class="wallet-b">
									<p class="mb-0">Total Withdraw</p>
									<h3 id="success_bal">Rs: {{ $withdrawAmount }}/-</h3>
								</div>
								<div class="clear"></div>
							</div>
						</div>
					</div>
					<div id="withdraw-block">
						<h4 style="margin-bottom: 12px;">Withdraw Amount </h4>
						<form id="form1" action="{{ route('payout.request') }}" method="POST">
							{{ csrf_field() }}
							@if($errors->has('amount'))
								<div class="error">{{ $errors->first('amount') }}</div>
							@endif
							<input placeholder="0.00" min="{{ $numericMinPayoutAmount }}" type="number" id="amount" name="amount" style="border:1px solid #eaeaea;width:400px;padding:8px 20px 5px 20px;margin-right:6px;" />
							<button type="button" onclick="checkavaliblebal({{$availableBalance}})" class="">Submit</button>
							<p>Note: Only Available amount greater than {{ $minPayoutAmount }} will be withdrawn</p>
						</form>
					</div>
					@if(!request()->query('editbankdetails') && isset($userpaymentdetils->paymentmethods[0]->bankdetil))
						<div id="bank-block-details">
							<h4 style="margin-bottom: 12px;">Bank Details <a type="button" href="?editbankdetails=1"><i class="fa fa-edit"></i> Edit</a></h4>
							<p>Note: Please check you bank details we will send money on your given account number</p>
							<div style="clear:both; overflow:"></div>
							<div id="bank-details">
								<p><span>Bank Name: </span> {{$userpaymentdetils->paymentmethods[0]->bankdetil->bank_name}}</p>
								<p><span>Account Number: </span>{{$userpaymentdetils->paymentmethods[0]->bankdetil->account_no}}</p>
								<p><span>IFCS Code: </span> {{$userpaymentdetils->paymentmethods[0]->bankdetil->ifsc_code}}</p>
								<p><span>State: </span> {{$userpaymentdetils->paymentmethods[0]->bankdetil->states->name}}</p>
								<p><span>City: </span> {{$userpaymentdetils->paymentmethods[0]->bankdetil->city}}</p>
								@if($paypal)
									<p><span>Paypal: </span> {{$paypal->paypal_id}}</p>
									@endif
							    	@if($upi)
									<p><span>Upi: </span> {{$upi->upi_id}}</p>
									@endif
							</div>
						</div>
					@elseif(isset($userpaymentdetils->paymentmethods[0]->bankdetil))
					<div id="bank-block">
						<form action="{{url('addbankdetails')}}" method="POST">
							{{ csrf_field() }}
							<h4 style="margin-bottom: 12px;">Billing Information - Bank Details </h4>
							<p>Note: Share your bank detials to with money</p>
							@if($errors->has('bank_name'))
								<div class="error">{{ $errors->first('bank_name') }}</div>
							@endif
							<select name="bank_name"
								style="border:1px solid #eaeaea;width:400px;margin-right:10px;padding:6px 20px 4px 20px;float:left">
								<option value="">Select Bank Name</option>
								@foreach ($banks as $bank)
									<option value="{{ $bank }}">{{ $bank }}</option>
								@endforeach
							</select>
							@if($errors->has('account_no'))
								<div class="error">{{ $errors->first('account_no') }}</div>
							@endif
							<input value="{{$userpaymentdetils->paymentmethods[0]->bankdetil->account_no}}" name="account_no" placeholder="Account Number" type="text" style="border:1px solid #eaeaea;width:400px;padding:8px 20px 5px 20px" />
							<div style="clear:both; overflow:hidden;width: 100%;height: 10px;"></div>
							@if($errors->has('account_no_confirmation'))
								<div class="error">{{ $errors->first('account_no_confirmation') }}</div>
							@endif
							<input value="{{$userpaymentdetils->paymentmethods[0]->bankdetil->account_no}}"  name="account_no_confirmation" placeholder="Confirm Account Number" type="text" style="margin-right: 6px; border:1px solid #eaeaea;width:400px;padding:8px 20px 5px 20px">
							@if($errors->has('ifsc_code'))
								<div class="error">{{ $errors->first('ifsc_code') }}</div>
							@endif
							<input value="{{$userpaymentdetils->paymentmethods[0]->bankdetil->ifsc_code}}"  name="ifsc_code" placeholder="IFSC Code" type="text" style="border:1px solid #eaeaea;width:400px;padding:8px 20px 5px 20px">
							<div style="clear:both; overflow:hidden;width: 100%;height: 10px;"></div>
							@php
								$states = \App\Models\States::where('country_id',101)->get();
							@endphp
							@if($errors->has('state_id'))
								<div class="error">{{ $errors->first('state_id') }}</div>
							@endif
							<select name="state_id" style="border:1px solid #eaeaea;width:400px;margin-right:10px;padding:6px 20px 4px 20px;float:left">
								@foreach($states as $state )
									<option {{(int)+$userpaymentdetils->paymentmethods[0]->bankdetil->state_id === $state->id?'selected':'' }} value="{{$state->id}}" >{{$state->name}}</option>
								@endforeach
							</select>
							@if($errors->has('city'))
								<div class="error">{{ $errors->first('city') }}</div>
							@endauth
							<input value="{{$userpaymentdetils->paymentmethods[0]->bankdetil->city}}"  name="city" placeholder="Cities" type="text" style="border:1px solid #eaeaea;width:400px;padding:8px 20px 5px 20px;margin-right:6px;">
							<div style="clear:both; overflow:hidden;width: 100%;height: 10px;"></div>
							<input value="{{$userpaymentdetils->paymentmethods[0]->bankdetil->phone_no}}"  placeholder="Phone Number" name="phone_no" type="text" style="border:1px solid #eaeaea;width:400px;padding:8px 20px 5px 20px">
							@if($errors->has('phone_no'))
								<div class="error">{{ $errors->first('phone_no') }}</div>
							@endif
							<div style="clear:both; overflow:"></div>
							<button type="submit">Save</button>
						</form>
					</div>
					<div id="paypal-block">
						<form action="{{url('addpaypaldetails')}}" method="POST">
							{{csrf_field()}}
							<h4 style="margin-bottom: 12px;">Paypal </h4>
							<p>Note: For International transaction</p>
							@if($paypal)
								<input value="{{$paypal->paypal_id}}"  name="paypal_id" placeholder="Paypal Id" type="text" style="border:1px solid #eaeaea;width:400px;padding:8px 20px 5px 20px;margin-right:6px;">
							@elseif(isset($userpaymentdetils->paymentmethods[1]) && $userpaymentdetils->paymentmethods[1]->paypaldetails)
								<input value="{{$userpaymentdetils->paymentmethods[1]->paypaldetails->paypal_id}}"  name="paypal_id" placeholder="Paypal Id" type="text" style="border:1px solid #eaeaea;width:400px;padding:8px 20px 5px 20px;margin-right:6px;">
							@else
								<input name="paypal_id" placeholder="Paypal Id" type="text" style="border:1px solid #eaeaea;width:400px;padding:8px 20px 5px 20px;margin-right:6px;">
							@endif
							@if($errors->has('paypal_id'))
								<div class="error">{{ $errors->first('phone_no') }}</div>
							@endif
							<button type="submit" class="btn59">Save</button>
						</form>
					</div>
						<div id="paypal-block">
						<form action="{{url('addupidetails')}}" method="POST">
							{{csrf_field()}}
							<h4 style="margin-bottom: 12px;">UPI Id: </h4>
							<p>Note: For national transaction</p>
							@if($upi)
								<input value="{{$upi->upi_id}}"  name="upi_id" placeholder="Upi Id" type="text" style="border:1px solid #eaeaea;width:400px;padding:8px 20px 5px 20px;margin-right:6px;">
							@elseif(isset($userpaymentdetils->paymentmethods[1]) && $userpaymentdetils->paymentmethods[1]->paypaldetails)
								<input value="{{$userpaymentdetils->paymentmethods[1]->paypaldetails->paypal_id}}"  name="upi_id" placeholder="Upi Id" type="text" style="border:1px solid #eaeaea;width:400px;padding:8px 20px 5px 20px;margin-right:6px;">
							@else
								<input name="upi_id" placeholder="Upi Id" type="text" style="border:1px solid #eaeaea;width:400px;padding:8px 20px 5px 20px;margin-right:6px;">
							@endif
							@if($errors->has('paypal_id'))
								<div class="error">{{ $errors->first('phone_no') }}</div>
							@endif
							<button type="submit" class="btn59">Save</button>
						</form>
					</div>
				
				@else
				 	<div id="bank-block">
						<form action="{{url('addbankdetails')}}" method="POST">
							{{ csrf_field() }}
							<h4 style="margin-bottom: 12px;">Billing Information - Bank Details </h4>
							<p>Note: Share your bank detials to with money</p>
							@if($errors->has('bank_name'))
								<div class="error">{{ $errors->first('bank_name') }}</div>
							@endif
							<select name="bank_name" style="border:1px solid #eaeaea;width:400px;margin-right:10px;padding:6px 20px 4px 20px;float:left">
								<option value="">Bank Name</option>
								<option value="SBI" >SBI</option>
								<option value="Axis">Axis</option>
							</select>
							@if($errors->has('account_no'))
								<div class="error">{{ $errors->first('account_no') }}</div>
							@endif
							<input value="{{@old('account_no')}}" name="account_no" placeholder="Account Number" type="text" style="border:1px solid #eaeaea;width:400px;padding:8px 20px 5px 20px" />
							<div style="clear:both; overflow:hidden;width: 100%;height: 10px;"></div>
							@if($errors->has('account_no_confirmation'))
								<div class="error">{{ $errors->first('account_no_confirmation') }}</div>
							@endif
							<input value="{{@old('account_no_confirmation')}}"  name="account_no_confirmation" placeholder="Confirm Account Number" type="text" style="margin-right: 6px; border:1px solid #eaeaea;width:400px;padding:8px 20px 5px 20px" />
							@if($errors->has('ifsc_code'))
								<div class="error">{{ $errors->first('ifsc_code') }}</div>
							@endif
							<input value="{{@old('ifsc_code')}}"  name="ifsc_code" placeholder="IFSC Code" type="text" style="border:1px solid #eaeaea;width:400px;padding:8px 20px 5px 20px">
							<div style="clear:both; overflow:hidden;width: 100%;height: 10px;"></div>
							@php
								$states = \App\Models\States::where('country_id',101)->get();
							@endphp
							@if($errors->has('state_id'))
								<div class="error">{{ $errors->first('state_id') }}</div>
							@endif
							<select name="state_id" style="border:1px solid #eaeaea;width:400px;margin-right:10px;padding:6px 20px 4px 20px;float:left">
								@foreach($states as $state )
									<option {{@old('state_id')?'selected':'' }} value="{{$state->id}}" >{{$state->name}}</option>
								@endforeach
							</select>
							@if($errors->has('city'))
								<div class="error">{{ $errors->first('city') }}</div>
							@endif
							<input value="{{@old('city')}}"  name="city" placeholder="Cities" type="text" style="border:1px solid #eaeaea;width:400px;padding:8px 20px 5px 20px;margin-right:6px;" />
							<div style="clear:both; overflow:hidden;width: 100%;height: 10px;"></div>
							<input value="{{@old('phone_no')}}"  placeholder="Phone Number" name="phone_no" type="text" style="border:1px solid #eaeaea;width:400px;padding:8px 20px 5px 20px">
							@if($errors->has('phone_no'))
								<div class="error">{{ $errors->first('phone_no') }}</div>
							@endif
							<div style="clear:both; overflow:"></div>
							<button type="submit">Save</button>
						</form>
					</div>
					<div id="paypal-block">
						<form action="{{url('addpaypaldetails')}}" method="POST">
							{{csrf_field()}}
							<h4 style="margin-bottom: 12px;">Paypal </h4>
							<p>Note: For International transaction</p>
							<input value="{{@old('paypal_id')}}"  name="paypal_id" placeholder="Paypal Id" type="text" style="border:1px solid #eaeaea;width:400px;padding:8px 20px 5px 20px;margin-right:6px;">
							@if($errors->has('paypal_id'))
								<div class="error">{{ $errors->first('phone_no') }}</div>
							@endif
							<button type="submit" class="btn59">Save</button>
						</form>
					</div>
					
					
					
								
			<div id="paypal-block">
						<form action="{{url('addpaypaldetails')}}" method="POST">
						 
							<h4 style="margin-bottom: 12px;">UPI ID </h4>
							<p>Gpay / Phone pay</p>
							<input value="{{@old('paypal_id')}}"  name="paypal_id" placeholder="Paypal Id" type="text" style="border:1px solid #eaeaea;width:400px;padding:8px 20px 5px 20px;margin-right:6px;">
						 
							<button type="submit" class="btn59">Save</button>
						</form>
					</div>
					
					
				</div>
			@endif
		</div>
		<div id="payment-history">
			<div class="setting-page" style="background:#fff;padding:20px;margin-top:10px">
				<h4 style="margin-bottom: 12px;">Payment History </h4>
				<table>
					<tbody>
						<tr>
							<th>Transaction Id</th>
							<th>Amount</th>
							<th>Status</th>
							<th>Date</th>
							<th>Payment Date</th>
						</tr>
						@if($transactions && count($transactions) > 0)
							@foreach($transactions as $transaction)
								<tr>
									<td>{{ $transaction->txn_id .(strpos($transaction->type, 'credit') === false ? "" : $transaction->id) }}</td>
									<td>{{ to_amount($transaction->amount) }}</td>
									<td><span class="dr-am-red"> {{ $transaction->status }}</span></td>
									<td>{{ $transaction->created_at->format("d M, Y") }}</td>
									<td>{{ $transaction->updated_at->format("d M, Y") }}</td>
								</tr>
							@endforeach
						@else
							<tr>
								<td colspan="6">No transaction found.</td>
							</tr>
						@endif
					</tbody>
				</table>
			</div>
		</div>
			<div id="payment-history">
			<div class="setting-page" style="background:#fff;padding:20px;margin-top:10px">
				<h4 style="margin-bottom: 12px;">Pending Payment History </h4>
				<table>
					<tbody>
						<tr>
							<th>Transaction Id</th>
							<th>Amount</th>
							<th>Status</th>
							<th>Request Date</th>
						</tr>
						@if($payouts && count($payouts) > 0)
							@foreach($payouts as $key=>$payout)
								<tr>
								    <td>{{$key+1}}</td>
									<td>{{ to_amount($payout->amount) }}</td>
									<td><span class="dr-am-red"> {{ $payout->is_pending }}</span></td>
									<td>{{ $payout->created_at->format("d M, Y") }}</td>
								</tr>
							@endforeach
						@else
							<tr>
								<td colspan="6">No transaction found.</td>
							</tr>
						@endif
					</tbody>
				</table>
			</div>
		</div>
		
		
	</div>
</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	<script>
		const checkavaliblebal = bal => {
			$('#form1').submit();
			var value = parseInt($('#amount').val());
			if(value >=1 ){
				if( bal >= value){
				  
					$('#form1').submit();
				}else{
					alert("Avalible balance is less than 1500!");
				} 
			}else{
				alert("Please enter amout greater than  1500!");  
			}
		}
	    $(document).ready(function(){
	         
	    });
	</script>
@endsection
