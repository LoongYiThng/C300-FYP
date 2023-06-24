$(document).ready(function(){
    $("#wordFile, #textFile, #pasteText, #pdfFile").click(function(){
        $("#notChosen").hide(500);

        $("#languageTechniques").show(500);
        $(".row + #languageTechniques").show(500);
        $("#spreadsheetTechniques").hide(500);
        $(".row + #spreadsheetTechniques").hide(500);
    });

    $("#excelFile").click(function(){
        $("#notChosen").hide(500);

        $("#languageTechniques").hide(500);
        $(".row + #languageTechniques").hide(500);
        $("#spreadsheetTechniques").show(500);
        $(".row + #spreadsheetTechniques").show(500);
    });
})