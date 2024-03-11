@vite(['resources/css/product.css'])


<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<nav class="sidecart close">
        <i class='bx bx-chevron-right toggle'></i>
    <div class="cart_content">
                <div class="cart_header">
                    <div class="header_title">
                    <i class='bx bx-notepad icon'><h2>Your Plan</h2></i>

                    </div>
                </div>
                @if(session('service'))
                        @php
                            $service = App\Models\Service::find(session('service')['id']);
                        @endphp
                <div class="cart_item">

                    <div class="w-20 h-20 mr-5 rounded-xl" >
                        <img src="{{asset('serviceimage/' . $service->images)}}" alt="">
                    </div>
                    <div class="item_details">

                        <p>{{ $service->servicetype }}</p>
                        <strong>{{session('service')['price']}}</strong>
                        <div class="qty">
                        </div>
                        <form id="removeServiceForm" action="{{ route('remove') }}" method="post">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="type" value="service">
                            <button class="remove_button" type="submit">
                                Remove
                            </button>
                        </form>
                    </div>
                </div>
            @endif
            @if(session('product'))
                        @php
                            $product = App\Models\Product::find(session('product')['id']);
                        @endphp
                <div class="cart_item">
                    <div class="w-20 h-20 mr-5 rounded-xl" >
                        <img src="{{asset('productimage/' . $product->images)}}" alt="">
                    </div>
                    <div class="item_details">

                        <p>{{ $product->productname }}</p>
                        <strong>PHP{{session('product')['price']}}</strong>
                        <div class="qty">
                        </div>
                        <form id="removeServiceForm" action="{{ route('remove') }}" method="post">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="type" value="product">
                            <button class="remove_button" type="submit">
                                Remove
                            </button>
                        </form>
                    </div>
                </div>
            @endif

            @if(session('combo'))
                @php
                    // $combo = App\Models\Combo::find(session('combo')['id']);

                    $atri = session('combo');
                    // dd($atri);
                @endphp
                <div class="cart_item">
                    <div class="w-20 h-20 mr-5 rounded-xl" >
                        <img src="{{ asset('comboimage/' . $atri['images']) }}"  />
                    </div>
                    <div class="item_details">
                        <p>{{ $atri['productname'] }} & {{ $atri['servicetype'] }}</p>
                        <strong>{{'Price: '.$atri['price'] }}</strong>
                        <div class="qty">
                        </div>
                        <form id="removeServiceForm" action="{{ route('remove') }}" method="post">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="type" value="combo">
                            <button class="remove_button" type="submit">
                                Remove
                            </button>
                        </form>
                    </div>
                </div>
            @endif

@php
    $total = 0;

    if (session('service')) {
        $total += session('service')['price'];
    }

    if (session('product')) {
        $total += session('product')['price'];
    }

    if (session('combo')) {
        $total += session('combo')['price'];
    }
        session()->put('total', $total);
@endphp


                <div class="cart_actions relative hidden">
                    <div class="subtotal">
                        <p>SUBTOTAL</p>
                        <p>php <span id="subtotal_price">{{session('total')}}</span></p>
                    </div>
                    <button onclick="redirectToAppointments()" class="button-style">Complete Appointment</button>
                    <script>
                        function redirectToAppointments() {
                            window.location.href = "{{ route('appointments.index') }}";
                        }
                    </script>

                </div>
                </div>
            </div>
    </nav>



<script>
const body = document.querySelector("body"),
    sidecart = body.querySelector(".sidecart"),
    toggle = body.querySelector(".toggle");

toggle.addEventListener("click", () => {
    // Add a small delay before toggling the 'close' class
    setTimeout(() => {
        sidecart.classList.toggle("close");
    }, 50);
    setTimeout(() => {
          const cartActionEl = document.querySelector('.cart_actions');
          cartActionEl.classList.toggle('hidden');
          cartActionEl.classList.toggle('relative');
      }, 50);
});

</script>
