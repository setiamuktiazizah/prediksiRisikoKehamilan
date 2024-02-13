function addInput(namaInput) {
    var container = "#containerSolusi";
    var intId = $(container + " div").length + 1;

    var fieldWrapper = $("<div class=\"row mb-2\" id=\"widget_nama_diagnosis_" + intId + "\"/>");

    var containerWrapper1 = $("<div class=\"col-sm-11\"/>");
    var fName = $("<input type=\"text\" class=\"form-control mb-2\" name=\"solusi_diagnosis[]\" />");
    containerWrapper1.append(fName);

    var containerWrapper2 = $("<div class=\"col-sm-1\"/>");
    var removeButton = $("<button type=\"button\" class=\"btn btn-danger\">-</button>");
    containerWrapper2.append(removeButton);

    removeButton.click(function() {
        fieldWrapper.remove();
    });

    fieldWrapper.append(containerWrapper1);
    fieldWrapper.append(containerWrapper2);
    $(container).append(fieldWrapper);
}

function removeInput(button) {
    $(button).closest(".row").remove();
}
