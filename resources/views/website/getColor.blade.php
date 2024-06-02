@foreach($colors as $color)
    <option value="{{ $color[0]['id'] }}" class="form-control">{{ $color[0]['name'] }}</option>
@endforeach