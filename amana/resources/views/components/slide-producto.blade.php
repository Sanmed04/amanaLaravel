@props(['productos', 'id'])
<style>
    .carousel-indicators {}

    .carousel-indicators .indicator {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background-color: gray;
        margin: 0 5px;
    }

    .carousel-indicators .indicator.active {
        background-color: blue;
    }

    .shadow-custom {
        -webkit-box-shadow: 0px 0px 34px -1px rgba(0, 0, 0, 0.25);
        -moz-box-shadow: 0px 0px 34px -1px rgba(0, 0, 0, 0.25);
        box-shadow: 0px 0px 34px -1px rgba(0, 0, 0, 0.25);
    }
</style>
<div class="relative flex items-center justify-between">
    <button id="prev-{{ $id }}"
        class="bg-slate-50 text-[#C59139] py-2 px-3 rounded-full hover:-translate-x-0.5 hover:transition-all shadow-xl">
        &#9664;
    </button>
    <div id="carousel-{{ $id }}" class="flex lg:gap-8 overflow-hidden w-full mx-4">
        @foreach ($productos->slice(0, 13) as $producto)
            <div class="carousel-item flex justify-center flex-none w-full md:w-1/2 lg:w-1/3 xl:w-1/4 2xl:w-1/5 ease-in-out duration-300">
                <x-card-producto :producto="$producto" />
            </div>
        @endforeach
    </div>
    <button id="next-{{ $id }}"
        class="bg-slate-50 text-[#C59139] py-2 px-3 rounded-full hover:translate-x-0.5 hover:transition-all shadow-xl">
        &#9654;
    </button>

</div>
<div id="carousel-container" class="pt-3">
    <div id="carousel-new">

    </div>
    <div id="carousel-indicators-{{ $id }}" class=" carousel-indicators flex justify-center mt-[10px]">

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const carouselNew = document.getElementById('carousel-{{ $id }}');
        const prevButtonNew = document.getElementById('prev-{{ $id }}');
        const nextButtonNew = document.getElementById('next-{{ $id }}');
        const indicatorsContainer = document.getElementById('carousel-indicators-{{ $id }}');

        let currentIndex = 0;
        let startX = 0;
        let endX = 0;

        function updateCarousel() {
            const carouselItemWidth = carouselNew.querySelector('.carousel-item').clientWidth;

            const visibleItemsCount = Math.floor(carouselNew.clientWidth / carouselItemWidth);

            const totalItemsCount = carouselNew.querySelectorAll('.carousel-item').length;

            const totalSlides = Math.ceil(totalItemsCount / visibleItemsCount);

            indicatorsContainer.innerHTML = '';
            for (let i = 0; i < totalSlides; i++) {
                const indicator = document.createElement('div');
                indicator.classList.add('indicator');
                if (i === 0) {
                    indicator.classList.add('active');
                }
                indicatorsContainer.appendChild(indicator);
            }

            const indicators = indicatorsContainer.querySelectorAll('.indicator');

            function updateButtons() {
                prevButtonNew.style.visibility = currentIndex === 0 ? 'hidden' : 'visible';
                nextButtonNew.style.visibility = currentIndex >= totalSlides - 1 ? 'hidden' : 'visible';
            }

            function updateIndicators() {
                indicators.forEach((indicator, index) => {
                    indicator.classList.toggle('active', index === currentIndex);
                });
            }

            prevButtonNew.addEventListener('click', function() {
                if (currentIndex > 0) {
                    currentIndex--;
                    carouselNew.scrollBy({
                        left: -carouselItemWidth * visibleItemsCount,
                        behavior: 'smooth'
                    });
                    updateButtons();
                    updateIndicators();
                }
            });

            nextButtonNew.addEventListener('click', function() {
                if (currentIndex < totalSlides - 1) {
                    currentIndex++;
                    carouselNew.scrollBy({
                        left: carouselItemWidth * visibleItemsCount,
                        behavior: 'smooth'
                    });
                    updateButtons();
                    updateIndicators();
                }
            });

            carouselNew.addEventListener('touchstart', function(event) {
                startX = event.touches[0].clientX;
            });

            carouselNew.addEventListener('touchmove', function(event) {
                endX = event.touches[0].clientX;
            });

            carouselNew.addEventListener('touchend', function() {
                if (startX > endX + 50) {

                    if (currentIndex < totalSlides - 1) {
                        currentIndex++;
                        carouselNew.scrollBy({
                            left: carouselItemWidth * visibleItemsCount,
                            behavior: 'smooth'
                        });
                        updateButtons();
                        updateIndicators();
                    }
                } else if (startX < endX - 50) {

                    if (currentIndex > 0) {
                        currentIndex--;
                        carouselNew.scrollBy({
                            left: -carouselItemWidth * visibleItemsCount,
                            behavior: 'smooth'
                        });
                        updateButtons();
                        updateIndicators();
                    }
                }
            });


            updateButtons();
            updateIndicators();
        }


        updateCarousel();
        window.addEventListener('resize', updateCarousel);
    });
</script>
