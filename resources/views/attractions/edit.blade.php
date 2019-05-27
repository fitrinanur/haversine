@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mb-4" style="margin:10px;">
        <ul class="nav nav-tabs" id="lodgingTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general"
                    aria-selected="true">Umum</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="image-tab" data-toggle="tab" href="#image" role="tab" aria-controls="image"
                    aria-selected="false">Foto</a>
            </li>
        </ul>
        <div class="card-body">
            <div class="tab-content" id="lodgingTabContent">
                <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                    <h3 class="card-title">Edit Data Wisata</h3>
                    <form action="{{ route('attraction.update', $attraction)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama</label>
                            <input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="{{ $attraction->name}}"
                                required>

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
                                <option value="{{$attractionType->id}}" @if ($attraction->attraction_type_id ==
                                    $attractionType->id) selected @endif>{{$attractionType->name}}</option>
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
                            <input type="text" name="address" class="form-control" value="{{ $attraction->address}}" id="exampleFormControlInput1">
                        </div>
                        <input type="hidden" name="city_id" id="city_id" value="{{ $attraction->city_id}}">
                        <input type="hidden" name="province_id" id="province_id" value="{{ $attraction->city->province->id}}">
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
                                    <option value="{{ $city->id }}" @if ($attraction->city_id == $city->id) selected
                                        @endif>{{$city->name}}</option>
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
                            <input type="text" name="phone_number" value="{{ $attraction->phone_number}}" class="form-control"
                                id="exampleFormControlInput1">
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="exampleFormControlInput1">Latitude</label>
                                <input type="text" name="latitude" value="{{ $attraction->latitude}}" class="form-control"
                                    id="exampleFormControlInput1">
                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput1">Longitude</label>
                                <input type="text" name="longitude" value="{{ $attraction->longitude}}" class="form-control"
                                    id="exampleFormControlInput1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Deskripsi</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description">{{ $attraction->address}}
                                </textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Update</button>
                    </form>
                </div>
                <!-- End general tab -->
                <div class="tab-pane fade" id="image" role="tabpanel" aria-labelledby="image-tab">
                    <div class="row">
                        <div style="text-align: center !important; margin-left: 45px">
                            <button href="#" class="btn btn-sm btn-primary" uk-icon="icon: pencil" data-toggle="modal"
                                data-target="#addImage" data-toggle="tooltip"
                                data-placement="right" title="Tambah Gambar">
                                Tambah Gambar
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        @if($attraction->pictures->count())
                        @foreach($attraction->pictures as $image)
                        <div class="col-md-4">
                            <div class="card-body">
                                <div class="text-center">
                                    <img alt="Profile" src="{{ $image->path() }}" class="img-thumbnail" style="max-height: 150px !important;">
                                    <p class="list-item-heading mb-1">{{ $image->name}}</p>

                                    <form action="{{ route('attraction.image-management.destroy',[ 'attraction_id' => $attraction->id , 'image_id' => $image->id ]) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-xs btn-danger default" type="submit">
                                            <span uk-icon="icon: trash"> Hapus</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
                {{--
                <!-- End image tab -->
                <div class="tab-pane fade" id="facility" role="tabpanel" aria-labelledby="facility-tab">
                    @if (auth()->user()->role != 'Admin')
                    <form method="post" action="{{ route('mitra.lodging.update', $lodging) }}">
                        @else
                        <form method="post" action="{{ route('lodging.update', $lodging) }}">
                            @endif
                            @csrf
                            @method('PUT')

                            @foreach ($facilityGroups as $facilityGroup)
                            <b style="padding-bottom: 20px;padding-top: 20px;display: block">{{ $facilityGroup->name }}</b>
                            <div class="row">
                                @foreach($facilities->chunk(4) as $chunked)
                                @foreach($chunked->where('facility_group_id', $facilityGroup->id) as $facility)
                                <div class="col-md-3">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="customCheck{{ $facility->id }}"
                                            name="facilities[]" value="{{ $facility->id }}" @if ($lodging->facilities->find($facility))
                                        checked
                                        @endif>
                                        <label class="custom-control-label" for="customCheck{{ $facility->id }}">
                                            <img src="{{ $facility->picture->path() }}" width="25px" title="{{ $facility->name }}">&nbsp;
                                            {{ $facility->name }}
                                        </label>
                                    </div>
                                </div>
                                @endforeach
                                @endforeach
                            </div>
                            @endforeach

                            @if ($errors->has('facilities'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('facilities') }}</strong>
                            </span>
                            @endif
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mb-0">Update</button>
                            </div>
                        </form>
                </div> --}}
                <!-- End facility tab -->
            </div>
            <!-- End tab content -->
        </div>
    </div>
    <div class="modal fade" id="addImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambahkan Gambar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('attraction.image', $attraction->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                                <label for="exampleFormControlInput1">Gambar</label>
                                <input type="file" name="picture[]" class="form-control-file" id="image" multiple>
                                <div id="image_preview"></div>
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @stop
    @push('javascript')
    <script type="application/javascript">
        $(document).ready(function ($) {
            window.setTimeout(setSelected, 1000);

            function setSelected() {
                var x = $('#city_id').val();
                var y = $('#province_id').val();
                $('#city').val(x);
                $('#province').val(y);
            }
            $('#province').change(function () {
                jQuery.get('/province/' + this.value + '/cities.json', function (cities) {
                    var $cityEl = $('#city');
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
