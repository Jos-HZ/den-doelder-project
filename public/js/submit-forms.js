console.log("submit_forms.js loaded");

/**
 * Submit all the forms in the create.blade.php (pre-quality-control)
 */
submitFormsPreQualityControl = function(){
    setTimeout(function(){ document.getElementById("row").submit();}, 3000);
    setTimeout(function(){ document.getElementById("pre-control").submit();}, 6000);
    console.log('submitted');
}
