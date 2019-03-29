<?php 
    class UserController {

    	/**
         * @api {post} /api/createAdminUser Create User From Admin Portal API
         * @apiName Create User From Admin Portal API
         * @apiGroup User
         *
         * @apiParam {string} fname FirstName
         * @apiParam {string} lname LastName
         * @apiParam {string} email Email
         * @apiParam {string} password Password
         * @apiParam {string} active Active
         * @apiParam {string} usercat UserCat
         * @apiParam {string} userlevel UserLevel
         * @apiParam {string} phone Phone
         * @apiParam {string} organizationNR Organization NR
         *
         * @apiSuccess {string} status Status of the request.
         * @apiSuccess {string} message Message corresponding to request.
         */
    	public static function createAdminUser($request, $response, $args)  {
            $userId = CommonController::checkAuthHeaders($request);
            $postdata = CommonController::cleanXssArray($request->getParams());
            if($userId != 'FAIL') {
                $isEmailPresent = self::checkEmail($postdata['email']);
                $orgRes = Model::factory('tbl_organization')
                    ->where('OrganizationNR', $postdata['organizationNR'])
                    ->find_array();
                
                if($orgRes) {
                    $organizationId = $orgRes[0]['id'];
                    if($isEmailPresent == "PRESENT") {
                        CommonController::sendResponseWithCode(500, 'FAIL', 'This email is already linked with another account. Pelase use different email.', $response);
                    } else {
                        $rowdata = Model::factory('tbl_user')->create();
                        $dateCrDate = date('Y-m-d H:i:s');
                        $dateModDate = date('Y-m-d H:i:s');
                        $rowdata->Fname = $postdata['fname'];
                        $rowdata->Lname = $postdata['lname'];
                        $rowdata->Mail = $postdata['email'];
                        $rowdata->Password = $postdata['password'];
                        $rowdata->Phone = $postdata['phone'];
                        $rowdata->UserCat = $postdata['usercat'];
                        $rowdata->UserLevel = $postdata['userlevel'];
                        $rowdata->CrDate = $dateCrDate;
                        $rowdata->Active = $postdata['active'];
                        $rowdata->OrgId = $organizationId;
                        $res = $rowdata->save();
                        if ($res) {
                            CommonController::sendResponseWithCode(200, 'OK', 'Sucsessfully Create User.', $response);
                        } else{
                            CommonController::sendResponseWithCode(500, 'FAIL', 'Internal server error, Please try again later.', $response);
                        }
                    }
                } else {            
                    CommonController::sendResponseWithCode(500, 'FAIL', 'Please enter a correct OrganizationNR value!', $response);
                }
            } else {
                CommonController::sendResponseWithCode(500, 'FAIL', 'Your session is expired. Please login and try again.', $response);
            }
    	}

    	/**
         * @api {get} /api/viewAllAdminuser View All Users From Admin Portal API
         * @apiName View All Users From Admin Portal API
         * @apiGroup User
         *
         * @apiSuccess {string} status Status of the request.
         * @apiSuccess {string} message Message corresponding to request.
         */

    	public static function viewAllAdminuser($request, $response, $args)  {

            $result = Model::factory('tbl_user')
            ->table_alias('user')
            ->select_many('user.Mail', 'user.Fname', 'user.Lname',
            'user.Phone', 'user.CrDate', 'user.ModDate', 'user.UserCat',
            'user.UserLevel', 'user.Active', 'user.OrgId', 'org.OrgName', 'org.OrganizationNR')
            ->join('tbl_organization','org.id=user.OrgId','org')   
            ->where('isDeleted', 0)
            ->_add_order_by('user.CrDate','desc')
            ->find_array();

            if ($result) {
                CommonController::sendBodyResponseWithCode(200, 'OK', 'User list fetched successfully.',$result, $response);
            } else {
                CommonController::sendBodyResponseWithCode(500, 'FAIL', 'No records found.',$result, $response);
            }
    	}

        /**
         * @api {post} /api/updateAdminUser Update User From Admin Portal API
         * @apiName Update User From Admin Portal API
         * @apiGroup User
         *
         * @apiParam {string} fname First Name
         * @apiParam {string} lname Last Name
         * @apiParam {string} password Password
         * @apiParam {string} email Email
         * @apiParam {string} phone Phone
         * @apiParam {string} active Active
         * @apiParam {string} usercat User Category
         * @apiParam {string} userlevel User Level
         * @apiParam {string} organizationNR Organization NR
         *
         * @apiSuccess {string} status Status of the request.
         * @apiSuccess {string} message Message corresponding to request.
         */
    	public static function updateAdminUser($request, $response, $args)  {

            $userId = CommonController::checkAuthHeaders($request);
            $postdata = CommonController::cleanXssArray($request->getParams());
            if($userId != 'FAIL') {
                $organizationNR = $postdata['organizationNR'];
                $role = self::checkUserRole($userId);
                if($organizationNR) {
                    $orgRes = Model::factory('tbl_organization')
                    ->where('OrganizationNR', $organizationNR)
                    ->find_array();
                    if($orgRes) $organizationId = $orgRes[0]['id'];
                }
                
                if($role != 'A') {                    
                    $user = Model::factory('tbl_user')
                    ->where('Mail', $postdata['email'])
                    ->find_array();   
                    if ($user) {
                        $rowdata = Model::factory('tbl_user')-> find_one($user[0]['id']);
                        $dateModDate = date('Y-m-d H:i:s');
                        $rowdata->Fname = $postdata['fname'];
                        $rowdata->Lname = $postdata['lname'];
                        $rowdata->Password = $postdata['password'];
                        $rowdata->Phone = $postdata['phone'];
                        $rowdata->Active = $postdata['active'];
                        $rowdata->UserCat = $postdata['usercat'];
                        $rowdata->UserLevel = $postdata['userlevel'];
                        $rowdata->ModDate = $dateModDate;
                        if($organizationId) $rowdata->OrgId = $organizationId;
                        $res = $rowdata->save();
                        if($res) {
                            return CommonController::sendResponseWithCode(200, 'OK', 'Sucsessfully Deleted.', $response);
                        } else {
                            return CommonController::sendResponseWithCode(200, 'OK', 'Internal server error, Please try again later.', $response);
                        }
                    }
                } else {
                    CommonController::sendResponseWithCode(500, 'FAIL', 'Sorry, Only admin has the rights to update a user.', $response);
                }
            } else {
                CommonController::sendResponseWithCode(500, 'FAIL', 'Your session is expired. Please login and try again.', $response);
            }

    		/*$postdata = $request->getParams();
    		$rowdata=Model::factory('tbl_user')->find_one($postdata['id']);
	        if ($rowdata) {
	        	print_r($rowdata);
	                
	                $res = $rowdata->save();
	                if ($res) {
	                        CommonController::sendResponseWithCode(200, 'OK', 'Sucsessfully Updated.', $response);
	                    }
	                 else{
	                    CommonController::sendResponseWithCode(500, 'FAIL', 'Internal server error, Please try again later.', $response);
	                }
	    	}*/
    	}

		/**
         * @api {post} /api/deleteAdminUser Delete User From Admin Portal API
         * @apiName Delete User From Admin Portal API
         * @apiGroup User
         *
         * @apiParam {integer} email Email Address of User
         *
         * @apiSuccess {string} status Status of the request.
         * @apiSuccess {string} message Message corresponding to request.
         */    	

    	public static function deleteAdminUser($request, $response, $args)  {
    		$userId = CommonController::checkAuthHeaders($request);
            $postdata = CommonController::cleanXssArray($request->getParams());
            if($userId != 'FAIL') {
                $role = self::checkUserRole($userId);
                if($role == 'A') {
                    
                    $user = Model::factory('tbl_user')
                    ->where('Mail', $postdata['email'])
                    ->find_array();   
                    if ($user) {
                        $rowdata = Model::factory('tbl_user')-> find_one($user[0]['id']);
                        $rowdata->isDeleted = true;
                        $res = $rowdata->save();
                        if($res) {
                            return CommonController::sendResponseWithCode(200, 'OK', 'Sucsessfully Deleted.', $response);
                        } else {
                            return CommonController::sendResponseWithCode(200, 'OK', 'Internal server error, Please try again later.', $response);
                        }
                    }
                } else {
                    CommonController::sendResponseWithCode(500, 'FAIL', 'Sorry, Only admin has the rights to delete a user.', $response);
                }
            } else {
                CommonController::sendResponseWithCode(500, 'FAIL', 'Your session is expired. Please login and try again.', $response);
            }
    	}

        public function checkEmail($email) {
            $res = Model::factory('tbl_user')
                ->where('Mail', $email)
                ->find_array();
            if($res) return "PRESENT";
            else return "NOT_PRESENT";
        }

        public function checkUserRole($id) {
            $res = Model::factory('tbl_user')
                ->find_one($id)
                ->as_array();
            return $res['UserCat'];
        }
    }
?>