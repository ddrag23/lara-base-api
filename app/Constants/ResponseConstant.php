<?php

namespace App\Constants;

enum ResponseConstant: string
{
    case READ = 'read';
    case WRITE = 'write';
    case UPDATE = 'update';
    case DETAIL = 'detail';
    case DELETE = 'delete';
    case NOTFOUND = 'notfound';
    case INVALID = 'invalid';
    case CREDENTIAL_FAIL = 'credential wrong';
    case AUTH_SUCCESS = 'auth success';
    case LOGOUT_SUCCESS = 'logout';
    case REGISTER_SUCCESS = 'register';
    case AUTHORIZE_FAIL = 'auth fail';
}
