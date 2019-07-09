<!-- <div class="form-group {{ $errors->has($field['name']) ? ' has-error' : '' }} wp-input">
    <label for="{{ $field['name'] }}" class="col-sm-3 control-label">{{ $field['label'] }}</label>
    <input type="{{ $field['type'] }}"
           name="{{ $field['name'] }}"
           value="{{ old($field['name'], \setting($field['name'])) }}"
           class="form-control {{ array_get( $field, 'class') }}"
           id="{{ $field['name'] }}"
           placeholder="{{ $field['label'] }}">

    @if ($errors->has($field['name'])) <small class="help-block">{{ $errors->first($field['name']) }}</small> @endif
</div> -->


<div class="form-group wp-input">
    <label for="{{ $field['name'] }}" class="col-sm-3 control-label">{{ $field['label'] }}</label>
    <div class="col-sm-9 col-xs-12">
        <div class="form-line">
            <input  type="{{ $field['type'] }}" 
       			    name="{{ $field['name'] }}" 
       		    	value="{{ old($field['name'], \setting($field['name'])) }}"
       			    class="form-control {{ array_get( $field, 'class') }} input-sm"
                id="{{ $field['name'] }}">
        </div>
    </div>
    @if ($errors->has($field['name'])) <small class="help-block">{{ $errors->first($field['name']) }}</small> @endif
</div>  