<option selected="selected" value="">Select item...</option>
@foreach($items as $value => $item)
    <option value="{{ $value }}">{{ $item }}</option>
@endforeach
