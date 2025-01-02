;(function($){

	$(window).on('elementor/frontend/init',function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/crysa_team.default',function(scope,$){
	            const teamCarousel = new Swiper(".team-carousel", {
	            // Optional parameters
	            loop: true,
	            slidesPerView: 1,
	            spaceBetween: 15,
	            autoplay: true,
	            pagination: {
	                el: ".swiper-pagination",
	                clickable: true,
	            },
	            // Navigation arrows
	            navigation: {
	                nextEl: ".swiper-button-next",
	                prevEl: ".swiper-button-prev"
	            },
	            breakpoints: {
	                768: {
	                    slidesPerView: 2,
	                    spaceBetween: 30,
	                },
	                992: {
	                    slidesPerView: 3,
	                    spaceBetween: 30,
	                },
	                1200: {
	                    slidesPerView: 4,
	                    spaceBetween: 50,
	                },
	            },
	        });
        });
    }); 
    $(window).on('elementor/frontend/init',function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/quick_contact_form.default',function(scope,$){
	        $('select').niceSelect();
        });
    });
    $(window).on('elementor/frontend/init',function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/crysa_brand.default',function(scope,$){
	        const brandCarousel = new Swiper(".brand-carousel", {
	            // Optional parameters
	            loop: true,
	            slidesPerView: 2,
	            spaceBetween: 15,
	            autoplay: true,
	            pagination: {
	                el: ".swiper-pagination",
	                clickable: true,
	            },
	            // Navigation arrows
	            navigation: {
	                nextEl: ".swiper-button-next",
	                prevEl: ".swiper-button-prev"
	            },
	            breakpoints: {
	                768: {
	                    slidesPerView: 3,
	                    spaceBetween: 30,
	                },
	                992: {
	                    slidesPerView: 5,
	                    spaceBetween: 30,
	                },
	                1200: {
	                    slidesPerView: 5,
	                    spaceBetween: 30,
	                },
	            },
	        });

	        const brand3col = new Swiper(".brand3col", {
	            // Optional parameters
	            loop: true,
	            slidesPerView: 2,
	            spaceBetween: 15,
	            autoplay: true,
	            pagination: {
	                el: ".swiper-pagination",
	                clickable: true,
	            },
	            // Navigation arrows
	            navigation: {
	                nextEl: ".swiper-button-next",
	                prevEl: ".swiper-button-prev"
	            },
	            breakpoints: {
	                768: {
	                    slidesPerView: 3,
	                    spaceBetween: 30,
	                },
	                992: {
	                    slidesPerView: 3,
	                    spaceBetween: 30,
	                }
	            },
	        });
        });
    });
    $(window).on('elementor/frontend/init',function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/crysa_service.default',function(scope,$){
	        const servicesCarousel = new Swiper(".services-carousel", {
	            // Optional parameters
	            loop: true,
	            slidesPerView: 1,
	            spaceBetween: 15,
	            autoplay: true,
	            pagination: {
	                el: ".service-carousel-pagination",
	                clickable: true,
	            },
	            // Navigation arrows
	            navigation: {
	                nextEl: ".swiper-button-next",
	                prevEl: ".swiper-button-prev"
	            },
	            breakpoints: {
	                768: {
	                    slidesPerView: 2,
	                    spaceBetween: 30,
	                },
	                991: {
	                    slidesPerView: 3,
	                    spaceBetween: 30,
	                },
	                1200: {
	                    slidesPerView: 5,
	                    spaceBetween: 30,
	                },
	            },
	        });

	        const servicesSevenCarousel = new Swiper(".services-style-seven-carousel", {
	            // Optional parameters
	            loop: true,
	            slidesPerView: 1,
	            spaceBetween: 15,
	            autoplay: true,
	            pagination: {
	                el: ".swiper-pagination",
	                clickable: true,
	            },
	            // Navigation arrows
	            navigation: {
	                nextEl: ".swiper-button-next",
	                prevEl: ".swiper-button-prev"
	            },
	            breakpoints: {
	                768: {
	                    slidesPerView: 2,
	                    spaceBetween: 30,
	                },
	                992: {
	                    slidesPerView: 3,
	                    spaceBetween: 30,
	                },
	                1200: {
	                    slidesPerView: 4,
	                    spaceBetween: 50,
	                },
	            },
	        });    
       
        });
    });

    $(window).on('elementor/frontend/init',function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/testimonial.default',function(scope,$){
	        const testimonialCarousel = new Swiper(".testimonial-style-one-carousel", {
	            // Optional parameters
	            loop: true,
	            slidesPerView: 1,
	            spaceBetween: 30,
	            autoplay: false,
	            pagination: {
	                el: ".swiper-pagination",
	                clickable: true,
	            },
	            // Navigation arrows
	            navigation: {
	                nextEl: ".swiper-button-next",
	                prevEl: ".swiper-button-prev"
	            },
	            breakpoints: {
	                768: {
	                    slidesPerView: 1,
	                    spaceBetween: 20,
	                },
	                1200: {
	                    slidesPerView: 2,
	                    spaceBetween: 10,
	                }
	            },
	        });
        });
    });

    
})(jQuery);