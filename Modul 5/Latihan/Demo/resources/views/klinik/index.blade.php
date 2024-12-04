@extends('layouts.app') <!-- Gunakan layout yang sesuai -->

@section('content')
<section>
    <div class="container-fluid mt-5" style="background-color:white;">
        <div class="row" style="background-color: white; padding: 30px 0 20px 0;">
            <div class="col-md-3 pl-5">
                <img src="{{ asset('assets/layananpage.png') }}" width="200" class="img-thumbnail" style="background-color: transparent; border: none;" alt="...">
            </div>
            <div class="col-md-6">
                <div class="container container-title-klinik">
                    <h2 class="tag-psikolog text-center mt-5" style="background: linear-gradient(90deg, #000, #BB8446); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                        Klinik Psikolog
                    </h2>
                    <hr style="border-width: 3px; width: 100%; background-color: #000;">
                </div>
            </div>
            <div class="col-md-3 pl-5">
                <img src="{{ asset('assets/layananpage1.png') }}" width="270" style="background-color: transparent; border: none;" class="img-thumbnail" alt="...">
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container p-5">
        <div class="mb-5" style="justify-content: center; align-items: center; display: flex; flex-direction: column;">
            <button type="button" class="btn btn-primary mb-5" style="background-color: #FF9292; border: none; border-radius: 20px;" disabled>Psikolog</button>
            <h2>Mau Mulai Konsultasi?</h2>
            <h3>Yuk Kenali Psikolog Kami!</h3>
        </div>
        <div class="row">
            @forelse($psychologists as $psychologist)
                @php
                    $imagePath = $psychologist->images->first()->image_path ?? 'https://via.placeholder.com/150';
                    $whatsappLink = "https://wa.me/" . preg_replace('/[^0-9]/', '', $psychologist->contact);
                @endphp
                <div class="col-md-4 mb-5 d-flex justify-content-center">
                    <div class="profile-card">
                        <img src="{{ asset('storage/psychologists/' . basename($imagePath)) }}" class="card-img-top" alt="Psikolog Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $psychologist->name }}</h5>
                            <p class="card-text" style="font-size:13px">{{ $psychologist->specialization }}</p>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <a href="{{ route('klinik.show', $psychologist->id) }}" class="btn btn-primary" style="background-color:#FF9292; width:100px; border:none; border-radius: 16px;">Detail</a>
                            </div>
                            <div class="col-6">
                                <a href="{{ $whatsappLink }}" class="btn btn-primary" style="background-color:#92C9FF; width:100px; border:none; border-radius: 16px;">Contact</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">Tidak ada data psikolog yang tersedia.</p>
            @endforelse
        </div>
    </div>
</section>
@endsection
