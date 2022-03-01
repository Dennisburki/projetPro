let largeur = window.innerWidth;
if (largeur <= 600) {

  document.getElementById("montagne").innerHTML = "Montagne";
  document.getElementById("plage").innerHTML = "Plage";
  document.getElementById("ville").innerHTML = "Ville";
  document.getElementById("sport").innerHTML = "Sport";
  document.getElementById("histoire").innerHTML = "Histoire";
  document.getElementById("gastronomie").innerHTML = "Gastronomie";


}

if (largeur >= 600) {



  //POUR LA MONTAGNE************************************************
  function mouseOverMontagne() {
    document.getElementById("montagne").innerHTML = "Montagne";
    document.getElementById("montagne").classList = "btn col-lg-6 fs-2 montagne text-white";
  }

  function mouseOutMontagne() {
    document.getElementById("montagne").innerHTML = "";
    document.getElementById("montagne").classList = "btn col-lg-6 fs-2 montagneFirst text-white";
  }

  //POUR LA PLAGE************************************************
  function mouseOverPlage() {
    document.getElementById("plage").innerHTML = "Plage";
    document.getElementById("plage").classList = "btn col-lg-6 fs-2 plage text-white";
  }

  function mouseOutPlage() {
    document.getElementById("plage").innerHTML = "";
    document.getElementById("plage").classList = "btn col-lg-6 fs-2 plageFirst text-white";
  }

  //POUR LA VILLE************************************************
  function mouseOverVille() {
    document.getElementById("ville").innerHTML = "Ville";
    document.getElementById("ville").classList = "btn col-lg-6 fs-2 ville text-white";
  }

  function mouseOutVille() {
    document.getElementById("ville").innerHTML = "";
    document.getElementById("ville").classList = "btn col-lg-6 fs-2 villeFirst text-white";
  }

  //POUR LE SPORT************************************************

  function mouseOverSport() {
    document.getElementById("sport").innerHTML = "Sport";
    document.getElementById("sport").classList = "btn col-lg-6 fs-2 sport text-white";
  }

  function mouseOutSport() {
    document.getElementById("sport").innerHTML = "";
    document.getElementById("sport").classList = "btn col-lg-6 fs-2 sportFirst text-white";
  }


  //POUR L'HISTOIRE************************************************
  function mouseOverHistoire() {
    document.getElementById("histoire").innerHTML = "Histoire";
    document.getElementById("histoire").classList = "btn col-lg-6 fs-2 histoire text-white";
  }

  function mouseOutHistoire() {
    document.getElementById("histoire").innerHTML = "";
    document.getElementById("histoire").classList = "btn col-lg-6 fs-2 histoireFirst text-white";
  }


  //POUR LA GASTRONOMIE************************************************
  function mouseOverGastronomie() {
    document.getElementById("gastronomie").innerHTML = "Gastronomie";
    document.getElementById("gastronomie").classList = "btn col-lg-6 fs-2 gastronomie text-white";
  }

  function mouseOutGastronomie() {
    document.getElementById("gastronomie").innerHTML = "";
    document.getElementById("gastronomie").classList = "btn col-lg-6 fs-2 gastronomieFirst text-white";
  }

}