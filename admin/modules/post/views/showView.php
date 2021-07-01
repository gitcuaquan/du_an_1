<?php get_header() ?>
<div id="wp-content" class="d-flex">
    <?php get_sidebar(); ?>
    <div id="content" class="m-2">
        <div class="row m-0">
            <?php if (!empty($result)) {
                foreach ($result as $info) { ?>
                    <div class="col-10 mt-2 ms-2 border border-info d-flex">
                        <div class="thumbnail me-3">
                            <img src="<?php echo $info['thumb_url'] ;?>" style="width: 250px;" class="img-thumbnail" alt="">
                        </div>
                        <div class="post_info w-75 me-3">
                            <div class="post_title p-1 bg-infob "><h1><?php echo $info['post_title'] ;?></h1></div>
                            <div class="post_content overflow-auto fs-6 " style="height: 230px;"><?php echo $info['post_content'] ;?></div>
                        </div>
                        <div class="action_post border-start pt-5 text-center">
                            <a href="?mod=post&action=update&id=<?php echo $info['post_id'] ?>" style="width: 130px;" class="btn btn-warning mb-5 text-decoration-none">Sửa Thông Tin</a>
                            <a href="?mod=post&action=del&id=<?php echo $info['post_id'] ?>" style="width: 130px;" class="btn btn-danger text-decoration-none">Xoá Bài Viêt</a>
                        </div>
                    </div>

            <?php  }
            } ?>


        </div>
    </div>
</div>
<?php get_footer() ?>