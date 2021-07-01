<?php get_header() ?>
<div id="wp-content" class="d-flex">
    <?php get_sidebar(); ?>
    <div id="content" class="m-2">
        <div class="row m-0">
            <h1 class="text-center">Sửa Thông Tin Bài Viết</h1>
            <h4 class="text-center text-danger"><?php echo form_error('update'); ?></h4>
            <form action="" method="post">
                <div class="row">
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="input1">Tiêu Đề Bài Viết</span>
                            <input type="text" name="post_title" value="<?php echo $post['post_title']; ?>" class="form-control" placeholder=" Post Title " /><br><strong class="text-danger ms-4 bg-info  mt-2"><?php echo form_error('post_title'); ?></strong>
                        </div>
                    </div>
                    <div class="col-7">
                        <strong class="text-danger bg-info "><?php echo form_error('post_content'); ?></strong>
                        <span class="input-group-text" id="input1">Nội Dung</span>
                        <div id="editor">
                            <textarea name="post_content" class="ckeditor" id="" cols="30" rows="10"><?php echo $post['post_content']; ?></textarea>
                        </div>
                    </div>
                    <div class="col-4 ms-3 p-0 border rounded">
                        <h4 class="text-center p-2 bg-secondary text-info">Thêm Ảnh Đại Diện</h4>
                        <strong class="text-danger bg-info "><?php echo form_error('thumbnail_url'); ?></strong>
                        <div id="upload_img" class="d-flex">
                            <div id="link_upload" class="d-flex">
                                <input type="file" name="file" id="file" class='btn ' data-uri="upload_single.php"><br /><br />
                                <input id="thumbnail_url" type="hidden" name="thumbnail_url" value="<?php echo $post['thumb_url']; ?>" />
                                <input type="submit" class='btn btn-success' name="Upload" value="Upload" id="upload_single_bt">
                            </div>
                            <div id="show_list_file" style="margin-top: 60px;" class="w-50 ms-0">
                                <img id="img_old" style="width: 285px;padding:0;margin-left:100px;height: 350px;" src="<?php echo $post['thumb_url']; ?>" />
                                <strong> <span class="text-danger d-block ms-5 position-absolute text-center w-50 fs-5" id="error-show"></span></strong>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2 mb-3">
                    <div class="col-9"></div>
                    <div class="col-2">
                        <input type="submit" name="btn_update" class="btn btn-warning" value="Sửa Bài Viết">
                        <input type="submit" name="btn_cancel" class="btn btn-secondary" value="Quay Lại">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="ckeditor/ckeditor/ckeditor.js"></script>
<script src="public/js/upload.js"></script>
<?php get_footer() ?>