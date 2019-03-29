<?php 

    class UserAuthenticationController {

        /**
         * @api {post} /api/signup Sign Up API
         * @apiName Sign UP API
         * @apiGroup Authentication
         *
         * @apiParam {string} fname Fname
         * @apiParam {string} lname LastName
         * @apiParam {string} password Password
         * @apiParam {string} email Email
         * @apiParam {string} phone Phone
         * @apiParam {string} usercat UserCat
         * @apiParam {string} userlevel UserLevel
         *
         * @apiSuccess {string} status Status of the request.
         * @apiSuccess {string} message Message corresponding to request.
         */
        public static function signup($request, $response, $args)  {
            
            $postdata = CommonController::cleanXssArray($request->getParams());            
            $isEmailPresent = self::checkEmail($postdata['email']);
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
                $rowdata->Active = false;
                $res = $rowdata->save();
                if ($res) {
                    CommonController::sendResponseWithCode(200, 'OK', 'Sucsessfully SignUp.', $response);
                } else{
                    CommonController::sendResponseWithCode(500, 'FAIL', 'Internal server error, Please try again later.', $response);
                }
            }
        }

        /**
         * @api {post} /api/login LOGIN API
         * @apiName LOGIN API
         * @apiGroup Authentication
         *
         * @apiParam {string} email Email
         * @apiParam {string} password Password
         *
         * @apiSuccess {string} status Status of the request.
         * @apiSuccess {string} message Message corresponding to request.
         * @apiSuccess {string} data Session Token.
         */
        public static function login($request, $response, $args){
            
            $postdata = CommonController::cleanXssArray($request->getParams());
            $res = Model::factory('tbl_user')
                ->where('Mail', $postdata['email'])
                ->where('Password', $postdata['password'])
                ->find_array();
            if($res) {
                if($res[0]['Active'] == 0) {
                    CommonController::sendResponseWithCode(500, 'FAIL', 'Your account is not active. Please contact site admin to activate your account!', $response);
                } else {
                    $token = self::createUserSession($res[0]['id']);
                    if($token) {
                        $responseJson = (object) array('token' => $token, 'user' => $res[0]);
                        CommonController::sendBodyResponseWithCode(200, 'OK', 'User logged in successfully.', $responseJson, $response);
                    } else {
                        CommonController::sendResponseWithCode(500, 'FAIL', 'Internal server error, please try again later.', $response);
                    }                    
                }
            } else {
                CommonController::sendResponseWithCode(500, 'FAIL', 'Invalid username or password.', $response);
            }
        }

        public function checkEmail($email) {
            $res = Model::factory('tbl_user')
                ->where('Mail', $email)
                ->find_array();
            if($res) return "PRESENT";
            else return "NOT_PRESENT";
        }        

        public static function deleteVerificationCode($id)  {
            $ver = Model::factory('tbl_session')
            ->find_one($id);
            $ver->delete();
        }

        public function createUserSession($userid) {
            $delRes = Model::factory('tbl_session')
                ->where('UserId', $userid)
                ->find_array();
            if($delRes) {
                self::deleteVerificationCode($delRes[0]['id']);
            }

            $token = CommonController::generateToken();
            $objVerify = Model::factory('tbl_session')->create();
            $objVerify->Token = $token;
            $objVerify->Type = 'SESSION';
            $objVerify->UserId = $userid;
            $res1 = $objVerify->save();
            if($res1) return $token;
            else return '';
        }

        /**
         * @api {post} /api/logout Logout API
         * @apiName Logout API
         * @apiGroup Authentication
         *
         * @apiHeaders {string} token Access Token
         *
         * @apiSuccess {string} status Status of the request.
         * @apiSuccess {string} message Message corresponding to request.
         */
        public function logout($request, $response, $args) {

            $userId = CommonController::checkAuthHeaders($request);
            if($userId != 'FAIL') {
                $res = Model::factory('tbl_session')
                    ->where('UserId', $userId)
                    ->where('Type', 'SESSION')
                    ->find_array();
                if($res) {
                    self::deleteVerificationCode($res[0]['id']);
                } 
                return CommonController::sendResponseWithCode(200, 'OK', 'Logout User.', $response);
            }else {
                CommonController::sendResponseWithCode(500, 'FAIL', 'Your session is expired. Please login and try again.', $response);
            }
        }
    }
?>