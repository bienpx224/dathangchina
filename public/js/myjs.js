function ValidURL(str) {
        var regex = /(http|https):\/\/(\w+:{0,1}\w*)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%!\-\/]))?/;
        if(!regex .test(str)) {
          return false;
        } else {
          return true;
        }
    }

    function getInfoProduct(link){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        console.log('link: ',link);
        console.log('CSRF: ',CSRF_TOKEN);
        $.ajax({
            type: "post",
            url: '{!! url("postlink") !!}',
            dataType: 'text',
            data : {
              link : ""+link,
              _token: CSRF_TOKEN
            },
            // type: "POST",
            // url: "{!! url('postlink') !!}",
            // data: {link: ""+link, _token: CSRF_TOKEN},
            xhrFields: {
                withCredentials: false
            },
            beforeSend: function() {
                $('#body').LoadingOverlay("show", {zIndex: 10000});
                var shortCutFunction = 'info';
                    var title = 'Đang lấy dữ liệu, đợi tý nhé !! ';
                    var $toast = toastr[shortCutFunction]("waiting", title);
            },
            success : function(data) {
                data = JSON.parse(data); console.log("postlink: ",data);

                if(data.signal == "1"){
                    $('#title').text(data.title);
                    if(data.image !== ""){
                        $('#image').attr('src',''+data.image);
                    }
                    $('#total_product').text(data.total_product);
                    $('#price').html(data.price);

                    var shortCutFunction = 'success';
                    var title = 'Thành công';
                    var $toast = toastr[shortCutFunction]("success", title);
                }else{
                    var shortCutFunction = 'warning';
                    var title = 'Thất bại';
                    var $toast = toastr[shortCutFunction]("Có vẻ Link bạn nhập không đúng hoặc hệ thống tạm thời không lấy được kết quả", title);
                }

                $('#body').LoadingOverlay("hide");

            },
            error : function (data) {
                $('#body').LoadingOverlay("hide");
                var shortCutFunction = 'error';
                    var title = 'Có lỗi xảy ra !!';
                    var $toast = toastr[shortCutFunction]("error", title);
            },
            complete: function() {
                $('#body').LoadingOverlay("hide");
            }
        });
    }

    function getPrice(link){
        $.ajax({
            type: "post",
            url: '{!! url("getprice") !!}',
            dataType: 'text',
            data : {
              link : link,
              _token: CSRF_TOKEN
            },
            xhrFields: {
                withCredentials: false
            },
            beforeSend: function() {
            },
            success : function(data) {
                console.log("getPrice: ", data);
            },
            error : function (data) {
                console.log("err getprice ");
            },
            complete: function() {
            }
        });
    }

    function addTypeMoney(){
        var type = 'yen';
        $.ajax({
            type: "post",
            url: '{!! url("addTypeMoney") !!}',
            dataType: 'text',
            data : {
              type : 'yen',
              rate : '3.0',
              _token: CSRF_TOKEN
            },
            xhrFields: {
                withCredentials: false
            },
            beforeSend: function() {
            },
            success : function(data) {
                console.log("addTypeMoney: ", data);
            },
            error : function (data) {
                console.log("err addTypeMoney ");
            },
            complete: function() {
            }
        });
    }

    function getRate(type){
        $.ajax({
            type: "post",
            url: '{!! url("getRate") !!}',
            dataType: 'text',
            data : {
              type : type,
              _token: CSRF_TOKEN
            },
            xhrFields: {
                withCredentials: false
            },
            beforeSend: function() {
            },
            success : function(data) {
                console.log("getRate: ", data);
            },
            error : function (data) {
                console.log("err getRate ");
            },
            complete: function() {
            }
        });
    }

    function editRate(){
        $.ajax({
            type: "post",
            url: '{!! url("getRate") !!}',
            dataType: 'text',
            data : {
              type : 'yen',
              rate : '3.0',
              _token: CSRF_TOKEN
            },
            xhrFields: {
                withCredentials: false
            },
            beforeSend: function() {
            },
            success : function(data) {
                console.log("getRate: ", data);
            },
            error : function (data) {
                console.log("err getRate ");
            },
            complete: function() {
            }
        });
    }