window.addEventListener('load', function(){
    var select = document.getElementById('select');
    var filtre = document.getElementById('dataTableBuilder_filter');
    var parentfiltre = document.getElementById('dataTableBuilder_wrapper');
    if(select != null && select != undefined){
        if(filtre != null && filtre != undefined){
            if(parentfiltre != null && parentfiltre != undefined){
                parentfiltre.insertBefore(select,filtre);
            } 
        }
    }
}); 
