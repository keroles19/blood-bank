
@extends('front.master')

@section('content')

    <!-- Navigation -->
    <section id="navigator">
        <div class="container">
            <div class="path">
                <a href="{{url('/')}}" class="path-main" style="color: darkred; display:inline-block;">Home</a>
                <div class="path-directio" style="color: grey; display:inline-block;"> / About Us</div>
            </div>

        </div>
    </section>

    <!-- about Us -->

    <section id="who">
        <div class="container">
            <img src="front/imgs/logo.png" alt="">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere qui eius asperiores, animi adipisci quia eum beatae incidunt, laborum velit quibusdam debitis totam, et reiciendis ad? Commodi cupiditate velit vero?
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illum aspernatur est magnam, nesciunt culpa provident sit nobis molestias possimus? A optio dolores dolorum, odio nam est ducimus quis quisquam vero.
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae modi veritatis iste provident quis consectetur animi soluta, rerum dicta dolorem suscipit facere quas, porro, pariatur tempora consequuntur ad accusamus. Voluptatem?
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere qui eius asperiores, animi adipisci quia eum beatae incidunt, laborum velit quibusdam debitis totam, et reiciendis ad? Commodi cupiditate velit vero?
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illum aspernatur est magnam, nesciunt culpa provident sit nobis molestias possimus? A optio dolores dolorum, odio nam est ducimus quis quisquam vero.
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae modi veritatis iste provident quis consectetur animi soluta, rerum dicta dolorem suscipit facere quas, porro, pariatur tempora consequuntur ad accusamus. Voluptatem?
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere qui eius asperiores, animi adipisci quia eum beatae incidunt, laborum velit quibusdam debitis totam, et reiciendis ad? Commodi cupiditate velit vero?
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illum aspernatur est magnam, nesciunt culpa provident sit nobis molestias possimus? A optio dolores dolorum, odio nam est ducimus quis quisquam vero.
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae modi veritatis iste provident quis consectetur animi soluta, rerum dicta dolorem suscipit facere quas, porro, pariatur tempora consequuntur ad accusamus. Voluptatem?
            </p>
        </div>
    </section>

    @endsection()
