<?php

namespace ENUM;

enum STATUS
{
    case IN_PROGRESS;
    case ENDED;
    case AWAIT;
}


var_dump(STATUS::AWAIT());