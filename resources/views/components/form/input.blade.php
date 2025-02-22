<!-- to define variable and default variable to pass to components-->
@props([
'type' => 'text',
'name',
'value' => '',
'label' => false,
'placeholder' => false,
])

<!-- {{$attributes}} to echo any un except attribute insert into input -->
<!-- {{$attributes}} to allow insert attributes into input  -->
<!-- the old('اسم الحقل',default value) -->
<div>
    @if($label)
    <label class="mb-2"> {{$label}}</label>
    @endif
    <input type="{{$type}}" name="{{$name}}" placeholder="{{$placeholder}}" value="{{ old($name ,$value ) }}" {{$attributes->class(['form-control','is-invalid'=> $errors->has($name)]) }}>
    @error($name)
    <div class="text-danger">
        {{$message}}
    </div>
    @enderror
</div>
