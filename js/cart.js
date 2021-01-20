$(document).ready(function() {
    $("#fastShip").click(function(){
        if($("#fastShip:checked").length == 1){
            $actualPrice = parseFloat($("#noIvaPrice").text());
            $("#noIvaPrice").empty();
            $("#noIvaPrice").append($actualPrice+3+(" &euro;"));
            $("#totalPrice").empty();
            $("#totalPrice").append((parseFloat($("#noIvaPrice").text()) * 1.22).toFixed(2)+" &euro;");
        }
        else{
            $actualPrice = parseFloat($("#noIvaPrice").text());
            $("#noIvaPrice").empty();
            $("#noIvaPrice").append(($actualPrice-3)+(" &euro;"));  
            $("#totalPrice").empty();
            $("#totalPrice").append((parseFloat($("#noIvaPrice").text()) * 1.22).toFixed(2)+" &euro;");
        }
    });
});
