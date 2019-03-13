<?php

// set default timezone for application
date_default_timezone_set('Asia/Kolkata');

// contact status
define('CONTACT_STATUS_NEW', 0);
define('CONTACT_STATUS_LEAD', 1);
define('CONTACT_STATUS_FUTURE_LEAD', 2);
define('CONTACT_STATUS_NO_LEAD', 3);
define('CONTACT_STATUS_ON_HOLD', 4);
define('CONTACT_STATUS_OTHER', 5);
define('CONTACT_STATUS_NOT_ELIGILE', 6);
define('CONTACT_STATUS_DOCUMENTS_COLLECTION', 7);
define('CONTACT_STATUS_DOCUMENT_COLLECTED', 8);
define('CONTACT_STATUS_APPLICATION_SUBMITTED', 9);
define('CONTACT_STATUS_APPROVED_FROM_BANK', 10);
define('CONTACT_STATUS_REJECTED_FROM_BANK', 11);
define('CONTACT_STATUS_0', 'New');
define('CONTACT_STATUS_1', 'Lead');
define('CONTACT_STATUS_2', 'Future Lead');
define('CONTACT_STATUS_3', 'No Lead');
define('CONTACT_STATUS_4', 'On Hold');
define('CONTACT_STATUS_5', 'Other');
define('CONTACT_STATUS_6', 'Not Eligible');
define('CONTACT_STATUS_7', 'Document Collection');
define('CONTACT_STATUS_8', 'Document Collected');
define('CONTACT_STATUS_9', 'Application Submitted');
define('CONTACT_STATUS_10', 'Approved from Bank');
define('CONTACT_STATUS_11', 'Rejected from Bank');