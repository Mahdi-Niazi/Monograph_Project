//Menu Toggle
$('.btn-toggle').on("click", function () {
    $('.vertical-nav').toggleClass('side');
    $('.page-content').toggleClass('toggle');
    $('.custom-nav').toggleClass('nav-custom');
    
}); 
//Table Toggle
$(document).ready(function() {
    $('#myTable').DataTable();
});

// Alert auto close
setTimeout(function () {
            $('.alert').alert('close');
}, 5000);

//Script for Address Page
jQuery(document).ready(function () {
    jQuery('#country').change(function () {
        let cid = jQuery(this).val();
        jQuery.ajax({
            url: '/getProvince',
            type: 'post',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: 'cid=' + cid,
            success: function (result) {
                jQuery('#province').html(result);
            }
        })
    });
    jQuery('#province').change(function () {
        let pid = jQuery(this).val();
        jQuery.ajax({
            url: '/getDistrict',
            type: 'post',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: 'pid=' + pid,
            success: function (result) {
                jQuery('#district').html(result);
            }
        })
    });
    jQuery('#members').change(function () {
        let mid = jQuery(this).val();
        jQuery.ajax({
            url: '/getBusinessName',
            type: 'post',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: 'mid=' + mid,
            success: function (result) {
                jQuery('#businessName').html(result);
            }
        })
    });
});
