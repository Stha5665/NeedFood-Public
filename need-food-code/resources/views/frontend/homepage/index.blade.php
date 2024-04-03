@extends('frontend.layout')
@section('title', 'Homepage')
@section('content')
<section id="home">
    <div class="container-fluid top-banner px-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6">
                    <h1>Good Food choices</h1>
                    <p>Make Food for everyone by simple donation. Your small donation can change life and society toward healthy lifestyle. Let's share the need and connect to the each donor and defeat the hunger. </p>

                    <div class="mt-4">
                        <button class="main-btn">Donate now
                            <i class="fas fa-donate ps-3"></i>
                        </button>
                        <button class="white-btn ms-lg-4 mt-lg-0 mt-4">Request now
                            <i class="fas fa-angle-right ps-3"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
