<?php

namespace App\Enums;

enum TaskStatus: string {
    case CREATED = 'CREATED';
    case COMPLETED = 'COMPLETED';
}