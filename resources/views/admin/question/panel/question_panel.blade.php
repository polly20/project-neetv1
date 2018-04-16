<a class="btn btn-light btn--icon-text" id = "que_text_btn"><i class="zmdi zmdi-text-format"></i> Text</a>
<a class="btn btn-light btn--icon-text" id = "que_image_btn"><i class="zmdi zmdi-image-o"></i> Image Diagram</a>
<div class="accordion" id = "que_text_btn_wrapper" role="tablist">
    <div class="card">
        <div class="card-header" role="tab" id="headingOne">
            <a data-toggle="collapse" href="#que_1_collapse" aria-expanded="true" aria-controls="collapseOne">
                Question
            </a>
        </div>

        <div id="que_1_collapse" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
                <div class="form-group">
                    <textarea class="form-control" rows="5" id = "que_input" placeholder="Type your question"></textarea>
                    <i class="form-group__bar"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" role="tab" id="headingTwo">
            <a class="collapsed" data-toggle="collapse" href="#que_2_collapse" aria-expanded="false" aria-controls="collapseTwo">
                Preview
            </a>
        </div>
        <div id="que_2_collapse" class="collapse show" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
                <iframe id = "que_input_preview" class="form-control" style="width: 100%;" frameBorder="0"></iframe>
            </div>
        </div>
    </div>
</div>

<div class="accordion" id = "que_image_btn_wrapper" role="tablist" style = "display: none;">
    <div class="card">
        <div class="card-header" role="tab" id="headingOne">
            <a data-toggle="collapse" href="#que_3_collapse" aria-expanded="true" aria-controls="collapseOne">
                Upload Image
            </a>
        </div>

        <div id="que_3_collapse" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
                <h4 class="card-title">Drag and drop file upload</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" role="tab" id="headingTwo">
            <a class="collapsed" data-toggle="collapse" href="#que_4_collapse" aria-expanded="false" aria-controls="collapseTwo">
                Preview Image
            </a>
        </div>
        <div id="que_4_collapse" class="collapse show" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
                -- Image Here --
            </div>
        </div>
    </div>
</div>