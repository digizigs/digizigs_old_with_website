
<!-- <div class="form-group wp-input">
     <label for="{{ $field['name'] }}" class="col-sm-2 control-label">{{ $field['label'] }}</label>
     <div class="col-sm-10">
         <div class="form-line">
             <input type="{{ $field['type'] }} " 
               name="{{ $field['name'] }}" 
               value="{{ old($field['name'], \setting($field['name'])) }}"
               class="form-control input-sm"
               id="{{ $field['name'] }}">
         </div>
     </div>
 </div> --> 

<div class="form-group wp-input">
  <label for="{{ $field['name'] }}" class="col-sm-3 control-label">{{ $field['label'] }}</label> 
    <div class="col-sm-9 col-xs-12">
      <div class="form-line">
        <!--input  type="{{ $field['type'] }}" 
                id="{{ $field['name'] }}" 
                class="form-control input-sm" 
                name="{{ $field['name'] }}" 
                value="{{ old($field['name'], \setting($field['name'])) }}"-->
        <textarea  id="{{ $field['name'] }}" class="form-control input-sm" name="{{ $field['name'] }}" rows="10" cols="10">{{ old($field['name'], \setting($field['name'])) }}</textarea>
      </div>
    </div>
</div>
