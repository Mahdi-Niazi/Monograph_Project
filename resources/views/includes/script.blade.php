
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="{{URL::TO('js/js/jquery-3.6.1.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
<script src="{{URL::TO('js/js/chart.min.js')}}"></script>
<!--Charts -->
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js">
 </script>
 <script src="{{URL::to('js/js/bootstrap.bundle.min.js')}}"></script> 
<!--Bootstrap 4 -->

<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="{{URL::to('js/js/jquery.dataTables.min.js')}}"></script>
<!--Data Table -->

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
<script src="{{URL::TO('js/js/validation.js')}}"></script>
<!--Validator Script -->

<!-- Alert auto close -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="{{URL::to('js/js/summernote.min.js')}}"></script>



<script type="text/javascript">
$(document).ready(function() {
    $('#summernote').summernote({
        placeholder: 'News Descriptions goes here',
        tabsize: 2,
        height: 100

    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $('#summernote').summernote({
        tabsize: 2,
        height: 100

    });
});
</script>

<!--Dashboard Script -->
<script type="text/javascript">
    $(function(){
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    $(window).resize(function(e) {
        if($(window).width()<=768){
        $("#wrapper").removeClass("toggled");
        }else{
        $("#wrapper").addClass("toggled");
        }
    });
    });
</script>
<script src="{{URL::TO('js/validate.js')}}"></script>
<script src="{{URL::to('js/charts.js')}}"></script>
<script src="{{URL::to('js/custom-js.js')}}"></script>

