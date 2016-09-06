<div class="column" >
	<h5>{{$property->title}}</h5>
	
	<img style="width:235px; display:block;" src="images/{{$property->image_thumb_file_name}}" class="thumbnail " alt="{{$property->property_type->type_name}}">
	
	<span class="numeric_money money_cover" 
	>£ {{number_format($property->asking_value)}}</span>
</div>