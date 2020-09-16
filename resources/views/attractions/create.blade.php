@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card" style="margin:10px">
                <div class="card-body">
                    <h3 class="card-title">Tambah Data Wisata</h3>
                    <form action="{{ route('attraction.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama</label>
                            <input type="text" name="name" class="form-control" id="exampleFormControlInput1" required>

                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Tipe Wisata</label>
                            <select class="form-control select2-single {{ $errors->has('attractionType') ? ' is-invalid' : '' }}"
                                name="attractionType" required>
                                @foreach ($attractionTypes as $attractionType)
                                <option value="{{$attractionType->id}}">{{$attractionType->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('attractionType'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('attractionType') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Alamat</label>
                            <input type="text" name="address" class="form-control" id="exampleFormControlInput1">
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="exampleFormControlInput1">Provinsi</label>
                                <select class="form-control select2-single {{ $errors->has('provincy') ? ' is-invalid' : '' }}"
                                    name="provincy" id="province" required>
                                    @foreach ($provincies as $provincy)
                                    <option value="{{ $provincy->id }}">{{$provincy->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('provincy'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('provincy') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput1">Kota</label>
                                <select class="form-control select2-single {{ $errors->has('city') ? ' is-invalid' : '' }}"
                                    name="city" id="city" required>
                                    @foreach ($cities as $city)
                                    <option value="">{{$city->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('city'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('city') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Telepon</label>
                            <input type="text" name="phone_number" class="form-control" id="exampleFormControlInput1">
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="exampleFormControlInput1">Latitude</label>
                                <input type="text" name="latitude" class="form-control" id="exampleFormControlInput1">
                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput1">Longitude</label>
                                <input type="text" name="longitude" class="form-control" id="exampleFormControlInput1">
                            </div>
                        </div><br>
						 <div class="form-group">
                            <label for="exampleFormControlInput1">Youtube Link</label>
                            <input type="text" name="youtube_link" class="form-control" id="exampleFormControlInput1">
                        </div>
						 <div class="form-group">
                            <label for="exampleFormControlInput1">Instagram Link</label>
                            <input type="text" name="instagram_link" class="form-control" id="exampleFormControlInput1">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Gambar</label>
                            <input type="file" name="picture[]" class="form-control-file" id="image" multiple>
                            <div id="image_preview"></div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Deskripsi</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description">

                        </textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Tambahkan Wisata</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@push('javascript')
<script type="application/javascript">
    $(document).ready(function ($) {
        $('#province').change(function () {
            jQuery.get('/province/' + this.value + '/cities.json', function (cities) {
                var $cityEl = $('#city');
                console.log(cities);
                // Clear state select
                $cityEl.find('option').remove().end();

                cities.map(function (city) {
                    $cityEl.append('<option value="' + city.id + '">' + city.name +
                        '</option>');
                });
            });
        });
        $("#image").change(function () {
            $('#image_preview').html("");
            var total_file = document.getElementById("image").files.length;
            for (var i = 0; i < total_file; i++) {
                $('#image_preview').append("<img src='" + URL.createObjectURL(event.target.files[i]) +
                    "' class='img_preview img-thumbnail' style='min-height:150px;max-width:200px;'>"
                );
                $(".remove").click(function () {
                    $(this).parent(".pip").remove();
                });

            }

        });
    });

</script>
@endpush
