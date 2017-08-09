<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @Creation Date:28-Oct-2016
 * @work   :  To check user login or not
 */
if (!function_exists('isSuperLoggedIn')) {

    function isSuperLoggedIn() {
        $CI = & get_instance();
        $email = $CI->session->userdata('email');
        $user_id = $CI->session->userdata('user_id');
        $loggedin = $CI->session->userdata('logged_in');
        $status = $CI->session->userdata('status');
        $user_type = $CI->session->userdata('user_type');
        if (!isset($email) || ((isset($user_id) && $user_id == '')) || (isset($loggedin) && $loggedin != true)) {
            $CI->session->set_flashdata('error', 'Restricted Area. Please login to access to this area');
            redirect('user/login/login');
        } elseif (isset($user_type) && $user_type == 1) {
            redirect('user/login/login_success');
        } elseif (isset($user_type) && $user_type == 2) {
            redirect('user/login/login_success');
        } elseif (isset($user_type) && $user_type == 3){
            redirect('user/login/login_success');
        }
        return true;
    }

}


if (!function_exists('get_languages')) {
    function get_languages($lng =''){ 
        $lang = array('EN'=>'English','HI'=>'Hindi','ML'=>'Malayalam');
        if($lng !='') return $lang[$lng];
        return $lang;
    }
}

/**
 * @Creation Date:05-Nov-2016
 * @work   :  To get user id by role
 */
if (!function_exists('getUserIdByRole')) {

    function getUserIdByRole($role = 1) {
        $CI = & get_instance();
        $CI->load->database();
        $CI->db->where(array('user.role' => $role, 'user.status' => 1));
        $CI->db->select(array('user.user_id'));
        $query = $CI->db->get(TBL_USERS . ' as user');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return FALSE;
    }

}


/**
 * @Creation Date:28-Oct-2016
 * @work   :  To build tree for the category
 */
if (!function_exists('buildTreeForCategory')) {

    function buildTreeForCategory($data = array(), $parent = 0, $user_id = '') {
        $CI = & get_instance();
        $CI->load->database();
        //$CI->db->join(TBL_USERS.' as user','user');
        $userIdArr = [];
        $userRes = getUserIdByRole();
        if ($user_id != '') {
            if ($userRes) {
                foreach ($userRes as $key => $val) {
                    $userIdArr[] = $val['user_id'];
                }
            }
            array_push($userIdArr, $user_id);
            $CI->db->where_in('pc.user_id', $userIdArr);
        }

        $query = $CI->db->get("packages" . ' as pc');

        if ($query->row()) {
            $tree = array();
            foreach ($query->result_array() as $d) {
                if ($d['cat_id'] == $parent) {
                    $children = buildTreeForCategory($data, $d['cat_id'], $user_id);
                    // set a trivial key
                    if (!empty($children)) {
                        $d['_children'] = $children;
                    }
                    $tree[] = $d;
                }
            }
            return $tree;
        }
    }

}

/**
 * @Creation Date:28-Oct-2016
 * @work   :  To show the tree for the category with dash heirarchy
 */
if (!function_exists('printTreeForCategory')) {

    function printTreeForCategory($tree, $r = 0, $p = null, $category = 0, $editCategory = '') {
        if (!empty($tree)) {
            foreach ($tree as $i => $t) {
                if ($editCategory == $t['cat_id']) {
                    continue;
                }

                $dash = ($t['parent_id'] == 0) ? '' : str_repeat('-', $r) . ' ';

                if (is_array($category)) {
                    $selected = (in_array($t['cat_id'], $category)) ? 'selected' : '';
                } else {
                    $selected = ($category == $t['cat_id']) ? 'selected' : '';
                }

                printf("\t<option %s value='%d'>%s%s</option>\n", $selected, $t['cat_id'], $dash, $t['category_name']);
                if ($t['parent_id'] == $p || $t['parent_id'] == 0) {
                    // reset $r
                    $r = 0;
                }
                if (isset($t['_children'])) {
                    printTreeForCategory($t['_children'], $r + 1, $t['parent_id'], $category, $editCategory);
                }
            }
        }
        return FALSE;
    }

}

/**
 * @Creation Date:28-Oct-2016
 * @work   :  To create directory structure
 */
if (!function_exists('createDirStructure')) {

    function createDirStructure($path = false) {
        $mkDir = "";
        if ($path) {
            if (is_array($path)) {//if array pass
                $tags = $path;
            } else {//if string pass 
                $tags = explode('/', $path);            // explode the full path
            }
            if (is_array($tags)) {
                foreach ($tags as $folder) {
                    $mkDir = $mkDir . $folder . "/";   // make one directory join one other for the nest directory to make
                    //echo '"'.$mkDir.'"<br/>';       // this will show the directory created each time
                    if (!is_dir($mkDir)) {             // check if directory exist or not
                        mkdir($mkDir, 0777);            // if not exist then make the directory
                        chmod($mkDir, 0777);            //Change the permission for read,write
                    }
                }//end if foreach
            }//end if $tags
        }//end if $path
        return $mkDir;
    }

//end function createDirStructure()
}//end if exists

/**
 * @Creation Date:28-Oct-2016
 * @work   :  To create folder
 */
if (!function_exists('create_folder')) {

    function create_folder($folderPath) {
        if (!is_dir($folderPath)) { //FCPATH."assets/moj"
            mkdir($folderPath);
            chmod($folderPath, 0777);
            //return TRUE;
        }
        return FALSE;
    }

}

/**
 * @Creation Date:28-Oct-2016
 * @work   :  To delete folder
 */
if (!function_exists('delete_folder')) {

    function delete_folder($folder) {
        $glob = glob($folder);
        foreach ($glob as $g) {
            if (!is_dir($g)) {
                unlink($g);
            } else {
                delete_folder("$g/*");
//rmdir($g);
            }
        }
    }

}

/**
 * @Creation Date:28-Oct-2016
 * @work   :  To encrypt string with base64 and serialize
 */
if (!function_exists('encyptObj')) {

    function encyptObj($obj) {
        return base64_encode(serialize($obj));
    }

}

/**
 * @Creation Date:28-Oct-2016
 * @work   :  To decrypt string with base64 and unserialize
 */
if (!function_exists('decryptObj')) {

    function decryptObj($obj) {
        return unserialize(base64_decode($obj));
    }

}

/**
 * @Creation Date:28-Oct-2016
 * @work   :  To encrypt string with base64
 */
if (!function_exists('encryptIt')) {

    function encryptIt($pure_string) {

        if (is_numeric($pure_string)) {
            $pure_string+=$pure_string;
        }

        return rtrim(base64_encode($pure_string), '=');
    }

}

/**
 * @Creation Date:28-Oct-2016
 * @work   :  To decrypt string with base64
 */
if (!function_exists('decryptIt')) {

    function decryptIt($encrypted_string) {
        $encrypted_string = base64_decode($encrypted_string);
        if (is_numeric($encrypted_string)) {
            return $encrypted_string / 2;
        }
        return $encrypted_string;
    }

}

// Crop Manipulation.
if (!function_exists('crop')) {

    function crop($image_data) {
        $img = substr($image_data['full_path'], 51);
        $config['image_library'] = 'gd2';
        $config['source_image'] = $image_data['full_path'];
        $config['x_axis'] = $this->input->post('x1');
        $config['y_axis'] = $this->input->post('y1');
        $config['maintain_ratio'] = TRUE;
        $config['width'] = $this->input->post('width_cor');
        $config['height'] = $this->input->post('height_cor');
        $config['new_image'] = './uploads/crop_' . $img;

        //send config array to image_lib's  initialize function
        $this->image_lib->initialize($config);
        $src = $config['new_image'];
        $data['crop_image'] = substr($src, 2);
        $data['crop_image'] = base_url() . $data['crop_image'];
        // Call crop function in image library.
        $this->image_lib->crop();
        // Return new image contains above properties and also store in "upload" folder.
        return $data;
    }

}

/**
 * @Creation Date:28-Oct-2016
 * @work   :  To create common function for the upload image
 */
if (!function_exists('upload_image')) {

    function upload_image($filename, $path, $fieldName = '', $width = 150, $height = 100) {

        createDirStructure($path);

        $configImg['upload_path'] = $path;
        $configImg['allowed_types'] = 'gif|jpg|png|jpeg';
        $configImg['max_size'] = 20000;
        /* $configImg['max_width'] = 1024;
          $configImg['max_height'] = 768; */

        $configImg['file_name'] = $filename;
        $CI = & get_instance();
        $CI->load->library('upload', $configImg);
        if (!$CI->upload->do_upload($fieldName)) {
            return array('error' => $CI->upload->display_errors());
        }

        $image_data = $CI->upload->data();

        crop_image($image_data, $path, $width, $height);


        return $CI->upload->data();
    }

}


/**
 * @Creation Date:04-Nov-2016
 * @work   :  To create common function for the upload image
 */
if (!function_exists('crop_image')) {

    function crop_image($image_data, $path, $width, $height) {

        $config['image_library'] = 'gd2';
        $config['source_image'] = $image_data['full_path'];
        $config['new_image'] = $path; //save as new image //need to create thumbs first
        $config['maintain_ratio'] = TRUE;
        $config['create_thumb'] = TRUE;
        $config['thumb_marker'] = '_' . $width . 'X' . $height;
        $config['width'] = $width;
        $config['height'] = $height;

        $CI = & get_instance();
        $CI->load->library('image_lib', $config);
        if (!$CI->image_lib->resize()) {
            return array('error' => $CI->image_lib->resize());
        }
        return FALSE;
    }

}

/**
 * @Creation Date:28-Oct-2016
 * @work   : Get Branch Drop-Down By User ID
 */
if (!function_exists('getBranchDropDownByUserId')) {

    function getBranchDropDownByUserId($branchIdArr, $userID) {
        $CI = & get_instance();
        $CI->load->database();
        $html = $selected = '';
        $user = $CI->session->userdata('user');

        $CI->db->select('branch_id, name');
        $CI->db->where('user_id', $userID);
        $query = $CI->db->get(TBL_BRANCH);
        $html .= '<select tabindex="8" name="branch_id[]" id="branch_id" class="form-control select2"  multiple="multiple" data-placeholder="Select Branch">';
        if ($query->row()) {
            foreach ($query->result_array() as $key) {
                $html .= '<option value="' . $key["branch_id"] . '" ' . ((!empty($branchIdArr) && in_array($key["branch_id"], $branchIdArr)) ? "selected" : "") . ' >' . $key["name"] . '</option>';
            }
        }
        $html .= '</select>';
        return $html;
    }

}


/**
 * @Creation Date:28-Oct-2016
 * @work   : Get Attribute Drop-Down By User ID
 */
if (!function_exists('getAttributeDropDownByUserId')) {

    function getAttributeDropDownByUserId($productAttrIdArr = array(), $userId=0) {
        $CI = & get_instance();
        $CI->load->database();
        $html = '';

        $userIdArr = [];
        $userRes = getUserIdByRole();
        if ($userRes) {
            foreach ($userRes as $key => $val) {
                $userIdArr[] = $val['user_id'];
            }
        }

        array_push($userIdArr, $userId);

        $CI->db->select('product_attr_id, name');
        $CI->db->where_in('pa.user_id', $userIdArr);
        $query = $CI->db->get(TBL_PRODUCT_ATTRIBUTE . ' as pa');
        //$html .= '<select name="product_attr_id" id="product_attr_id" multiple="multiple" class="form-control select2" data-placeholder="Select Attribute">';
        $html .= '<select tabindex="10" name="product_attr_id" id="product_attr_id" class="form-control select2" data-placeholder="Select Attribute">';
        $html .= '<option>None</option>';
        if ($query->row()) {
            foreach ($query->result_array() as $key) {
                $html .= '<option value="' . $key["product_attr_id"] . '" ' . ((!empty($productAttrIdArr) && in_array($key["product_attr_id"], $productAttrIdArr)) ? "disabled" : "") . '>' . $key["name"] . '</option>';
            }
        }
        $html .= '</select>';
        return $html;
    }

}


/**
 * @Creation Date:28-Oct-2016
 * @work   : Get Attribute Value Drop-Down By Product Attribute ID To Create HTML Dropdown
 */
if (!function_exists('getAttributeValueDropDownByAttrId')) {

    function getAttributeValueDropDownByAttrId($product_attr_id, $attr_name, $productAttrValIdArr = array()) {
        $CI = & get_instance();
        $CI->load->database();
        $html = '';

        $CI->db->select('product_attr_val_id, value');
        $CI->db->where('product_attr_id', $product_attr_id);
        $query = $CI->db->get(TBL_PRODUCT_ATTRIBUTE_VALUE);
        if ($query->row()) {
            $html .= '<div class="form-group attrId_' . $product_attr_id . '"><div class="box-tools pull-right"><button type="button" product_attr_id=' . $product_attr_id . ' class="btn btn-box-tool removeAttrDiv"><i class="fa fa-remove"></i></button></div><label>' . $attr_name . '<span class="red">*</span></label>';
            $html .= '<select name="product_attr_val_id[]" id="product_attr_val_id" class="form-control select2" multiple="multiple" data-placeholder="Select Attribute Value">';

            foreach ($query->result_array() as $key) {
                $html .= '<option value="' . $key["product_attr_val_id"] . '" ' . ((!empty($productAttrValIdArr) && in_array($key["product_attr_val_id"], $productAttrValIdArr)) ? "selected" : "") . '>' . $key["value"] . '</option>';
            }
            $html .= '</select></div> ';
            return $html;
        } else {
            return FALSE;
        }
    }

}

/**
 * @desc Validates a date format
 * @params format,delimiter
 * e.g. d/m/y,/ or y-m-d,-
 */
if (!function_exists('valid_date')) {

    function valid_date($str, $params) {
        // setup
        $CI = &get_instance();
        $params = explode(',', $params);
        $delimiter = $params[1];
        $date_parts = explode($delimiter, $params[0]);

        // get the index (0, 1 or 2) for each part
        $di = valid_date_part_index($date_parts, 'd');
        $mi = valid_date_part_index($date_parts, 'm');
        $yi = valid_date_part_index($date_parts, 'y');

        // regex setup
        $dre = "(0?1|0?2|0?3|0?4|0?5|0?6|0?7|0?8|0?9|10|11|12|13|14|15|16|17|18|19|20|21|22|23|24|25|26|27|28|29|30|31)";
        $mre = "(0?1|0?2|0?3|0?4|0?5|0?6|0?7|0?8|0?9|10|11|12)";
        $yre = "([0-9]{4})";
        $red = '' . $delimiter; // escape delimiter for regex
        $rex = "/^[0]{$red}[1]{$red}[2]/";

        // do replacements at correct positions
        $rex = str_replace("[{$di}]", $dre, $rex);
        $rex = str_replace("[{$mi}]", $mre, $rex);
        $rex = str_replace("[{$yi}]", $yre, $rex);

        if (preg_match($rex, $str, $matches)) {
            // skip 0 as it contains full match, check the date is logically valid
            if (checkdate($matches[$mi + 1], $matches[$di + 1], $matches[$yi + 1])) {
                return true;
            } else {
                // match but logically invalid
                $CI->form_validation->set_message('valid_date', "The date is invalid.");
                return false;
            }
        }

        // no match
        $CI->form_validation->set_message('valid_date', "The date format is invalid. Use {$params[0]}");
        return false;
    }

}

/**
 * @work   :  Call back function for the above function
 */
if (!function_exists('valid_date_part_index')) {

    function valid_date_part_index($parts, $search) {
        for ($i = 0; $i <= count($parts); $i++) {
            if ($parts[$i] == $search) {
                return $i;
            }
        }
    }

}


/**
 * @Creation Date:01-Nov-2016
 * @work   : To get Category name bt Product ID
 */
if (!function_exists('getCategoryNameByProductId')) {

    function getCategoryNameByProductId($productId) {
        $CI = & get_instance();
        $CI->load->database();
        $text = '';

        $CI->db->select('category_name');
        $CI->db->where('pcm.product_id', $productId);
        $CI->db->join(TBL_PRODUCT_CAT_MAPPING . ' as pcm', 'pcm.cat_id = pc.cat_id');
        $query = $CI->db->get(TBL_PRODUCT_CATEGORY . ' as pc');
        if ($query->row()) {
            foreach ($query->result_array() as $key) {
                $text .= $key['category_name'] . ", ";
            }
            return trim($text, ', ');
        } else {
            return FALSE;
        }
    }

}


/**
 * @Creation Date:01-Nov-2016
 * @work   : To get Category name bt Product ID
 */
if (!function_exists('getBranchNameByProductId')) {

    function getBranchNameByProductId($productId) {
        $CI = & get_instance();
        $CI->load->database();
        $text = '';

        $CI->db->select('name');
        $CI->db->where('pbm.product_id', $productId);
        $CI->db->join(TBL_PRODUCT_BRANCH_MAPPING . ' as pbm', 'pbm.branch_id = branch.branch_id');
        $query = $CI->db->get(TBL_BRANCH . ' as branch');
        if ($query->row()) {
            foreach ($query->result_array() as $key) {
                $text .= $key['name'] . ", ";
            }
            return trim($text, ', ');
        } else {
            return FALSE;
        }
    }

}


/**
 * @Creation Date:01-Nov-2016
 * @work   : To get Category name bt Product ID
 */
if (!function_exists('sendEmail')) {

    function sendEmail($email, $subject, $message) {
        $CI = & get_instance();
        $CI->load->library('email');
        $CI->load->library('email');

        $CI->email->set_mailtype("html");
        $CI->email->from('noreply@veciq.com', 'Veciq');
        $CI->email->to($email);
        $CI->email->subject($subject);
        $CI->email->message($message);

        if (!$CI->email->send()) {
            return 'Email not sent. Please try again.';
        }
        return TRUE;
    }

}


/**
 * @Creation Date:28-Oct-2016
 * @work   : Get Branch Drop-Down By User ID
 */
if (!function_exists('getBranchType')) {

    function getBranchType($branch_type_id = '', $tbIn = '', $cls = '', $id = 'branch_type_id') {
        $html = '';
        $CI = & get_instance();
        $CI->load->database();
        $CI->db->select('branch_type_id, name');
        $query = $CI->db->get(TBL_BRANCH_TYPE);
        $html .= '<select tabindex=' . $tbIn . ' name="branch_type_id" id="' . $id . '" class="form-control ' . $cls . '">';
        $html .= '<option> Select Shop Type </option>';
        if ($query->row()) {
            foreach ($query->result_array() as $key) {
                $html .= '<option value="' . $key["branch_type_id"] . '" ' . ((!empty($branch_type_id) && $key["branch_type_id"] == $branch_type_id) ? "selected" : "") . ' >' . $key["name"] . '</option>';
            }
        }
        $html .= '</select>';
        return $html;
    }

}

/**
 * @Creation Date:28-Oct-2016
 * @work   : Get Head Branch Name By User ID
 */
if (!function_exists('getHeadBranchByUserId')) {

    function getHeadBranchByUserId($user_id) {
        $CI = & get_instance();
        $CI->load->database();
        $CI->db->where(array('user_id' => $user_id, 'is_head' => '1'));
        $CI->db->select('branch_id, branch_type_id, name, latitude, longitude');
        $query = $CI->db->get(TBL_BRANCH);
        if ($query->num_rows()) {
            return $query->row_array();
        }

        return FALSE;
    }

}


/**
 * @Creation Date:03-Nov-2016
 * @work   : To get Logo of the website
 */
if (!function_exists('getSettings')) {

    function getSettings() {
        $CI = & get_instance();
        $CI->db->select('*');
        $CI->db->from(TBL_SITE_SETTINGS);
        $query = $CI->db->get();
        $record_setting = $query->row_array();
        $CI->session->set_userdata($record_setting);
    }

}



/**
 * @Creation Date:10-Nov-2016
 * @work   : Get All User Drop-Down
 */
if (!function_exists('getAllUsersDropDown')) {

    function getAllUsersDropDown($id = 'branchUserFilter', $alluser = false) {
        $html = '';
        $CI = & get_instance();
        $userInfo = $CI->session->userdata('user');
        $CI->load->database();
        $user = TBL_USERS;
        $userDtl = TBL_USERS_DETAIL;
        $CI->db->select("$userDtl.first_name, $userDtl.last_name, $user.user_id");
        $CI->db->join("$userDtl", "$userDtl.user_id = $user.user_id", 'INNER');
        if (!$alluser) {
            $CI->db->where('role', 2);
        }

        $query = $CI->db->get($user);
        $html .= '<select name="' . $id . '" id="' . $id . '" class="form-control width200p" >';
        $html .= '<option> Filter By User </option>';
        if ($query->row()) {
            foreach ($query->result_array() as $key) {
                if ($userInfo['user_id'] == $key["user_id"]) {
                    $html .= '<option value="' . $key["user_id"] . '" > Self </option>';
                } else {
                    $html .= '<option value="' . encryptIt($key["user_id"]) . '" >' . $key["first_name"] . ' ' . $key["last_name"] . '</option>';
                }
            }
        }
        $html .= '</select>';
        return $html;
    }

}


/**
 * @Creation Date:11-Nov-2016
 * @work   : Get All Head Branch Drop Down
 */
if (!function_exists('getPackages')) {

    function getPackages($id = '',$selected='') {
        $html = '';
        $CI = & get_instance();
        $CI->load->database();
        $CI->db->select('*');
        $query = $CI->db->get("packages");
        $html .= '<select name="' . $id . '" id="' . $id . '" class="form-control" >';
        $html .= '<option value=""> Select </option>';
        if ($query->num_rows()) {
            foreach ($query->result_array() as $key) {
                $select = ($key["pack_id"]==$selected)?'selected':'';
                $html .= '<option '.$select.' value="' . $key["pack_id"] . '" >' . $key["packages_name"] . '</option>';
            }
        } 
        $html .= '</select>'; 
        return $html;
    }

}



/**
 * @Creation Date:11-Nov-2016
 * @work   : Get All Head Branch Drop Down
 */
if (!function_exists('getCategory')) {

    function getCategory($id = '',$selected='') {
        $html = '';
        $CI = & get_instance();
        $CI->load->database();
        $CI->db->select('*');
        $query = $CI->db->get("category");
        $html .= '<select name="' . $id . '" id="' . $id . '" class="form-control" >';
        $html .= '<option value=""> Select </option>';
        if ($query->num_rows()) {
            foreach ($query->result_array() as $key) {
                $select = ($key["cat_id"]==$selected)?'selected':'';
                $html .= '<option '.$select.' value="' . $key["cat_id"] . '" >' . $key["category_name"] . '</option>';
            }
        } 
        $html .= '</select>'; 
        return $html;
    }

}



if (!function_exists('getPackagesbyDD')) {

    function getPackagesbyDD($name = '',$id='') {
        $html = '';
        $CI = & get_instance();
        $CI->load->database();
        $CI->db->select('*');
            if($id !='')
        $CI->db->where('cat_id', $id);
        $query = $CI->db->get("packages");
        $html .= '<select name="' . $name . '" id="' . $name . '" class="form-control" >';
        if ($query->num_rows()) {
              $html .= '<option value=""> Select </option>';
            foreach ($query->result_array() as $key) {
                $html .= '<option  value="' . $key["pack_id"] . '" >' . $key["packages_name"] . '</option>';
            }
        }else{
              $html .= '<option value=""> No packages assigned </option>';
        } 
        $html .= '</select>'; 
        return $html;
    }
}



if (!function_exists('getCategorybyID')) {

    function getCategorybyID($id = '') {
        $html = '';
        $CI = & get_instance();
        $CI->load->database();
        $CI->db->select('*');
        $CI->db->where('cat_id', $id);
        $query = $CI->db->get("category");
        $data = $query->row_array();
        return isset($data['category_name'])?$data['category_name']:'';
    }

}


if (!function_exists('getSubjects')) {

    function getSubjects($id = '',$selected='') {
        $html = '';
        $CI = & get_instance();
        $CI->load->database();
        $CI->db->select('*');
        $query = $CI->db->get("subjects");
        $html .= '<select name="' . $id . '" id="' . $id . '" class="form-control" >';
        $html .= '<option value=""> Select </option>';
        if ($query->num_rows()) {
            foreach ($query->result_array() as $key) {
                $select = ($key["subject_id"]==$selected)?'selected':'';
                $html .= '<option '.$select.' value="' . $key["subject_id"] . '" >' . $key["subject_name"] . '</option>';
            }
        }
        $html .= '</select>'; 
        return $html;
    }

}


if (!function_exists('getTestList')) {

    function getTestList($id = '',$selected='') {
        $html = '';
        $CI = & get_instance();
        $CI->load->database();
        $CI->db->select('*');
        $query = $CI->db->get("test");
        $html .= '<select name="' . $id . '" id="' . $id . '" class="form-control" >';
        $html .= '<option value=""> Select </option>';
        if ($query->num_rows()) {
            foreach ($query->result_array() as $key) {
                $select = ($key["test_id"]==$selected)?'selected':'';
                $html .= '<option '.$select.' value="' . $key["test_id"] . '" >' . $key["test_name"] . '</option>';
            }
        }
        $html .= '</select>'; 
        return $html;
    }

}


/**
 * @Creation Date:11-Nov-2016
 * @work   : To create product category drop down by branch name
 */
if (!function_exists('getAllHeadBranchNameDropDownWithCategory')) {

    function getAllHeadBranchNameDropDownWithCategory() {
        $CI = & get_instance();
        $CI->load->database();
        $html = '';

        $CI->db->select('branch.user_id, branch.name');
        $CI->db->where('branch.is_head', 1);
        $CI->db->join(TBL_PRODUCT_CATEGORY . ' as pc', 'pc.user_id = branch.user_id');
        $CI->db->group_by('pc.user_id');
        $query = $CI->db->get(TBL_BRANCH . ' as branch');
        $html .= '<select name="branchCategoryFilter" id="branchCategoryFilter" class="form-control filter-drp" >';
        $html .= '<option value="0"> All </option>';
        if ($query->num_rows()) {
            foreach ($query->result_array() as $key) {
                $html .= '<option value="' . encryptIt($key["user_id"]) . '" >' . $key["name"] . '</option>';
            }
        }
        $html .= '</select>';
        return $html;
    }

}

/**
 * @Creation Date:11-Nov-2016
 * @work   : To create product attribute drop down by branch name
 */
if (!function_exists('getAllHeadBranchNameDropDownWithAttribute')) {

    function getAllHeadBranchNameDropDownWithAttribute() {
        $CI = & get_instance();
        $CI->load->database();
        $html = '';

        $CI->db->select('branch.user_id, branch.name');
        $CI->db->where('branch.is_head', 1);
        $CI->db->join(TBL_PRODUCT_ATTRIBUTE . ' as pa', 'pa.user_id = branch.user_id');
        $CI->db->group_by('pa.user_id');
        $query = $CI->db->get(TBL_BRANCH . ' as branch');
        $html .= '<select name="branchAttributeFilter" id="branchAttributeFilter" class="form-control filter-drp" >';
        $html .= '<option value="0"> All </option>';
        if ($query->num_rows()) {
            foreach ($query->result_array() as $key) {
                $html .= '<option value="' . encryptIt($key["user_id"]) . '" >' . $key["name"] . '</option>';
            }
        }
        $html .= '</select>';
        return $html;
    }

}