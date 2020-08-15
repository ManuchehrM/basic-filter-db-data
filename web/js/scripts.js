$("#search-btn").click(function(){
    var parser = document.createElement('a');
    parser.href = document.location.href;

    var brand = $('.brand').val();
    var model = $('.model').val();

    if(model !== ''){
        model = '/'+model;
    }
    if(brand == '' && model == ''){
        window.location.href=parser.origin.toString();
    }else{
        window.location.href=parser.origin.toString()+'/catalog/'+brand+model;
    }
});

$(document).on('change','.engine, .drive',function (e) {
    var engine = $('.engine').children("option:selected").val();
    var drive = $('.drive').children("option:selected").val();
    var brand = $('.brand').val();
    var model = $('.model').val();
    var parser = document.createElement('a');
    parser.href = document.location.href;
    if(model !== ''){
        model = '/'+model;
    }
    var location = parser.origin.toString()+'/catalog/'+brand+model+'?engine='+engine+'&drive='+drive;

    $.ajax({
        type: "GET", url: location, data: {engine: engine, drive: drive},
        success: function (response) {
            result = JSON.parse(response);
            if(result['status'] == 200){
                $('.product-content').empty();
                $('.product-content').html(result['html']);
            }
            window.history.pushState('', '', location);
        }
    })
});
