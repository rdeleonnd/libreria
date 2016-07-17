

$(function(){
    
    tinymce.init({
        selector: "textarea",
        menubar: false,
        toolbar: "undo redo | bold italic",
        statusbar: false
    });
    
    var modalInit = {
        show: false,
        backdrop: 'static',
        keyboard: false
    };

    $('#remove-record').modal(modalInit);
    $('#logout-chachibooks').modal(modalInit);        
    
    $('a#logout').click(function(){
        $('#logout-chachibooks').modal('show');        
        $('#logout-chachibooks-no').click(function(){
            $('#logout-chachibooks').modal('hide');
        });        
        $('#logout-chachibooks-yes').click(function(){
            $('#logout-chachibooks').modal('hide');
            window.location.href = 'admin/logout';
        });   
        return false;
    });    

    $('a.delete').click(function(){        
        var href = $(this).attr('href');
        $('#remove-record').modal('show');        
        $('#remove-record-no').click(function(){
            $('#remove-record').modal('hide');
        });        
        $('#remove-record-yes').click(function(){
            $('#remove-record').modal('hide');
            window.location.href = href;
        });        
        return false;
    });
    
});