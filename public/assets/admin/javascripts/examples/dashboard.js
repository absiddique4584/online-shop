
function previewImage(input){
		var id = $(input).attr('data-id');
		if(input.files && input.files[0]){
			var reader = new FileReader();
			reader.onload = function(e){
				$("#preview_"+id).attr('src',e.target.result);
					$("#preview_"+id).parent().attr('href',e.target.result);
			};
			reader.readAsDataURL(input.files[0]);
		}
}









/**
 * selectpicker,data-table,datepicker
 */

$(function () {
    "use strict";





    /**
     * Bootstrap select picker
     */
    $('.selectpicker').selectpicker();



    /*Data Table*/
    $('.data-table').DataTable({});

    //Default datepicker example
    $('.datepicker').datepicker({
    format: "yyyy/mm/dd",
        weekStart: 1,
        todayBtn: "linked",
        todayHighlight: true
});

    $('.summernote').summernote();





    //MAGNIFIC POPUP GALLERY
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $('.gallery-wrap').magnificPopup({
        delegate: 'a',
        type: 'image',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0, 1]
        },
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-with-zoom',
        zoom: {
            enabled: true,
            duration: 300
        }
    });

});






$('body').on('change', "#brandStatus", function () {
    var id = $(this).attr('data-id');
    if (this.checked) {
        var status = 1;
    } else {
        status = 0;
    }
    $('.loader__').show();
    $.ajax({
        url: "brands/update-status/" + id + '/' + status,
        method: 'get',
        success: function (result) {
            $('.loader__').hide();
        }
    });

});

/**
 * Top Brand Status
 */

$('body').on('change', "#topbrandStatus", function () {
    var id = $(this).attr('data-id');
    if (this.checked) {
        var top_brand = 1;
    } else {
        top_brand = 0;
    }
    $('.loader__').show();
    $.ajax({
        url: "brands/update-top-brand/" + id + '/' + top_brand,
        method: 'get',
        success: function (result) {
            $('.loader__').hide();
        }
    });

});






$('body').on('change', "#categoryStatus", function () {
    var id = $(this).attr('data-id');
    if (this.checked) {
        var status = 'active';
    } else {
        status = 'inactive';
    }
    $('.loader__').show();
    $.ajax({
        url: "categories/update-status/" + id + '/' + status,
        method: 'get',
        success: function (result) {
            $('.loader__').hide();
        }
    });

});





/**
 *
 * @type {string}
 */
const site_url = "http://localhost/ecommerce-shop/";

$('body').on('change', "#subCategoryStatus", function () {
    var id = $(this).attr('data-id');
    if (this.checked) {
        var status = 'active';
    } else {
        status = 'inactive';
    }
    $('.loader__').show();
    $.ajax({
        url: "sub-categories/update-status/" + id + '/' + status,
        method: 'get',
        success: function (result) {
            $('.loader__').hide();
        }
    });
});





/**
 * sliderStatus
 */
$('body').on('change', "#sliderStatus", function () {
    var id = $(this).attr('data-id');
    if (this.checked) {
        var status = 'active';
    } else {
        status = 'inactive';
    }
    $('.loader__').show();
    $.ajax({
        url: "sliders/update-status/" + id + '/' + status,
        method: 'get',
        success: function (result) {
            $('.loader__').hide();
        }
    });
});




/**
 * productStatus
 */

$('body').on('change', "#productStatus", function () {
    var id = $(this).attr('data-id');
    if (this.checked) {
        var status = 'active';
    } else {
        status = 'inactive';
    }
    $('.loader__').show();
    $.ajax({
        url: "products/update-status/" + id + '/' + status,
        method: 'get',
        success: function (result) {
            $('.loader__').hide();
        }
    });
});





/*
warranty show hide
 */

$('body').on('change', 'input[name="warranty"]', function () {
    var n = $(this).val();

  if (n==1){
     $('.warranty_box').slideDown();
  }else {
      $('.warranty_box').slideUp();
  }

});


/*
Profile Create Sectionm
 */

$('body').on('change', 'input[name="create"]', function () {
    var n = $(this).val();

    if (n==1){
        $('.create_section').slideDown();
    }else {
        $('.create_section').slideUp();
    }

});





/*
sub category filtering
 */

$('body').on('change', "#cat_id", function () {
    var id = $(this).val();

    if (id !== ''){

        $('.loader__').show();
    $.ajax({
        url: site_url+"products/find-categories/" + id,
        method: 'get',
        success: function (result) {
            $('#subcat_id').html(result);

            $('.loader__').hide();
        }
    });
    }
});






/*
buying_price
 */

$('body').on('change', ".buying_price", function () {
    var price = $(this).val();
    var id = $(this).attr('data-id');

    $('.loader__').show();
        $.ajax({
            url: site_url+"products/updateBuyingPrice/" + id + '/' +price,
            method: 'get',
            success: function (result) {

                $('.loader__').hide();
            }
        });
});






/*
selling_price
 */

$('body').on('change', ".selling_price", function () {
    var price = $(this).val();
    var id = $(this).attr('data-id');

    $('.loader__').show();
    $.ajax({
        data:{ id: id, price: price },
        url: site_url + "products/update-selling-Price" ,
        method: 'post',
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
        },
        success: function (result) {
            $('.loader__').hide();
        }
    });
});





/*
special_price
 */

$('body').on('change', ".special_price", function () {
    var price = $(this).val();
    var id = $(this).attr('data-id');

    $('.loader__').show();
    $.ajax({
        data:{ id: id, price: price },
        url: site_url + "products/update-special-Price" ,
        method: 'post',
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
        },
        success: function (result) {
            $('.loader__').hide();
        }
    });
});







/**
 * fileClick
 */
$('body').on('click', ".fileClick", function () {

	var id = $(this).attr('data-id');
	$('#' + id).click();
});





/**
 * multiple file
 */

function handleFileSelect(event) {
    //Check File API support
    if (window.File && window.FileList && window.FileReader) {

        var files = event.target.files; //FileList object
        var output = document.getElementById("result");

        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            //Only pics
            if (!file.type.match('image')) continue;

            var picReader = new FileReader();
            picReader.addEventListener("load", function (event) {
                var picFile = event.target;
                var div = document.createElement("div");
                div.innerHTML = "<img style='width: 100px; height: 90px; border: 1px solid #FF0000; margin: 5px; float: left;' src='" + picFile.result + "'" + "title='" + file.name + "'/>";
                output.insertBefore(div, null);
            });
            //Read the image
            picReader.readAsDataURL(file);
        }
    } else {
        console.log("Your browser does not support File API");
    }
}

document.getElementById('files').addEventListener('change', handleFileSelect, false);




/*
Profile Name
 */

$('body').on('change', ".name", function () {
    var name = $(this).val();
    var id = $(this).attr('data-id');

    $('.loader__').show();
    $.ajax({
        url: site_url+"profiles/change-profile-Name/" + id + '/' +name,
        method: 'get',
        success: function (result) {

            $('.loader__').hide();
        }
    });
});



