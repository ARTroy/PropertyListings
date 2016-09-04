{{--<div class='small-4 columns'>
	<label>Advanced
	<div class="switch large">
		<input class="switch-input" id="largeSwitch" type="checkbox" name="exampleSwitch">
		<label class="switch-paddle" for="largeSwitch"></label>
	</div>
	</label>
</div>--}}		
<div class="row">
	<form action="/search">
	<div  class='small-12 columns'>
		<div class="row" style="margin-top:0px">
			<div class='small-12 medium-3 columns' style="padding-top: 6px;">
				<h5 style="border-bottom: solid 2px #b8aa84;">Search</h5>
			</div>
			<div class='small-12 medium-9 columns'>
				<div class="row collapse buttong buttongn">	
					<div class="small-12 medium-6 columns ">
						<button id='resi2' type='button' class='button selected' 
						>Residential</button>
						<input type="radio" value="Residential" name="market" style="display:none;"  checked />

					</div>
					<div class="small-12 medium-6 columns">
						<button id='comm2' type='button' class='button' 
						>Commercial</button> 
						<input type="radio" value="Commercial" name="market" style="display:none;" />
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="small-12 columns">
			<label>Property Type
				<select name="property_type_resi" id='resi_select'>
					<option value="0" id='resi_unset'>Any</option>
					@foreach($residential as $type)
					<option value='{{$type->id}}'>{{$type->type_name}}</option>
				@endforeach
				</select>
				<select name="property_type_comm" id="comm_select" style="display:none" disabled>
					<option value="0" id='comm_unset' >Any</option>
					@foreach($commercial as $type)
					<option value='{{$type->id}}'>{{$type->type_name}}</option>
				@endforeach
				</select>
			</label> 
	</div>
	<div class="small-12 columns">
		<label>Priced between <span id="min_slider_span" class="label_input">£ 0</span> - <span  id="max_slider_span" class="label_input">£ 450,000</span></label>	
  		
  		<input style="display:none;" type="number" id="min_slider" name='min_slider'>
  		<input style="display:none;" type="number" id="max_slider" name='max_slider'>
			<div class="slider" data-slider data-initial-start="0" data-initial-end="450000" data-step="25000" data-start='0' data-end='1250000'
				style="margin-bottom:0.75rem;" 
			>
			<span class="slider-handle"  data-slider-handle role="slider" tabindex="1" aria-controls="min_slider"></span>
			<span class="slider-fill" data-slider-fill></span>
			<span class="slider-handle" data-slider-handle role="slider" tabindex="1" aria-controls="max_slider"></span>
			</div>
			
			<span style="font-family:Arial; font-size: 14px;">£ 0</span><span style="float:right; font-family:Arial; font-size: 14px;">£ 1,250,000+</span>
	</div>
	<div class="small-12 columns">
		<button type="submit" class="float-center button" style="margin-bottom:0px;margin-top:15px">Search</button>
	</div>
	</form>
</div>