let themeToggler = document.querySelector('#theme-toggler');

function darkmode(){

    var theme;

    themeToggler.classList.toggle('fa-sun');
    if(themeToggler.classList.contains('fa-sun')){

        document.querySelector('body').classList.add('active');
        theme = 'dark';

    }else{

        document.querySelector('body').classList.remove('active');
        theme = 'light';

    }

    localStorage.setItem("theme",JSON.stringify(theme));


}

let GetTheme = JSON.parse(localStorage.getItem("theme"));

if (GetTheme === 'dark') {
    document.querySelector('body').classList.add('active');
}

function search() {
    
    console.log('search now');
    var SearchForm = document.getElementById('search-form');
    SearchForm.submit();

}

var swiper = new Swiper(".product-slider", {
    slidesPerView: 3,
    loop:true,
    spaceBetween: 10,
    autoplay: {
        delay: 4000,
        disableOnInteraction: false,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        550: {
          slidesPerView: 2,
        },
        800: {
          slidesPerView: 3,
        },
        1000: {
            slidesPerView: 3,
        },
    },
});

let mainImage = document.querySelector('.quick-view form .row .image-container .main-image img');
let subImages = document.querySelectorAll('.quick-view form .row .image-container .sub-image img');

subImages.forEach(image =>{
   image.onclick = () =>{
      src = image.getAttribute('src');
      mainImage.src = src;
   }
});

function switch_itup() {
    document.getElementById("switcher").classList.toggle("active");
}