<?php 

	class OrganizationController {
		
		/**
		* @api {post} /api/createOrganization create Organization API
		* @apiName create Organization API
		* @apiGroup Organization
		*
		* @apiParam {string} orgnr OrganizationNr
		* @apiParam {string} orgname OrganizationName
		* @apiParam {string} orgadr1 OrganizationAddress1
		* @apiParam {string} orgadr2 OrganizationAddress2
		* @apiParam {string} orgtown OrganizationTown
		* @apiParam {string} orgzip OrganizationZip
		* @apiParam {string} orgphone OrganisationPhone
		*
		* @apiSuccess {string} status Status of the request.
		* @apiSuccess {string} message Message corresponding to request.
		*/
		public function createOrganization($request, $response, $args) {
			
			$userId = CommonController::checkAuthHeaders($request);
			$postdata = CommonController::cleanXssArray($request->getParams());
			if($userId != 'FAIL') {
				$createRes = Model::factory('tbl_organization')->create();
				$createRes->OrganizationNr = $postdata['orgnr'];
				$createRes->OrgName = $postdata['orgname'];
				$createRes->OrgAdr1 = $postdata['orgadr1'];
				if(isset($postdata['orgadr2'])) $createRes->OrgAdr2 = $postdata['orgadr2'];
				$createRes->OrgTown = $postdata['orgtown'];
				$createRes->OrgZip = $postdata['orgzip'];
				$createRes->OrgPhone = $postdata['orgphone'];
				$suc = $createRes->save();
				if($suc) {
					CommonController::sendResponseWithCode(200, 'OK', 'Create Organization successfully.', $response);      
				} else {
					CommonController::sendResponseWithCode(500, 'FAIL', 'Internal server error, please try again later.', $response);   
				}
			}else {
				CommonController::sendResponseWithCode(500, 'FAIL', 'Your session is expired. Please login and try again.', $response);
			}
		}

		/**
		* @api {post} /api/viewOrganization View all Organization Data API
		* @apiName View all Organization API
		* @apiGroup Organization
		*
		* @apiSuccess {string} status Status of the request.
		* @apiSuccess {string} message Message corresponding to request.
		*/
		public function viewOrganization($request, $response, $args) {
			
		$userId = CommonController::checkAuthHeaders($request);
			if($userId != 'FAIL') { 
				$orgData = Model::factory('tbl_organization')->find_array();
				if($orgData) {
					CommonController::sendBodyResponseWithCode(200, 'OK', 'Data featched successfully',$orgData ,$response);      
				} else {
					CommonController::sendResponseWithCode(500, 'FAIL', 'Internal server error, please try again later.', $response);   
				}
			}else {
				CommonController::sendResponseWithCode(500, 'FAIL', 'Your session is expired. Please login and try again.', $response);
			}
		}

		/**
		* @api {post} /api/updateOrganization Update Organization API
		* @apiName Update Organization API
		* @apiGroup Organization
		*
		* @apiParam {number} id OrganizationNr
		* @apiParam {number} orgnr OrganizationNr
		* @apiParam {string} orgname OrganizationName
		* @apiParam {string} orgadr1 OrganizationAddress1
		* @apiParam {string} orgadr2 OrganizationAddress2
		* @apiParam {string} orgtown OrganizationTown
		* @apiParam {number} orgzip OrganizationZip
		* @apiParam {string} orgphone OrganisationPhone
		*
		* @apiSuccess {string} status Status of the request.
		* @apiSuccess {string} message Message corresponding to request.
		*/
		public function updateOrganization($request, $response, $args) {
			
			$userId = CommonController::checkAuthHeaders($request);
			$postdata = CommonController::cleanXssArray($request->getParams());
			if($userId != 'FAIL') {
				$updateRes = Model::factory('tbl_organization')->find_one($postdata['id']);
				$updateRes->OrganizationNr = $postdata['orgnr'];
				$updateRes->OrgName = $postdata['orgname'];
				$updateRes->OrgAdr1 = $postdata['orgadr1'];
				$updateRes->OrgAdr2 = $postdata['orgadr2'];
				$updateRes->OrgTown = $postdata['orgtown'];
				$updateRes->OrgZip = $postdata['orgzip'];
				$updateRes->OrgPhone = $postdata['orgphone'];
				$suc = $updateRes->save();
				if($suc) {
					CommonController::sendResponseWithCode(200, 'OK', 'Update Organization successfully.', $response);      
				} else {
					CommonController::sendResponseWithCode(500, 'FAIL', 'Internal server error, please try again later.', $response);   
				}
			}else {
				CommonController::sendResponseWithCode(500, 'FAIL', 'Your session is expired. Please login and try again.', $response);
			}
		}

		/**
		* @api {post} /api/deleteOrganization Delete Organization API
		* @apiName Delete Organization API
		* @apiGroup Organization
		*
		* @apiParam {integer} id OrganizationId
		*
		* @apiSuccess {string} status Status of the request.
		* @apiSuccess {string} message Message corresponding to request.
		*/
		public function deleteOrganization($request, $response, $args) {
		
			$userId = CommonController::checkAuthHeaders($request);
			$postdata = CommonController::cleanXssArray($request->getParams());
			if($userId != 'FAIL') { 
				$orgData = Model::factory('tbl_organization')->find_one($postdata['id']);
				if($orgData) {
					$orgData-> delete();
					CommonController::sendResponseWithCode(200, 'OK', 'Delete successfully',$response);      
				} else {
					CommonController::sendResponseWithCode(500, 'FAIL', 'Internal server error, please try again later.', $response);   
				}
			}else {
				CommonController::sendResponseWithCode(500, 'FAIL', 'Your session is expired. Please login and try again.', $response);
			}
		}

	}
?>