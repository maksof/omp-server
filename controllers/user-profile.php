<?php 

    class UserProfileController {

        /**
         * @api {post} /api/userProfile User Profile Details API
         * @apiName User Profile Details API
         * @apiGroup User Profile
         *
         * @apiHeaders {string} token Access Token
         *
         * @apiSuccess {string} status Status of the request.
         * @apiSuccess {string} message Message corresponding to request.
         */
        public function getUserDetails($request, $response, $args) {

            $userId = CommonController::checkAuthHeaders($request);
            if($userId != 'FAIL') {
                $res = Model::factory('tbl_user')
                ->where('id', $userId)
                ->find_array();
                $orgId = $res[0]['OrgId'];
                if($orgId) {
                    $org = Model::factory('tbl_organization')
                    ->where('id', $orgId)
                    ->find_array();
                    $organizationNR = $org[0]['OrganizationNR'];
                    $res[0]['organizationNR'] = $organizationNR;
                }
                return CommonController::sendBodyResponseWithCode(200, 'OK', 'User details fetched successfully', $res, $response);
            }else {
                CommonController::sendResponseWithCode(500, 'FAIL', 'Your session is expired. Please login and try again.', $response);
            }
        }

        /**
         * @api {post} /api/editProfile Edit User Profile API 
         * @apiName Edit User Profile API
         * @apiGroup User Profile
         *
         * @apiHeaders {string} token Token
         *
         * @apiParam {string} fname First Name
         * @apiParam {string} lname Last Name
         * @apiParam {string} password Password
         * @apiParam {string} phone Phone
         * @apiParam {string} organizationNR Orgainization NR
         *
         * @apiSuccess {string} status Status of the request.
         * @apiSuccess {string} message Message corresponding to request.
         */
        public function editProfile($request, $response, $args) {

            $userId = CommonController::checkAuthHeaders($request);
            $postdata = CommonController::cleanXssArray($request->getParams());
            if($userId != 'FAIL') {
                $updtRes = Model::factory('tbl_user')->find_one($userId);
                $organizationNR = $postdata['organizationNR'];
                if($organizationNR) {
                    $org = Model::factory('tbl_organization')
                    ->where('OrganizationNR',$organizationNR)
                    ->find_array();
                    $organizationId = null;
                    if($org) {
                        $organizationId = $org[0]['id'];
                    } else {
                        CommonController::sendResponseWithCode(200, 'FAIL', 'Please enter the correct Organization NR number!', $response);
                        return;
                    }
                }

                if($updtRes) {
                    $updtRes->Fname = $postdata['fname'];
                    $updtRes->Lname = $postdata['lname'];
                    $updtRes->Phone = $postdata['phone'];
                    if(isset($postdata['password'])) $updtRes->Password = $postdata['password'];
                    if($organizationId) $updtRes->OrgId = $organizationId;
                    $suc = $updtRes->save();
                    if($suc) {
                        CommonController::sendResponseWithCode(200, 'OK', 'User profile updated successfully.', $response);      
                    } else {
                        CommonController::sendResponseWithCode(500, 'FAIL', 'Internal server error, please try again later.', $response);   
                    }
                }else {
                    CommonController::sendResponseWithCode(500, 'FAIL', 'No records present at the given id.', $response); 
                }
            }else {
                CommonController::sendResponseWithCode(500, 'FAIL', 'Your session is expired. Please login and try again.', $response);
            }
        }
    }
?>