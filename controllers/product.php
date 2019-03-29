<?php 

	class ProductController {
		
		/**
		* @api {post} /api/createProduct create Product API
		* @apiName create Product API
		* @apiGroup Product
		*
		* @apiParam {number} orgid Organization Id
		* @apiParam {string} spid SPId
		* @apiParam {string} spc1 SPC1
		* @apiParam {string} spc2 SPC2
		* @apiParam {string} spname SPName
		* @apiParam {string} spdesc SPDesc
		* @apiParam {string} spmeasuretype SpMeasureType
		* @apiParam {number} spmeasurenum SpMeasureNum
		* @apiParam {number} sparea SpArea
		* @apiParam {number} sprange SpRange
		* @apiParam {number} spdlvd1 SpDeliveryD1
		* @apiParam {number} spdlvd2 SpDeliveryD2
		* @apiParam {string} gpc1 GPC1
		* @apiParam {string} gpc2 GPC2
		* @apiParam {string} gpc3 GPC3
		* @apiParam {double} spprice SpPrice
		*
		* @apiSuccess {string} status Status of the request.
		* @apiSuccess {string} message Message corresponding to request.
		*/
		public function createProduct($request, $response, $args) {
			
			$userId = CommonController::checkAuthHeaders($request);
			$postdata = CommonController::cleanXssArray($request->getParams());
			if($userId != 'FAIL') {
				$createRes = Model::factory('tbl_product')->create();
				$createRes->OrgId = $postdata['orgid'];
				$createRes->SPId = $postdata['spid'];
				$createRes->SPC1 = $postdata['spc1'];
				$createRes->SPC2 = $postdata['spc2'];
				$createRes->SPName = $postdata['spname'];
				$createRes->SPDesc = $postdata['spdesc'];
				$createRes->SpMeasureType = $postdata['spmeasuretype'];
				$createRes->SpMeasureNum = $postdata['spmeasurenum'];
				$createRes->SpArea = $postdata['sparea'];
				$createRes->SpRange = $postdata['sprange'];
				$createRes->SpDlvD1 = $postdata['spdlvd1'];
				$createRes->SpDlvD2 = $postdata['spdlvd2'];
				$createRes->GpC1 = $postdata['gpc1'];
				$createRes->GpC2 = $postdata['gpc2'];
				$createRes->GpC3 = $postdata['gpc3'];
				$createRes->SpPrice = $postdata['spprice'];
				$suc = $createRes->save();
				if($suc) {
					CommonController::sendResponseWithCode(200, 'OK', 'Create Product successfully.', $response);      
				} else {
					CommonController::sendResponseWithCode(500, 'FAIL', 'Internal server error, please try again later.', $response);   
				}
			}else {
				CommonController::sendResponseWithCode(500, 'FAIL', 'Your session is expired. Please login and try again.', $response);
			}
		}

		/**
		* @api {post} /api/updateProduct Update Product API
		* @apiName Update Product API
		* @apiGroup Product
		*
		* @apiParam {number} orgid Organization Id
		* @apiParam {string} spid SPId
		* @apiParam {string} spc1 SPC1
		* @apiParam {string} spc2 SPC2
		* @apiParam {string} spname SPName
		* @apiParam {string} spdesc SPDesc
		* @apiParam {string} spmeasuretype SpMeasureType
		* @apiParam {number} spmeasurenum SpMeasureNum
		* @apiParam {number} sparea SpArea
		* @apiParam {number} sprange SpRange
		* @apiParam {number} spdlvd1 SpDeliveryD1
		* @apiParam {number} spdlvd2 SpDeliveryD2
		* @apiParam {string} gpc1 GPC1
		* @apiParam {string} gpc2 GPC2
		* @apiParam {string} gpc3 GPC3
		* @apiParam {double} spprice SpPrice
		*
		* @apiSuccess {string} status Status of the request.
		* @apiSuccess {string} message Message corresponding to request.
		*/
		public function updateProduct($request, $response, $args) {
			
			$userId = CommonController::checkAuthHeaders($request);
			$postdata = CommonController::cleanXssArray($request->getParams());
			if($userId != 'FAIL') {
				$createRes = Model::factory('tbl_product')->find_one($postdata['id']);
				$createRes->OrgId = $postdata['orgid'];
				$createRes->SPId = $postdata['spid'];
				$createRes->SPC1 = $postdata['spc1'];
				$createRes->SPC2 = $postdata['spc2'];
				$createRes->SPName = $postdata['spname'];
				$createRes->SPDesc = $postdata['spdesc'];
				$createRes->SpMeasureType = $postdata['spmeasuretype'];
				$createRes->SpMeasureNum = $postdata['spmeasurenum'];
				$createRes->SpArea = $postdata['sparea'];
				$createRes->SpRange = $postdata['sprange'];
				$createRes->SpDlvD1 = $postdata['spdlvd1'];
				$createRes->SpDlvD2 = $postdata['spdlvd2'];
				$createRes->GpC1 = $postdata['gpc1'];
				$createRes->GpC2 = $postdata['gpc2'];
				$createRes->GpC3 = $postdata['gpc3'];
				$createRes->SpPrice = $postdata['spprice'];
				$suc = $createRes->save();
				if($suc) {
					CommonController::sendResponseWithCode(200, 'OK', 'Update Product successfully.', $response);      
				} else {
					CommonController::sendResponseWithCode(500, 'FAIL', 'Internal server error, please try again later.', $response);   
				}
			}else {
				CommonController::sendResponseWithCode(500, 'FAIL', 'Your session is expired. Please login and try again.', $response);
			}
		}

		/**
		* @api {post} /api/viewProduct View all Products Data API
		* @apiName View all Products API
		* @apiGroup Product
		*
		* @apiSuccess {string} status Status of the request.
		* @apiSuccess {string} message Message corresponding to request.
		*/
		public function viewProduct($request, $response, $args) {
			
			$userId = CommonController::checkAuthHeaders($request);
			if($userId != 'FAIL') { 
				$productData = Model::factory('tbl_product')->find_array();
				if($productData) {
					CommonController::sendBodyResponseWithCode(200, 'OK', 'Data featched successfully',$productData ,$response);      
				} else {
					CommonController::sendResponseWithCode(500, 'FAIL', 'Internal server error, please try again later.', $response);   
				}
			}else {
				CommonController::sendResponseWithCode(500, 'FAIL', 'Your session is expired. Please login and try again.', $response);
			}
		}

		/**
		* @api {post} /api/deleteProduct Delete Product API
		* @apiName Delete Product API
		* @apiGroup Product
		*
		* @apiParam {number} id ProductId
		*
		* @apiSuccess {string} status Status of the request.
		* @apiSuccess {string} message Message corresponding to request.
		*/
		public function deleteProduct($request, $response, $args) {
			
			$userId = CommonController::checkAuthHeaders($request);
			$postdata = CommonController::cleanXssArray($request->getParams());
			if($userId != 'FAIL') { 
				$productData = Model::factory('tbl_product')->find_one($postdata['id']);
				if($productData) {
					$productData-> delete();
					CommonController::sendResponseWithCode(200, 'OK', 'Delete successfully',$response);      
				} else {
					CommonController::sendResponseWithCode(500, 'FAIL', 'Internal server error, please try again later.', $response);   
				}
			}else {
				CommonController::sendResponseWithCode(500, 'FAIL', 'Your session is expired. Please login and try again.', $response);
			}
		}

		/**
		* @api {post} /api/ bulkUploadProduct Bulk upload and edit product API
		* @apiName Bulk upload and edit product API
		* @apiGroup Product
		*
		* @apiParam {file} file file
		*
		* @apiSuccess {string} status Status of the request.
		* @apiSuccess {string} message Message corresponding to request.
		*/
		public function bulkUploadProduct($request, $response, $args) {

			$userId = CommonController::checkAuthHeaders($request);
			$postdata = CommonController::cleanXssArray($request->getParams());
			if($userId != 'FAIL') {
				$files = $request->getUploadedFiles();
				$handle = fopen($_FILES['file']['tmp_name'], 'r');
				while (($row = fgetcsv($handle, 0, ",")) !== FALSE) {
					$dataRow = CommonController::cleanXssArray($row);
					
					if($dataRow[0] != 'OrgId'){
						
						if(!$dataRow[1] && !$dataRow[6] && !$dataRow[7]){
							$suc = self::CreateProductIfNotExist($dataRow);
						} else { 
							$tempRecData = Model::factory('tbl_product')
							->where('SPId', $dataRow[1])
							->find_array();
							
							if($tempRecData){
								$updateRes = Model::factory('tbl_product')->find_one($tempRecData[0]['id']);
								$updateRes->OrgId = $dataRow[0];
								$updateRes->SPId = $dataRow[1];
								$updateRes->SPC1 = $dataRow[2];
								$updateRes->SPC2 = $dataRow[3];
								$updateRes->SPName = $dataRow[4];
								$updateRes->SPDesc = $dataRow[5];
								$updateRes->SpMeasureType = $dataRow[6];
								$updateRes->SpMeasureNum = $dataRow[7];
								$updateRes->SpArea = $dataRow[8];
								$updateRes->SpRange = $dataRow[9];
								$updateRes->SpDlvD1 = $dataRow[10];
								$updateRes->SpDlvD2 = $dataRow[11];
								$updateRes->GpC1 = $dataRow[12];
								$updateRes->GpC2 = $dataRow[13];
								$updateRes->GpC3 = $dataRow[14];
								$updateRes->SpPrice = $dataRow[15];
								$suc2 = $updateRes->save();
							} else {
								$suc2 = self::CreateProductIfNotExist($dataRow);
							}
						}
					}
				}
				if($suc || $suc2) {
					CommonController::sendResponseWithCode(200, 'OK', 'Bulk Product upload successfully.', $response);      
				} else {
					CommonController::sendResponseWithCode(500, 'FAIL', 'Internal server error, please try again later.', $response);   
				}
			} else {
				CommonController::sendResponseWithCode(500, 'FAIL', 'Your session is expired. Please login and try again.', $response);	
			}
		}

		public function CreateProductIfNotExist($data) {
			$createRes = Model::factory('tbl_product')->create();
			$createRes->OrgId = $data[0];
			$createRes->SPId = $data[1];
			$createRes->SPC1 = $data[2];
			$createRes->SPC2 = $data[3];
			$createRes->SPName = $data[4];
			$createRes->SPDesc = $data[5];
			$createRes->SpMeasureType = $data[6];
			$createRes->SpMeasureNum = $data[7];
			$createRes->SpArea = $data[8];
			$createRes->SpRange = $data[9];
			$createRes->SpDlvD1 = $data[10];
			$createRes->SpDlvD2 = $data[11];
			$createRes->GpC1 = $data[12];
			$createRes->GpC2 = $data[13];
			$createRes->GpC3 = $data[14];
			$createRes->SpPrice = $data[15];
			$suc = $createRes->save();
			if($suc) return true;
			else false;	
		}

		/**
		* @api {post} /api/viewSellerProduct View and search seller Product only own Organization API
		* @apiName viewSellerProduct
		* @apiGroup Product
		*
		* @apiParam {string} SPId SPId
		* @apiParam {number} OrgId OrganizationId
		* @apiParam {string} SPC1 SPC1
		* @apiParam {string} SPC2 SPC2
		* @apiParam {string} SPName SellerProductName
		* @apiParam {string} SPDesc SellerProductDescription
		* @apiParam {string} SpMeasureType SpMeasureType 
		* @apiParam {number} SpMeasureNum SpMeasureNum
		* @apiParam {number} SpArea SpArea
		* @apiParam {number} SpRange SpRange 
		* @apiParam {number} SpDlvD1 SpDlvD1
		* @apiParam {number} SpDlvD2 SpDlvD2
		* @apiParam {string} GpC1 GpC1
		* @apiParam {string} GpC2 GpC2
		* @apiParam {string} GpC3 GpC3
		* @apiParam {double} SpPrice SellerProductPrice
		*
		* @apiSuccess {string} status Status of the request.
		* @apiSuccess {string} status Status of the request.
		* @apiSuccess {string} status Status of the request.
		* @apiSuccess {string} message Message corresponding to request.
		*/
		public function viewSellerProduct($request, $response, $args) {
			$reqdata=$request->getparams();
			$userId = CommonController::checkAuthHeaders($request);
			if($userId != 'FAIL') {
				$userRow = Model::factory('tbl_user')
				->where('id', $userId)
				->where('isDeleted', 0)
				->where('UserCat', 'S')
				->find_array();
				if($userRow && $userRow[0]['OrgId']){
					if(!$reqdata){
						$productRow = Model::factory('tbl_product')
						->where('OrgId', $userRow[0]['OrgId'])
						->find_array();
					} else {
						$productRow = Model::factory('tbl_product')
						->where('OrgId', $userRow[0]['OrgId'])
						->where_like(key($reqdata),'%'.$reqdata[key($reqdata)].'%')
						->find_array();
					}
					if($productRow){
						CommonController::sendBodyResponseWithCode(200, 'OK', 'Data.', $productRow, $response);
					}else {
						CommonController::sendResponseWithCode(500, 'FAIL', 'Internal server error, please try again later.', $response);   
					}
				} else {
					CommonController::sendResponseWithCode(200, 'OK', 'No record found', $response);
				}
			} else {
				CommonController::sendResponseWithCode(500, 'FAIL', 'Your session is expired. Please login and try again.', $response);
			}
		}

		/**
		* @api {post} /api/viewAdminBuyerProduct View and search Admin and buyer Products API
		* @apiName View and search Admin and buyer Products
		* @apiGroup Product
		*
		* @apiParam {string} SPId SPId
		* @apiParam {number} OrgId OrganizationId
		* @apiParam {string} SPC1 SPC1
		* @apiParam {string} SPC2 SPC2
		* @apiParam {string} SPName SellerProductName
		* @apiParam {string} SPDesc SellerProductDescription
		* @apiParam {string} SpMeasureType SpMeasureType 
		* @apiParam {number} SpMeasureNum SpMeasureNum
		* @apiParam {number} SpArea SpArea
		* @apiParam {number} SpRange SpRange 
		* @apiParam {number} SpDlvD1 SpDlvD1
		* @apiParam {number} SpDlvD2 SpDlvD2
		* @apiParam {string} GpC1 GpC1
		* @apiParam {string} GpC2 GpC2
		* @apiParam {string} GpC3 GpC3
		* @apiParam {double} SpPrice SellerProductPrice
		*
		* @apiSuccess {string} status Status of the request.
		* @apiSuccess {string} status Status of the request.
		* @apiSuccess {string} status Status of the request.
		* @apiSuccess {string} message Message corresponding to request.
		*/
		public function viewAdminBuyerProduct($request, $response, $args) {
			$reqdata=$request->getparams();
			$userId = CommonController::checkAuthHeaders($request);
			if($userId != 'FAIL') {
				$userRow = Model::factory('tbl_user')
				->where('id', $userId)
				->where('isDeleted', 0)
				->find_array();
				if($userRow && ($userRow[0]['UserCat'] == 'A' || $userRow[0]['UserCat'] == 'B')){
					if(!$reqdata){
						$productRow = Model::factory('tbl_product')->find_array();
					} else {
						$productRow = Model::factory('tbl_product')
						->where_like(key($reqdata),'%'.$reqdata[key($reqdata)].'%')
						->find_array();
					}
					if($productRow){
						CommonController::sendBodyResponseWithCode(200, 'OK', 'Data.', $productRow, $response);
					}else {
						CommonController::sendResponseWithCode(500, 'FAIL', 'Internal server error, please try again later.', $response);   
					}
				} else {
					CommonController::sendResponseWithCode(200, 'OK', 'No record found', $response);
				}
			} else {
				CommonController::sendResponseWithCode(500, 'FAIL', 'Your session is expired. Please login and try again.', $response);
			}
		}
	}
?>