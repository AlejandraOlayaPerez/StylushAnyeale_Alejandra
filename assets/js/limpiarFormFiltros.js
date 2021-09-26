function limpiarFiltroReservacion(){
    var Form = document.getElementById("formLimpiar");

    var elements = Form.elements;

    Form.reset();

    for(i=0; i<elements.length; i++){

        field_type = elements[i].type.toLowerCase();

        switch(field_type){

            case "date":
            elements[i].value = "";
            break;

            case "select-one":
            elements[i].selectedIndex = -1;
            break;

            case "text":
            elements[i].value = "";
            break;

            case "number":
            elements[i].value = "";
            break

            default:
            break;
        }
    }

    Form.submit();

}