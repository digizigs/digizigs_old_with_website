<div class="form-group {{ $errors->has($field['name']) ? ' has-error' : '' }} wp-input">
    <label for="{{ $field['name'] }}" class="col-sm-3 control-label">{{ $field['label'] }}</label>
    <!-- <div class="preview-area">
    	<img src="{{asset('public/images/DZFevicon.png')}}" alt="" style="height: 60px;width: 60px;">
    </div> -->
    <input 	type="{{ $field['type'] }}"
           	name="{{ $field['name'] }}"
           	value="{{ setting($field['name']) }}"
           	class="form-control {{ array_get( $field, 'class') }}"
           	id="{{ $field['name'] }}"
        	placeholder="{{ $field['label'] }}">       
			{{ old($field['name'], \setting($field['name'])) }}
    @if ($errors->has($field['name'])) <small class="help-block">{{ $errors->first($field['name']) }}</small> @endif
</div>