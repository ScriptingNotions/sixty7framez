<?php

// Change this in production for HTTP Secure
define('PROTOCOL', 'http://'); 

// Site
define('SITE_NAME', 'Scripting Thoughts');

// Reserved names
define('DISALLOWED_USERNAMES', [
    'create',
    'create-password',
    'lists',
    'edit',
    '404',
    'login',
    'logout',
    'settings',
    'admin',
    'users',
    'user',
    'user-profile',
    'dashboard',
    'index',
    'landing',
    'register',
    'forgot-password',
    'forgot-password-process',
    'reset-password',
]);

// Login
define('LOGIN_FAIL', 'Incorrect username / password combination!');

// Password validation
define('PASSWORD_TOO_SHORT', 'Password must contain at least 8 characters');
define('PASSWORD_NEEDS_NUMBER', 'Password must contain at least 1 number');
define('PASSWORD_NEEDS_LOWERCASE', 'Password must contain at least 1 lowercase letter');
define('PASSWORD_NEEDS_UPPERCASE', 'Password must contain at least 1 uppercase letter');
define('PASSWORD_MISSING', 'You must include a password');
define('PASSWORD_UPDATED', 'Your password has been updated');
define('PASSWORD_SAME_AS_OLD', 'New password must be different than old');
define('OLD_PASSWORD_INCORRECT', 'Old password is incorrect');
define('PASSWORD_NOT_UPDATED', 'Unable to update password');
define('PASSWORDS_DONT_MATCH', 'Passwords do not match');

// Username validation
define('USERNAME_EXISTS', 'That username already exists');
define('USERNAME_NOT_EXISTS', 'The username/password combination is incorrect.');
define('USERNAME_NOT_APPROVED', 'That username is not approved');
define('USERNAME_MISSING', 'You must include a username');
define('USERNAME_TOO_SHORT', 'Username must contain at least 3 characters');
define('USERNAME_TOO_LONG', 'Username must be shorter than 50 characters');
define('USERNAME_CONTAINS_DISALLOWED', 'Your username cannot contain special characters');

// Email validation
define('EMAIL_EXISTS', 'That email address already exists');
define('EMAIL_NOT_EXISTS', 'Email address not found in our system');
define('EMAIL_MISSING', 'You must include an email address');
define('EMAIL_NOT_VALID', 'Email address is not valid');
// Lists
define('LIST_CREATE_SUCCESS', 'List successfully created');
define('LIST_CREATE_FAIL', 'Your list was not created! Please fill out all fields');
define('LIST_UPDATE_SUCCESS', 'List successfully updated');
define('LIST_UPDATE_FAIL', 'List was not updated');
define('LIST_DELETE_SUCCESS', 'List deleted');

// Settings
define('SETTINGS_UPDATE_SUCCESS', 'Settings successfully updated!');

// User
define('USER_DELETED', 'User deleted');

// Comments
define('USERNAME_NOT_MATCHES', 'Nice try');
define('DUPLICATE_COMMENT', 'This is a duplicate comment');

// Forgot password
define('PASSWORD_EMAIL_SENT', 'A link to reset your password has been sent to your email address');