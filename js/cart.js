$(document).ready(function () {
    $("#fastShip").click(function () {
        if ($("#fastShip:checked").length == 1) {
            $actualPrice = parseFloat($("#noIvaPrice").text());
            $("#noIvaPrice").empty();
            $("#noIvaPrice").append($actualPrice + 3 + (" &euro;"));
            $("#totalPrice").empty();
            $("#totalPrice").append((parseFloat($("#noIvaPrice").text()) * 1.22).toFixed(2) + " &euro;");
        }
        else {
            $actualPrice = parseFloat($("#noIvaPrice").text());
            $("#noIvaPrice").empty();
            $("#noIvaPrice").append(($actualPrice - 3) + (" &euro;"));
            $("#totalPrice").empty();
            $("#totalPrice").append((parseFloat($("#noIvaPrice").text()) * 1.22).toFixed(2) + " &euro;");
        }
    });
});

function submitQuantityBtn(productId, selectId) {
    var newQuantity = document.getElementById(selectId).value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("noIvaPrice").innerHTML = parseFloat(this.responseText).toFixed(2) + " &euro;";
            var ivaPrice = this.responseText * 1.22;
            document.getElementById("totalPrice").innerHTML = parseFloat(ivaPrice).toFixed(2) + " &euro;";
        }
    };
    xhttp.open("GET", "cart.php?productid=" + productId + "&newquantity=" + newQuantity, true);
    xhttp.send();
}


function removeProduct(productId, sectionId) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById(sectionId).style.display = "none";
            if (this.responseText == 0) {
                document.getElementById("riepilogo").style.display = "none";
                document.getElementById("noprodotti").innerHTML = "Nessun prodotto nel carrello";
                var docHeight = $(window).height();
                var footerHeight = $('#footer').height();
                var footerTop = $('#footer').position().top + footerHeight;

                if (footerTop < docHeight) {
                    $('#footer').css('margin-top', 10 + (docHeight - footerTop) + 'px');
                }
            }
            else {
                document.getElementById("noIvaPrice").innerHTML = parseFloat(this.responseText).toFixed(2) + " &euro;";
                var ivaPrice = this.responseText * 1.22;
                document.getElementById("totalPrice").innerHTML = parseFloat(ivaPrice).toFixed(2) + " &euro;";
            }
        }
    };
    xhttp.open("GET", "cart.php?idprodotto=" + productId + "&action=1", true);
    xhttp.send();
}