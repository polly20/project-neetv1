<a class="btn btn-light btn--icon-text" id = "ans_b_text_btn"><i class="zmdi zmdi-text-format"></i> Text</a>
<a class="btn btn-light btn--icon-text" id = "ans_b_image_btn"><i class="zmdi zmdi-image-o"></i> Image Diagram</a>
<div class="accordion" id = "ans_b_text_btn_wrapper" role="tablist">
    <div class="card">
        <div class="card-header" role="tab" id="headingOne">
            <a data-toggle="collapse" href="#ans_b_1_collapse" aria-expanded="true" aria-controls="collapseOne">
                Choice B
            </a>
        </div>

        <div id="ans_b_1_collapse" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
                <div class="form-group">
                    <textarea class="form-control" rows="5" id = "input_ans_b" placeholder="Type your answer"></textarea>
                    <i class="form-group__bar"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" role="tab" id="headingTwo">
            <a class="collapsed" data-toggle="collapse" href="#ans_b_2_collapse" aria-expanded="false" aria-controls="collapseTwo">
                Preview
            </a>
        </div>
        <div id="ans_b_2_collapse" class="collapse show" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
                <iframe id = "input_ans_b_preview" class="form-control" style="width: 100%;" frameBorder="0"></iframe>
            </div>
        </div>
    </div>
</div>

<div class="accordion" id = "ans_b_image_btn_wrapper" role="tablist" style = "display: none;">
    <div class="card">
        <div class="card-header" role="tab" id="headingOne">
            <a data-toggle="collapse" href="#ans_b_3_collapse" aria-expanded="true" aria-controls="collapseOne">
                Upload Image
            </a>
        </div>

        <div id="ans_b_3_collapse" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
                <h4 class="card-title">Drag and drop file upload</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" role="tab" id="headingTwo">
            <a class="collapsed" data-toggle="collapse show" href="#ans_b_4_collapse" aria-expanded="false" aria-controls="collapseTwo">
                Preview Image
            </a>
        </div>
        <div id="ans_b_4_collapse" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
                -- Image Here --
            </div>
        </div>
    </div>
</div>