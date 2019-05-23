<!-- <div class="form-group form-float {{ $errors->has($field['name']) ? ' has-error' : '' }} wp-input">
    <label for="{{ $field['name'] }}" class="col-sm-3 control-label">{{ $field['label'] }}</label>
    <input type="{{ $field['type'] }}"
           name="{{ $field['name'] }}"
           value="{{ old($field['name'], \setting($field['name'])) }}"
           class="form-control {{ array_get( $field, 'class') }}"
           id="{{ $field['name'] }}"
           placeholder="{{ $field['label'] }}">



    @if ($errors->has($field['name'])) <small class="help-block">{{ $errors->first($field['name']) }}</small> @endif
</div> -->

<!-- <div class="form-group form-float col-md-4">
   <div class="form-line">
       <input type="{{ $field['type'] }}" 
               name="{{ $field['name'] }}" 
               value="{{ old($field['name'], \setting($field['name'])) }}"
               class="form-control"
              id="{{ $field['name'] }}"> 

       <label for="{{ $field['name'] }}" class="form-label">{{ $field['label'] }}</label>
   </div>
   @if ($errors->has($field['name'])) <small class="help-block">{{ $errors->first($field['name']) }}</small> @endif
</div> -->

<div class="form-group">
    <label for="{{ $field['name'] }}" class="col-sm-2 control-label">{{ $field['label'] }}</label>
    <div class="col-sm-10">
        <div class="form-line">
            <input type="{{ $field['type'] }}" 
              name="{{ $field['name'] }}" 
              value="{{ old($field['name'], \setting($field['name'])) }}"
              class="form-control"
              id="{{ $field['name'] }}">
        </div>
    </div>
</div> 
