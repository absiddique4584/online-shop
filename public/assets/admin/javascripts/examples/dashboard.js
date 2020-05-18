
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


$(function () {
    "use strict";

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

    //TOASTR NOTIFICATION
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    toastr.options = {
    "progressBar": true,
    "positionClass": "toast-bottom-right",
    "timeOut": 3500,
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "slideDown",
    "hideMethod": "fadeOut"
    };

    toastr.info('Enjoy it!', '<h5 style="margin-top: 0px; margin-bottom: 5px;"><b>This is Online Shop!</b></h5>');

    //AREA CHART EXAMPLE
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    var area = document.getElementById("area-chart");

    var options ={
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    };
    var dataArea = {
        labels: ["January", "February", "March", "April", "May", "June"],
        datasets: [
            {
                label: "Data 1",
                fill: true,
                backgroundColor: "rgba(55, 209, 119, 0.45)",
                borderColor: "rgba(55, 209, 119, 0.45)",
                pointBorderColor: "rgba(75,192,192,1)",
                pointBackgroundColor: "#fff",
                pointHoverBackgroundColor: "343d3e",
                pointHoverBorderColor: "rgba(220,220,220,1)",
                data: [12, 13, 11, 6, 9, 12]
            },
            {
                label: "Data 2",
                fill: true,
                backgroundColor: "rgba(175, 175, 175, 0.26)",
                borderColor: "rgba(175, 175, 175, 0.26)",
                pointBorderColor: "rgba(75,192,192,1)",
                pointBackgroundColor: "#fff",
                pointHoverBackgroundColor: "#343d3e",
                pointHoverBorderColor: "rgba(220,220,220,1)",
                data: [14, 6, 9, 13, 12, 16],
            }
        ],
        options: {
            scales: {
                yAxes: [{
                    stacked: true
                }]
            }
        }
    };

    var areaChart = new Chart(area, {
        type: 'line',
        data: dataArea,
        options: options

    });

    //PIE  & POLAR CHART EXAMPLE
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    var pie = document.getElementById("pie-chart");

    var dataPie = {
        labels: [
            "Data 1",
            "Data 2",
            "Data 3"
        ],
        datasets: [
            {
                data: [300, 50, 100],
                backgroundColor: [
                    "rgba(55, 209, 119, 0.45)",
                    "#FFCE56",
                    "rgba(175, 175, 175, 0.26)"
                ],
                hoverBackgroundColor: [
                    "rgba(55, 209, 119, 0.6)",
                    "#FFCE56",
                    "rgba(175, 175, 175, 0.4)"
                ]
            }]
    };


    var pieChar = new Chart(pie, {
        type: 'pie',
        data: dataPie

    });


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
sub category filtering
 */

$('body').on('change', "#cat_id", function () {
    var id = $(this).val();

    if (id !== ''){


    $.ajax({
        url: site_url+"products/find-categories/" + id,
        method: 'get',
        success: function (result) {
            $('#subcat_id').html(result);

        }
    });

    }
});






/*
input field
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









