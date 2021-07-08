 <?php
    function construct()
    {
    }
    function addAction()
    {
        load_model('index');
        if (isset($_POST['btn-add'])) {
            global $error;
            // ==============tên sản phẩm======================
            if (empty($_POST['product-name'])) {
                $error['product-name'] = "Không được Để Trống";
            } else {
                $product_name = $_POST['product-name'];
            }
            // ===============loại sản phẩm ========================
            if (empty($_POST['product-type'])) {
                $error['product-type'] = "Chưa Chọn Loại";
            } else {
                $product_type = $_POST['product-type'];
                $check_type = array(
                    'QANA' => "Thời Trang Nam",
                    'QANU' => "Thời Trang Nữ",
                    'QATE' => 'Thời Trang Trẻ Em',
                    'DV' => 'Đầm Váy',
                    'PK' => 'Phụ Kiện'
                );
                if (array_key_exists($product_type, $check_type)) {
                    $product_category = $check_type[$product_type];
                }
            }
            // =============== giá bán ===============================
            if (empty($_POST['price'])) {
                $error['price'] = "Chua nhập giá bán";
            } else {
                $price = $_POST['price'];
            }
            // ============================giá gốc nhập==============================

            if (empty($_POST['cost'])) {
                $error['cost'] = "Chưa Nhập Giá Gốc";
            } else {
                $cost = $_POST['cost'];
            }
            // =======================mô tả ngắn ================================
            if (empty($_POST['describe-short'])) {
                $error['describe-short'] = "Chưa Nhập Mô Tả Ngắn";
            } else {
                $describe_short = $_POST['describe-short'];
            }
            // =========================mô tả chi tiết ===================================
            if (empty($_POST['describe'])) {
                $error['describe'] = "Chưa nhập mô tả chi tiết";
            } else {
                $describe = $_POST['describe'];
            }
            // =============================== xử lý ảnh đại diện  sản phẩm =====================
            if (empty($_POST['thumbnail_url'])) {
                $error['thumbnail_url'] = "chưa có ảnh đại diện";
            } else {
                $thumbnail_url = $_POST['thumbnail_url'];
            }
            // ======================= xử lý số lượng ===========================================
            $product_size = array();
            if (empty($_POST['check'])) {
                $error['product_amount'] = "chưa chọn giá trị nào";
            } else {
                $product_size = $_POST['check'];
                if (empty($_POST['product_amount'])) {
                    $error['product_amount'] = "Chưa Nhập Số Lượng";
                } else {
                    $product_amount = $_POST['product_amount'];
                }
            }

            // ======================xủ lý ảnh chi tiết =========================================
            if (empty($_POST['upload_multi'])) {
                $error['upload_multi'] = "Chưa có ảnh vui lòng Thêm Ảnh";
            } else {
                $list_url_img = $_POST['upload_multi'];
            }

            if (empty($error)) {
                $img_url = array(
                    'img_url' => $thumbnail_url
                );
                db_insert("tbl_img", $img_url);
                //    =========================đưa ảnh vào bảng tbl_img =============================
                $url = $img_url['img_url'];
                $id_img = get_id_img_by_path($url);
                $info = array(
                    'product_code' => '',
                    'product_name' => $product_name,
                    'product_desc_short' => $describe_short,
                    'product_des' => $describe,
                    'product_price' => $price,
                    'product_cost' => $cost,
                    'img_id' => $id_img,
                    'product_category' => $product_category
                );
                db_insert("tbl_product", $info);
                $product_id = get_product_id_by_img_id($id_img);
                $data_pro  = array('product_id'=>$product_id);
                db_update("tbl_img",$data_pro,"`img_id`={$id_img}");

                $product_code_update = array('product_code' => $product_type . $product_id);
                db_update("tbl_product", $product_code_update, "`product_id`='{$product_id}'");

                $num = count($product_size);
                for ($i = 0; $i < $num; $i++) {
                    $size = array(
                        'product_id' => $product_id,
                        'size_name' => $product_size[$i],
                        'amount' => $product_amount[$i]
                    );
                    db_insert("tbl_amount_size", $size);
                }
                foreach ($list_url_img as $img) {
                    $img_item = array(
                        'img_url' => $img,
                        'product_id'=>$product_id
                    );
                    db_insert("tbl_img", $img_item);
                    $url = $img_item['img_url'];
                    $get_id_img = get_id_img_by_path($url);
                    $data = array(
                        'product_id' => $product_id,
                        'img_id' => $get_id_img
                    );
                    db_insert("tbl_product_img", $data);
                }
                $error['success'] = "Thêm Sản Phẩm Thành Công";
            } else {
                $error['add'] = "thêm sản phẩm thất bại";
            }
        }


        load_view("add");
    }
    function showAction()
    {
        load_model('index');
        $list_product = get_list_product();
        $data = array(
            'list_product' => $list_product,
        );
        load_view("show", $data);
    }
    function upload_imgAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            //Bước 1: Tạo thư mục lưu file
            $error = array();
            $target_dir = "public/upload/product_thumb/";
            $target_file = $target_dir . basename($_FILES['file']['name']);
            // Kiểm tra kiểu file hợp lệ
            $type_file = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            $type_fileAllow = array('png', 'jpg', 'jpeg', 'gif');
            if (!in_array(strtolower($type_file), $type_fileAllow)) {
                $error['file'] = "File bạn vừa chọn hệ thống không hỗ trợ, bạn vui lòng chọn hình ảnh";
            }
            //Kiểm tra kích thước file
            $size_file = $_FILES['file']['size'];
            if ($size_file > 5242880) {
                $error['file'] = "File bạn chọn không được quá 5MB";
            }
            // Kiểm tra file đã tồn tại trê hệ thống
            if (file_exists($target_file)) {
                $error['file'] = "File bạn chọn đã tồn tại trên hệ thống";
            }
            //
            if (empty($error)) {
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                    $flag = true;
                    echo json_encode(array('status' => 'ok', 'file_path' => $target_file));
                } else {
                    echo json_encode(array('status' => 'error'));
                }
            } else {
                echo json_encode(array('status' => 'error', 'error' => $error['file']));
            }
        }
    }
    function upload_multi_imgAction()
    {
        $result = "";
        $hidden = "";
        // Số lượng ảnh upload 
        $num_images = count($_FILES['file']['name']);
        $target_dir = "public/upload/product/";
        // Duyệt từng ảnh để upload lên server 
        for ($i = 0; $i < $num_images; $i++) {
            $target_file = $target_dir . basename($_FILES['file']['name'][$i]);

            if (move_uploaded_file($_FILES["file"]["tmp_name"][$i], $target_file)) {
                // Tạo html hiển thị hình ảnh đã upload 
                $result .= "<img style ='width:150px;height:200px' src=\"{$target_file}\" >";
                $hidden .= "<input type='hidden' name='upload_multi[]' value='{$target_file}'>";
                //    echo "Upload {$i} ok";
            }
        }
        echo $result . $hidden;
    }
    function editAction()
    {
        load_model('index');
        $id = $_GET['cat_id'];
        $list_product = get_product_by_id($id);
         
  
        if(isset($_POST['btn_del'])){
            $thumb = get_thumb_by_id($list_product['img_id']);
            unlink($thumb['img_url']);
            $thum_url = get_all_img($id);
            foreach ($thum_url as $item){
                unlink($item['img_url']);
            }
            db_delete("tbl_product","`product_id`={$id}");
            db_delete("tbl_product_img","`product_id`={$id}");
            db_delete("tbl_img","`product_id`={$id}");
            db_delete("tbl_img","`img_id`={$list_product['img_id']}");
            db_delete("tbl_amount_size","`product_id`={$id}");
            redirect("?mod=product&action=show");
        }
        if(isset($_POST['btn_edit'])){
                global $error;
                // ==============tên sản phẩm======================
                if (empty($_POST['product-name'])) {
                    $error['product-name'] = "Không được Để Trống";
                } else {
                    $product_name = $_POST['product-name'];
                }
                // ===============loại sản phẩm ========================
                if (empty($_POST['product-type'])) {
                    $error['product-type'] = "Chưa Chọn Loại";
                } else {
                    $product_type = $_POST['product-type'];
                    $check_type = array(
                        'QANA' => "Thời Trang Nam",
                        'QANU' => "Thời Trang Nữ",
                        'QATE' => 'Thời Trang Trẻ Em',
                        'DV' => 'Đầm Váy',
                        'PK' => 'Phụ Kiện'
                    );
                    if (array_key_exists($product_type, $check_type)) {
                        $product_category = $check_type[$product_type];
                    }
                }
                // =============== giá bán ===============================
                if (empty($_POST['price'])) {
                    $error['price'] = "Chua nhập giá bán";
                } else {
                    $price = $_POST['price'];
                }
                // ============================giá gốc nhập==============================
    
                if (empty($_POST['cost'])) {
                    $error['cost'] = "Chưa Nhập Giá Gốc";
                } else {
                    $cost = $_POST['cost'];
                }
                // =======================mô tả ngắn ================================
                if (empty($_POST['describe-short'])) {
                    $error['describe-short'] = "Chưa Nhập Mô Tả Ngắn";
                } else {
                    $describe_short = $_POST['describe-short'];
                }
                // =========================mô tả chi tiết ===================================
                if (empty($_POST['describe'])) {
                    $error['describe'] = "Chưa nhập mô tả chi tiết";
                } else {
                    $describe = $_POST['describe'];
                }
                // =============================== xử lý ảnh đại diện  sản phẩm =====================
                if (empty($_POST['thumbnail_url'])) {
                    $thumbnail_url = $_POST['thumbnail_url'];
                } else {
                    $thumbnail_url = $_POST['thumbnail_url'];
                }
                // ======================= xử lý số lượng ===========================================
                $product_size = array();
                if (empty($_POST['check'])) {
                    $error['product_amount'] = "chưa chọn bất kỳ giá trị nào";
                } else {
                    $product_size = $_POST['check'];
                }
                 $product_amount = array();
                if (!empty($_POST['product_amount'])) {
                    $product_amount = $_POST['product_amount'];
                }
    
                // ======================xủ lý ảnh chi tiết =========================================
                if (empty($_POST['upload_multi'])) {
                    $list_url_img = $_POST['multi_old'] ;
                }else {
                    $list_url_img = $_POST['upload_multi'];
                }
               
                if (empty($error)) {
 //========================== xoá dữ liệu cũ=======================================================
                    db_delete("tbl_product_img","`product_id`={$id}");
                    db_delete("tbl_img","`product_id`={$id}");
                    db_delete("tbl_img","`img_id`={$list_product['img_id']}");
                    db_delete("tbl_amount_size","`product_id`={$id}");
// ============================== chèn dữ liệu mới ======================================================
                    $img_url = array(
                        'img_url' => $thumbnail_url
                    );
                    db_insert("tbl_img", $img_url);
                    //    =========================đưa ảnh vào bảng tbl_img =============================
                    $url = $img_url['img_url'];
                    $id_img = get_id_img_by_path($url);
                    $info = array(
                        'product_code' => '',
                        'product_name' => $product_name,
                        'product_desc_short' => $describe_short,
                        'product_des' => $describe,
                        'product_price' => $price,
                        'product_cost' => $cost,
                        'img_id' => $id_img,
                        'product_category' => $product_category
                    );
                    db_update("tbl_product", $info,"`product_id`= $id");
                    $product_id = get_product_id_by_img_id($id_img);
                    $data_pro  = array('product_id'=>$product_id);
                    db_update("tbl_img",$data_pro,"`img_id`={$id_img}");
    
                    $product_code_update = array('product_code' => $product_type . $product_id);
                    db_update("tbl_product", $product_code_update, "`product_id`='{$product_id}'");
    
                    $num = count($product_size);
                    for ($i = 0; $i < $num; $i++) {
                        $size = array(
                            'product_id' => $product_id,
                            'size_name' => $product_size[$i],
                            'amount' => $product_amount[$i]
                        );
                        db_insert("tbl_amount_size", $size);
                    }
                    foreach ($list_url_img as $img) {
                        $img_item = array(
                            'img_url' => $img,
                            'product_id'=>$product_id
                        );
                        db_insert("tbl_img", $img_item);
                        $url = $img_item['img_url'];
                        $get_id_img = get_id_img_by_path($url);
                        $data = array(
                            'product_id' => $product_id,
                            'img_id' => $get_id_img
                        );
                        db_insert("tbl_product_img", $data);
                    }
                    redirect("?mod=product&action=edit&cat_id={$id}");
                   
                } else {
                    $error['add'] = "Sửa sản phẩm thất bại";
                }
    
        }
        load_view('edit',$list_product);

    }
