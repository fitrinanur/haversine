@extends('layouts.master')

@section('content')
@push('scripts')
<style>
    .wrapper {
        background-color : #75A353;
        margin-top: 10px;
    }
    .footer { 
        margin: 0px !important;
    }
</style>
@endpush
<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider="clsActivated: uk-transition-active; center: true">
    <ul class="uk-slider-items uk-grid">
        <li class="uk-width-3-4">
            <div class="uk-panel">
                <img src="{{ asset('img/1.jpg')}}" alt="">
                <div class="uk-overlay uk-overlay-primary uk-position-bottom uk-text-center uk-transition-slide-bottom">
                    <h3 class="uk-margin-remove">Bottom</h3>
                    <p class="uk-margin-remove">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>
        </li>
        <li class="uk-width-3-4">
            <div class="uk-panel">
                <img src="{{ asset('img/1.jpg')}}" alt="">
                <div class="uk-overlay uk-overlay-primary uk-position-bottom uk-text-center uk-transition-slide-bottom">
                    <h3 class="uk-margin-remove">Bottom</h3>
                    <p class="uk-margin-remove">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>
        </li>
        <li class="uk-width-3-4">
            <div class="uk-panel">
                <img src="{{ asset('img/1.jpg')}}" alt="">
                <div class="uk-overlay uk-overlay-primary uk-position-bottom uk-text-center uk-transition-slide-bottom">
                    <h3 class="uk-margin-remove">Bottom</h3>
                    <p class="uk-margin-remove">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>
        </li>
        <li class="uk-width-3-4">
            <div class="uk-panel">
                <img src="{{ asset('img/1.jpg')}}" alt="">
                <div class="uk-overlay uk-overlay-primary uk-position-bottom uk-text-center uk-transition-slide-bottom">
                    <h3 class="uk-margin-remove">Bottom</h3>
                    <p class="uk-margin-remove">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>
        </li>
    </ul>

    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

</div>
<div class="wrapper">
    <div class="uk-grid-collapse uk-child-width-expand@s uk-text-center wrapper" uk-grid>
        <div class="vision">
            <div class="uk-background uk-padding">
                <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid>
                    <div class="uk-card-media-left uk-cover-container">
                        <img src="{{ asset('img/1.jpg')}}" alt="" uk-cover>
                        <canvas width="600" height="400"></canvas>
                    </div>
                    <div>
                        <div class="uk-card-body">
                            <h3 class="uk-card-title">Visi</h3>
                            <p>“Terwujudnya Yogyakarta sebagai salah satu destinasi terkemuka di Asia Tenggara pada
                                tahun 2025 berdasarkan keunggulan produk wisata yang berkualitas, berwawasan budaya,
                                berwawasan lingkungan, berkelanjutan dan menjadi salah satu pendorong tumbuhnya ekonomi
                                kerakyatan.”</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mission">
            <div class="uk-background uk-padding">
                <div class="uk-card uk-card-default uk-grid-collapse uk-margin" uk-grid>
                    <div class="uk-card-body">
                        <h3 class="uk-card-title">Misi</h3>
                        <ol style="text-align: left">
                            <li>Mewujudkan destinasi pariwisata DIY yang berbasis budaya, lingkungan, kreatif dan
                                inovatif, maju berkembang dan mampu menggerakan peningkatan perekonomian masyarakat
                                yang berkelanjutan.</li>
                            <li>Mewujudkan destinasi pariwisata DIY yang berbasis budaya, lingkungan, kreatif dan
                                inovatif, maju berkembang dan mampu menggerakan peningkatan perekonomian masyarakat
                                yang berkelanjutan.</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid>
    <div>
        <h3>Tinggalkan Pesan Anda</h3>
    </div>
    <div>
        <form>
            <fieldset class="uk-fieldset">
                <legend class="uk-legend">Legend</legend>

                <div class="uk-margin">
                    <input class="uk-input" type="text" placeholder="Input">
                </div>

                <div class="uk-margin">
                    <select class="uk-select">
                        <option>Option 01</option>
                        <option>Option 02</option>
                    </select>
                </div>

                <div class="uk-margin">
                    <textarea class="uk-textarea" rows="5" placeholder="Textarea"></textarea>
                </div>

                <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
                    <label><input class="uk-radio" type="radio" name="radio2" checked> A</label>
                    <label><input class="uk-radio" type="radio" name="radio2"> B</label>
                </div>

                <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
                    <label><input class="uk-checkbox" type="checkbox" checked> A</label>
                    <label><input class="uk-checkbox" type="checkbox"> B</label>
                </div>

            </fieldset>
        </form>
    </div>

</div>
<div class="uk-section-secondary uk-background-bottom-right uk-background-norepeat footer">
    <div class="uk-container">
        <div class="uk-grid-match uk-child-width-1-3@m" uk-grid>
            <div  class="uk-text-left">
                <h3>Haversine</h3>
                <div class="uk-child-width" uk-grid>
                    <ul class="uk-list">
                        <li>&copy; {{ date('Y') }}</li>
                    </ul>
                </div>
            </div>
            <div class="uk-text-right">
                <h3>Bussiness & Marketing</h3>
            </div>
        </div>
    </div>
</div>
@stop
