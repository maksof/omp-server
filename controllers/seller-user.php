<?php 

    class SellerUserController {

        /**
         * @api {post} /api/createSellerUser Create Seller User API
         * @apiName Create Seller User API
         * @apiGroup Seller Users
         *
         * @apiParam {string} fname Fname
         * @apiParam {string} lname LastName
         * @apiParam {string} email Email
         * @apiParam {string} password Password
         * @apiParam {string} phone Phone
         * @apiParam {string} userlevel UserLevel
         *
         * @apiSuccess {string} status Status of the request.
         * @apiSuccess {string} message Message corresponding to request.
         */
        public static function createSellerUser($request, $response, $args)  {
            
            $authSuccess = CommonController::checkAuthHeaders($request);
            $postdata = CommonController::cleanXssArray($request->getParams());            
            $isEmailPresent = self::checkEmail($postdata['email']);
            if($authSuccess) {
                $user = Model::factory('tbl_user')->find_one($authSuccess)->as_array();
                if($isEmailPresent == "PRESENT") {
                    CommonController::sendResponseWithCode(500, 'OK', 'This email is already linked with another account. Pelase use different email.', $response);
                } else {
                    if($user['UserCat'] == 'S' && $user['UserLevel'] == 1 && $user['OrgId'] != 0) {
                        $rowdata = Model::factory('tbl_user')->create();
                        $dateCrDate = date('Y-m-d H:i:s');
                        $dateModDate = date('Y-m-d H:i:s');
                        $rowdata->OrgId = $user['OrgId'];
                        $rowdata->Fname = $postdata['fname'];
                        $rowdata->Lname = $postdata['lname'];
                        $rowdata->Mail = $postdata['email'];
                        $rowdata->Password = $postdata['password'];
                        $rowdata->Phone = $postdata['phone'];
                        $rowdata->UserCat = "S";
                        $rowdata->UserLevel = $postdata['userlevel'];
                        $rowdata->CrDate = $dateCrDate;
                        $rowdata->Active = true;
                        $res = $rowdata->save();
                        if ($res) {
                            CommonController::sendResponseWithCode(200, 'OK', 'User created successfully', $response);
                        } else{
                            CommonController::sendResponseWithCode(500, 'FAIL', 'Internal server error, Please try again later.', $response);
                        }
                    } else {
                        CommonController::sendResponseWithCode(500, 'FAIL', 'Sorry you do not have access to create seller users!', $response);
                    }
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
    }
?>