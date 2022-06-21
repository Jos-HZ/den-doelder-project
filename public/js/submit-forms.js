console.log("submit_forms.js loaded");

/**
 * Submit all the forms in the create.blade.php (pre-quality-control)
 */
submitFormsPreQualityControl = function(){
    document.getElementById("pre-control").submit();
    console.log('submitted');
}
