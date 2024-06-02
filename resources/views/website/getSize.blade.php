@foreach($sizes as $size)
    <option value="{{ $size[0]['id'] }}" class="form-control">{{ $size[0]['name'] }}</option>
@endforeach