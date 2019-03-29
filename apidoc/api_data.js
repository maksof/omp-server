define({ "api": [
  {
    "type": "post",
    "url": "/api/login",
    "title": "LOGIN API",
    "name": "LOGIN_API",
    "group": "Authentication",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "email",
            "description": "<p>Email</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "password",
            "description": "<p>Password</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "status",
            "description": "<p>Status of the request.</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "message",
            "description": "<p>Message corresponding to request.</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "data",
            "description": "<p>Session Token.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "controllers/authentication.php",
    "groupTitle": "Authentication"
  },
  {
    "type": "post",
    "url": "/api/logout",
    "title": "Logout API",
    "name": "Logout_API",
    "group": "Authentication",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "status",
            "description": "<p>Status of the request.</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "message",
            "description": "<p>Message corresponding to request.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "controllers/authentication.php",
    "groupTitle": "Authentication"
  },
  {
    "type": "post",
    "url": "/api/signup",
    "title": "Sign Up API",
    "name": "Sign_UP_API",
    "group": "Authentication",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "fname",
            "description": "<p>Fname</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "lname",
            "description": "<p>LastName</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "password",
            "description": "<p>Password</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "email",
            "description": "<p>Email</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "phone",
            "description": "<p>Phone</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "usercat",
            "description": "<p>UserCat</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "userlevel",
            "description": "<p>UserLevel</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "status",
            "description": "<p>Status of the request.</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "message",
            "description": "<p>Message corresponding to request.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "controllers/authentication.php",
    "groupTitle": "Authentication"
  },
  {
    "type": "post",
    "url": "/api/deleteAdminUser",
    "title": "Delete Organization API",
    "name": "Delete_Organization_API",
    "group": "Organization",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "integer",
            "optional": false,
            "field": "id",
            "description": "<p>OrganizationId</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "status",
            "description": "<p>Status of the request.</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "message",
            "description": "<p>Message corresponding to request.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "controllers/organization.php",
    "groupTitle": "Organization"
  },
  {
    "type": "post",
    "url": "/api/updateOrganization",
    "title": "Update Organization API",
    "name": "Update_Organization_API",
    "group": "Organization",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "orgnr",
            "description": "<p>OrganizationNr</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "orgname",
            "description": "<p>OrganizationName</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "orgadr1",
            "description": "<p>OrganizationAddress1</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "orgadr2",
            "description": "<p>OrganizationAddress2</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "orgtown",
            "description": "<p>OrganizationTown</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "orgzip",
            "description": "<p>OrganizationZip</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "orgphone",
            "description": "<p>OrganisationPhone</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "status",
            "description": "<p>Status of the request.</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "message",
            "description": "<p>Message corresponding to request.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "controllers/organization.php",
    "groupTitle": "Organization"
  },
  {
    "type": "post",
    "url": "/api/viewOrganization",
    "title": "View all Organization Data API",
    "name": "View_all_Organization_API",
    "group": "Organization",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "status",
            "description": "<p>Status of the request.</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "message",
            "description": "<p>Message corresponding to request.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "controllers/organization.php",
    "groupTitle": "Organization"
  },
  {
    "type": "post",
    "url": "/api/createOrganization",
    "title": "create Organization API",
    "name": "create_Organization_API",
    "group": "Organization",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "orgnr",
            "description": "<p>OrganizationNr</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "orgname",
            "description": "<p>OrganizationName</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "orgadr1",
            "description": "<p>OrganizationAddress1</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "orgadr2",
            "description": "<p>OrganizationAddress2</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "orgtown",
            "description": "<p>OrganizationTown</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "orgzip",
            "description": "<p>OrganizationZip</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "orgphone",
            "description": "<p>OrganisationPhone</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "status",
            "description": "<p>Status of the request.</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "message",
            "description": "<p>Message corresponding to request.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "controllers/organization.php",
    "groupTitle": "Organization"
  },
  {
    "type": "post",
    "url": "/api/",
    "title": "bulkUploadProduct Bulk upload and edit product API",
    "name": "Bulk_upload_and_edit_product_API",
    "group": "Product",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "file",
            "optional": false,
            "field": "file",
            "description": "<p>file</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "status",
            "description": "<p>Status of the request.</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "message",
            "description": "<p>Message corresponding to request.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "controllers/product.php",
    "groupTitle": "Product"
  },
  {
    "type": "post",
    "url": "/api/deleteProduct",
    "title": "Delete Product API",
    "name": "Delete_Product_API",
    "group": "Product",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "integer",
            "optional": false,
            "field": "id",
            "description": "<p>ProductId</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "status",
            "description": "<p>Status of the request.</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "message",
            "description": "<p>Message corresponding to request.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "controllers/product.php",
    "groupTitle": "Product"
  },
  {
    "type": "post",
    "url": "/api/updateProduct",
    "title": "Update Product API",
    "name": "Update_Product_API",
    "group": "Product",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "orgid",
            "description": "<p>Organization Id</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "spid",
            "description": "<p>SPId</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "spc1",
            "description": "<p>SPC1</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "spc2",
            "description": "<p>SPC2</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "spname",
            "description": "<p>SPName</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "spdesc",
            "description": "<p>SPDesc</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "spmeasuretype",
            "description": "<p>SpMeasureType</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "spmeasurenum",
            "description": "<p>SpMeasureNum</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "sparea",
            "description": "<p>SpArea</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "sprange",
            "description": "<p>SpRange</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "spdlvd1",
            "description": "<p>SpDeliveryD1</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "spdlvd2",
            "description": "<p>SpDeliveryD2</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "gpc1",
            "description": "<p>GPC1</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "gpc2",
            "description": "<p>GPC2</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "gpc3",
            "description": "<p>GPC3</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "spprice",
            "description": "<p>SpPrice</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "status",
            "description": "<p>Status of the request.</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "message",
            "description": "<p>Message corresponding to request.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "controllers/product.php",
    "groupTitle": "Product"
  },
  {
    "type": "post",
    "url": "/api/viewProduct",
    "title": "View all Products Data API",
    "name": "View_all_Products_API",
    "group": "Product",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "status",
            "description": "<p>Status of the request.</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "message",
            "description": "<p>Message corresponding to request.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "controllers/product.php",
    "groupTitle": "Product"
  },
  {
    "type": "post",
    "url": "/api/createProduct",
    "title": "create Product API",
    "name": "create_Product_API",
    "group": "Product",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "orgid",
            "description": "<p>Organization Id</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "spid",
            "description": "<p>SPId</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "spc1",
            "description": "<p>SPC1</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "spc2",
            "description": "<p>SPC2</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "spname",
            "description": "<p>SPName</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "spdesc",
            "description": "<p>SPDesc</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "spmeasuretype",
            "description": "<p>SpMeasureType</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "spmeasurenum",
            "description": "<p>SpMeasureNum</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "sparea",
            "description": "<p>SpArea</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "sprange",
            "description": "<p>SpRange</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "spdlvd1",
            "description": "<p>SpDeliveryD1</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "spdlvd2",
            "description": "<p>SpDeliveryD2</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "gpc1",
            "description": "<p>GPC1</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "gpc2",
            "description": "<p>GPC2</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "gpc3",
            "description": "<p>GPC3</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "spprice",
            "description": "<p>SpPrice</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "status",
            "description": "<p>Status of the request.</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "message",
            "description": "<p>Message corresponding to request.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "controllers/product.php",
    "groupTitle": "Product"
  },
  {
    "type": "post",
    "url": "/api/createSellerUser",
    "title": "Create Seller User API",
    "name": "Create_Seller_User_API",
    "group": "Seller_Users",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "fname",
            "description": "<p>Fname</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "lname",
            "description": "<p>LastName</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "email",
            "description": "<p>Email</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "password",
            "description": "<p>Password</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "phone",
            "description": "<p>Phone</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "userlevel",
            "description": "<p>UserLevel</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "status",
            "description": "<p>Status of the request.</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "message",
            "description": "<p>Message corresponding to request.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "controllers/seller-user.php",
    "groupTitle": "Seller_Users"
  },
  {
    "type": "post",
    "url": "/api/createAdminUser",
    "title": "Create User From Admin Portal API",
    "name": "Create_User_From_Admin_Portal_API",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "fname",
            "description": "<p>FirstName</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "lname",
            "description": "<p>LastName</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "email",
            "description": "<p>Email</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "password",
            "description": "<p>Password</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "active",
            "description": "<p>Active</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "usercat",
            "description": "<p>UserCat</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "userlevel",
            "description": "<p>UserLevel</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "phone",
            "description": "<p>Phone</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "organizationNR",
            "description": "<p>Organization NR</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "status",
            "description": "<p>Status of the request.</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "message",
            "description": "<p>Message corresponding to request.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "controllers/user.php",
    "groupTitle": "User"
  },
  {
    "type": "post",
    "url": "/api/deleteAdminUser",
    "title": "Delete User From Admin Portal API",
    "name": "Delete_User_From_Admin_Portal_API",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "integer",
            "optional": false,
            "field": "email",
            "description": "<p>Email Address of User</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "status",
            "description": "<p>Status of the request.</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "message",
            "description": "<p>Message corresponding to request.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "controllers/user.php",
    "groupTitle": "User"
  },
  {
    "type": "post",
    "url": "/api/updateAdminUser",
    "title": "Update User From Admin Portal API",
    "name": "Update_User_From_Admin_Portal_API",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "fname",
            "description": "<p>First Name</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "lname",
            "description": "<p>Last Name</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "password",
            "description": "<p>Password</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "email",
            "description": "<p>Email</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "phone",
            "description": "<p>Phone</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "active",
            "description": "<p>Active</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "usercat",
            "description": "<p>User Category</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "userlevel",
            "description": "<p>User Level</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "organizationNR",
            "description": "<p>Organization NR</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "status",
            "description": "<p>Status of the request.</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "message",
            "description": "<p>Message corresponding to request.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "controllers/user.php",
    "groupTitle": "User"
  },
  {
    "type": "get",
    "url": "/api/viewAllAdminuser",
    "title": "View All Users From Admin Portal API",
    "name": "View_All_Users_From_Admin_Portal_API",
    "group": "User",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "status",
            "description": "<p>Status of the request.</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "message",
            "description": "<p>Message corresponding to request.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "controllers/user.php",
    "groupTitle": "User"
  },
  {
    "type": "post",
    "url": "/api/editProfile",
    "title": "Edit User Profile API",
    "name": "Edit_User_Profile_API",
    "group": "User_Profile",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "fname",
            "description": "<p>First Name</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "lname",
            "description": "<p>Last Name</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "password",
            "description": "<p>Password</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "phone",
            "description": "<p>Phone</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "organizationNR",
            "description": "<p>Orgainization NR</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "status",
            "description": "<p>Status of the request.</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "message",
            "description": "<p>Message corresponding to request.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "controllers/user-profile.php",
    "groupTitle": "User_Profile"
  },
  {
    "type": "post",
    "url": "/api/userProfile",
    "title": "User Profile Details API",
    "name": "User_Profile_Details_API",
    "group": "User_Profile",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "status",
            "description": "<p>Status of the request.</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "message",
            "description": "<p>Message corresponding to request.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "controllers/user-profile.php",
    "groupTitle": "User_Profile"
  }
] });
