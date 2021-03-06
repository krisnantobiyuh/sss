
<div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="z-index:999999;">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <!-- <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="image-gallery-title"></h4>
            </div> -->
            <div class="modal-body">
                <!-- Load imgages -->
                <img id="image-gallery-image" class="img-responsive img-detail" style="width:100%; margin:0 auto" src="" >
                <!-- end load images -->

                <!-- laod image caption -->
                <div class="col-md-12 text-justify" id="image-gallery-caption">
                </div>
                <!-- end laod image caption -->
            </div>
            <div class="modal-footer">
                <!-- navigation link -->
                <div class="pull-left">
                    <span class="fa fa-arrow-circle-left" style="color:rgba(0, 0, 0, 0.24);font-size:100px;" id="show-previous-image"></span>
                </div>
                <div class="pull-right">
                    <span class="fa fa-arrow-circle-right"  style="color:rgba(0, 0, 0, 0.24);font-size:100px;" id="show-next-image" class="btn btn-default"></span>
                </div>
                <!-- end navigation link -->
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">

$(document).ready(function(){

loadGallery(true, 'a.img-thumbnail');

//This function disables buttons when needed
function disableButtons(counter_max, counter_current){
    $('#show-previous-image, #show-next-image').show();
    if(counter_max == counter_current){
        $('#show-next-image').hide();
    } else if (counter_current == 1){
        $('#show-previous-image').hide();
    }
}

/**
 *
 * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
 * @param setClickAttr  Sets the attribute for the click handler.
 */

function loadGallery(setIDs, setClickAttr){
    var current_image,
        selector,
        counter = 0;

    $('#show-next-image, #show-previous-image').click(function(){
        if($(this).attr('id') == 'show-previous-image'){
            current_image--;
        } else {
            current_image++;
        }

        selector = $('[data-image-id="' + current_image + '"]');
        updateGallery(selector);
    });

    function updateGallery(selector) {
        var $sel = selector;
        current_image = $sel.data('image-id');
        $('#image-gallery-caption').text($sel.data('caption'));
        $('#image-gallery-title').text($sel.data('title'));
        $('#image-gallery-image').attr('src', $sel.data('image'));
        disableButtons(counter, $sel.data('image-id'));
    }

    if(setIDs == true){
        $('[data-image-id]').each(function(){
            counter++;
            $(this).attr('data-image-id',counter);
        });
    }
    $(setClickAttr).on('click',function(){
        updateGallery($(this));
    });
}
});
</script>
