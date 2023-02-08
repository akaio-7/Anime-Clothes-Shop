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
    
    $(".home .content").children().eq(0).text("offre spéciale");
    $(".home .content").children().eq(1).text("réduction 50%");
    $(".home .content").children().eq(2).text("achetez");

    $(".category .heading").text("acheter par catégorie");
    $(".category .box-container .box .btn").text("achetez");

    $(".products .heading").text("derniers produits");
    $(".products .swiper-wrapper .slide .btn").text("ajouter au panier");

    $(".shop .heading").text("nos produits");
    $(".shop .box-container .box .btn").text("ajouter au panier");

    $("#search .heading").text("résultats de recherche");
    $("#search .box-container .empty").text("Résultat introuvable !");
    $("#search .box-container .box .btn").text("ajouter au panier");

    $(".quick-view .heading").text("aperçu rapide");
    $(".quick-view .box input:submit").val("ajouter au panier");

    $("#cart .heading").text("panier");
    $("#cart .box-container .empty").text("votre panier est vide !");
    $("#cart .box-container .box .delete-btn").val("effacer l'article");

    $("#cart .cart-total .option-btn").text("continuer vos achats");
    $("#cart .cart-total .delete-btn").text("effacer tous les articles");
    $("#cart .cart-total .success-btn").text("passer à la caisse");

    $(".checkout-orders #w1").text('votre commandes');
    $(".checkout-orders #w2").text('passer votre commandes');

    $(".checkout-orders form .flex").css('text-align','');
    $(".checkout-orders form .flex input").css('text-align','');

    $(".checkout-orders form .flex").children().eq(0).children().eq(0).text('nom et prénom');
    $(".checkout-orders form .flex").children().eq(1).children().eq(0).text('email');
    $(".checkout-orders form .flex").children().eq(2).children().eq(0).text('numéro de téléphone');
    $(".checkout-orders form .flex").children().eq(3).children().eq(0).text('mode de paiement');
    $(".checkout-orders form .flex").children().eq(4).children().eq(0).text('adresse de livraison');
    $(".checkout-orders form .flex").children().eq(5).children().eq(0).text('région');
    $(".checkout-orders form .flex").children().eq(6).children().eq(0).text('ville');
    $(".checkout-orders form .flex").children().eq(7).children().eq(0).text('code postal');

    $(".checkout-orders form .flex").children().eq(0).children().eq(1).attr('placeholder','nom et prénom');
    $(".checkout-orders form .flex").children().eq(1).children().eq(1).attr('placeholder',' entrer votre email');
    $(".checkout-orders form .flex").children().eq(2).children().eq(1).attr('placeholder','entrer votre numéro');
    $(".checkout-orders form .flex").children().eq(4).children().eq(1).attr('placeholder','quartier / rue / numéro de maison');
    $(".checkout-orders form .flex").children().eq(5).children().eq(1).attr('placeholder','casablanca-settat ');
    $(".checkout-orders form .flex").children().eq(6).children().eq(1).attr('placeholder','casablanca');
    $(".checkout-orders form .flex").children().eq(7).children().eq(1).attr('placeholder','20200');

    $(".checkout-orders form input:submit").val('passer commande');

    language = 'frensh';

    localStorage.setItem('language',JSON.stringify(language));

    

})

$(".ar").click( () => {
    
    $(".home .content").children().eq(0).text("عرض خاص");
    $(".home .content").children().eq(1).text("تخفيض يصل %50");
    $(".home .content").children().eq(2).text("اشتري الآن");

    $(".category .heading").text("تسوق حسب الفئة");
    $(".category .box-container .box .btn").text("اشتري الآن");

    $(".products .heading").text("أحدث المنتجات");
    $(".products .swiper-wrapper .slide .btn").text("أضف إلى السلة");

    $(".shop .heading").text("منتجاتنا");
    $(".shop .box-container .box .btn").text("أضف إلى السلة");

    $("#search .heading").text("نتائج البحث");
    $("#search .box-container .empty").text("! لم يتم العثور على النتيجة");
    $("#search .box-container .box .btn").text("أضف إلى السلة");

    $(".quick-view .heading").text("تفاصيل المنتج");
    $(".quick-view .box input:submit").val("أضف إلى السلة");

    $("#cart .heading").text("السلة");
    $("#cart .box-container .empty").text("! سلتك فارغة");
    $("#cart .box-container .box .delete-btn").val("حذف العنصر");

    $("#cart .cart-total .option-btn").text("واصل التسوق");
    $("#cart .cart-total .delete-btn").text("حذف كل العناصر");
    $("#cart .cart-total .success-btn").text("الدفع");

    $(".checkout-orders #w1").text('طلباتك');
    $(".checkout-orders #w2").text('ضع طلبك');

    $(".checkout-orders form .flex").css('text-align','right');
    $(".checkout-orders form .flex input").css('text-align','right');

    $(".checkout-orders form .flex").children().eq(0).children().eq(0).text('الاسم الكامل');
    $(".checkout-orders form .flex").children().eq(1).children().eq(0).text('البريد الالكتروني');
    $(".checkout-orders form .flex").children().eq(2).children().eq(0).text('رقم الهاتف');
    $(".checkout-orders form .flex").children().eq(3).children().eq(0).text('طريقة الدفع');
    $(".checkout-orders form .flex").children().eq(4).children().eq(0).text('عنوان الشحن');
    $(".checkout-orders form .flex").children().eq(5).children().eq(0).text('الجهة');
    $(".checkout-orders form .flex").children().eq(6).children().eq(0).text('المدينة');
    $(".checkout-orders form .flex").children().eq(7).children().eq(0).text('الرمز البريدي');

    $(".checkout-orders form .flex").children().eq(0).children().eq(1).attr('placeholder','الاسم و النسب');
    $(".checkout-orders form .flex").children().eq(1).children().eq(1).attr('placeholder','البريد الالكتروني');
    $(".checkout-orders form .flex").children().eq(2).children().eq(1).attr('placeholder','رقم الهاتف');
    $(".checkout-orders form .flex").children().eq(4).children().eq(1).attr('placeholder','الحي / الشارع / رقم المنزل');
    $(".checkout-orders form .flex").children().eq(5).children().eq(1).attr('placeholder','الدار البيضاء - السطات');
    $(".checkout-orders form .flex").children().eq(6).children().eq(1).attr('placeholder','الدار البيضاء');
    $(".checkout-orders form .flex").children().eq(7).children().eq(1).attr('placeholder','20200');

    $(".checkout-orders form input:submit").val('اطلب الأن');

    language = 'arabic';

    localStorage.setItem('language',JSON.stringify(language));
    

})

let GetLang = JSON.parse(localStorage.getItem("language"));


if (GetLang === 'arabic') {

    $(".home .content").children().eq(0).text("عرض خاص");
    $(".home .content").children().eq(1).text("تخفيض يصل %50");
    $(".home .content").children().eq(2).text("اشتري الآن");

    $(".category .heading").text("تسوق حسب الفئة");
    $(".category .box-container .box .btn").text("اشتري الآن");

    $(".products .heading").text("أحدث المنتجات");
    $(".products .swiper-wrapper .slide .btn").text("أضف إلى السلة");

    $(".shop .heading").text("منتجاتنا");
    $(".shop .box-container .box .btn").text("أضف إلى السلة");

    $("#search .heading").text("نتائج البحث");
    $("#search .box-container .empty").text("! لم يتم العثور على النتيجة");
    $("#search .box-container .box .btn").text("أضف إلى السلة");

    $(".quick-view .heading").text("تفاصيل المنتج");
    $(".quick-view .box input:submit").val("أضف إلى السلة");

    $("#cart .heading").text("السلة");
    $("#cart .box-container .empty").text("! سلتك فارغة");
    $("#cart .box-container .box .delete-btn").val("حذف العنصر");

    $("#cart .cart-total .option-btn").text("واصل التسوق");
    $("#cart .cart-total .delete-btn").text("حذف كل العناصر");
    $("#cart .cart-total .success-btn").text("الدفع");

    $(".checkout-orders #w1").text('طلباتك');
    $(".checkout-orders #w2").text('ضع طلبك');

    $(".checkout-orders form .flex").css('text-align','right');
    $(".checkout-orders form .flex input").css('text-align','right');

    $(".checkout-orders form .flex").children().eq(0).children().eq(0).text('الاسم الكامل');
    $(".checkout-orders form .flex").children().eq(1).children().eq(0).text('البريد الالكتروني');
    $(".checkout-orders form .flex").children().eq(2).children().eq(0).text('رقم الهاتف');
    $(".checkout-orders form .flex").children().eq(3).children().eq(0).text('طريقة الدفع');
    $(".checkout-orders form .flex").children().eq(4).children().eq(0).text('عنوان الشحن');
    $(".checkout-orders form .flex").children().eq(5).children().eq(0).text('الجهة');
    $(".checkout-orders form .flex").children().eq(6).children().eq(0).text('المدينة');
    $(".checkout-orders form .flex").children().eq(7).children().eq(0).text('الرمز البريدي');

    $(".checkout-orders form .flex").children().eq(0).children().eq(1).attr('placeholder','الاسم و النسب');
    $(".checkout-orders form .flex").children().eq(1).children().eq(1).attr('placeholder','البريد الالكتروني');
    $(".checkout-orders form .flex").children().eq(2).children().eq(1).attr('placeholder','رقم الهاتف');
    $(".checkout-orders form .flex").children().eq(4).children().eq(1).attr('placeholder','الحي / الشارع / رقم المنزل');
    $(".checkout-orders form .flex").children().eq(5).children().eq(1).attr('placeholder','الدار البيضاء - السطات');
    $(".checkout-orders form .flex").children().eq(6).children().eq(1).attr('placeholder','الدار البيضاء');
    $(".checkout-orders form .flex").children().eq(7).children().eq(1).attr('placeholder','20200');

    $(".checkout-orders form input:submit").val('اطلب الأن');

}else if (GetLang === 'frensh') {
    
    $(".home .content").children().eq(0).text("offre spéciale");
    $(".home .content").children().eq(1).text("réduction 50%");
    $(".home .content").children().eq(2).text("achetez");

    $(".category .heading").text("acheter par catégorie");
    $(".category .box-container .box .btn").text("achetez");

    $(".products .heading").text("derniers produits");
    $(".products .swiper-wrapper .slide .btn").text("ajouter au panier");

    $(".shop .heading").text("nos produits");
    $(".shop .box-container .box .btn").text("ajouter au panier");

    $("#search .heading").text("résultats de recherche");
    $("#search .box-container .empty").text("Résultat introuvable !");
    $("#search .box-container .box .btn").text("ajouter au panier");

    $(".quick-view .heading").text("aperçu rapide");
    $(".quick-view .box input:submit").val("ajouter au panier");

    $("#cart .heading").text("panier");
    $("#cart .box-container .empty").text("votre panier est vide !");
    $("#cart .box-container .box .delete-btn").val("effacer l'article");

    $("#cart .cart-total .option-btn").text("continuer vos achats");
    $("#cart .cart-total .delete-btn").text("effacer tous les articles");
    $("#cart .cart-total .success-btn").text("passer à la caisse");

    $(".checkout-orders #w1").text('votre commandes');
    $(".checkout-orders #w2").text('passer votre commandes');

    $(".checkout-orders form .flex").css('text-align','');
    $(".checkout-orders form .flex input").css('text-align','');

    $(".checkout-orders form .flex").children().eq(0).children().eq(0).text('nom et prénom');
    $(".checkout-orders form .flex").children().eq(1).children().eq(0).text('email');
    $(".checkout-orders form .flex").children().eq(2).children().eq(0).text('numéro de téléphone');
    $(".checkout-orders form .flex").children().eq(3).children().eq(0).text('mode de paiement');
    $(".checkout-orders form .flex").children().eq(4).children().eq(0).text('adresse de livraison');
    $(".checkout-orders form .flex").children().eq(5).children().eq(0).text('région');
    $(".checkout-orders form .flex").children().eq(6).children().eq(0).text('ville');
    $(".checkout-orders form .flex").children().eq(7).children().eq(0).text('code postal');

    $(".checkout-orders form .flex").children().eq(0).children().eq(1).attr('placeholder','nom et prénom');
    $(".checkout-orders form .flex").children().eq(1).children().eq(1).attr('placeholder',' entrer votre email');
    $(".checkout-orders form .flex").children().eq(2).children().eq(1).attr('placeholder','entrer votre numéro');
    $(".checkout-orders form .flex").children().eq(4).children().eq(1).attr('placeholder','quartier / rue / numéro de maison');
    $(".checkout-orders form .flex").children().eq(5).children().eq(1).attr('placeholder','casablanca-settat ');
    $(".checkout-orders form .flex").children().eq(6).children().eq(1).attr('placeholder','casablanca');
    $(".checkout-orders form .flex").children().eq(7).children().eq(1).attr('placeholder','20200');

    $(".checkout-orders form input:submit").val('passer commande');

}


});