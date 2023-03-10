$(document).ready(function() {

var language;
    
    // English 
    
$(".en").click( () => {
    
    $(".home .content").children().eq(0).text("special offer");
    $(".home .content").children().eq(1).text("sale upto 50% off");
    $(".home .content").children().eq(2).text("shop now");

    $(".category .heading").text("shop by category");
    $(".category .box-container .box .btn").text("shop now");

    $(".products .heading").text("latest products");
    $(".products .swiper-wrapper .slide .btn").text("add to cart");

    $(".shop .heading").text("our products");
    $(".shop .box-container .box .btn").text("add to cart");

    $("#search .heading").text("search results");
    $("#search .box-container .empty").text("Result Not Found !");
    $("#search .box-container .box .btn").text("add to cart");

    $(".quick-view .heading").text("quick view");
    $(".quick-view .box input:submit").val("add to cart");

    $("#cart .heading").text("shopping cart");
    $("#cart .box-container .empty").text("your cart is empty !");
    $("#cart .box-container .box .delete-btn").val("delete item");

    $("#cart .cart-total .option-btn").text("continue shopping");
    $("#cart .cart-total .delete-btn").text("delete all items");
    $("#cart .cart-total .success-btn").text("proceed to checkout");

    $(".checkout-orders #w1").text('your orders');
    $(".checkout-orders #w2").text('place your orders');

    $(".checkout-orders form .flex").css('text-align','');
    $(".checkout-orders form .flex input").css('text-align','');

    $(".checkout-orders form .flex").children().eq(0).children().eq(0).text('full name');
    $(".checkout-orders form .flex").children().eq(1).children().eq(0).text('email');
    $(".checkout-orders form .flex").children().eq(2).children().eq(0).text('phone number');
    $(".checkout-orders form .flex").children().eq(3).children().eq(0).text('payment method');
    $(".checkout-orders form .flex").children().eq(4).children().eq(0).text('delivery adresse');
    $(".checkout-orders form .flex").children().eq(5).children().eq(0).text('region');
    $(".checkout-orders form .flex").children().eq(6).children().eq(0).text('city');
    $(".checkout-orders form .flex").children().eq(7).children().eq(0).text('postal code');

    $(".checkout-orders form .flex").children().eq(0).children().eq(1).attr('placeholder','enter your full name');
    $(".checkout-orders form .flex").children().eq(1).children().eq(1).attr('placeholder','enter your email');
    $(".checkout-orders form .flex").children().eq(2).children().eq(1).attr('placeholder','enter your number');
    $(".checkout-orders form .flex").children().eq(4).children().eq(1).attr('placeholder','neighborhood / street / house number');
    $(".checkout-orders form .flex").children().eq(5).children().eq(1).attr('placeholder','casablanca-settat');
    $(".checkout-orders form .flex").children().eq(6).children().eq(1).attr('placeholder','casablanca');
    $(".checkout-orders form .flex").children().eq(7).children().eq(1).attr('placeholder','20200');

    $(".checkout-orders form input:submit").val('place order');

    language = 'english';

    localStorage.setItem('language',JSON.stringify(language));

})

$(".fr").click( () => {
    
    $(".home .content").children().eq(0).text("offre sp??ciale");
    $(".home .content").children().eq(1).text("r??duction 50%");
    $(".home .content").children().eq(2).text("achetez");

    $(".category .heading").text("acheter par cat??gorie");
    $(".category .box-container .box .btn").text("achetez");

    $(".products .heading").text("derniers produits");
    $(".products .swiper-wrapper .slide .btn").text("ajouter au panier");

    $(".shop .heading").text("nos produits");
    $(".shop .box-container .box .btn").text("ajouter au panier");

    $("#search .heading").text("r??sultats de recherche");
    $("#search .box-container .empty").text("R??sultat introuvable !");
    $("#search .box-container .box .btn").text("ajouter au panier");

    $(".quick-view .heading").text("aper??u rapide");
    $(".quick-view .box input:submit").val("ajouter au panier");

    $("#cart .heading").text("panier");
    $("#cart .box-container .empty").text("votre panier est vide !");
    $("#cart .box-container .box .delete-btn").val("effacer l'article");

    $("#cart .cart-total .option-btn").text("continuer vos achats");
    $("#cart .cart-total .delete-btn").text("effacer tous les articles");
    $("#cart .cart-total .success-btn").text("passer ?? la caisse");

    $(".checkout-orders #w1").text('votre commandes');
    $(".checkout-orders #w2").text('passer votre commandes');

    $(".checkout-orders form .flex").css('text-align','');
    $(".checkout-orders form .flex input").css('text-align','');

    $(".checkout-orders form .flex").children().eq(0).children().eq(0).text('nom et pr??nom');
    $(".checkout-orders form .flex").children().eq(1).children().eq(0).text('email');
    $(".checkout-orders form .flex").children().eq(2).children().eq(0).text('num??ro de t??l??phone');
    $(".checkout-orders form .flex").children().eq(3).children().eq(0).text('mode de paiement');
    $(".checkout-orders form .flex").children().eq(4).children().eq(0).text('adresse de livraison');
    $(".checkout-orders form .flex").children().eq(5).children().eq(0).text('r??gion');
    $(".checkout-orders form .flex").children().eq(6).children().eq(0).text('ville');
    $(".checkout-orders form .flex").children().eq(7).children().eq(0).text('code postal');

    $(".checkout-orders form .flex").children().eq(0).children().eq(1).attr('placeholder','nom et pr??nom');
    $(".checkout-orders form .flex").children().eq(1).children().eq(1).attr('placeholder',' entrer votre email');
    $(".checkout-orders form .flex").children().eq(2).children().eq(1).attr('placeholder','entrer votre num??ro');
    $(".checkout-orders form .flex").children().eq(4).children().eq(1).attr('placeholder','quartier / rue / num??ro de maison');
    $(".checkout-orders form .flex").children().eq(5).children().eq(1).attr('placeholder','casablanca-settat ');
    $(".checkout-orders form .flex").children().eq(6).children().eq(1).attr('placeholder','casablanca');
    $(".checkout-orders form .flex").children().eq(7).children().eq(1).attr('placeholder','20200');

    $(".checkout-orders form input:submit").val('passer commande');

    language = 'frensh';

    localStorage.setItem('language',JSON.stringify(language));

    

})

$(".ar").click( () => {
    
    $(".home .content").children().eq(0).text("?????? ??????");
    $(".home .content").children().eq(1).text("?????????? ?????? %50");
    $(".home .content").children().eq(2).text("?????????? ????????");

    $(".category .heading").text("???????? ?????? ??????????");
    $(".category .box-container .box .btn").text("?????????? ????????");

    $(".products .heading").text("???????? ????????????????");
    $(".products .swiper-wrapper .slide .btn").text("?????? ?????? ??????????");

    $(".shop .heading").text("????????????????");
    $(".shop .box-container .box .btn").text("?????? ?????? ??????????");

    $("#search .heading").text("?????????? ??????????");
    $("#search .box-container .empty").text("! ???? ?????? ???????????? ?????? ??????????????");
    $("#search .box-container .box .btn").text("?????? ?????? ??????????");

    $(".quick-view .heading").text("???????????? ????????????");
    $(".quick-view .box input:submit").val("?????? ?????? ??????????");

    $("#cart .heading").text("??????????");
    $("#cart .box-container .empty").text("! ???????? ??????????");
    $("#cart .box-container .box .delete-btn").val("?????? ????????????");

    $("#cart .cart-total .option-btn").text("???????? ????????????");
    $("#cart .cart-total .delete-btn").text("?????? ???? ??????????????");
    $("#cart .cart-total .success-btn").text("??????????");

    $(".checkout-orders #w1").text('????????????');
    $(".checkout-orders #w2").text('???? ????????');

    $(".checkout-orders form .flex").css('text-align','right');
    $(".checkout-orders form .flex input").css('text-align','right');

    $(".checkout-orders form .flex").children().eq(0).children().eq(0).text('?????????? ????????????');
    $(".checkout-orders form .flex").children().eq(1).children().eq(0).text('???????????? ????????????????????');
    $(".checkout-orders form .flex").children().eq(2).children().eq(0).text('?????? ????????????');
    $(".checkout-orders form .flex").children().eq(3).children().eq(0).text('?????????? ??????????');
    $(".checkout-orders form .flex").children().eq(4).children().eq(0).text('?????????? ??????????');
    $(".checkout-orders form .flex").children().eq(5).children().eq(0).text('??????????');
    $(".checkout-orders form .flex").children().eq(6).children().eq(0).text('??????????????');
    $(".checkout-orders form .flex").children().eq(7).children().eq(0).text('?????????? ??????????????');

    $(".checkout-orders form .flex").children().eq(0).children().eq(1).attr('placeholder','?????????? ?? ??????????');
    $(".checkout-orders form .flex").children().eq(1).children().eq(1).attr('placeholder','???????????? ????????????????????');
    $(".checkout-orders form .flex").children().eq(2).children().eq(1).attr('placeholder','?????? ????????????');
    $(".checkout-orders form .flex").children().eq(4).children().eq(1).attr('placeholder','???????? / ???????????? / ?????? ????????????');
    $(".checkout-orders form .flex").children().eq(5).children().eq(1).attr('placeholder','?????????? ?????????????? - ????????????');
    $(".checkout-orders form .flex").children().eq(6).children().eq(1).attr('placeholder','?????????? ??????????????');
    $(".checkout-orders form .flex").children().eq(7).children().eq(1).attr('placeholder','20200');

    $(".checkout-orders form input:submit").val('???????? ????????');

    language = 'arabic';

    localStorage.setItem('language',JSON.stringify(language));
    

})

let GetLang = JSON.parse(localStorage.getItem("language"));


if (GetLang === 'arabic') {

    $(".home .content").children().eq(0).text("?????? ??????");
    $(".home .content").children().eq(1).text("?????????? ?????? %50");
    $(".home .content").children().eq(2).text("?????????? ????????");

    $(".category .heading").text("???????? ?????? ??????????");
    $(".category .box-container .box .btn").text("?????????? ????????");

    $(".products .heading").text("???????? ????????????????");
    $(".products .swiper-wrapper .slide .btn").text("?????? ?????? ??????????");

    $(".shop .heading").text("????????????????");
    $(".shop .box-container .box .btn").text("?????? ?????? ??????????");

    $("#search .heading").text("?????????? ??????????");
    $("#search .box-container .empty").text("! ???? ?????? ???????????? ?????? ??????????????");
    $("#search .box-container .box .btn").text("?????? ?????? ??????????");

    $(".quick-view .heading").text("???????????? ????????????");
    $(".quick-view .box input:submit").val("?????? ?????? ??????????");

    $("#cart .heading").text("??????????");
    $("#cart .box-container .empty").text("! ???????? ??????????");
    $("#cart .box-container .box .delete-btn").val("?????? ????????????");

    $("#cart .cart-total .option-btn").text("???????? ????????????");
    $("#cart .cart-total .delete-btn").text("?????? ???? ??????????????");
    $("#cart .cart-total .success-btn").text("??????????");

    $(".checkout-orders #w1").text('????????????');
    $(".checkout-orders #w2").text('???? ????????');

    $(".checkout-orders form .flex").css('text-align','right');
    $(".checkout-orders form .flex input").css('text-align','right');

    $(".checkout-orders form .flex").children().eq(0).children().eq(0).text('?????????? ????????????');
    $(".checkout-orders form .flex").children().eq(1).children().eq(0).text('???????????? ????????????????????');
    $(".checkout-orders form .flex").children().eq(2).children().eq(0).text('?????? ????????????');
    $(".checkout-orders form .flex").children().eq(3).children().eq(0).text('?????????? ??????????');
    $(".checkout-orders form .flex").children().eq(4).children().eq(0).text('?????????? ??????????');
    $(".checkout-orders form .flex").children().eq(5).children().eq(0).text('??????????');
    $(".checkout-orders form .flex").children().eq(6).children().eq(0).text('??????????????');
    $(".checkout-orders form .flex").children().eq(7).children().eq(0).text('?????????? ??????????????');

    $(".checkout-orders form .flex").children().eq(0).children().eq(1).attr('placeholder','?????????? ?? ??????????');
    $(".checkout-orders form .flex").children().eq(1).children().eq(1).attr('placeholder','???????????? ????????????????????');
    $(".checkout-orders form .flex").children().eq(2).children().eq(1).attr('placeholder','?????? ????????????');
    $(".checkout-orders form .flex").children().eq(4).children().eq(1).attr('placeholder','???????? / ???????????? / ?????? ????????????');
    $(".checkout-orders form .flex").children().eq(5).children().eq(1).attr('placeholder','?????????? ?????????????? - ????????????');
    $(".checkout-orders form .flex").children().eq(6).children().eq(1).attr('placeholder','?????????? ??????????????');
    $(".checkout-orders form .flex").children().eq(7).children().eq(1).attr('placeholder','20200');

    $(".checkout-orders form input:submit").val('???????? ????????');

}else if (GetLang === 'frensh') {
    
    $(".home .content").children().eq(0).text("offre sp??ciale");
    $(".home .content").children().eq(1).text("r??duction 50%");
    $(".home .content").children().eq(2).text("achetez");

    $(".category .heading").text("acheter par cat??gorie");
    $(".category .box-container .box .btn").text("achetez");

    $(".products .heading").text("derniers produits");
    $(".products .swiper-wrapper .slide .btn").text("ajouter au panier");

    $(".shop .heading").text("nos produits");
    $(".shop .box-container .box .btn").text("ajouter au panier");

    $("#search .heading").text("r??sultats de recherche");
    $("#search .box-container .empty").text("R??sultat introuvable !");
    $("#search .box-container .box .btn").text("ajouter au panier");

    $(".quick-view .heading").text("aper??u rapide");
    $(".quick-view .box input:submit").val("ajouter au panier");

    $("#cart .heading").text("panier");
    $("#cart .box-container .empty").text("votre panier est vide !");
    $("#cart .box-container .box .delete-btn").val("effacer l'article");

    $("#cart .cart-total .option-btn").text("continuer vos achats");
    $("#cart .cart-total .delete-btn").text("effacer tous les articles");
    $("#cart .cart-total .success-btn").text("passer ?? la caisse");

    $(".checkout-orders #w1").text('votre commandes');
    $(".checkout-orders #w2").text('passer votre commandes');

    $(".checkout-orders form .flex").css('text-align','');
    $(".checkout-orders form .flex input").css('text-align','');

    $(".checkout-orders form .flex").children().eq(0).children().eq(0).text('nom et pr??nom');
    $(".checkout-orders form .flex").children().eq(1).children().eq(0).text('email');
    $(".checkout-orders form .flex").children().eq(2).children().eq(0).text('num??ro de t??l??phone');
    $(".checkout-orders form .flex").children().eq(3).children().eq(0).text('mode de paiement');
    $(".checkout-orders form .flex").children().eq(4).children().eq(0).text('adresse de livraison');
    $(".checkout-orders form .flex").children().eq(5).children().eq(0).text('r??gion');
    $(".checkout-orders form .flex").children().eq(6).children().eq(0).text('ville');
    $(".checkout-orders form .flex").children().eq(7).children().eq(0).text('code postal');

    $(".checkout-orders form .flex").children().eq(0).children().eq(1).attr('placeholder','nom et pr??nom');
    $(".checkout-orders form .flex").children().eq(1).children().eq(1).attr('placeholder',' entrer votre email');
    $(".checkout-orders form .flex").children().eq(2).children().eq(1).attr('placeholder','entrer votre num??ro');
    $(".checkout-orders form .flex").children().eq(4).children().eq(1).attr('placeholder','quartier / rue / num??ro de maison');
    $(".checkout-orders form .flex").children().eq(5).children().eq(1).attr('placeholder','casablanca-settat ');
    $(".checkout-orders form .flex").children().eq(6).children().eq(1).attr('placeholder','casablanca');
    $(".checkout-orders form .flex").children().eq(7).children().eq(1).attr('placeholder','20200');

    $(".checkout-orders form input:submit").val('passer commande');

}


});