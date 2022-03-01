let largeur = window.innerWidth;
if (largeur <= 600) {

    document.getElementById("wishlist").innerHTML = "Wishlist";
    document.getElementById("edit").innerHTML = "Rédiger un article";
    document.getElementById("carnet").innerHTML = "Carnet de voyage";
}

if (largeur >= 600) {

    //POUR LE CARNET DANS LE COMPTE USER**********************************************
    function mouseOverCarnet() {
        document.getElementById("carnet").innerHTML = "Carnet de Voyage";
        document.getElementById("carnet").classList = "btn col-lg-8 fs-4 carnet text-white ";
    }

    function mouseOutCarnet() {
        document.getElementById("carnet").innerHTML = "";
        document.getElementById("carnet").classList = "btn col-lg-8 fs-4 carnetFirst text-white ";
    }

    //POUR LE CARNET DANS LA WISHLIST**********************************************
    function mouseOverWishlist() {
        document.getElementById("wishlist").innerHTML = "Wishlist";
        document.getElementById("wishlist").classList = "btn col-lg-8 fs-4 wish text-white ";
    }

    function mouseOutWishlist() {
        document.getElementById("wishlist").innerHTML = "";
        document.getElementById("wishlist").classList = "btn col-lg-8 fs-4 wishFirst text-white ";
    }

    //POUR LE CARNET DANS LA REDATION D'ARTICLES**********************************************
    function mouseOverEdit() {
        document.getElementById("edit").innerHTML = "Rédiger un article";
        document.getElementById("edit").classList = "btn col-lg-8 fs-4 edit text-white ";
    }

    function mouseOutEdit() {
        document.getElementById("edit").innerHTML = "";
        document.getElementById("edit").classList = "btn col-lg-8 fs-4 editFirst text-white ";
    }
}