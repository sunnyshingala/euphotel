<?php

// set default timezone for application
date_default_timezone_set('Asia/Kolkata');

// contact status
define('CONTACT_STATUS_NEW', 0);
define('CONTACT_STATUS_FUTURE_LEAD', 1);
define('CONTACT_STATUS_NO_LEAD', 2);
define('CONTACT_STATUS_ON_HOLD', 3);
define('CONTACT_STATUS_OTHER', 4);
define('CONTACT_STATUS_LEAD', 10);
define('CONTACT_STATUS_NOT_ELIGILE', 11);
define('CONTACT_STATUS_DOCUMENTS_COLLECTION', 12);
define('CONTACT_STATUS_DOCUMENT_COLLECTED', 13);
define('CONTACT_STATUS_APPLICATION_SUBMITTED', 14);
define('CONTACT_STATUS_APPROVED_FROM_BANK', 15);
define('CONTACT_STATUS_REJECTED_FROM_BANK', 16);
define('CONTACT_STATUS_0', 'New');
define('CONTACT_STATUS_1', 'Future Lead');
define('CONTACT_STATUS_2', 'No Lead');
define('CONTACT_STATUS_3', 'On Hold');
define('CONTACT_STATUS_4', 'Other');
define('CONTACT_STATUS_10', 'Lead');
define('CONTACT_STATUS_11', 'Not Eligible');
define('CONTACT_STATUS_12', 'Document Collection');
define('CONTACT_STATUS_13', 'Document Collected');
define('CONTACT_STATUS_14', 'Application Submitted');
define('CONTACT_STATUS_15', 'Approved from Bank');
define('CONTACT_STATUS_16', 'Rejected from Bank');