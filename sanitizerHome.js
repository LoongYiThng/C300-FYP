$(document).ready(function(){
    $(".language").click(function(){
        $("#notChosen").hide(200);

        $("#languageTechniques").show(200);
        $(".row + #languageTechniques").show(200);
        $("#spreadsheetTechniques").hide(200);
        $(".row + #spreadsheetTechniques").hide(200);
    });

    $(".spreadsheet").click(function(){
        $("#notChosen").hide(200);

        $("#languageTechniques").hide(200);
        $(".row + #languageTechniques").hide(200);
        $("#spreadsheetTechniques").show(200);
        $(".row + #spreadsheetTechniques").show(200);
    });

    $(".addFile").click(function(){
        $(".uploadSlots").append(
            "<input class=\"form-control\" type=\"file\" id=\"additionalSlot\" name=\"fileUpload[]\" accept=\".docx, .txt, .xlsx\">"
        );
    });


    $(".clearFile").click(function(){
        $("#additionalSlot").remove();
    });
})