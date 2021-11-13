@extends('Employer.master')

@section('body')

    <div class="page-content-area">
        <!-- Dashboard Section -->
        <section class="section-padding dashboard-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        <div class="price-main-box">
                            <div class="price-sec-head">
                                <h5>Buy Our Plans And Packeges</h5>
                                <h6>One of our jobs has some kind of flexibility option</h6>
                            </div>
                            <div class="row">
                                @foreach ($plans as $item)

                                    <div class="col-md-6">
                                        <div class="pricing-box active">

                                            <form action="{{ route('save_subscription_plan', $item->id) }}" method="post">
                                                @csrf
                                                <a href="javascript:void(0);">
                                                    <input type="hidden" name="price" value="{{ $item->price }}">
                                                    <input type="hidden" name="duration" value="{{ $item->duration }}">
                                                    <div class="pricing-amount-box">
                                                        <p>{{ $item->title }}</p>
                                                        <h5>{{ $item->price }}<sub>₹</sub></h5>
                                                    </div>
                                                    <div class="pricing-list-box">
                                                        {!! $item->description !!}
                                                    </div>

                                                    @php
                                                        $plan_book = \DB::table('plan_book')
                                                            ->wherePlanId($item->id)
                                                            ->whereUserId(auth()->user()->id)
                                                            ->count();
                                                    @endphp

                                                    @if ($plan_book == 0)
                                                        <div class="pricing-btn">
                                                            <button class="price-btn btn-block">Buy Now</button>
                                                        </div>
                                                    @endif
                                                </a>
                                            </form>

                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>

@endsection
